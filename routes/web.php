<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Certificate;
Route::get('/', function () {
    return redirect()->action('PersonController@index');
})->middleware('auth');
Route::get('/hr', function () {
    return redirect()->action('PersonController@index');
})->middleware('auth');

Route::get('/hr/settings','User@settings')->middleware('auth');;
Route::post('/hr/settings/update/password','User@update')->middleware('auth');;
Route::get('/hr/settings/update/password','User@settings')->middleware('auth');;
Route::get('/hr/persons','PersonController@index')->middleware('auth');;
Route::post('/hr/persons','PersonController@store')->middleware('auth');;
Route::post('/hr/persons/cert','PersonController@storeCert')->middleware('auth');;
Route::get('/hr/persons/delete/{id}','PersonController@delete')->middleware('auth');;
Route::get('/hr/persons/see/{id}','PersonController@seeMore')->middleware('auth');;
Route::get('/hr/persons/update/{id}','PersonController@update')->middleware('auth');;
Route::post('/hr/persons/update/{id}','PersonController@storeupdate')->middleware('auth');;

Route::get('/hr/certs/delete/{id}','PersonController@deleteCert')->middleware('auth');;

Route::get('/hr/applicants','ApplicantsController@index')->middleware('auth');;
Route::post('/hr/applicants','ApplicantsController@store')->middleware('auth');;
Route::get('/hr/applicants/see/{id}','ApplicantsController@seemore')->middleware('auth');;
Route::get('/hr/applicants/update/{id}','ApplicantsController@update')->middleware('auth');;
Route::post('/hr/applicants/update/{id}','ApplicantsController@updatedata')->middleware('auth');;
Route::get('/hr/applicants/delete/{id}','ApplicantsController@delete')->middleware('auth');;
Route::post('/hr/applicants/lastjobs','ApplicantsController@storelastjob')->middleware('auth');;
route::get('/hr/applicants/lastjobs/delete/{id}','ApplicantsController@deletelastjob')->middleware('auth');;


Route::post('/hr/trainers/start','TrainersController@startTraining')->middleware('auth');;
Route::get('/hr/trainers','TrainersController@index')->middleware('auth');;
Route::get('/hr/trainers/delete/{id}/{id2}','TrainersController@delete')->middleware('auth');;
Route::post('/hr/trainers/update','TrainersController@update')->middleware('auth');;


Route::post('/hr/testers/start','TestersController@startTesting')->middleware('auth');;
Route::get('/hr/testers','TestersController@index')->middleware('auth');;
Route::get('/hr/testers/delete/{id}/{id2}','TestersController@delete')->middleware('auth');;
Route::post('/hr/testers/update','TestersController@update')->middleware('auth');;



Route::post('/hr/employees/start','EmployeesController@employment')->middleware('auth');;
Route::get('/hr/employees','EmployeesController@index')->middleware('auth');;
Route::get('/hr/employees/see/{id}','EmployeesController@seemore')->middleware('auth');;
Route::get('/hr/employees/update/{id}','EmployeesController@update')->middleware('auth');;
Route::post('/hr/employees/update/{id}','EmployeesController@updatedata')->middleware('auth');;
Route::get('/hr/employees/delete/{id}','EmployeesController@delete')->middleware('auth');;


Route::post('/hr/employees/emppositions','EmpposController@store')->middleware('auth');;
Route::get('/hr/employees/emppositions/delete/{id}','EmpposController@delete')->middleware('auth');;
Route::post('/hr/employees/emppositions/update/{id}','EmpposController@storeupdate')->middleware('auth');;

Route::post('/hr/employees/trcrs','TrainingCoursesController@store')->middleware('auth');;
Route::get('/hr/employees/trcrs/delete/{id}','TrainingCoursesController@delete')->middleware('auth');;
Route::post('/hr/employees/trcrs/update/{id}','TrainingCoursesController@storeupdate')->middleware('auth');;

Route::post('/hr/employees/vacations','VacationsController@store')->middleware('auth');;
Route::get('/hr/employees/vacations/delete/{id}','VacationsController@delete')->middleware('auth');;
Route::post('/hr/employees/vacations/update/{id}','VacationsController@storeupdate')->middleware('auth');;

Route::post('/hr/employees/salaries','SalaryChangesController@store')->middleware('auth');;
Route::get('/hr/employees/salaries/delete/{id}','SalaryChangesController@delete')->middleware('auth');;
Route::post('/hr/employees/salaries/update/{id}','SalaryChangesController@storeupdate')->middleware('auth');;



Auth::routes();
