@extends('layout')

@section('main')

<div class="container-fluid w-75 bg-light" style="margin-top: 5%;">
    <div class="row">
        <div class="m-5 w-100">

            <h1 class="text-center">Création d'une categorie</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(array('route' => ['category.update', $category->id], 'method' => 'PUT', 'files' => true)) !!}


            <div class="form-group">
                {!! Form::text('name', $category->name, [
                'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::file('image')!!}
            </div>

            {!! Form::submit('Enregistrer', [
                'class' => 'btn btn-primary'
            ]) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection
