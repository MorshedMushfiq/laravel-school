@include('admin.layouts.style')
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <h1 class="text-center fw-bold display-5 mb-3">Create Your Account.</h1>
                <form action='{{route('student.register.user')}}' method='POST' enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Email Address</label>
                    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Insert Image</label>
                    <input type="file" name='file' class="form-control" id="">
                  </div>
                  <div class="mb-4">
                    <label for="" class="form-label">Type</label>
                    <select class='form-control' name="type" id="type">
                      <option value="" selected disabled>Choose</option>
                      <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                      <option value="staff">Staff</option>
                    </select>
                  </div>
                  <p class='fs-5 text-danger fst-italic'>This field is only for teacher.</p>
                  <div class="mb-4">
                    <label for="" class="form-label">Teacher Type</label>
                      <input type="text" name='teacher_role' class="form-control" placeholder="ex: English Teacher">
                  </div>
                  <div class="mb-4">
                    <label for="" class="form-label">Teacher description</label>
                      <input type="text" name='teacher_description' class="form-control" placeholder="Description">
                  </div>

                  <p class='fs-5 text-danger fst-italic'>This field is only for staff.</p>
                  <div class="mb-4">
                    <label for="" class="form-label">Staff Type</label>
                      <input type="text" name='staff_role' class="form-control" placeholder="ex: Cheif or Cleaner">
                  </div>
                  <div class="mb-4">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name='password' class="form-control" id="">
                  </div>
                  <div class="mb-4">
                    <input type="submit" class="btn btn-primary btn-block" id="">
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="{{route('student.login')}}">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.layouts.script')
