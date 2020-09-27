

<div class="col-lg-4 col-md-6 mt-4">
    <div class="card h-100">
        @if (!strpos($product->image, 'lorem'))
            <a href="{{ route('product.show', $product->id) }}"><img class="card-img-top" src="/storage/picture/product/{{$product->image}}" alt=""></a>
        @else
            <a href="{{ route('product.show', $product->id) }}"><img class="card-img-top" src="{{$product->image}}" alt=""></a>
        @endif
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('product.show', $product->id) }}">{{$product->name}}</a>
            </h4>
            <h5>{{$product->price}}€</h5>
            <p class="card-text">{{$product->description}}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>
