<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalaryChange;
class SalaryChangesController extends Controller
{
  public function store(Request $req)
  {
    SalaryChange::create($req->all());
    return redirect()->back();
  }

  public function storeupdate(Request $req,$id)
  {
    SalaryChange::find($id)->update($req->except('_token'));
    return redirect()->back();
  }
  public function delete($id)
  {
    SalaryChange::destroy($id);
    return redirect()->back();
  }
}
