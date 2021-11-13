<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Auth;
use DB;
class RegisterController extends Controller

{



    use RegistersUsers;

   /* protected $redirectTo = '/home'; */

    protected $redirectTo = '/registration_form';



    public function __construct()

    {

        $this->middleware('guest');

    }



    protected function validator(array $data)

    {

        return Validator::make($data, [

            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

    }



    protected function create(array $data)
    {

       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'usertype' =>  'Admin',
            'remember_token' => 'x',
            'status' =>  'x',
            'password' => Hash::make($data['password']),

        ]);


    }

}

