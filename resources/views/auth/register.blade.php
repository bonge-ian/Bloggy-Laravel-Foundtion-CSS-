@extends('layouts.app')

@section('content')
<section class="grid-x grid-padding-x align-center ">
    <div class="small-10 medium-10 cell">
        <div class="card radius shadow">
            <div class="card-section">
                <div class="grid-x grid-padding-x align-center">
                    <div class="small-10 cell">
                        <h3 class="font-bold text-center">Register</h3>
                        <hr>
                        <form data-abide novalidate class="register-form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="name">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" aria-errormessage="nameError" aria-describedby="nameHelpText" required autofocus >
                                <span class="form-error" id="nameError">
                                    <strong>Name field is required.</strong>
                                </span>
                                @if ($errors->has('name'))
                                <span class="help-text" id="nameHelpText">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="email">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" aria-errormessage="emailError" aria-describedby="emailHelpText" pattern="email" required>
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
                                    <strong>Password is required and must be at least 8 characters</strong>
                                </span>
                                @if ($errors->has('password'))
                                <span class="help-text" id="passwordHelpText">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="password-confirm">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" name="password_confirmation" aria-errormessage="repassError" data-equalto="password" required>
                                <span class="form-error" id="repassError">
                                    <strong>Passwords must match</strong>
                                </span>
                            </div>
                            <div class="register_button">
                                <button type="submit" class="button">
                                {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</section>

@endsection
