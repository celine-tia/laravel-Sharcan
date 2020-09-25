
    <div class="card border-dark bg-light text-center ml-5" style="margin-top: 8%;">
        <div class="row no-gutters">
          <div class="col-md-6">
            <img src="{{$product->image}}" class="card-img" alt="...">
          </div>
          <div class="col-md-6">
            <div class="card-body align-middle">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
            <h5 class="card-text">{{$product->price}}€</h5>
                <h5 class="card-text">{{$product->stock}} produits disponibles</h5>

                @if ($userRole === 1)
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Modifier</a>
                    {!! Form::model($product, array(
                        'route' => ['product.destroy', $product->id],
                        'method' => 'DELETE'
                    )) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif

            </div>
          </div>
        </div>
    </div>

