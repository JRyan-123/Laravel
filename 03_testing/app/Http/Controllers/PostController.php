<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('admin.admin_posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content'  => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view('admin.admin_view_user', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return back()->with('success', 'not your post');
        }

        return view('admin.admin_post_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return back()->with('success', 'not possible');
        }

        $request->validate([
            'title' => 'required|max:255',
            'content'  => 'required',
        ]);

        $post->update($request->all());


        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
         if (Auth::id() !== $post->user_id) {
            return back()->with('success', 'not possible');
        }

        $post->delete();

        return back()->with('success', 'Post deleted');
    }
}
