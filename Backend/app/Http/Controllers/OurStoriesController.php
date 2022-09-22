<?php

namespace App\Http\Controllers;

use App\Models\Ourstroies;
use Illuminate\Http\Request;

class OurStoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourstroies = Ourstroies::get();
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
        //
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
    public function edit(Ourstroies $ourstroies)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ourstroies  $ourstroies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ourstroies $ourstroies)
    {
        //
    }
}
