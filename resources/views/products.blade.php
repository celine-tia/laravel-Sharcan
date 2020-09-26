@extends('layout')

@section('main')
<div class="container" style="margin-top: 5%">
    <h1 class="text-center">Liste des produits</h1>
    @if ($userRole === 1)
        <a href="{{route('product.create')}}" class="btn btn-primary">Ajouter un produit</a>
    @endif
    <div class="row">
        @foreach ($products as $product)
            @include('layout.partials.all_product', ['product' => $product])
        @endforeach
    </div>
</div>
@endsection
