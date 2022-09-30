<?php

namespace App\Http\Controllers;

use App\Models\BannerTests;
use Illuminate\Http\Request;

class BannerTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannertexts = BannerTests::orderBy('id','desc')->get();
        return view('BannerText.BannerText', compact('bannertexts'));
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
            'title' => 'required',
            'subtitle' => 'required',
        ]);
        $bannertexts = new BannerTests;
        $bannertexts->title = $request->title;
        $bannertexts->subtitle = $request->subtitle;
        $bannertexts->status = "Active";
        $bannertexts->save();
        return response()->json(['success' => 'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BannerTests  $bannerTests
     * @return \Illuminate\Http\Response
     */
    public function show(BannerTests $bannerTests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BannerTests  $bannerTests
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bannertexts = BannerTests::find($id);
        return response()->json($bannertexts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BannerTests  $bannerTests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bannertexts = BannerTests::find($request->id);
        $bannertexts->title = $request->title1;
        $bannertexts->subtitle = $request->subtitle1;
        $bannertexts->update();
        return response()->json($bannertexts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BannerTests  $bannerTests
     * @return \Illuminate\Http\Response
     */
    public function statuschange($id, $status)
    {
        $contact = BannerTests::find($id);
        $contact->status = $status;
        $contact->update();
        return response()->json(['success' => 'Status changed successfully.']);
    }
    public function destroy($id)
    {
        $bannertexts = BannerTests::find($id);
        $bannertexts->delete();
        return response()->json(['success' => 'Data is successfully deleted']);
    }
}
