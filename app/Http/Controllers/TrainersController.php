<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use view;
use App\Trainer;
use App\Applicant;
use DB;

class TrainersController extends Controller
{
  public function startTraining(Request $req)
  {
    Trainer::create($req->all());
    Applicant::where('id','=',$req->all()['applicant_id'])->update(['is_trainer'=>1]);
    return redirect()->back();
  }

  public function delete($id,$app_id)
  {
    Trainer::destroy($id);
    Applicant::where('id','=',$app_id)->update(['is_trainer'=>0]);
    return redirect()->back();
  }

  public function update(Request $req)
  {
    Trainer::where('applicant_id','=',$req->applicant_id)->update($req->except('_token'));
    return redirect()->back();
  }

  public function index()
  {
    $data = DB::table('persons')->join('applicants','applicants.person_id','=','persons.id')->join('trainers','trainers.applicant_id','=','applicants.id')
    ->select('persons.name as prname','trainers.*')->get();
    return view('hr.train.index')->with('trainers',$data)->with('a',['','','current','','','']);;
  }


}
