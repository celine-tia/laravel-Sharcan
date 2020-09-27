@extends('layout');

@section('main')

<div class="container" style="margin-top: 5%">
    <div class="row">
        @if ($products)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id Produit</th>
                        <th scope="col">Image</th>
                        <th scope="col">Produits</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($products as $key => $product)
                            @include('home.cart.layouts.cart_product')
                        @endforeach


                </tbody>

                <tfoot>
                    <tr class="bg-danger">
                        <td class="font-weight-bold">Total</td>
                        <td class="font-weight-bold">Prix: {!! $totalPrice !!}€</td>
                        <td class="font-weight-bold">Quantité: {!! $totalQuantity !!}</td>
                    </tr>
                </tfoot>
            </table>
            <a href="{{route('command', ['price' => $totalPrice, 'quantity' => $totalQuantity])}}" class="btn btn-success text-center">Passer la commande</a>
        @else
            <p class="text-center">Vous n'avez aucun article dans votre panier !</p><br>
            <a href="{{route('product.index')}}" class="btn btn-primary text-center">Voir la liste des produits</a>
        @endif
    </div>
</div>
@endsection
