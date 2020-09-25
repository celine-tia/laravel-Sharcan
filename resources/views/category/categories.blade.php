@extends('layout')

@section('main')
<div class="container" style="margin-top: 5%">
    <a href="{{route('category.create')}}" class="btn btn-primary">Ajouter une category</a>
    <div class="row">
        @foreach ($categories as $category)
            @include('category.partials.all_categories', ['category' => $category])
        @endforeach
    </div>
</div>
@endsection
