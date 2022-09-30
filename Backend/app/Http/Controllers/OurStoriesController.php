<?php

namespace App\Http\Controllers;

use App\Models\Ourstroies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurStoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourstroies = Ourstroies::orderBy('id','desc')->get();
        return view('Ourstories.index', compact('ourstroies'));
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
            'description' => 'required',
        ]);
        $ourstroies = new Ourstroies;
        $ourstroies->description = $request->description;
        $ourstroies->status = "Active";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/assets/image/ourstories/', $image_name);
            $ourstroies->image = $image_name;
        }
        $ourstroies->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ourstroies  $ourstroies
     * @return \Illuminate\Http\Response
     */
    public function show(Ourstroies $ourstroies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ourstroies  $ourstroies
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->ismethod('post')){
            $ourstroies = Ourstroies::find($id);
            $ourstroies->description = $request->description;
            if ($request->hasFile('image')) {
                $destination = public_path() . '/assets/image/ourstories/' . $ourstroies->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/assets/image/ourstories/', $image_name);
                $ourstroies->image = $image_name;
            }
            $ourstroies->save();
            return redirect()->route('ourstories')->with('success', 'Ourstories Updated Successfully');


        }
        else{
            $ourstroies = Ourstroies::find($id);
            return view('Ourstories.edit', compact('ourstroies'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ourstroies  $ourstroies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ourstroies $ourstroies)
    {
        //
    }
    public function statuschange($id, $status)
    {
        $ourstroies = Ourstroies::find($id);
        $ourstroies->status = $status;
        $ourstroies->update();
        return response()->json(['success' => 'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ourstroies  $ourstroies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ourstroies = Ourstroies::find($id);
        if(!is_null($ourstroies)){
            if(!is_null($ourstroies->image)){
                $image_path = public_path() . '/assets/image/ourstories/' . $ourstroies->image;
                unlink($image_path);
                $ourstroies->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            }else{
                $ourstroies->delete();
                return response()->json(['success' => 'Data Delete successfully.']);
            }
        }
    }
}
