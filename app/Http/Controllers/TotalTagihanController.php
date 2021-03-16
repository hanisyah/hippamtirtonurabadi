<?php

namespace App\Http\Controllers;

use App\TotalTagihan;
use Illuminate\Http\Request;

class TotalTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaltagihan = TotalTagihan::all();
        return view ('totaltagihan.index', compact('totaltagihan'));
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
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function show(TotalTagihan $totalTagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(TotalTagihan $totalTagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TotalTagihan $totalTagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TotalTagihan $totalTagihan)
    {
        //
    }
}
