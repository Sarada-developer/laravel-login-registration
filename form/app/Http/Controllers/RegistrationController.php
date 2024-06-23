<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Registration;

class RegistrationController extends Controller
{
   public function index(Request $request){
    if($request->session()->has('LOGIN')){     
    }
     else{
         return view('login');
     }
     $user = Registration::all();
       return view('dashboard', compact('user'));
   }
   public function register(){

       $data['state'] = DB::table('states')->
       orderBy('state','asc')->get();
       return view('registration',$data);
   }
   public function login()
   {
       return view('login');
   }
   public function insert(Request $request){
       $user= new Registration();
       $user->name=$request->name;
       $user->surname=$request->surname;
       $user->email=$request->email;
       $user->phone=$request->phone;
       $user->state=$request->state;
       $user->city=$request->city;
       $user->address=$request->address;
       $user->pin=$request->pin;
       $user->password=$request->password;
       $user->con_password=$request->con_password;
       
       $user->save();
       return view('login');
   }
   public function getCity(Request $request){
    $sid= $request->post('sid');
    $city = DB::table('cities')->where('state',$sid)->
    orderBy('city','asc')->get();
    $html='<option value="">---Select City---</option>';
    foreach($city as $list){
        $html.='<option value="'.$list->id.'">'.$list->city.'</option>';   
    }
    echo $html;
   }
   public function auth(Request $request){
      $email=$request->post('email');
      $password=$request->post('password');
      $result=Registration::where(['email'=>$email])->first();
      if($result){
          if($result->password){
              $request->session()->put('LOGIN',true);
              $request->session()->put('ID',$result->id);
              return redirect('dashboard');
          }
          else{
              $request->session()->flash('error','Please enter valid password');
              return redirect('/');
          }
      }
      else{
          $request->session()->flash('error','Please enter valid login details');
          return redirect('/');
      }
   }
   public function dashboard(){
    $id = Auth::id();
        $user = Registration::all();
       return view('dashboard', compact('user'));
   }
}
