<!DOCTYPE html>
<html lang="zxx">
    <head> 
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Educavo - Education HTML Template</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav-orange.png') }}">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css') }}">
        <!-- linea-font css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/linea-fonts.css') }}">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css') }}">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css') }}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
        <!--Preloader area End here-->

        <!--Full width header Start-->
            @include('site.partials.navbar')
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-img">
                    <img src="{{ asset('assets/images/breadcrumbs/21.png') }}" alt="Breadcrumbs Image">
                </div>
                <div class="breadcrumbs-text white-color">
                    <h1 class="" style="color: #ff2530; font-size:none">{{ $subject->name }}</h1>
                    <!--
                        <ul>
                            <li>
                                <a class="active" href="index.html">Home</a>
                            </li>
                            <li>Course Details</li>
                        </ul>
                    -->
                </div>
            </div>
            <!-- Breadcrumbs End -->            

            <!-- Intro Courses -->
            <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70">
                <div class="container">
                    <div class="row clearfix">
                        <!-- Content Column -->
                        <div class="col-lg-8 md-mb-50">
                            <!-- Intro Info Tabs-->
                            <div class="intro-info-tabs">
                                <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="prod-instructor-tab" data-toggle="tab" href="#prod-instructor" role="tab" aria-controls="prod-instructor" aria-selected="false">Instructor</a>
                                    </li>
                                </ul>
                                <div class="tab-content tabs-content" id="myTabContent">
                                    <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                        <div class="content white-bg pt-30">
                                            <!-- Cource Overview -->
                                            <div class="course-overview">
                                                <div class="inner-box">
                                                    <h4>{{ $subject->name}} Subject Details </h4>
                                                    <h5>{{ $subject->grade->value }} {{ $subject->medium->grade_in_lang }}</h5>
                                                    <p>{!! $subject->description !!}</p>
                                                    <ul class="student-list">
                                                        <li>{{ $subject->students->count() }} Total Students</li>
                                                    </ul>
                                                    <h3>Syllabus you’ll learn</h3>
                                                    <ul class="review-list">
                                                        @foreach ($subject->sections as $section)
                                                            <li>{{ $section->name}}</li>
                                                        @endforeach
                                                    </ul>                                                                                                        
                                                </div>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prod-instructor" role="tabpanel" aria-labelledby="prod-instructor-tab">
                                        <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                            <h3 class="instructor-title">Instructors</h3>
                                            <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                                @foreach ($subject->lectures as $lecturer)
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                                        <div class="team-item">
                                                            <img src="{{ asset('assets/images/team/2.png') }}" alt="">
                                                            <div class="content-part">
                                                                <h4 class="name"><a href="#">{{ $lecturer->name }}</a></h4>
                                                                <span class="designation">{{ $lecturer->email }}</span>
                                                                <!--
                                                                    <ul class="social-links">
                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                    </ul>
                                                                -->
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
                        
                        <!-- Video Column -->
                        <div class="video-column col-lg-4">
                            <div class="inner-column">
                            <!-- Video Box -->
                                <div class="intro-video media-icon orange-color2">
                                    <img class="" src="{{ asset('storage/'.$subject->image) }}" alt="Video Image">
                                </div>
                                <div class="btn-part">
                                    <a  class="btn readon2 orange-transparent" id="enroll-subject" data-subject="{{ $subject->id}}">Enroll Now</a>
                                </div>
                                <!-- End Video Box -->
                                <div class="course-features-info">
                                    <ul>
                                        <li class="lectures-feature">
                                            <i class="fa fa-user"></i>
                                            <span class="label">Lectures</span>
                                            <span class="value">{{ $subject->lectures->count() }}</span>
                                        </li> 
                                        
                                        <li class="quizzes-feature">
                                            <i class="fa fa-file-o"></i>
                                            <span class="label">Sections</span>
                                            <span class="value">{{ $subject->sections->count() }}</span>
                                        </li>
                                        
                                        @php
                                            $lessons=0;
                                            $attach=0;
                                            $assignment=0;
                                            $forum=0;
                                        @endphp
                                        @foreach ($subject->sections as $section)
                                            @php
                                                $lessons=$section->lessons->count();
                                            @endphp

                                            @foreach ($section->lessons as $lesson)
                                                @php
                                                    $attach=$lesson->attachments->count();
                                                    $assignment=$lesson->assignments->count();
                                                    $forum=$lesson->topics->count();
                                                @endphp
                                            @endforeach
                                        @endforeach
                                       
                                        <li class="quizzes-feature">
                                            <i class="fa fa-puzzle-piece"></i>
                                            <span class="label">Attachments</span>
                                            <span class="value">{{ $attach }}</span>
                                        </li>
                                       
                                        <li class="assessments-feature">
                                            <i class="fa fa-check-square-o"></i>
                                            <span class="label">Assessments</span>
                                            <span class="value">{{ $assignment }}</span>
                                        </li>

                                        <li class="duration-feature">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="label">Forum Topics</span>
                                            <span class="value">{{ $forum }} </span>
                                        </li>
                                      
                                        <li class="students-feature">
                                            <i class="fa fa-users"></i>
                                            <span class="label">Students</span>
                                            <span class="value">{{ $subject->students->count() }}</span>
                                        </li>
                                       
                                    </ul>
                                </div>
                                
                            </div>
                        </div>                        
                    </div>                
                </div>
            </section>
            <!-- End intro Courses -->

        </div> 
        <!-- Main content End --> 

        
        <!-- Footer Start -->
            @include('site.partials.footer')
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        
        <!-- Modal Alert -->
        <div class="modal fade" tabindex="-1" id="modalsuccess">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                            <h4 class="nk-modal-title">Success!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text message"></div>
                            </div>
                            <div class="nk-modal-action">
                                <a class="btn btn-lg btn-mw btn-primary" data-dismiss="modal">OK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Alert 2 -->
        <div class="modal fade" tabindex="-1" id="modalerror">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                            <h4 class="nk-modal-title">Cant Process Your Request!</h4>
                            <div class="nk-modal-text">
                                <p class="lead message"></p>
                            </div>
                            <div class="nk-modal-action mt-5">
                                <a  class="btn btn-lg btn-mw btn-light" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div><!-- .modal-body -->
                </div>
            </div>
        </div>

        <!-- modernizr js -->
        <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Menu js -->
        <script src="{{ asset('assets/js/rsmenu-main.js') }}"></script> 
        <!-- wow js -->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>     
        <!-- plugins js -->
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <!-- contact form js -->
        <script src="{{ asset('assets/js/contact.form.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <script>
            
        $('#enroll-subject').click(function(){
            $.ajax({
                type: "POST",
                url: "{{ route('enroll.subject') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'subject_id':$(this).data("subject"),
                },
                success: function(data) {
                    $('#enroll-modal').modal('hide');
                    if(data.next=='login'){
                        window.location.href = "{{ route('login')}}";
                    }
                    if(data.next=='error'){
                        $('.message').html(data.message);
                        $('#modalerror').modal('show');
                    }
                    if(data.next=='success'){
                        $('.message').html(data.message);
                        $('#modalsuccess').modal('show');
                    }
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'success', {
                        position: 'bottom-right',
                        ui: 'is-dark'
                        });
                    },300);
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            setTimeout(function () {
                                NioApp.Toast(error, 'error', {
                                position: 'bottom-right',
                                ui: 'is-dark'
                                });
                            },500);
                        });
                    }
                }
            });
        });
        </script>
    </body>
</html>