@extends('Attendence.master')
@section('mainContent')
    <div class="border border-dark rounded p-3 addSection">
    	<div class="text-center">Add Section</div>
    	<form action="{{ route('addSection') }}" method="POST">
    		@csrf
    		<div class="form-group">
               <input class="form-control-lg border-muted" type="text"id="sName" placeholder="Section Name" style="width: 100%;" name="semName">
    		</div>
    		 <div class="input-group pb-3">
      <select class="form-control-lg" type="text" style="width: 49%;" name="session" id="">
        <option value="Spring">Spring</option>
        <option value="Summer">Summer</option>
        <option value="Fall">Fall</option>
      </select>
    <div class="input-group-append">
    <span class="input-group-text"><b>-</b></span>
   </div>
    <select class="form-control-lg" type="text" style="width: 48%;" name="year" id="">
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
      <option value="2026">2026</option>
      <option value="2027">2027</option>
      <option value="2028">2028</option>
      <option value="2029">2029</option>
      <option value="2030">2030</option>
    </select>
  </div>
    		<div class="form-group">
               <!--<input class="form-control-lg border-muted" type="text"id="sName" placeholder="Semester No." style="width: 100%;" name="semName"> -->
               <select class="form-control-lg border-muted" name="semNo" id="" style="width: 100%;">
               	<option value="">--Semester No--</option>
               	<option value="1st">1st</option>
               	<option value="2nd">2nd</option>
               	<option value="3rd">3rd</option>
               	<option value="4th">4th</option>
               	<option value="5th">5th</option>
               	<option value="6th">6th</option>
               	<option value="7th">7th</option>
               	<option value="8th">8th</option>
               	<option value="9th">9th</option>
               	<option value="10th">10th</option>
               	<option value="11th">11th</option>
               	<option value="12th">12th</option>
               </select>
    		</div>
    			<button type="submit" class="btn btn-success btn-lg btn-block mt-4">Submit</button>
    		
    	</form>
    </div>
@endsection
