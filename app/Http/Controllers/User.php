<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class User extends Controller
{
    public function settings()
    {
      return view('hr.settings')->with('a',['','','','','','']);
    }

    public function update(Request $request)
    {
      $request_data = $request->All();
      $current_password = Auth::User()->password;
      if(Hash::check($request_data['curr'], $current_password))
      {
        if($request_data['new'] != $request_data['rnew']){
          $err = 'Password and re-type Password are different';
          return view('hr.settings')->with('a',['','','','','',''])->with('err',$err);
        }
        Auth::User()->fill([
          'password' => Hash::make($request->new)
        ])->save();
        $succ = 'Password Updated Successfully';
        return view('hr.settings')->with('a',['','','','','',''])->with('succ',$succ);
      }
      else
      {
        $err = 'Please Enter Correct Current Password';
        return view('hr.settings')->with('a',['','','','','',''])->with('err',$err);
      }
    }
}
