<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacation;
class VacationsController extends Controller
{
  public function store(Request $req)
  {
    if(isset($req->all()['is_paid'])){
      Vacation::create([
        'is_paid'=>1,
        'employee_id'=>$req->all()['employee_id'],
        'type'=>$req->all()['type'],
      ]);
    }else{
      Vacation::create([
        'is_paid'=>0,
        'employee_id'=>$req->all()['employee_id'],
        'type'=>$req->all()['type'],
      ]);
    }
    return redirect()->back();
  }

  public function storeupdate(Request $req,$id)
  {
    if(isset($req->all()['is_paid'])){
      Vacation::find($id)->update([
        'is_paid'=>1,
        'employee_id'=>$req->all()['employee_id'],
        'type'=>$req->all()['type'],
      ]);
    }else{
      Vacation::find($id)->update([
        'is_paid'=>0,
        'employee_id'=>$req->all()['employee_id'],
        'type'=>$req->all()['type'],
      ]);
    }
    return redirect()->back();
  }
  public function delete($id)
  {
    Vacation::destroy($id);
    return redirect()->back();
  }
}
