<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required',
                'image_side' => 'required',
            ],
            [
                'title.required' => 'Title Is Required',
                'description.required' => 'Description Is Required',
                'image.required' => 'Image Is Required',
                'image_side.required' => 'Image Side Is Required',
            ]
        );
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->image_side = $request->image_side;
        $product->status = "Active";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/assets/image/product/', $image_name);
            $product->image = $image_name;
        }
        $product->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->isMethod('post')){
            $product = Product::findOrFail($id);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->height = $request->height;
            $product->width = $request->width;
            $product->image_side = $request->image_side;
            if ($request->hasFile('image')) {
                $destination = public_path() . '/assets/image/product/' . $product->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/assets/image/product/', $image_name);
                $product->image = $image_name;
            }
            $product->save();
            return redirect()->route('products')->with('success', 'Product Updated Successfully');

        }
        else{
            $product = Product::findOrFail($id);
            return view('Product.edit', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }
    public function statuschange($id, $status)
    {
        $product = Product::find($id);
        $product->status = $status;
        $product->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            if (!is_null($product->image)) {
                $image_path = public_path() . '/assets/image/product/' . $product->image;
                unlink($image_path);
                $product->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            } else {
                $product->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            }
        }
    }
}
