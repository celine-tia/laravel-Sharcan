@extends('layout')

@section('main')
<div class="container-fluid w-75 bg-light" style="margin-top: 5%;">
    <div class="row">
        <div class="m-5 w-100">

            <h1 class="text-center">Register</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label value="">{{ __('Name') }}</label>
                    <input class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <label value="">{{ __('Email') }}</label>
                    <input class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <label value="">{{ __('Password') }}</label>
                    <input class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <label value="">{{ __('Confirm Password') }}</label>
                    <input class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="ml-4 btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
