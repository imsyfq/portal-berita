<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $postQuery = Post::select('id', 'title', 'slug', 'image', 'created_at', 'views')
            ->when($request->filled('q'), function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('title', 'like', "%{$request->q}%");
                    $q->orWhere('content', 'like', "%{$request->q}%");
                    $q->orWhereHas('categories', fn ($q) => $q->where('name', 'like', "%{$request->q}%"));
                });
            })
            ->with('categories');

        $trendingPosts = (clone $postQuery)
            ->where('views', '>', 100)
            ->orderBy('views', 'desc')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        $latestPost = (clone $postQuery)->orderBy('id', 'desc')->take(12);

        $weeklyTopPosts = (clone $postQuery)
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->where('views', '>', 50)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        $lastWeek = now()->subDays(14)->toDateTimeString();
        $postCond = fn ($q) => $q->limit(3)->where('created_at', '>', $lastWeek);
        $categories = Category::whereHas('posts', $postCond)
            ->with(['posts' => function ($q) use ($lastWeek) {
                $q->select('id', 'title', 'slug', 'image');
                $q->where('created_at', '>', $lastWeek);
            }])
            ->when($request->filled('q'), fn ($q) => $q->where('name', 'like', "%{$request->q}%"))
            ->take(7)
            ->orderBy('name')
            ->get();

        $trendingNow = (clone $postQuery)->where('created_at', '>=', now()->subDays(7))
            ->where('views', '>', 50)
            ->take(3)
            ->get();

        return view('public.index', [
            'trendingPosts' => $trendingPosts,
            'trendingNow' => $trendingNow,
            'latestPost' => $latestPost,
            'weeklyTopPosts' => $weeklyTopPosts,
            'categories' => $categories,
        ]);
    }

    public function category(Request $request)
    {
        $categories = Category::whereHas('posts')
            ->with(['posts:id,title,slug,image'])
            ->when($request->filled('q'), fn ($q) => $q->where('name', 'like', "%{$request->q}%"))
            ->orderBy('name')
            ->paginate(7);

        return view('public.category', [
            'categories' => $categories,
        ]);
    }

    public function show($slug)
    {
        $post = Post::with('categories')
            ->where('slug', $slug)
            ->firstOrFail();

        // make the view soon:
        return view('public.detail', [
            'post' => $post,
        ]);
    }

    /**
     * Let's define what is "views" here:
     * "view" is when the post has been scrolled down at least 70% of total scrollHeight
     * there is now way to validate that here, thats should be done in the front-end
     */
    public function addViewToPost(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'hash' => 'required', // just a random unique code
        ]);

        // check if this post has already been viewed
        if (Cache::has($request->hash)) {
            return response()->json([
                'message' => 'success',
            ]);
        }

        $post = Post::select('id', 'views')->findOrFail($request->post_id);
        $post->views += 1;
        $post->save();

        Cache::remember($request->hash, 120, fn () => true);

        return response()->json([
            // 'post' => $post,
            'message' => 'success',
        ]);
    }
}
