<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class GoogleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
