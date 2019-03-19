<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show all posts
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // get all posts 
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
        
        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Show an individual blog post
     * @param  Post   $post -individual post clicked by user
     * @return \Illuminate\Http\Response - return to show blog post page
     */
    public function show(Post $post) {
        return view('blog.show')->with('post', $post);
    }

    /**
     * Display create post form
     * @return \Illuminate\Http\Response - return to create post page
     */
    public function create() {
        return view('blog.create');
    }

    /**
     * Store a user's post.
     * @return \Illuminate\Http\Response - return to index
     */
    public function store() {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'message' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        $user_id = ['user_id'=> Auth::id()];
        $validated += $user_id; // add to array.

        if (request()->hasFile('image')) {
            $img = request()->image;
            $imgFileName = $img->getClientOriginalName();
            $ext = $img->getClientOriginalExtension();

            $filename = $imgFileName . '_' . time() . '.' . $ext;

            // store the image
            $img->storeAs('uploads', $filename);

            // update image value in array
            $validated['image'] = $filename;
        } else {
            $images = ['noimage.jpg', 'noimage1.jpg', 'noimage2.jpg', 'noimage3.jpg','noimage4.jpg'];

            $validated['image'] = $images[array_rand($images)];
        }
        
        //dd($validated);
        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
    /**
     * Show the edit page
     * @param  Post   $post -individual post to be edited by a user
     * @return  \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('blog.edit')->with('post', $post);
    }

    /**
     * Update a blog post.
     * @param  Post   $post -individual post to be updated by a user
     * @return  \Illuminate\Http\Response
     */
    public function update(Post $post) {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'message' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        $user_id = ['user_id'=> Auth::id()];
        $validated += $user_id; // add to array.

        if (request()->hasFile('image')) {
            $img = request()->image;
            $imgFileName = $img->getClientOriginalName();
            $ext = $img->getClientOriginalExtension();

            $filename = $imgFileName . '_' . time() . '.' . $ext;

            // store the image
            $img->storeAs('uploads', $filename);

            // update image value in array
            $validated['image'] = $filename;
        } else {
            $validated['image'] = $post->image;
        }
        
        $post->update($validated); // update post

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    /**
     * Deletes a particular post
     * @return  \Illuminate\Http\Response - return to index
     */
    public function destroy(Post $post) {
        // delete post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post Successfully deleted');
    }
}
