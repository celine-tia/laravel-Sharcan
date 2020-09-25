@extends('layout')

@section('main')
    <div class="container">
        <div class="row">
            @include('layout.partials.product', ['userRole' => $userRole])
        </div>
    </div>
@endsection
