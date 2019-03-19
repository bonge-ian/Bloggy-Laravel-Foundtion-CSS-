@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
    
    <section class="grid-x grid-padding-x align-center">
        <div class="small-12 medium-10 cell">
            <h2 class="header">Blog Posts</h2>
            @if ($posts->count())
                @foreach($posts as $post)
                <main class="card radius bordered">
                    <div class="card-section">
                        <div class="grid-x grid-padding-x">
                            <div class="small-12 medium-2 cell">
                                <img style="max-width: 100%" src="{{ asset('storage/uploads/' . $post->image) }}" alt="Post image">
                            </div>
                            <div class="small-12 medium-10 cell">
                                <h4><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                        <div>{{ substr($post->message, 0, 25) }}... <a href="{{ route('posts.show', $post->id) }}">View More</a></div>

                        <small class="subheader">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        
                    </div>
                </main>
                @endforeach
            {{ $posts->links() }}
            @else 
                <div class="callout alert radius shadow">
                    Sorry, we could not find any posts.
                </div>
            @endif
        </div>
    </section>
   
@endsection
