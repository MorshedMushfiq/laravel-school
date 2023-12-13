@extends('admin.layouts.app')
@section("main")

<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card mt-5">
          <div class="card-body">

              <p class="card-title mb-0">Trash Staff</p>
              @if(Session::has("success"))
              <p class='alert alert-success my-2'>{{Session::get("success")}} <button class='close' data-dismiss="alert">&times;</button> </p>

              @endif
            
              <a class='btn btn-warning btn-sm my-2' href="{{route('admin.staff')}}">Back</a>
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Cell</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>  
                    </thead>
                    <tbody>

                      <tr>
                          @php
                              $i= 1;    
                          @endphp
                      @foreach($all_trash_staff as $staff)
                      @php
                          $i++
                      @endphp
                          <td>{{$i}}</td>
                        <td>{{$staff->name}}</td>
                        <td><img src="{{URL::asset('uploads/profiles/' . $staff->image)}}" alt="staff_image"></td>
                        <td class="font-weight-bold">{{$staff->email}}</td>
                        <td class="font-weight-medium"><div class="badge badge-warning">{{$staff->role}}</div></td>
                        <td>
                            <a href="{{route('staff.restore', $staff->id)}}" class='btn btn-warning btn-sm'>Restore</a>
                            <a href="{{route('staff.delete', $staff->id)}}" class='btn btn-danger btn-sm'>Delete Permanently</a>
                        </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>




@endsection