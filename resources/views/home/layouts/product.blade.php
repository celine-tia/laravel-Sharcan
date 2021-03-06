<div class="col-lg-4 col-md-6 my-3">
    <div class="card h-100 text-center">
        @if (!strpos($product->image, 'lorem'))
            <a href="{{ route('product.show', $product->id) }}"><img class="card-img-top" src="/storage/picture/product/{{$product->image}}" alt=""></a>
        @else
            <a href="{{ route('product.show', $product->id) }}"><img class="card-img-top" src="{{$product->image}}" alt=""></a>
        @endif
        <div class="card-body bg-light">
            <h5 class="card-title">
                <a href="{{ route('product.show', $product->id) }}">{{$product->name}}</a>
                <h5>{{$product->price}}€</h5>
                <p class="card-text">{{$product->description}}</p>
            </h5>
        </div>
    </div>
</div>
