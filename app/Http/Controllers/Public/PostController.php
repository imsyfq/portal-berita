<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $postQuery = Post::select('id', 'title', 'slug', 'image', 'created_at', 'views')
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
            ->with(['posts' => $postCond])
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
}
