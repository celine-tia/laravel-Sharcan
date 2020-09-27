
    <div class="card border-dark bg-light text-center ml-5 p-5" style="margin-top: 8%;">
        <div class="row no-gutters">
          <div class="col-md-6">
            @if (!strpos($product->image, 'lorem'))
                <img class="card-img-top" src="/storage/picture/product/{{$product->image}}" alt="">
            @else
                <img class="card-img-top" src="{{$product->image}}" alt="">
            @endif
          </div>
          <div class="col-md-6">
            <div class="card-body align-middle">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <h5 class="card-text">{{$product->price}}€</h5>
                <h5 class="card-text">{{$product->stock}} produits disponibles</h5>
                <h5 class="card-text">Categorie: {{$product->category_name}}</h5>

                @if ($userRole === 1)
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning my-2">Modifier</a>
                    {!! Form::model($product, array(
                        'route' => ['product.destroy', $product->id],
                        'method' => 'DELETE'
                    )) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Auth::check())

                    {!! Form::open(array('url' => route('addToCart', $product->id), 'method' => 'POST' )) !!}
                    {!! Form::label('quantity', 'Quantité', [
                        'class' => 'mt-5'
                    ]) !!}
                    {!! Form::number('quantity', 1, [
                        'class' => 'form-control',
                        'min' => 1,
                        'max' => $product->stock,
                    ]) !!}
                    {!! Form::submit('Ajouter au panier', [
                        'class' => 'btn btn-success'
                    ]) !!}

                    {!! Form::close() !!}
                    {{-- <a href="{{ route('addToCart', ["id" => $product->id, "quantity" => 'quantity']) }}" class="btn btn-success mt-3">Ajouter au panier</a> --}}

                @else

                    <p>Connecte-toi <a href="{{route('login')}}">ici</a> si tu veux ajouter un produit au panier</p>
                @endif
            </div>
          </div>
        </div>
    </div>

