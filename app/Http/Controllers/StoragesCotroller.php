<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StoragesCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = json_decode(Http::get('https://api.trungthanhweb.com/api/allProductStorage'));
        $allProducts2 = json_decode(Http::get('https://api.trungthanhweb.com/api/allProductStorage2'));
        $allProducts3 = json_decode(Http::get('https://api.trungthanhweb.com/api/allStorage'));
        // var_dump($allProducts3);
        return view('tonkho.index',compact('allProducts','allProducts2','allProducts3'));
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
     * @param  \App\storagesM  $storagesM
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\storagesM  $storagesM
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\storagesM  $storagesM
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\storagesM  $storagesM
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
