<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if(Auth::check()){
            $user = Auth::user()->toArray();
            $userRole = $user['role'];
        }
        else {
            $userRole = 0;
        }

        return view('category/categories', compact('categories', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create_category');
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
            'name' => 'min:1|required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $category = new Category();
        $input = $request->input();
        $path = $request->file('image')->store('public/picture/category');
        $input['image'] = str_replace('public/picture/category/', '', $path);
        $category->fill($input)
        ->save();

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        if(Auth::check()){
            $user = Auth::user()->toArray();
            $userRole = $user['role'];
        }
        else {
            $userRole = 0;
        }

        return view('category/category_id', compact('category', 'userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category/category_update', compact('category'));
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
            'name' => 'min:0|required',
        ]);

        $category = Category::findOrFail($id);
        $input = $request->input();

        if($request->file('image')){
            if(Storage::exists('public/picture/category/'.$category->image)){
                Storage::delete('public/picture/category/'.$category->image);
            }

            $path = $request->file('image')->store('public/picture/category');
            $input['image'] = str_replace('public/picture/category/', '', $path);

        }

        $category->fill($input)->save();

        return redirect()->route('category.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
