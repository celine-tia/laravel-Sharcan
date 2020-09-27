<div class="col-lg-3 col-md-6 mt-4">
    <div class="card h-100">
        @if (!strpos($otherProduct->image, 'lorem'))
            <a href="{{ route('product.show', $otherProduct->id) }}"><img class="card-img-top" src="/storage/picture/product/{{$otherProduct->image}}" alt=""></a>
        @else
            <a href="{{ route('product.show', $otherProduct->id) }}"><img class="card-img-top" src="{{$otherProduct->image}}" alt=""></a>
        @endif
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('product.show', $otherProduct->id) }}">{{$otherProduct->name}}</a>
            </h4>
            <h5>{{$otherProduct->price}}€</h5>
            <p class="card-text">{{$otherProduct->description}}</p>
        </div>
    </div>
</div>
