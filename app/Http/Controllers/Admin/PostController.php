<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables()
                ->of(Post::query())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('post.edit', $row->id);
                    $btn = "<a href=\"{$editUrl}\" class=\"edit btn btn-primary btn-sm m-1\">Edit</a>";
                    $btn .= '<button onclick="handleDelete('.$row->id.')" class="btn btn-danger btn-sm m-1">Delete</button>';

                    return $btn;
                })
                ->addColumn('custom_image', function ($row) {
                    if ($row->image === null) {
                        return '';
                    }

                    return '<img src="'.asset($row->image).'" style="max-height: 120px" />';
                })
                ->rawColumns(['action', 'custom_image'])
                ->make(true);
        }

        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'category_ids' => 'required|array|min:1',
        ]);

        try {
            DB::beginTransaction();

            $post = new Post;
            $post->admin_id = $request->user()->id;
            $post->title = $request->title;
            $post->slug = Post::generateSlug($post->title);
            $post->content = $request->content;

            if ($request->hasFile('image')) {
                $post->image = Img::upload($request->file('image'), 'post-images');
            }

            $post->save();

            $post->categories()->sync($request->category_ids);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('post.index')->with('message', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        $post->category_ids = $post->categories->pluck('id');

        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'category_ids' => 'required|array|min:1',
        ]);

        try {
            DB::beginTransaction();

            if (! $post->admin_id) {
                $request->user()->id;
            }
            $post->title = $request->title;
            if ($post->getOriginal('title') !== $post->title) {
                $post->slug = Post::generateSlug($post->title);
            }
            $post->content = $request->content;
            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::disk('public')->delete($post->image);
                }

                $post->image = Img::upload($request->file('image'), 'post-images');
            }
            $post->save();

            $post->categories()->sync($request->category_ids);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('post.index')->with('message', 'Berita berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // the image should not be deleted, because it uses soft delete.
        // only delete the image when forceDelete() is called.
        $post->delete();

        return redirect()->route('post.index')->with('message', 'Berita berhasil dihapus');
    }
}
