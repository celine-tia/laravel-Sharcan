<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     *
     */
    public function index(){

        $categories = Category::all();
        return view('home/home', compact('categories'));
    }


    public function showProduct(string $name, int $id){

        $products = Product::where('category_id', $id)
            ->get();
        return view('home/cat_prod', compact('products', 'name'));
    }
}
