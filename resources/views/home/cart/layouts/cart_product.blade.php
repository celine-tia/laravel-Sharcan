<tr>
    <th scope="row">{!! $product['id'] !!}</th>
    <td><img src="{{$product['image']}}" alt="" width="70px"></td>
    <td>{!! $product['name'] !!}</td>
    <td>{!! $product['price'] !!}</td>
    <td>{!! $product['quantity'] !!}</td>
    <td><a href="{{route('removefromcart', $key)}}" class="btn btn-danger">Retirer produit</a></td>
</tr>
