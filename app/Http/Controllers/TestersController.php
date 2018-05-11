<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use view;
use App\Tester;
use App\Applicant;
use DB;

class TestersController extends Controller
{
  public function startTesting(Request $req)
  {
    Tester::create($req->all());
    Applicant::where('id','=',$req->all()['applicant_id'])->update(['is_tester'=>1]);
    return redirect()->back();
  }

  public function delete($id,$app_id)
  {
    Tester::destroy($id);
    Applicant::where('id','=',$app_id)->update(['is_tester'=>0]);
    return redirect()->back();
  }

  public function update(Request $req)
  {
    Tester::where('applicant_id','=',$req->applicant_id)->update($req->except('_token'));
    return redirect()->back();
  }



  public function index()
  {
    $data = DB::table('persons')->join('applicants','applicants.person_id','=','persons.id')->join('testers','testers.applicant_id','=','applicants.id')
    ->select('persons.name as prname','testers.*')->get();
    return view('hr.test.index')->with('testers',$data)->with('a',['','','','current','','']);;
  }
}
