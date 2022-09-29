<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{

    public function index()
    {   $brand = Http::get('http://127.0.0.1:3000/api/allBrand');
        $cate = Http::get('http://127.0.0.1:3000/api/allCate');
        $allBrand =  json_decode($brand);
        $allCategory = json_decode($cate);
        return view('product.all',compact('brand','cate'));
    }
    public function addprod()
    {
        return view('product.add');
    }
    public function editprod()
    {
        return view('product.edit');
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
