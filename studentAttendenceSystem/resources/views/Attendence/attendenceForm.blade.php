@extends('Attendence.master')
@section('mainContent')
    
    	<div class="attendenceForm">
       <form action="attendence1" method="POST">
        @csrf
        <div class="text-center font-weight-bold text-light pb-1">Date: {{ $array['date'] }}</div>
       <table class="table table-striped table-bordered table-primary">

         <thead class="thead-dark">
           <tr>
             <th>Serial</th>
             <th>Student Name</th>
             <th>Student Roll</th>
             <th>Attendence</th>
           </tr>
         </thead>
         <tbody>
           <?php $p=0; ?>
           @foreach($student AS $student)
              <tr>
                <td>{{ ++$p }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->roll }}</td>
                <input type="hidden" name="m" value="{{ $array['id'] }}">
                <td>
                 <input type="hidden" name="n[]" value="{{ $student->id }}">
                 <input type="hidden" name="date" value="{{ $array['date'] }}">
                 
                    <div class="form-check">
                      
                       <label for=""><input type="radio" name="attendence[]{{ $student->roll }}" class="radio-inline" value="1" checked>P</label>
                    <label for=""><input type="radio" name="attendence[]{{ $student->roll }}" class="radio-inline" value="0">A</label>
                    </div>
                
                </td>
              </tr>
           @endforeach
         </tbody>
         <tfoot>
           <tr>
             <td colspan="4">
               <button class="btn btn-success btn-block">Submit</button>
             </td>
           </tr>
         </tfoot>
       </table> 
      </form> 
      </div>
    
@endsection