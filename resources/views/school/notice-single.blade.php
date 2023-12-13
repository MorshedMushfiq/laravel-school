
    @extends("school.layouts.app")
    @section('main')
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('school/asset/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Campus Camping and Learning Session</h2>
              <p>June 6, 2019 by Admin</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Notices</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
              
                <div class="col-md-9 mb-4">
                    <p class="mb-5">
                        <img src="{{URL::asset("uploads/notice/".$single_notice->notice_image)}}" alt="Image" class="img-fluid">
                    </p>

                    <h1 class="fs-6">
                      {{$single_notice->notice_title}}
                    </h1>

                    <p>{{$single_notice->notice_description}}</p>
                </div>
                
            </div>
        </div>
        <div class="bg-light p-4">
          @auth
          <div class="d-flex flex-row align-items-start">
              <img class="rounded-circle" src="{{URL::asset('uploads/profiles/' . Auth::user()->image)}}" width="40">
              <form style="width: 100%;" action="{{route('comment.upload')}}" method="POST" id="comment_form">
                  @csrf
                  <textarea name='comment' class="form-control ml-1 shadow-none textarea" placeholder="Write here comment.."></textarea>
          </div>

                  <input type="hidden" name="notice_id" value="{{$single_notice->id}}">
                  <div class="mt-2 text-right"><button type="submit" class="btn btn-primary btn-sm shadow-none" >Do comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="reset">Cancel</button>
                  </div>
              </form>
              
        </div>        
      @else

      <p class='mt-1 p-2'>Please <a class="fw-bold" href="{{route('student.login')}}">Login</a> or <a href="{{route('student.register')}}" class="fw-bold">Register</a> For Leaving a comment here.</p>
      </div>
      @endauth




        <section class="gradient-custom">
          <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                  <div class="card-body p-4">
                    <h4 class="text-center mb-4 pb-2">Comment Section</h4>
        
                    <div class="row">
                      <div class="col">
                        @foreach($show_comments as $all_comments)
                        @if($all_comments->post_id==$single_notice->id)
                        <div class="comment d-flex flex-start">
                          @foreach ($user_infos->unique() as $user)
                          @if($all_comments->user_id==$user->id)
                          <img class="rounded-circle shadow-1-strong me-3"
                            src="{{URL::asset('uploads/profiles/' . $user->image)}}" alt="avatar" width="65"
                            height="65" />
                          <div class="flex-grow-1 flex-shrink-1">
                            <div>
                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 ml-3 fw-bold" style="color: green; font-weight: bold;">
                                  {{$user->name}}<span class="small">- 2 hours ago</span>
                                </p>
                                @endif
                                @endforeach
                                
                              </div>
                              <p class="small mb-0 ml-3">
                               kichuuu
                              </p>
                            </div>
                            @endif
                            @endforeach
                            {{-- replying comment --}}
                            <div class="d-flex flex-start mt-4">
                              <a class="me-3" href="#">
                                <img class="rounded-circle shadow-1-strong"
                                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar"
                                  width="65" height="65" />
                              </a>
                              <div class="flex-grow-1 flex-shrink-1">
                                <div>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-1 ml-3" style="color: green; font-weight: bold;" >
                                      John Smith <span class="small">- 4 hours ago</span>
                                    </p>
                                  </div>
                                  <p class="small mb-0 ml-3">
                                    the majority have suffered alteration in some form, by
                                    injected humour, or randomised words.
                                  </p>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="bg-light p-4">
                                @auth
                                <div class="d-flex flex-row align-items-start">
                                    <img class="rounded-circle" src="{{URL::asset('uploads/profiles/' . Auth::user()->image)}}" width="40">
                                    <form style="width: 100%;" action="#" method="POST" id="">
                                        @csrf
                                        <textarea name='comment' class="form-control ml-1 shadow-none textarea" placeholder="Write your Reply Here...."></textarea>
                                </div>
                      
                                        <input type="hidden" name="notice_id" value="{{$single_notice->id}}">
                                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">Reply</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="reset">Cancel</button>
                                        </div>
                                    </form>
                                    
                            </div>  
                            @endauth
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>


   
      
@endsection