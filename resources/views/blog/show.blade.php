@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    
    <section class="grid-x grid-padding-x align-center">
        <div class="small-12 medium-10 cell">
             <a href="{{ route('posts.index') }}" class="button radius">Go Back</a>
                <main class="card radius bordered">
                    <div class="card-divider">
                        <h3 class="text-uppercase header  align-center">{{ $post->title }}</h3>
                    </div>
                    <div class="card-section">
                        <div class="grid-x grid-padding-x">
                            <div class="small-12 medium-4 cell">
                                <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="" class="show-image">
                            </div>
                            <div class="medium-8 small-12 cell">
                                <p>{{ $post->message }}</p>
                                <small class="subheader"><em>Posted by <span class="font-bold">{{ $post->user->name }}</span> {{ $post->created_at->diffForHumans() }}</em></small>
                                
                                @if (Auth::id() === $post->user_id)
                                    <hr>
                                    <a href="{{ route('posts.edit', $post->id)  }}" class="float-left button radius secondary">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="float-right button radius alert">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </main>   
        </div>
    </section>
   
@endsection
