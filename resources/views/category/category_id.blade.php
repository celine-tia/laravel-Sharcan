@extends('layout')

@section('main')
<div class="card border-dark bg-light text-center ml-5" style="margin-top: 8%;">
    <div class="row no-gutters">
      <div class="col-md-6">
        @if (!strpos($category->image, 'lorem'))
            <a href="#"><img class="card-img-top" src="/storage/picture/category/{{$category->image}}" alt=""></a>
        @else
            <a href="#"><img class="card-img-top" src="{{$category->image}}" alt=""></a>
        @endif
      </div>
      <div class="col-md-6">
        <div class="card-body align-middle">
            <h5 class="card-title">{{$category->name}}</h5>

            @if($userRole === 1)
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                {!! Form::model($category, array(
                    'route' => ['category.destroy', $category->id],
                    'method' => 'DELETE'
                    )) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endif

        </div>
      </div>
    </div>
</div>
@endsection
