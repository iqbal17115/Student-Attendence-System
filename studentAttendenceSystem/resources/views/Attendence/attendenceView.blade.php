@extends('Attendence.master')
@section('mainContent')
    
    	<div>
       <form action="update" method="POST">
        @csrf
         <table class="table">
           <thead>
             <tr>
               <td>Serial</td>
               <td>Student Name</td>
               <td>Student Roll</td>
               <td>Attendence</td>
             </tr>
           </thead>
           <tbody>
            <?php $i=1; ?>
             @foreach($update AS $update)
               <tr>
                 <td>{{ $i++ }}</td>
                 <td>{{ $update->name }}</td>
                 <td>{{ $update->roll }}</td>
                 <td>
                  <input type="hidden" name="student_id[]" value="{{ $update->student_id }}">
                  <input type="hidden" name="section_id" value="{{ $update->section_id }}">
                  <input type="hidden" name="date" value="{{ $update->date }}">
                 <div class="form-check">
                      
                       <label for=""><input name="attend[]{{ $update->roll }}" type="radio"class="radio-inline" value="1" <?php echo $update->attend==0?:"checked" ?> >P</label>
                    <label for=""><input name="attend[]{{ $update->roll }}" type="radio"  class="radio-inline" value="0" <?php echo $update->attend==1?:"checked" ?>>A</label>
                    </div>
                 </td> 
               </tr>
               </tr>
             @endforeach
             <tr>
               <td colspan="4">
                 <button class="btn btn-success btn-block">Update</button>
               </td>
             </tr>
           </tbody>
         </table>
       </form> 
      </div>
    
@endsection