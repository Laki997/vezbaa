<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

   


    public function getRegisterForm(){

        return view('auth.register');
        
    }

    public function register(CreateRegisterRequest $request){

        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        auth()->login($user);
        return redirect('/');

    }


    public function getLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $informacije = [
            'email' => $request->input('email'),
            'password'=> $request->input('password')
        ];

        if (auth()->attempt($informacije)){
            return redirect('/');
        }

        return view('auth.login',['pogresne_informacije'=>true]);

        //  return redirect()->intended('login');

    }

    public function logout(){

        auth()->logout();
        return back();
    }


}
