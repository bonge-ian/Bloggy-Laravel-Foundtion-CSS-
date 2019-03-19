@extends('layouts.app')
@section('content')
    <section class="grid-x grid-padding-x align-center align-middle">
        <div class="small-10 medium-10 cell">
            <div class="card radius shadow">
                <div class="card-section">
                    <div class="grid-x align-center">
                        <div class="small-10 cell">
                            <h3 class="text-center font-bold">Login</h3>
                            <hr>
                            <form data-abide novalidate class="login-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="email">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" aria-errormessage="emailError" aria-describedby="emailHelpText" required autofocus pattern="email">
                                    <span class="form-error" id="emailError">
                                        <strong>Email is required and must be a valid email</strong>
                                    </span>
                                    @if ($errors->has('email'))
                                    <span class="help-text" id="emailHelpText">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="password">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" name="password" aria-describedby="passwordHelpText" aria-errormessage="passError" required>
                                    <span class="form-error" id="passError">
                                        <strong>Password is required</strong>
                                    </span>
                                    @if ($errors->has('password'))
                                    <span class="help-text" id="passwordHelpText">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="button-plus-link">
                                    <button type="submit" class="button">
                                    {{ __('Login') }}
                                    </button>
                                    <a href="{{ route('password.request') }}">
                                        &nbsp;
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </section>
@endsection
