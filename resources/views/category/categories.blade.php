@extends('layout')

@section('main')
<div class="container" style="margin-top: 5%">
    <h1 class="text-center">Liste des categories</h1>
    @if ($userRole === 1)
        <a href="{{route('category.create')}}" class="btn btn-primary">Ajouter une categorie</a>
    @endif
    <div class="row">
        @foreach ($categories as $category)
            @include('category.partials.all_categories', ['category' => $category])
        @endforeach
    </div>
</div>
@endsection
