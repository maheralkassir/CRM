<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Person;
use App\Applicant;
use App\Certificate;
use App\Trainer;
use App\Tester;
use App\Employee;
use File;
use App\LastJob;
use App\EmpPosition;
use App\Vacation;
use App\TrainingCourse;
use App\SalaryChange;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
      Person::deleting(function($person){
        $data = Certificate::where('person_id','=',$person->id)->select('id')->get();
        foreach($data as $d){
          Certificate::destroy($d['id']);
        }
        $data = Applicant::where('person_id','=',$person->id)->select('id')->get();
        foreach($data as $d){
          Applicant::destroy($d['id']);
        }
      });

      Certificate::deleting(function($cert){
        File::delete(public_path($cert['image']));
      });

      Applicant::deleting(function($applicant){
        File::delete(public_path($applicant['cv_link']));

        $data = LastJob::where('applicant_id','=',$applicant->id)->select('id')->get();
        foreach($data as $d){
          LastJob::destroy($d['id']);
        }

        $data = Trainer::where('applicant_id','=',$applicant->id)->select('id')->get();
        foreach($data as $d){
          Trainer::destroy($d['id']);
        }

        $data = Tester::where('applicant_id','=',$applicant->id)->select('id')->get();
        foreach($data as $d){
          Tester::destroy($d['id']);
        }

        $data = Employee::where('applicant_id','=',$applicant->id)->select('id')->get();
        foreach($data as $d){
          Employee::destroy($d['id']);
        }
      });

      Employee::deleting(function($employee){
        $data = EmpPosition::where('employee_id','=',$employee->id)->select('id')->get();
        foreach($data as $d){
          EmpPosition::destroy($d['id']);
        }

        $data = TrainingCourse::where('employee_id','=',$employee->id)->select('id')->get();
        foreach($data as $d){
          TrainingCourse::destroy($d['id']);
        }

        $data = Vacation::where('employee_id','=',$employee->id)->select('id')->get();
        foreach($data as $d){
          Vacation::destroy($d['id']);
        }

        $data = SalaryChange::where('employee_id','=',$employee->id)->select('id')->get();
        foreach($data as $d){
          SalaryChange::destroy($d['id']);
        }
      });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
