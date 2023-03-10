@extends('layouts.app')

@section('content')
    <div
        style="background: url('/img/friends.jpg') 50% 70% no-repeat;background-size: cover;  height: calc(100vh - 56px);position: relative">

        <div class="box"
             style="position: absolute; width: 450px;  top: 50%;left: 50%; -ms-transform: translateY(-50%)  translateX(-50%); transform: translateY(-50%) translateX(-50%);">
            <div class="is-flex mb-3 is-justify-content-center">
                <img src="{{ asset("logo-blue.png") }}" style="height: 32px"/>
            </div>
            <p>Welcome to Friendface, your life is about to get much better. Sign up below to get started.</p>

            <!--
                Task 2 Guest, step 5:
                add the HTTP method and url as instructed
            -->
            <form method="POST" action="/register" class="mt-3">
            @csrf
                <!--
                    Task 2 Guest, step 3:
                    add register fields as instructed

                    Tip:
                    we add the element name for you as an inspiration on how you can add the rest of the inputs
                -->
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input name" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @enderror
                    <label for="email" class="label">Email</label>
                    <div class="control">
                        <input type="email" name="email" class="email" id="email" value="{{ old('email') }}">
                    </div>
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input type="password" name="password" class="password" id="password" value="{{ old('password') }}">
                    </div>

                    <label for="password-confirmation" class="label">password confirmation</label>
                    <div class="control">
                        <input type="password" name="password-confirmation" class="password-confirmation" id="password-confirmation" value="{{ old('password-confirmation') }}">
                    </div>

                </div>
                <!-- end of Tip -->

                <div class="field">
                    <!--
                        Task 2 Guest, step 4:
                        add submit button
                        Tip:
                        you can use the class "button is-primary is-fullwidth" for the appearance of the button
                    -->
                    <button type="submit" class="register-submit login-submit button is-primary is-fullwidth">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
