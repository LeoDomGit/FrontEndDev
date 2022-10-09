<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Http\Request;
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
        
            if(Session::has('user')){
                return redirect('/users');
            }else{
                $google_user = Socialite::driver('google')->user();
                $google_id = $google_user->getId();
                $email = $google_user->getEmail();
                $image = $google_user->getAvatar();
                $name = $google_user->getName();
                echo $image;
                if(count(DB::Table('users')->where('email',$email)->get('idUser'))!=0){
                    DB::Table('users')->where('email',$google_user->getEmail())->update(['image'=>$google_user->getAvatar()]);
                    DB::Table('users')->where('email',$google_user->getEmail())->update(['google_id'=>$google_user->getId()]);
                    DB::Table('users')->where('email',$google_user->getEmail())->update(['email_verified_at'=>now()]);
                    Session::put('user',$email);
                    return redirect('/users');
                }else{
                    $fail='Email không tồn tại';
                    return redirect('/login',compact('fail'));
                }
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
