<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'contents' => 'required'
        ]);

        // Post::create([
        //     'title' => $validated['title'],
        //     'contents' => $validated['contents'],
        //     'user_id' => auth()->user()->id
        // ]);

        $user = auth()->user();

        $user->posts()->create($validated);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('edit',[
                'post'=> $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'contents' => 'required'
        ]);

        $user->posts()->create($validated);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        abort_if($post->author->id !== auth()->user()->id, 401);

        $post->delete();

        return redirect('/posts');
    }
}
