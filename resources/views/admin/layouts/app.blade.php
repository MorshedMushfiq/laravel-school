<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{URL::to('dashboard/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css/styles.min.css')}}">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{URL::to('dashboard/assets/images/logos/dark-logo.svg')}}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            @if(Auth::user()->type=="student")
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Student Profile</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">My Profile</span>
              </a>
            </li>
            @endif
            @if(Auth::user()->type=="teacher")
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Teacher Profile</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">My Profile</span>
              </a>
            </li>
            @endif
            @if(Auth::user()->type=="admin")
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Admin Profile</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">My Profile</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('admin.teachers')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Teachers</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('admin.students')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Students</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('admin.staff')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Staff</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Courses</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('admin.notice')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Notices</span>
              </a>
            </li>
            @endif
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            @auth
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('student.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Main URL</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('student.logout')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
            @else
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('student.login')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('student.register')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            @endauth
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <h1 class="fs-6">{{Auth::user()->name}}</h1>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{URL::to('dashboard/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

    @section('main')
    @show











      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
      </div>
    </div>
  </div>
</div>
<script src="{{URL::to('dashboard/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{URL::to('dashboard/assets/js/sidebarmenu.js')}}"></script>
<script src="{{URL::to('dashboard/assets/js/app.min.js')}}"></script>
<script src="{{URL::to('dashboard/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{URL::to('dashboard/assets/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{URL::to('dashboard/assets/js/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<script>

   $(document).ready(function(){

  //insert data ajax
    $(document).on("submit", "#noticeForm", function(e){
      
        e.preventDefault();
        $.ajax({
            url: "{{route('notice.upload')}}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response){
              if(response.status=="success"){
                $("#staticBackdrop").modal('hide');
                $("#noticeForm")[0].reset();
                $('.table').load(location.href+' .table');
                $("#msg").html("<span class='alert alert-success'>"+response.msg+"</span>");
              }
            }
        });
      });

      

    

    //update data ajax
    $(document).on("submit", "#formupdate", function(e){
        e.preventDefault();
        let form_data = new FormData(this);
        $.ajax({
            url: "{{route('update.notice')}}",
            method: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: function(res){
              if(res.status=="success"){
                $(".editModal").modal('hide');
                $('.table').load(location.href+' .table');
                $("#msg").html("<span class='alert alert-success'>"+res.msg+"</span>");
                
              }
            }
        });
      });

    //delete data ajax
    $(document).on("submit", "#deleteNotice", function(e){
      e.preventDefault();
      let deleteData = new FormData(this);
      Swal.fire({
                title: 'Do you want to Delete this data?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Delete',
                denyButtonText: `Cancel`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  

                  $.ajax({
                      url: "{{route('delete.notice')}}",
                      method: "POST",
                      data: deleteData,
                      contentType: false,
                      processData: false,
                      success: function(response){
                        if(response.status=="success"){
                          $('.table').load(location.href+' .table');
                          $("#msg").html("<span class='alert alert-success'>"+response.msg+"</span>");
                        }
                      }
                  });
                  Swal.fire('Delete!', '', 'success')
                } else if (result.isDenied) {
                  Swal.fire('Data Not Deleted', '', 'info')
                }
              });

    });




    //paginate data ajax
    $(document).on("click", "ul a.page-link", function(e){
      //alert("vai dhortase");
      e.preventDefault();
      let page = $(this).attr("href").split("page=")[1];
      // alert(page);
      notices(page);

    });

    function notices(page){
      $.ajax({
        url: "/ad-dashboard/notice/paginate/paginate-data?page=" + page,
        success: function(res){
          $('.table-responsive').html(res);
        }
      });
    }

    //search data ajax
    $("#searchId").keyup(function(e){
      e.preventDefault();
      let search_notice = $("#searchId").val();
      console.log(search_notice);
      
        $.ajax({
        url: "{{route('search.notice')}}",
        method: "GET",
        data: {
          search_notice: search_notice,
        },
        success: function(data){
          $("#data-table").html(data);
          
          if(data.status=="danger"){
            $("#data-table").html("<span class='alert alert-danger'>"+ data.msg+ "</span>");
          }


        }
      });
     
    });


    //insert comment ajax
    $(document).on("submit", "#comment_form", function(e){
      e.preventDefault();
      $.ajax({
          url: "{{route('comment.upload')}}",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function(response){
            if(response.status=="success"){
              
              $("#comment_form")[0].reset();
              $('.comment').load(location.href+' .comment');
              
            
            }
          }
      });
    });


























   });

</script>
</body>

</html>