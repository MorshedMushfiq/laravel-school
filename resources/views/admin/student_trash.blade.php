@extends('admin.layouts.app')
@section("main")

<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card mt-5">
          <div class="card-body">

              <p class="card-title mb-0">Trash Teacher</p>
              @if(Session::has("success"))
              <p class='alert alert-success my-2'>{{Session::get("success")}} <button class='close' data-dismiss="alert">&times;</button> </p>

              @endif
            
              <a class='btn btn-warning btn-sm my-2' href="{{route('admin.students')}}">Back</a>
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
                      @foreach($all_trash_student as $student)
                      @php
                          $i++
                      @endphp
                          <td>{{$i}}</td>
                        <td>{{$student->name}}</td>
                        <td><img src="{{URL::asset('uploads/profiles/' . $student->image)}}" alt="student_image"></td>
                        <td class="font-weight-bold">{{$student->email}}</td>
                        <td class="font-weight-medium"><div class="badge badge-warning">{{$student->role}}</div></td>
                        <td>
                            <a href="{{route('student.restore', $student->id)}}" class='btn btn-warning btn-sm'>Restore</a>
                            <a href="{{route('student.delete', $student->id)}}" class='btn btn-danger btn-sm'>Delete Permanently</a>
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