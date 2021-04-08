<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Educavo - Education HTML Template</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
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
    <body class="home-style3">
        
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'>
                    <img src="{{ ('assets/images/pre-logo.png') }}" alt="">
                </div>
            </div>
        </div>
        <!--Preloader area End here-->

        <!--Full width header Start-->
            @include('site.partials.navbar')
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
            <!-- Banner Section Start -->
            <div id="rs-banner" class="rs-banner style3">
                <div class="container pt-90 md-pt-50">
                    <div class="banner-content pb-13">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="banner-title white-color wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="3000ms">People Expect to be Bored eLearning.</h1>
                                <div class="banner-desc white-color wow fadeInRight" data-wow-delay="500ms" data-wow-duration="4000ms">Every act of conscious learning requires the willingness to suffer an <br> injury to one’s self-esteem.</div>
                                <ul class="banner-btn wow fadeInUp" data-wow-delay="700ms" data-wow-duration="2000ms">
                                    
                                @auth
                                    <li><a class="readon3" 
                                        @if (Auth::user()->role_id==1)
                                            href="{{ route('admin.home') }}"
                                        @elseif(Auth::user()->role_id==2)
                                            href="{{ route('lecturer.home') }}"
                                        @else 
                                            href="{{ route('student.home') }}"
                                        @endif >Go To Home</a></li>
                                @else
                                    <!--<li><a class="readon3" href="{{ route('login') }}">Login</a></li>-->
                                    <li><a class="readon3 active" href="{{ route('register') }}">Get Started</a></li>
                                @endauth
                                </ul>
                            </div>
                        </div>
                        <div class="banner-image hidden-md">
                            <div id="stuff">
                                <div data-depth="0.3">
                                    <img src="{{ ('assets/images/banner/bnr3-top.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Section End -->

            <!-- About Section Start -->
            <div id="rs-about" class="rs-about style3 pt-100 md-pt-70">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-4 lg-pr-0 md-mb-30">
                            <div class="about-intro">
                                <div class="sec-title">
                                    <div class="sub-title primary">About Us</div>
                                    <h2 class="title mb-21">The End Result of All True Learning</h2>
                                    <div class="desc big">The key to success is to appreciate how people learn, understand the thought process that goes into instructional design, what works well, and a range of differen</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-83 md-pl-15">
                            <div class="row rs-counter couter-area">
                                <div class="col-md-4 sm-mb-30">
                                    <div class="counter-item one">
                                        <img class="count-img" src="{{ ('assets/images/about/style3/icons/1.png') }}" alt="">
                                        <h2 class="number rs-count kplus">2</h2>
                                        <h4 class="title mb-0">Students</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 sm-mb-30">
                                    <div class="counter-item two">
                                        <img class="count-img" src="{{ ('assets/images/about/style3/icons/2.png') }}" alt="">
                                        <h2 class="number rs-count">3.50</h2>
                                        <h4 class="title mb-0">Average CGPA</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-item three">
                                        <img class="count-img" src="{{ ('assets/images/about/style3/icons/3.png') }}" alt="">
                                        <h2 class="number rs-count percent">95</h2>
                                        <h4 class="title mb-0">Graduates</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Section End --> 

            <!-- Subject Categories Section Start -->
            <div class="rs-subject style1 pt-94 pb-70 md-pt-64 md-pb-40">
                <div class="container">
                    <div class="sec-title mb-60 text-center md-mb-30">
                        <div class="sub-title primary">Grades</div>
                        <h2 class="title mb-0">We offered Subjects to following grades</h2>
                    </div>
                    <div class="row">
                        @foreach ($grades as $grade)
                            {{-- 
                            @if ($grade->subjects->count() > 0)
                            --}}
                                <div class="col-lg-3 col-md-3 mb-30 grade-filter" id="grade-main" data-id="{{ $grade->id }}">
                                    <div class="subject-wrap bgc2 text-light ">
                                        <img src="{{ asset('storage/'.$grade->image)}}" alt="" style="width:143px; height:117px">
                                        <h4 class="title grade-filter" id="grade-main" data-id="{{ $grade->id }}"><a >{{ $grade->name }}</a></h4>
                                        <span class="course-qnty ">{{ $grade->subjects->count() }} Subjects</span>
                                    </div>
                                </div>
                            {{-- 
                            @endif
                            --}}
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Subject Categories Section End -->

            <!-- Popular Course Section Start -->
            <div class="rs-popular-courses style2 bg3 pt-94 pb-200 md-pt-64 md-pb-90">
                <div class="container">
                    <div class="sec-title mb-60 text-center md-mb-30">
                        <div class="sub-title primary">Subjects</div>
                        <h2 class="title mb-0">Recent Courses</h2>
                    </div>
                    <div class="row">
                        @php
                            $item_count=0;
                        @endphp
                        @foreach ($subjects as $subject)
                            @php
                                $lessons=0;
                            @endphp
                            @foreach ($subject->sections as $section)
                                @php
                                    $count=$section->lessons->where('approve',1)->count();
                                    $lessons+=$count;
                                @endphp
                            @endforeach
                            {{-- 
                            @if ($lessons>0)
                            --}}
                                <div class="col-lg-3 col-md-6 mb-30">
                                    <div class="course-wrap">
                                        <div class="front-part">
                                            <div class="img-part">
                                                <img src="{{ asset('storage/'.$subject->image) }}" alt="" style="width:100%;height: auto">
                                            </div>
                                            <div class="content-part">
                                                <a class="categorie" href="#">{{$lessons}} Total Lessons</a>
                                                <h4 class="title"><a href="course-single.html">{{$subject->name}}</a></h4>
                                            </div>
                                        </div>
                                        <div class="inner-part">
                                            <div class="content-part">
                                                <h4 class="title"><a href="course-single.html">{{$subject->name}}</a></h4>
                                                <a class="categorie" href="#">{{$lessons}} Total Lessons</a><br>
                                                <a class="categorie" href="#">{{$subject->sections->count()}} Syllabus Sections</a>
                                                <p>
                                                    @if (strlen($subject->description)>200)
                                                        {{ substr($subject->description,0,200) }}...
                                                    @else
                                                        {{ $subject->description }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <!--
                                            <div class="price-btn">
                                                <a href="#">Enroll Subject <i class="flaticon-next"></i></a>
                                            </div>
                                        -->
                                    </div>
                                </div>

                                @php
                                    $item_count++;
                                    if($item_count>7){
                                        break;
                                    }
                                @endphp
                            {{-- 
                            @endif
                            --}}
                        @endforeach
                    </div>
                    <div class="btn-part text-center mt-30">
                        <a class="readon3 dark-hov" href="{{{ route('site.subjects')}}}">View All Courses</a>
                    </div>
                </div>
            </div>
            <!-- Popular Course Section End -->

            <!-- Testimonial Section Start 
            <div class="rs-testimonial style3">
                <div class="container">
                    <div class="sec-title mb-60 text-center md-mb-30">
                        <div class="sub-title primary">Student Reviews</div>
                        <h2 class="title mb-0">What Our Students Says</h2>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/1.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/2.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/3.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/4.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/5.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/6.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/7.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/8.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/9.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="row y-middle no-gutter">
                                <div class="col-md-4">
                                    <div class="user-info">
                                        <img src="{{ ('assets/images/testimonial/style3/10.png') }}" alt="">
                                        <h4 class="name">Saiko Najran</h4>
                                        <span class="designation">Student</span>
                                        <ul class="ratings">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="desc">The charms of pleasure of the moment so blinded by desire that they cannot foresee the pain and trouble that are bound ensue and equal blame belongs to those who fail in their duty.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            Testimonial Section End -->

            <!-- Blog Section Start 
            <div id="rs-blog" class="rs-blog style1 modify1 pt-85 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    <div class="sec-title mb-60 md-mb-30 text-center">
                        <div class="sub-title primary">News Update </div>
                        <h2 class="title mb-0">Latest News & Events</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 pr-60 md-pr-15 md-mb-30">
                            <div class="row no-gutter white-bg blog-item mb-35">
                                <div class="col-md-6">
                                    <div class="image-part">
                                        <a href="#"><img src="{{ ('assets/images/blog/style3/1.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li><i class="fa fa-user-o"></i> Admin</li>
                                            <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                                        </ul>
                                        <h3 class="title"><a href="blog-single.html">University While The Lovely Valley Team Work</a></h3>
                                        <div class="btn-part">
                                            <a class="readon-arrow" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutter white-bg blog-item">                                
                                <div class="col-md-6 order-last">
                                    <div class="image-part">
                                        <a href="#"><img src="{{ ('assets/images/blog/style3/2.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li><i class="fa fa-user-o"></i> Admin</li>
                                            <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                                        </ul>
                                        <h3 class="title"><a href="blog-single.html">High School Program Starting Soon 2021</a></h3>
                                        <div class="btn-part">
                                            <a class="readon-arrow" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 lg-pl-0">
                            <div class="events-short mb-28">
                                <div class="date-part bgc1">
                                    <span class="month">June</span>
                                    <div class="date">20</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie">
                                        <a href="#">Math</a> & <a href="#">English</a>
                                    </div>
                                    <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                                </div>
                            </div>
                            <div class="events-short mb-28">
                                <div class="date-part bgc2">
                                    <span class="month">June</span>
                                    <div class="date">21</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie">
                                        <a href="#">Math</a> & <a href="#">English</a>
                                    </div>
                                    <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                                </div>
                            </div>
                            <div class="events-short mb-28">
                                <div class="date-part bgc3">
                                    <span class="month">June</span>
                                    <div class="date">22</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie">
                                        <a href="#">Math</a> & <a href="#">English</a>
                                    </div>
                                    <h4 class="title mb-0"><a href="blog-single.html">Educational Technology and Mobile Accessories Learning</a></h4>
                                </div>
                            </div>
                            <div class="events-short">
                                <div class="date-part bgc4">
                                    <span class="month">June</span>
                                    <div class="date">23</div>
                                </div>
                                <div class="content-part">
                                    <div class="categorie">
                                        <a href="#">Math</a> & <a href="#">English</a>
                                    </div>
                                    <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Accessories Learning</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             Blog Section End -->

            <!-- Newsletter section start 
            <div class="rs-newsletter style1 mb--124 sm-mb-0 sm-pb-70">
                <div class="container">
                    <div class="newsletter-wrap">
                        <div class="row y-middle">
                            <div class="col-md-6 sm-mb-30">
                                <div class="sec-title">
                                    <div class="sub-title white-color">Newsletter</div>
                                    <h2 class="title mb-0 white-color">Subscribe Us to join <br> Our Community </h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="newsletter-form">
                                    <input type="email" name="email" placeholder="Enter Your Email" required="">
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            Newsletter section end -->
        </div> 
        <!-- Main content End --> 

        <!-- Footer Start -->
            @include('site.partials.footer')
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
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

        <!-- modernizr js -->
        <script src="{{ asset('assets/js/modernizr-2.8.3.min.js')}}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Menu js -->
        <script src="{{ asset('assets/js/rsmenu-main.js')}}"></script> 
        <!-- op nav js -->
        <script src="{{ asset('assets/js/jquery.nav.js')}}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Slick js -->
        <script src="{{ asset('assets/js/slick.min.js')}}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- wow js -->
        <script src="{{ asset('assets/js/wow.min.js')}}"></script>
        <!-- Skill bar js -->
        <script src="{{ asset('assets/js/skill.bars.jquery.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>        
         <!-- counter top js -->
        <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
        <!-- video js -->
        <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script> 
        <!-- parallax-effect js -->
        <script src="{{ asset('assets/js/parallax-effect.min.js')}}"></script>     
        <!-- plugins js -->
        <script src="{{ asset('assets/js/plugins.js')}}"></script>
        <!-- contact form js -->
        <script src="{{ asset('assets/js/contact.form.js')}}"></script>
        <!-- main js -->
        <script src="{{ asset('assets/js/main.js')}}"></script>


        <script>
            $('.grade-filter').click(function(){
                $('#subject-form')[0].reset();
                $('#grade_filter').val($(this).data("id"));
                $('#subject-form').submit() ;
            });
        </script>
    </body>
</html>