@extends("school.layouts.app")
@section("main")

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('school/asset/images/bg_1.jpg')">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-7">
          <h2 class="mb-0">Notices</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
      </div>
    </div>
  </div> 



<div class="custom-breadcrumns border-bottom">
    <div class="container">
      <a href="#">Home</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <span class="current">Notices</span>
    </div>
  </div>



<div class="news-updates">
    <div class="container">
       
      <div class="row">
        <div class="col-lg-12">
           <div class="section-heading">
            <h2 class="text-black">News &amp; Updates</h2>
            <a href="#">Read All News</a>
        </div>
      </div>
          <div class="row ">
            @foreach($notices as $key=>$notice)
            <div class="col-lg-4">
              <div class="post-entry-big">
                <a href="{{route('student.notice.single', $notice->id)}}" class="img-link"><img src="{{URL::asset('uploads/notice/'. $notice->notice_image)}}" alt="NoticeImage" class="img-fluid"></a>
                <div class="post-content">
                  <div class="post-meta"> 
                    <a href="#">{{$notice->created_at->format('d-M-y')}}</a>
                  </div>
                  <h3 class="post-heading"><a href="#">{{$notice->notice_title}}</a></h3>
                </div>
              </div>
            </div>
            @endforeach
     
          </div>
      </div>
         
        </div>
      </div>
    </div>
  </div>









@endsection