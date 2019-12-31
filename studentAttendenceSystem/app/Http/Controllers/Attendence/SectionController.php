<?php

namespace App\Http\Controllers\Attendence;

use Illuminate\Http\Request;
use App\Section;

class SectionController extends Controller
{
    public function addSection(){
       return view('Attendence.addSection');
    }
    public function insertSection(Request $request)
    {
      
    	$this->validate($request,[
           'semName'=>'required',
           'semNo'=>'required',
    	]);
      $sessionYear=$request->session."-".$request->year;
    	$data=[
           'teacher_email'=>session()->get('email'),
           'semName'=>$request->semName,
           'sem'=>$sessionYear,
           'semNo'=>$request->semNo,
    	];
    	$section=new Section;
      $section->teacher_email= $data['teacher_email'];
    	$section->semName= $data['semName'];
    	$section->sem= $data['sem'];
    	$section->semNo= $data['semNo'];
    	$section->save();

      return view('Attendence.success')->with('msg','You have added a section now!');
    }

}
