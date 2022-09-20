<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brands::get();
        return view('Brands.index', compact('brands'));
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
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $brand = new Brands;
        $brand->name = $request->name;
        $brand->status = "Active";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/assets/image/brand/', $image_name);
            $brand->image = $image_name;
        }
        $brand->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $brand = Brands::findOrFail($id);
            $this->validate(
                $request,
                [
                    'name' => 'required',
                ],
                [
                    'name.required' => 'Please enter Brand Name',
                ]
            );

            $brand->name = $request->name;
            if ($request->hasFile('image')) {
                $destination = public_path() . '/assets/image/brand/' . $brand->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/assets/image/brand/', $image_name);
                $brand->image = $image_name;
            }
            $brand->update();
            return redirect()->route('brands');
        } else {
            $brand = Brands::find($id);
            return view('Brands.edit', compact('brand'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brands $brands)
    {
        //
    }
    public function statuschange($id, $status)
    {
        $brand = Brands::find($id);
        $brand->status = $status;
        $brand->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brands::find($id);
        if (!is_null($brand)) {
            if (!is_null($brand->image)) {
                $image_path = public_path() . '/assets/image/brand/' . $brand->image;
                unlink($image_path);
                $brand->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            } else {
                $brand->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            }
        }
    }
}
