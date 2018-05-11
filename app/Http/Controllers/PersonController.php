<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;
use App\Person;
use App\Certificate;
use File;
use DB;

class PersonController extends Controller
{
    public function index()
    {
      return view('hr.person.index')->with('persons',Person::all())->with('a',['current','','','','','']);;
    }

    public function store(Request $req)
    {
        Person::create($req->all());
        return redirect()->action('PersonController@index');
    }

    public function delete($id)
    {
      Person::destroy($id);
      return redirect()->action('PersonController@index');
    }

    public function seeMore($id)
    {
      return view('hr.person.seemore')->with('person',Person::Where('id','=',$id)->get()->first())
      ->with('certs',Certificate::where('person_id','=',$id)->get())->with('a',['current','','','','','']);;
    }

    public function storeCert(Request $req)
    {
      if (Input::hasFile('image')) {
        $image = $req->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/certificates');
        $image->move($destinationPath, $name);
        $fullName = 'certificates/'.$name;
      }
      Certificate::create([
        'person_id'=>$req['person_id'],
        'image'=>$fullName,
        'name'=>$req['name'],
        'certificate_date'=>$req['certificate_date'],
      ]);
      return redirect()->action('PersonController@seeMore',$req['person_id']);
    }

    public function update($id)
    {
      return view('hr.person.update')->with('person',DB::table('persons')->Where('id','=',$id)->get()->first())
      ->with('certs',Certificate::where('person_id','=',$id)->get())->with('a',['current','','','','','']);;
    }

    public function storeupdate(Request $req ,$id)
    {
      Person::where('id','=', $id)->update($req->except(['_token']));
      return redirect()->action('PersonController@update',$id);
    }

    public function deleteCert($id)
    {
      Certificate::destroy($id);
      return redirect()->back();
    }
}
