<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpPosition;

class EmpposController extends Controller
{
    public function store(Request $req)
    {
      EmpPosition::create($req->all());
      return redirect()->back();
    }

    public function storeupdate(Request $req,$id)
    {
      EmpPosition::find($id)->update($req->except('_token'));
      return redirect()->back();
    }
    public function delete($id)
    {
      EmpPosition::destroy($id);
      return redirect()->back();
    }
}
