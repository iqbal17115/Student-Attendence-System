<?php

namespace App\Http\Controllers\Attendence;

use Illuminate\Http\Request;
use DB;
use App\Section;
use App\Student;
use App\Attendence;

class AttendenceController extends Controller
{
    public function showSection(){
    	$sec=Section::select(DB::raw('CONCAT(semName," ", semNo," ", sem) AS sem'))->where('teacher_email',session()->get('email'))->get();
       return view('Attendence.showSectionForAttendence',['sec'=>$sec]);
    }
    public function attendenceForm(Request $request){
        $date=$request->date;
    	$data=$request->semName;
    	$data1=explode(" ", $data);
        $name=$data1[0];
        $no=$data1[1];
        $sem=$data1[2];
        $id=Section::where('semName',$name)->where('semNo',$no)->where('teacher_email',session()->get('email'))->get('id');
        foreach ($id as $value) {
        	$id=$value->id;
        }
        $student=Student::select('*')->where('section_id',$id)->get();
        $array=compact('data','id','date');
    	return view('Attendence.attendenceForm',['student'=>$student],['array'=>$array]);
    }
    public function attendenceSubmit(Request $request){
    	 $date=$request->date;
         $var=$request->attendence;
         $sec=$request->m;
         $p=0;
         foreach ($var as $var) {
         	$p++;
         }
         $count=Attendence::where('date',$date)->where('section_id',$sec)->count();
         if($count==0){
           for ($i=0; $i < $p; $i++) { 
         	$attendence=new Attendence;

         	$attendence->section_id=$sec;
         	$attendence->student_id=$request->n[$i];
         	$attendence->date=$date;
         	$attendence->attend=$request->attendence[$i];
         	$attendence->save();
         }
         }else{
         	return view('Attendence.unsuccess')->with('msg','Attendece has been taken for this date!');
         }
    }
    public function showSection1(){
        $sec=Section::select(DB::raw('CONCAT(semName," ", semNo," ", sem) AS sem'))->where('teacher_email',session()->get('email'))->get();
       return view('Attendence.showSectionForDateWiseAttendence',['sec'=>$sec]);
    }
    public function allDateAttendence(Request $request){
            $data=$request->semName;
        $data1=explode(" ", $data);
        $name=$data1[0];
        $no=$data1[1];
        $sem=$data1[2];
        $id=Section::where('semName',$name)->where('semNo',$no)->where('teacher_email',session()->get('email'))->get('id');
        foreach ($id as $value) {
            $id=$value->id;
        }
        $attend=Attendence::select('date', 'section_id')->where('section_id',$id)->distinct()->get();
        return view('Attendence.attendenceDateForm',compact('attend','attend'));
    }
    public function fixedDateAttendence(Request $request){
         
         $update=DB::table('attendences')
         ->join('sections','sections.id','attendences.section_id')
         ->join('students','students.id','attendences.student_id')
         ->where('attendences.section_id',$request->section_id)
         ->where('attendences.date',$request->date)
         ->get();
         
         return view('Attendence.attendenceView',['update'=>$update]);
    }
    public function update(Request $request){
        
        $var=$request->student_id;
        $p=0;
         foreach ($var as $var) {
            $p++;
         }
        for ($i=0; $i < $p; $i++) { 
            Attendence::where('student_id',$request->student_id[$i])
            ->where('section_id',$request->section_id)
            ->where('date',$request->date)
            ->update(['attend'=>$request->attend[$i]]);
        }
        return view('Attendence.success')->with('msg','You have successfully updated all attendence!');
    }
}
