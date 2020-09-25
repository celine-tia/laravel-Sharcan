@extends('layout')

@section('main')
<div class="container-fluid w-75 bg-light" >
    <div class="row">
        <div class="m-5 w-100">

            <h1 class="text-center">Création d'un produit</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(array('route' => ['product.update', $product->id], 'method' => 'PUT', )) !!}


            <div class="form-group">
                {!! Form::text('name', $product->name, [
                'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::file('image')!!}
            </div>
            <div class="form-group">
                {!! Form::textarea('description', $product->description, [
                    'class' => 'form-control'
                    ]) !!}
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    {!! Form::select('category_id', $category, [
                        'class' => 'form-control'
                        ]) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::number('stock', $product->stock, [
                    'class' => 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::number('price', $product->price, [
                    'class' => 'form-control'
                    ]) !!}
                </div>
            </div>

            {!! Form::submit('Modifier', [
                'class' => 'btn btn-success'
            ]) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
