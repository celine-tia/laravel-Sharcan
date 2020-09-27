<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    /**
     *
     */
    public function index(Request $request){

        $categories = Category::all();

        return view('home/home', compact('categories'));
    }
    // }


    public function showProduct(string $name, int $id){

        $category = Category::findOrFail($id);

        if(isset($_GET['filter']) && $_GET['filter'] === 'to_down'){
            $products = Product::where('category_id', $id)
                ->orderBy('price', 'desc')
                ->get();
        }
        else if(isset($_GET['filter']) && $_GET['filter'] === 'to_up'){
            $products = Product::where('category_id', $id)
                ->orderBy('price', 'asc')
                ->get();
        }
        else{
            $products = Product::where('category_id', $id)
                ->get();
        }

        return view('home/cat_prod', compact('products', 'category'));
    }


    public function cart()
    {
        $products = session()->get('cart');
        $totalPrice = 0;
        $totalQuantity = 0;

        if($products){
            foreach($products as $product)
            {
                $totalPrice = $totalPrice + $product['price'];
                $totalQuantity = $totalQuantity + $product['quantity'];
            }
        }
        return view('home/cart/cart', compact('products', 'totalPrice', 'totalQuantity'));

    }


    public function passCommand(){

    }
}
