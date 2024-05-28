<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::with('user')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));

        $request->validate([
            'message' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192'
        ]);

        // dd($request);

        // Store the image file in public storage in /post-images
        $imagePath = null;
        if ($request->hasFile('image')) {

            $filename = Auth::id() . '-' . floor(microtime(true) * 1000) . '.' . $request->file('image')->getClientOriginalExtension();

            $imagePath = Storage::disk('public')->putFileAs('post-images', $request->file('image'), $filename);
        }

        // Store the post text and image file path in DB
        $request->user()->posts()->create([
            'message' => $request->message,
            'image_path' => $imagePath
        ]);

        // dd($imagePath);

        return redirect(route('posts.index'));
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
        Gate::authorize('update', $post);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        $post->update($request->validate([
            'message' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096'
        ]));

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //check for authorization -> delete image file -> delete post data -> redirect back/refresh

        if($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        Gate::authorize('delete', $post);
        $post->delete();

        return redirect(route('posts.index'));
    }
}