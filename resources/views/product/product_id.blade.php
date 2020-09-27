@extends('layout')

@section('main')
    <div class="container">
        <div class="row">
            @include('product.layouts.product', ['userRole' => $userRole])
        </div>

        <h1 class="text-center"  style="margin-top: 5%">Autres produits en lien</h1>
        <div class="row">
            @foreach ($otherProducts as $otherProduct)
                @include('product.layouts.other_card_product', ['otherProduct' => $otherProduct])
            @endforeach
        </div>
    </div>
@endsection
