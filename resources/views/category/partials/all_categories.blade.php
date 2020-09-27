<div class="col-lg-4 col-md-6 mt-4">
    <div class="card h-100">
        @if (!strpos($category->image, 'lorem'))
            <a href="{{ route('category.show', $category->id) }}"><img class="card-img-top" src="/storage/picture/category/{{$category->image}}" alt=""></a>
        @else
            <a href="{{ route('category.show', $category->id) }}"><img class="card-img-top" src="{{$category->image}}" alt=""></a>
        @endif
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('category.show', $category->id) }}">{{$category->name}}</a>
            </h5>
        </div>
    </div>
</div>
