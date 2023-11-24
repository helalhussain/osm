<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\Color;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Product::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.form',compact('categories','subcategories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'artwork_guide'=>'required|numeric',
            'epoxy'=>'required|numeric',
            'weight'=>'required|numeric',
            'height'=>'required|numeric',
            'width'=>'required|numeric',
            'length'=>'required|numeric',
            'images'=>'required'
            // 'images'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $store = new Product;
        $store->title = $request->title;
        $store->slug = generate_slug($request->title);
        $store->short_description = $request->short_description;
        $store->description = $request->description;
        $store->artwork_guide = $request->artwork_guide;
        $store->epoxy = $request->epoxy;
        $store->weight =$request->weight;
        $store->height =$request->height;
        $store->width = $request->width;
        $store->length = $request->length;

        $images = [];
        foreach($request->images as $file){
            $images[] = file_upload($file, 'product');
        }

        $store->images = $images;
        $store->save();
        $store->categories()->sync($request->category);
        $store->sizes()->sync($request->size);
        $store->colors()->sync($request->color);

        return response()->json([
            'message'=>'Product added succss'
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message'=>'Product deleted success'
        ]);
    }

}
