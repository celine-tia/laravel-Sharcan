@extends('layout')

@section('main')
<div class="container" style="margin-top: 5%">
    <a href="{{route('product.create')}}" class="btn btn-primary">Ajouter un produit</a>
    <div class="row">
        @foreach ($products as $product)
            @include('layout.partials.all_product', ['product' => $product])
        @endforeach
    </div>
</div>
@endsection
