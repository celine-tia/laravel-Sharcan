@extends('layout')



@section('main')

    <div class="container" style="margin-top: 5%">
        <h1 class="text-center">Liste des catégories</h1>
        <div class="row">
            @foreach ($categories as $category)
                @include('home.layouts.category', ['category' => $category])
            @endforeach
        </div>
    </div>

@endsection


