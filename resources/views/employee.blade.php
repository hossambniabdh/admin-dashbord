
@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Start Modal --}}
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Add new Employee
</button>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('employee.store')}}" method="POST">
        @csrf
      <div class="modal-body">
        <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name " required>
        <br>
        
        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
        <br>
        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
        <br>
      <select class="form-control" name="com" required>
        <option selected disabled>Company</option>
        @foreach ($company as $company)
        <option value="{{$company -> name}}" >{{$company -> name}}</option>
        @endforeach
      </select>
      <br>
      <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save">Add Employee</button>
      </div>
      </form>
    </div>
  </div>
</div>

  {{--End Modal--}}
  <table id="table_id" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Lase Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $emp as $emp )
            
            <tr >
                
                <td >{{$emp -> first_name}}</td>
                <td>{{$emp -> last_name}}</td>
                <td>{{$emp -> name }}</td>
                 <td>{{$emp -> emp_email}}</td>
                <td>{{$emp -> phone}}</td>
                
               
                <td>
                    <button type="button" id="update" class="btn btn-primary" data-toggle="modal" data-id="{{$emp -> id}}" data-fname="{{$emp -> first_name}}" data-lname="{{$emp -> last_name}}" data-email="{{$emp -> emp_email}}" data-phone="{{$emp -> phone}}" data-target="#Modal">Update</button>
                   <button type="button" id="delete" class="btn btn-danger" data-id="{{$emp -> id}}"  >Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
       
    </table>

    {{-- modal --}}

    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
          @csrf
      <div class="modal-body">
        
                        <label>First Name</label>
                        
                        
                        <input type="text" id="data-fname" name="fname"  class="form-control ">
                    
                       <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" id="data-lname"  class="form-control ">
                    </div>
                       <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" id="data-email"  class="form-control">
                    </div>
                       <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="data-phone"  class="form-control">
                    </div>
                    <input type="hidden" id="data-id" name="id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save"  >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection



