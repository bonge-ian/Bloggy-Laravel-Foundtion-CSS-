@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    
    <section class="grid-x grid-padding-x align-center">
        <div class="small-12 medium-10 cell">
            <h2 class="text-center header separator-center">Create a Post</h2>
                <main class="card radius bordered">
                    <div class="card-section">
                        <div class="grid-x align-center">
                            <div class="small-10 cell">
                                <form enctype="multipart/form-data" data-abide novalidate  method="POST" action="{{ route('posts.store') }}">
                                @csrf
                                
                                <div class="title">
                                    <label class="font-bold" for="title">Post Title</label>
                                    <input class="radius" id="title" type="text" name="title" value="{{ old('title') }}" aria-errormessage="titleError" aria-describedby="titleHelpText" required autofocus>
                                    <span class="form-error" id="titleError">
                                        <strong>Post title is required.</strong>
                                    </span>
                                    @if ($errors->has('title'))
                                        <span class="help-text" id="titleHelpText">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="message">
                                    <label class="font-bold" for="message">Message/Post Body</label>
                                    <textarea id="message" name="message" aria-describedby="messHelpText" rows="3" class="radius" aria-errormessage="messError" required>{{ old('message') }}</textarea>
                                    <span class="form-error" id="messError">
                                        <strong>Message/Post body is required</strong>
                                    </span>
                                    @if ($errors->has('message'))
                                    <span class="help-text" id="messHelpText">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="image">
                                    <label class="font-bold" for="image">Upload Image</label>
                                    <input class="radius" id="image" name="image" type="file" value="{{ old('image') }}" aria-describedby="imgHelpText">
                                    
                                    @if ($errors->has('image'))
                                        <span class="help-text" id="imgHelpText">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>                  
                                <button type="submit" class="button radius">Create Post</button>
        
                            </form>
                            </div>
                        </div>
                    </div>
                </main>   
        </div>
    </section>
   
@endsection
