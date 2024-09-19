<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('posts.index',['posts' => BlogPost::orderBy('created_at','desc')->take(4)->get()]);
        return view('posts.index',['posts' => BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $post = BlogPost::create($validated);

        $request->session()->flash('status','The post is successfully created!');

        return redirect()->route('posts.show', ['post' => $post->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //abort_if(!isset($this->posts[$id]), 404);
        return view('posts.show',['post' =>BlogPost::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {


        return view('posts.edit', ['post'=>  BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status','Blog post is updated!');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $post = BlogPost::findorFail($id);
       $post->delete();

       session()->flash('status','Blog post is deleted!');
       return redirect()->route('posts.index');
    }
}
