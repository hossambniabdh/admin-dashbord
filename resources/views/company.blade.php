
@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Start Modal --}}
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Add new Company
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
      <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <input type="text" name="name" id="name" class="form-control" placeholder="Company Name " required>
        <br>
         <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
        <br>

        <input type="file" name="logo" id="logo" class="form-control" placeholder="Logo" required>
        <br>
       <input type="text" name="website" id="website" class="form-control" placeholder="website" required>
      <br>
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
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>website</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $company as $company )
            
            <tr >
                
                <td >{{ $company ->name}}</td>
                <td>{{ $company ->email}}</td>
                <td><img src="{{asset($company ->logo)}}" alt="no image" width="50px"></td>
                 <td>{{$company ->website}}</td>
                
                
               
                <td>
                    <button type="button" id="updatecom" class="btn btn-primary" data-toggle="modal" data-id="{{$company -> id}}" data-name="{{$company -> name}}"  data-email="{{$company-> email}}" data-website="{{$company-> website}}" data-target="#Modal">Update</button>
                   <button type="button" id="deletecom" class="btn btn-danger" data-id="{{$company -> id}}"  >Delete</button>
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
        
                        <label>Name</label>
                        
                        
                        <input type="text" id="data-name" name="fname"  class="form-control ">
                    
                       <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" id="data-email"  class="form-control">
                    </div>
                      
                    <div class="form-group">
                        <label>website</label>
                        <input type="text" id="data-website"  class="form-control">
                    </div>
                    <input type="hidden" id="data-id" name="id" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savecom"  >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

@endsection



