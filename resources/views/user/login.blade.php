@extends('layout')

@section('main')
<div class="container-fluid w-75 bg-light" style="margin-top: 5%;">
    <div class="row">
        <div class="m-5 w-100">

            <h1 class="text-center">Login</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label value="">{{ __('Email') }}</label>
                    <input class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <label value="">{{ __('Password') }}</label>
                    <input class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox form-control" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="ml-4 btn btn-primary">
                        {{ __('Login') }}
                    </button><br>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a><br>
                    @endif

                    <a href="{{route('register')}}">Créer son compte</a><br>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
