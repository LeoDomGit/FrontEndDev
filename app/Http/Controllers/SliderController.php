<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function allSlider(){
        $slider = Http::get('http://localhost:3000/api/allSlider');
        $allSlider =  json_decode($slider);
        return view('slider.index', compact('allSlider'));
    }
}