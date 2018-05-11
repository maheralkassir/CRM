<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Employee;
use App\EmpPosition;
use DB;
use App\TrainingCourse;
use App\SalaryChange;

class EmployeesController extends Controller
{
  public function employment(Request $req)
  {
    Employee::create($req->all());
    Applicant::where('id','=',$req->all()['applicant_id'])->update(['is_employee'=>1]);
    return redirect()->back();
  }

  public function index()
  {
    $data = DB::table('persons')->join('applicants','applicants.person_id','=','persons.id')->join('employees','employees.applicant_id','=','applicants.id')
    ->select('persons.name as name','employees.*')->get();
    return view('hr.employees.index')->with('employees',$data)->with('a',['','','','','current','']);;
  }

  public function delete($id)
  {
    Employee::destroy($id);
    return redirect()->back();
  }

  public function seeMore($id)
  {
    $data = DB::table('persons')->join('applicants','applicants.person_id','=','persons.id')->join('employees','employees.applicant_id','=','applicants.id')
    ->where('employees.id','=',$id)->select('persons.name as name','employees.*','applicants.id as applicant_id')->get()->first();
    return view('hr.employees.seemore')->with('employee',$data)->with('a',['','','','','current',''])
    ->with('emppos',DB::table('EmpPositions')->where('employee_id','=',$id)->get())
    ->with('trcrs',DB::table('TrainingCourses')->where('employee_id','=',$id)->get())
    ->with('vacs',DB::table('vacations')->where('employee_id','=',$id)->get())
    ->with('sales',DB::table('salarychanges')->where('employee_id','=',$id)->get());
  }

  public function update($id)
  {
    return view('hr.employees.update')->with('employee',DB::table('employees')->Where('employees.id','=',$id)
    ->join('applicants','applicants.id','=','employees.applicant_id')->join('persons','persons.id','=','applicants.person_id')
    ->select('persons.name as name','employees.*')->get()->first())
    ->with('a',['','','','','current',''])
    ->with('emppos',DB::table('EmpPositions')->where('employee_id','=',$id)->get())
    ->with('trcrs',DB::table('TrainingCourses')->where('employee_id','=',$id)->get())
    ->with('vacs',DB::table('vacations')->where('employee_id','=',$id)->get())
    ->with('sales',DB::table('salarychanges')->where('employee_id','=',$id)->get());
  }

  public function storeupdate(Request $req ,$id)
  {
    Employee::where('id','=', $id)->update($req->except(['_token']));
    return redirect()->action('EmployeesController@update',$id);
  }



}
