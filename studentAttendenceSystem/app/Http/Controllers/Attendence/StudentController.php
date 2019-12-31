<?php

namespace App\Http\Controllers\Attendence;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use DB;

class StudentController extends Controller
{
    public function showSection(){
    	$sec=Section::select(DB::raw('CONCAT(semName," ", semNo," ", sem) AS sem'))->where('teacher_email',session()->get('email'))->get();
       return view('Attendence.showSectionForAddStudent',['sec'=>$sec]);
    }
    public function addStudent(Request $request){
    	$data=$request->semName;
    	$data1=explode(" ", $data);
        $name=$data1[0];
        $no=$data1[1];
        $sem=$data1[2];
        $id=Section::where('semName',$name)->where('semNo',$no)->where('sem',$sem)->where('teacher_email',session()->get('email'))->get('id');
        foreach ($id as $value) {
        	$id=$value->id;
        }
        $array=compact('data','id');
        return view('Attendence.addStudent',['array'=>$array]);
    }
    public function addStudent1(Request $request){
    	
        $data=$request->data;
        $id=$request->id;

        $this->validate($request, [
          'name'=>'required',
          'roll'=>'required',
        ]);

        $value=[
          'name'=>$request->name,
          'roll'=>$request->roll,
        ];

        $student=new Student;
        $student->section_id=$id;
        $student->roll=$value['roll'];
        $student->name=$value['name'];
        $student->save();

        $array=compact('data','id');
        return view('Attendence.addStudent',['array'=>$array]);
    }
}
