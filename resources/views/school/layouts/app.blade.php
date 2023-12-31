<!DOCTYPE html>
<html lang="en">

<head>
  <title>Academics &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{URL::to('school/asset/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{URL::to('school/asset/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('school/asset/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{URL::to('school/asset/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('school/asset/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('school/asset/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{URL::to('school/asset/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{URL::to('school/asset/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{URL::to('school/asset/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{URL::to('school/asset/css/aos.css')}}">
  <link href="{{URL::to('school/asset/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{URL::to('school/asset/css/style.css')}}">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block"> 
            <a href="javascript:void(0)" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a> 
            <a href="javascript:void(0)" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a> 
          </div>
          <div class="col-lg-3 text-right">

            @auth
            <a id="login" href="{{route("student.logout")}}" class="small mr-3"><span class="icon-unlock-alt"></span> Log out</a>
            <a id="register" href="{{route("admin.dash")}}" class="small btn btn-primary px-2 py-1 rounded-0"><span class="icon-users"></span> Dashboard</a>
            @else
            <a id="login" href="{{route("student.login")}}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a id="register" href="{{route("student.register")}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
            @endauth
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="{{route('student.index')}}" class="d-block">
              <img src="{{URL::to('school/asset/images/logo.jpg')}}" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a id="home" href="{{route('student.index')}}" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="javascript:void(0)" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="{{route('student.about')}}">Our Teachers</a></li>
                    <li><a href="{{route('student.about')}}">Our School</a></li>
                  </ul>
                </li>
                <li>
                  <a href="{{route('student.admission')}}" class="nav-link text-left">Admissions</a>
                </li>
                <li>
                  <a href="{{route('student.all.notices')}}" class="nav-link text-left">Notice</a>
                </li>
                <li>
                  <a href="{{route('student.course')}}" class="nav-link text-left">Courses</a>
                </li>
                <li>
                    <a href="{{route('student.contact')}}" class="nav-link text-left">Contact</a>
                  </li>
                </ul>
            </nav>

          </div>
          <div class="ml-auto">
                <div class="social-wrap">
                  <a href="#"><span class="icon-facebook"></span></a>
                </div>
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
          </div>
         
        </div>
      </div>

    </header>



    @section('main')
    @show




    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="{{URL::to('school/asset/images/logo.png')}}" alt="Image" class="img-fluid"></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>  
            <p><a href="#">Learn More</a></p>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Our Campus</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Our Interns</a></li>
                <li><a href="#">Our Leadership</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Math</a></li>
                  <li><a href="#">Science &amp; Engineering</a></li>
                  <li><a href="#">Arts &amp; Humanities</a></li>
                  <li><a href="#">Economics &amp; Finance</a></li>
                  <li><a href="#">Business Administration</a></li>
                  <li><a href="#">Computer Science</a></li>
              </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Help Center</a></li>
                  <li><a href="#">Support Community</a></li>
                  <li><a href="#">Press</a></li>
                  <li><a href="#">Share Your Story</a></li>
                  <li><a href="#">Our Supporters</a></li>
              </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="{{URL::to('school/asset/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery-ui.js')}}"></script>
  <script src="{{URL::to('school/asset/js/popper.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery.stellar.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery.countdown.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{URL::to('school/asset/js/aos.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery.sticky.js')}}"></script>
  <script src="{{URL::to('school/asset/js/jquery.mb.YTPlayer.min.js')}}"></script>




  <script src="{{URL::to('school/asset/js/main.js')}}"></script>
  <script>
    // $("#login").click(function(){
    //     alert("dekhayy");
    // });


  </script>

</body>

</html>