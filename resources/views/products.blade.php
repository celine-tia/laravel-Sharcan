@extends('layout')

@section('main')
<div class="container" style="margin-top: 5%">
    <div class="row">
        @foreach ($products as $product)
            @include('layout.partials.all_product', ['product' => $product])
        @endforeach
    </div>
</div>
@endsection
