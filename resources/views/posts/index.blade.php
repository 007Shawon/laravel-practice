@extends('layouts.app')

@section('title', 'Blog Post')

@section('content')

    @forelse($posts as $key => $post)
        @include('posts.partials.post')
    @empty
    <h1>No Posts Found! So Sad</h1>
    @endforelse ($posts as $key=>$post ) 
        
@endsection