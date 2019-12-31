@extends('Attendence.master')
@section('mainContent')
    <div class="border border-dark rounded p-3 addStudent">
    	<form action="{{ route('addStudent1') }}" method="post">
    		@csrf
    		<input type="hidden" value="{{ $array['data'] }}" name="data">
    		<input type="hidden" value="{{ $array['id'] }}" name="id">
    		<div class="form-group">
    		   <div class="text-center">{{ $array['data'] }}</div>
               <input class="form-control-lg border-muted" type="text" placeholder="Student Name" style="width: 100%;" name="name">
    		</div>
    		<div class="form-group">
               <input class="form-control-lg border-muted" type="text" placeholder="Student Roll" style="width: 100%;" name="roll">
    		</div>
    		<button type="submit" class="btn btn-info btn-block">Add Student</button>
    	</form>
    </div>
@endsection