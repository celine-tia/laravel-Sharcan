@extends('layout')

@section('main')

    <div class="container" style="margin-top: 5%;">
        <h1 class="text-center">Liste des produits en fonction de {{$name}}</h1>
        <div class="row">
            @foreach ($products as $product)
                @include('home.layouts.product', ['product' => $product])
            @endforeach
        </div>
    </div>

@endsection
