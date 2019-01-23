<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserProfile;
use App\StudentClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'given_name' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50',
            'family_name' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50',
            'middle_name' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50',
            'ext_name' => 'nullable|regex:/(^[A-Za-z ]+$)+/|max:50',
            'id' => 'required|integer|unique:users,id',
            //'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|regex:/(^[A-Za-z ]+$)+/|min:1|confirmed',
            'gender' => 'required',
            //'class_code' => 'exists:classes,class_id|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $out = User::create([
            'id' => $data['id'],
            'permissions' => 2,
            'password' => bcrypt($data['password']),
        ]);

        $usr = User::select('id')->where('id', $data['id'])->first();
        
        UserProfile::create([
            'id' => $data['id'],
            'given_name' => $data['given_name'],
            'family_name' => $data['family_name'],
            'middle_name' => $data['middle_name'],
            'ext_name' => $data['ext_name'],
            'gender' => $data['gender'],
            'profile_pic' => 'no-profile.png'
        ]);

        return $out;
    }
}
