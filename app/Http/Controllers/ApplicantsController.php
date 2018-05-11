<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Applicant;
use Illuminate\Support\Facades\Input;
use App\LastJob;
use File;
use DB;

class ApplicantsController extends Controller
{
    public function index()
    {

      $data = DB::table('applicants')->join('persons','persons.id','=','applicants.person_id')->select('applicants.*','persons.name as name')->get();
      return view('hr.applicants.index')->with('applicants',$data)->with('a',['','current','','','','']);
    }

    public function store(Request $req)
    {
      if (Input::hasFile('cv_link')) {
        $image = $req->file('cv_link');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/cv');
        $image->move($destinationPath, $name);
        $fullName = 'cv/'.$name;
      }
      $arr = $req->except('_token','cv_link');
      $arr['cv_link'] = $fullName;
      Applicant::create($arr);
      return redirect()->back();
    }

    public function delete($id)
    {
      Applicant::destroy($id);
      return redirect()->back();
    }

    public function seemore($id)
    {
      $data = DB::table('applicants')->where('applicants.id','=',$id)->join('persons','persons.id','=','applicants.person_id')->select('applicants.*','persons.name as name')->get()->first();
      $train=[];
      if($data->is_trainer){
        $train = DB::table('trainers')->where('applicant_id','=',$id)->get()->first();
      }

      $test=[];
      if($data->is_tester){
        $test = DB::table('testers')->where('applicant_id','=',$id)->get()->first();
      }

      $emp=[];
      if($data->is_employee){
        $emp = DB::table('employees')->where('applicant_id','=',$id)->get()->first();
      }

      return view('hr.applicants.seemore')->with('applicant',$data)->with('train',$train)->with('test',$test)->with('emp',$emp)->with('jobs',LastJob::where('applicant_id','=',$id)->get())->with('a',['','current','','','','']);;
    }

    public function update($id)
    {
      $data = DB::table('applicants')->where('applicants.id','=',$id)->join('persons','persons.id','=','applicants.person_id')->select('applicants.*','persons.name as name')->get()->first();
      return view('hr.applicants.update')->with('applicant',$data)->with('jobs',LastJob::where('applicant_id','=',$id)->get())->with('a',['','current','','','','']);;
    }

    public function updatedata(Request $req,$id)
    {
      if (Input::hasFile('cv_link')) {
        $data = Applicant::find($id);
        File::delete(public_path($data['cv_link']));

        $image = $req->file('cv_link');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/cv');
        $image->move($destinationPath, $name);
        $fullName = 'cv/'.$name;

        Applicant::where('id','=',$id)->update([
          'cv_link'=>$fullName,
          'last_salary'=>$req['last_salary'],
          'time_to_get_work'=>$req['time_to_get_work'],
          'confident_people'=>$req['confident_people'],
          'technical_rate'=>$req['technical_rate'],
          'job'=>$req['job'],
          'numeric_evalution'=>$req['numeric_evalution'],
          'interview_date'=>$req['interview_date'],
          ]
        );
      }
      else{
        Applicant::where('id','=',$id)->update([
          'last_salary'=>$req['last_salary'],
          'time_to_get_work'=>$req['time_to_get_work'],
          'confident_people'=>$req['confident_people'],
          'technical_rate'=>$req['technical_rate'],
          'job'=>$req['job'],
          'numeric_evalution'=>$req['numeric_evalution'],
          'interview_date'=>$req['interview_date'],
          ]
        );
      }
      return redirect()->action('ApplicantsController@update', $id);
    }

    public function storelastjob(Request $req)
    {
      LastJob::create($req->all());
      return redirect()->back();
    }

    public function deletelastjob($id)
    {
      LastJob::destroy($id);
      return redirect()->back();
    }
}
