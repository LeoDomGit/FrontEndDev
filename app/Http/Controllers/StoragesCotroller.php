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
        $allStorages = json_decode(Http::get('http://127.0.0.1:3000/api/allStorages'));
        return view('storages.index',compact('allStorages'));
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
    public function show(storagesM $storagesM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\storagesM  $storagesM
     * @return \Illuminate\Http\Response
     */
    public function edit(storagesM $storagesM)
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
    public function update(Request $request, storagesM $storagesM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\storagesM  $storagesM
     * @return \Illuminate\Http\Response
     */
    public function destroy(storagesM $storagesM)
    {
        //
    }
}
