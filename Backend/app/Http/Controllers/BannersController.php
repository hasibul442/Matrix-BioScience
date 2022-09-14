<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Banner.Banner', ['banners' => Banners::get()]);
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
            'image' => 'required',
        ]);
        $banner = new Banners();
        $banner->title = $request->title;
        $banner->status = "Active";

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/assets/image/banner/',$image_name);
            $banner->image = $image_name;
        }
        $banner->save();
        return response()->json(['success'=>'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banners::find($id);
        return response()->json($banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $banner = Banners::find($request->id);
        $banner->title = $request->title1;
        if($request->hasFile('imagee')){
            $destination = public_path().'/assets/image/banner/'.$banner->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('imagee');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/assets/image/banner/',$image_name);
            $banner->image = $image_name;
        }
        $banner->save();
        // return response()->json($banner);
        return response()->json(['status'=>200,'message' => 'Banner Information Updated Successfully']);
    }
    public function statuschange($id,$status){
        $banner = Banners::find($id);
        $banner->status = $status;
        $banner->update();
        return response()->json(['success'=>'Status changed successfully.']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $banner = Banners::find($id);
        if (!is_null($banner)) {
            if(!is_null($banner->image)){
                $image_path = public_path().'/assets/image/banner/'.$banner->image;
                unlink($image_path);
                $banner->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
            else{
                $banner->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
        }
    }
}
