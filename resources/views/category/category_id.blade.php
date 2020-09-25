@extends('layout')

@section('main')
<div class="card border-dark bg-light text-center ml-5" style="margin-top: 8%;">
    <div class="row no-gutters">
      <div class="col-md-6">
        <img src="/storage/picture/category/{{$category->image}}" class="card-img" alt="...">
      </div>
      <div class="col-md-6">
        <div class="card-body align-middle">
            <h5 class="card-title">{{$category->name}}</h5>

            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
            {!! Form::model($category, array(
                'route' => ['category.destroy', $category->id],
                'method' => 'DELETE'
            )) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

        </div>
      </div>
    </div>
</div>
@endsection
