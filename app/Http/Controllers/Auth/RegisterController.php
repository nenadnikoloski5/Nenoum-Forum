<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/';

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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public static function defaultPic(){
        $pic = rand(1,16);
        $profilePic = "";

        if($pic == 1){
            $profilePic = "head_alizarin.png";
        } else if($pic == 2){
            $profilePic = "head_amethyst.png";
        }else if($pic == 3){
            $profilePic = "head_belize_hole.png";
        }else if($pic == 4){
            $profilePic = "head_carrot.png";
        }else if($pic == 5){
            $profilePic = "head_deep_blue.png";
        }else if($pic == 6){
            $profilePic = "head_emerald.png";
        }else if($pic == 7){
            $profilePic = "head_green_sea.png";
        }else if($pic == 8){
            $profilePic = "head_nephritis.png";
        }else if($pic == 9){
            $profilePic = "head_pete_river.png";
        }else if($pic == 10){
            $profilePic = "head_pomegranate.png";
        }else if($pic == 11){
            $profilePic = "head_pumpkin.png";
        }else if($pic == 12){
            $profilePic = "head_red.png";
        }else if($pic == 13){
            $profilePic = "head_sun_flower.png";
        }else if($pic == 14){
            $profilePic = "head_turqoise.png";
        }else if($pic == 15){
            $profilePic = "head_wet_asphalt.png";
        }else if($pic == 16){
            $profilePic = "head_wisteria.png";
        }

        return $profilePic;

    }
   
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profilePic' => self::defaultPic()
        ]);
    }
}
