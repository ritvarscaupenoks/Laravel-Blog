<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('feed', ['posts' => $posts]);
    }

    public function showCreatePostForm()
    {
        return view('create-post');
    }

    public function createPost(Request $request)
    {
        $messages = [
            'title.required' => 'The title field is required.',
            'body.required' => 'The content field is required.',
        ];

        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ], $messages);

        $fields['title'] = strip_tags($fields['title']);
        $fields['body'] = strip_tags($fields['body']);
        $fields['user_id'] = auth()->id();
        $post = Post::create($fields);

        return redirect('/feed');
    }

    public function showMyPosts(Request $request)
    {
        $posts = Post::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('my-posts', ['posts' => $posts]);
    }

    public function deletePost(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect('/feed');
        }
        $post->delete();
        return redirect('/my-posts');
    }

    public function editPost(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect('/feed');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect('/feed');
        }

        $messages = [
            'title.required' => 'The title field is required.',
            'body.required' => 'The content field is required.',
        ];

        $fields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ], $messages);

        $post->title = strip_tags($fields['title']);
        $post->body = strip_tags($fields['body']);
        $post->save();

        return redirect('/my-posts');
    }
}
