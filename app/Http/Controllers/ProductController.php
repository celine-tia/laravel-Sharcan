<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        if(Auth::check()){
            $user = Auth::user()->toArray();
            $userRole = $user['role'];
        }
        else {
            $userRole = 0;
        }

        return view('product/products', compact('products', 'userRole'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->pluck('name', 'id');

        return view('product/create_product', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'min:6|required',
            'image' => 'required|mimes:jpeg,png,gif',
            'price' => 'required|integer|min:0',
            'description' => 'min:1|required',
            'stock' => 'required|integer|min:0'
        ]);

        $product = new Product();
        $input = $request->input();
        $path = $request->file('image')->store('public/picture/product');
        $input['image'] = str_replace('public/picture/product/', '', $path);

        $product->fill($input)
        ->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name', 'categories.id as category_id')
            ->where('products.id', $id)
            ->get()
        ->first();


        $otherProducts = DB::table('products')
            ->where('category_id', '=', $product->category_id)
            ->limit(4)
        ->get();



        if(Auth::check()){
            $user = Auth::user()->toArray();
            $userRole = $user['role'];
        }
        else {
            $userRole = 0;
        }

        return view('product/product_id', compact('product', 'userRole', 'otherProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->pluck('name', 'id');
        $product = Product::findOrFail($id);

        return view('product/update_product', compact('category', 'product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'min:6|required',
            'image' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'stock' => 'required|integer|min:0'
        ]);

        $product = Product::findOrFail($id);
        $input = $request->input();

        if($request->file('image')){
            if(Storage::exists('public/picture/product/'.$product->image)){
                Storage::delete('public/picture/product/'.$product->image);
            }

            $path = $request->file('image')->store('public/picture/product');
            $input['image'] = str_replace('public/picture/product/', '', $path);

        }

        $product->fill($input)->save();

        return redirect()->route('product.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }


    /**
     * Add Product to cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request, $id)
    {

        $request->validate([
            'quantity' => 'min:1|required',
        ]);

        $product = Product::findOrFail($id);

        $quantity = $request->get('quantity');

        session()->push('cart', [
            "id" => $product->id,
            "image" => $product->image,
            "name" => $product->name,
            "price" => $product->price,
            "quantity" => $quantity
        ]);

        return redirect()->route('product.index');
    }
}
