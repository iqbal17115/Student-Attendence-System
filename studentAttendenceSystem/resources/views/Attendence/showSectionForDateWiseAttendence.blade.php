@extends('Attendence.master')
@section('mainContent')
    <div class="border border-dark rounded p-5 addStudent">
    	<form action="{{ route('view') }}" method="POST">
    		@csrf
    		<div class="form-group">
    		 <select class="form-control-lg border-muted" name="semName" id="" style="width: 100%;">
               	<option value="">---Semester---</option>
               	@foreach($sec AS $sec)
               	<option value="{{ $sec->sem }}">{{ $sec->sem }}</option>
               	@endforeach
               </select>
    		</div>
    			<button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Select</button>
    	</form>
    </div>
@endsection