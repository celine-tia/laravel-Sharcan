@extends('layout')

@section('main')
<div class="container-fluid w-75 bg-light" style="margin-top: 5%;">
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

            {!! Form::open(array('url' => '/product', 'method' => 'POST', 'files' => true)) !!}


            <div class="form-group">
                {!! Form::text('name', 'Name', [
                'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::file('image')!!}
            </div>
            <div class="form-group">
                {!! Form::textarea('description', 'Description', [
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
                    {!! Form::number('stock', '0', [
                    'class' => 'form-control'
                    ]) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::number('price', '0', [
                    'class' => 'form-control'
                    ]) !!}
                </div>
            </div>

            {!! Form::submit('Enregistrer', [
                'class' => 'btn btn-primary'
            ]) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
