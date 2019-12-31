<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sec=Section::select(DB::raw('CONCAT(semName," ", semNo," ", sem) AS sem'))->get();
       return view('Attendence.showSectionForAttendence',['sec'=>$sec]);
    }
}
