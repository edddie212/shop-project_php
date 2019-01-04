<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;

class UserController extends MainController{

function __construct(){

  parent::__construct();
  $this->middleware('signguard', ['except' => ['logout']]);
}

public function getSignin() {

   self::$data['title'] = 'Signin Page';
   return view('forms.signin', self::$data);

 }

 public function postSignin(SigninRequest $request){
$rd = !empty($request['rd']) ? $request['rd'] : '';
if(User::validateUser($request['email'], $request['password']) ){
  return redirect($rd);
}else {
     self::$data['title'] = 'Signin Page';
     return view('forms.signin', self::$data)->withErrors('Wrong email or password');
  }
 }

public function getSignup(){

self::$data['title'] = 'Signup Page';
self::$data['err_top'] = false;
return view('forms.signup', self::$data);
}

public function postSignup(SignupRequest $request){
User::save_new($request);
return redirect('');
}

public function logout(){
  Session::flush();
return redirect('user/signin');


 }

}
