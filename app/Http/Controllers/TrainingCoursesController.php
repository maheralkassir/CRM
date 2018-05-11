<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingCourse;

class TrainingCoursesController extends Controller
{
  public function store(Request $req)
  {
    TrainingCourse::create($req->all());
    return redirect()->back();
  }

  public function storeupdate(Request $req,$id)
  {
    TrainingCourse::find($id)->update($req->except('_token'));
    return redirect()->back();
  }
  public function delete($id)
  {
    TrainingCourse::destroy($id);
    return redirect()->back();
  }
}
