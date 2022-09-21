<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        return view('product.all');
    }


    public function create()
    {
        return view('product.add');
    }


    public function store(Request $request)
    {
        
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
       
    }

  
    public function update(Request $request, $id)
    {
        
    }

  
    public function destroy($id)
    {
     
    }
}
