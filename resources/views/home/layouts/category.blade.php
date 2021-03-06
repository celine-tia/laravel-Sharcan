<div class="col-lg-4 col-md-6 my-3">
    <div class="card h-100 text-center">
        @if (!strpos($category->image, 'lorem'))
            <a href="{{ route('category.show', $category->id) }}"><img class="card-img-top" src="/storage/picture/category/{{$category->image}}" alt=""></a>
        @else
            <a href="{{ route('category.show', $category->id) }}"><img class="card-img-top" src="{{$category->image}}" alt=""></a>
        @endif
        {{-- <a href="#"><img class="card-img-top" src="/storage/picture/category/{{$category->image}}" alt=""></a> --}}
        <div class="card-body bg-light">
            <h5 class="card-title">
                <a href="{{ route('category.show', $category->id) }}">{{$category->name}}</a>
            </h5>
            <a href="{{route('showProduct', ["name" => $category->name, "id" => $category->id])}}" class="btn btn-primary">Voir la liste des produits</a>
        </div>
    </div>
</div>
