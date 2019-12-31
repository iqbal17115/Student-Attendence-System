@extends('Attendence.master')
@section('mainContent')
    
    	<div class="view">
        
          <table class="table">
            <thead>
              <tr>
                <th>Serial</th>
                <th>Attendence Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($attend AS $attend)
              <form action="view1" method="POST">
          @csrf
                 <tr>
                   <td>{{ $i++ }}</td>
                   <td>{{ $attend['date'] }}
                  <input type="hidden" name="date" value="{{ $attend['date'] }}">
                   </td>
                   <td><button value="{{ $attend['section_id'] }}" class="btn btn-success btn-sm" name="section_id">view</button></td>
                 </tr>
                 </form>
              @endforeach
            </tbody>
          </table>
        
      </div>
    
@endsection