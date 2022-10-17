<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            
            $google_user = Socialite::driver('google')->stateless()->user();
            $google_id = $google_user->getId();
            $email = $google_user->getEmail();
            $image = $google_user->getAvatar();
            $name = $google_user->getName();
            $check = Http::post('https://api.trungthanhweb.com/api/checkEmail',[
                'email'=>$email,
                'google_id'=>$google_id,
                'image'=>$image,
                'name'=>$name,
            ]);
            if(json_decode($check)==true){
                Session::put('name',$name);
                Session::put('image',$image);
                return redirect('/prodManager');
            }else{
                return redirect('/login');
            }

        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
