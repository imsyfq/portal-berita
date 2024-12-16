<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|numeric',
            'comment' => 'required',
        ]);

        $post = Post::find($request->post_id);
        if (! $post) {
            return redirect()->back()->with('message', 'Berita tidak ditemukan');
        }

        $user = $request->user();
        if (! $user) {
            abort(401, 'Login dong bang :(');
        }

        $c = new Comment;
        $c->user_id = $user->id;
        $c->comment = $request->comment;
        $c->post_id = $request->post_id;
        $c->save();

        return redirect()->back()
            ->with('success', 'Berhasil berkomentar :v'); // find a better writing for this message
    }

    public function destroy($id, Request $request)
    {
        $user = $request->user();
        $c = Comment::where('user_id', $user->id)->findOrFail($id);
        $c->delete();

        return redirect()->back()
            ->with('success', 'Komentar berhasil dihapus');
    }
}
