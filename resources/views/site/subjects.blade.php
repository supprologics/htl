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
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
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

        <style>
.course-search-part {
    background-color: #fff;
    border: 1px solid #e0e0e08c;
    margin-bottom: 30px;
    padding: 15px 30px;
    display: inline-flex;
    width: 100%;
}

            .course-view-part {
                display: flex;
                align-items: center;
                float: left;
                width: 90%;
            }

            .view-icons {
                float: left;
                margin-right: 20px;
                line-height: 1;
            }

            .course-search-part .type-form {
    position: relative;
    float: right;
}
.course-search-part .type-form .custom-select-box {
    position: relative;
}

            .course-search-part .type-form select {
    display: block;
    width: 100%;
    min-width: 125px;
    height: 40px;
    line-height: 40px;
    font-size: 14px;
    font-weight: 500;
    color: #ffffff;
    padding: 0 40px 0 20px;
    background: #ff5421;
    border: none;
    border-radius: 4px;
    -webkit-appearance: none;
    -moz-appearance: none;
    -webkit-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    transition: all 300ms ease;
    cursor: pointer;
}
select {
    word-wrap: normal;
}
button, select {
    text-transform: none;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

            type-form select {
                line-height: 40px;
                font-size: 14px;
                font-weight: 500;
                color: #ffffff;
                cursor: pointer;
            }
            .form-inline {  
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

.search-wrap {
    position: relative;
}
.search-wrap [type="search"] {
    border: 1px solid #ddd;
    color: #444444;
    padding: 12px 17px;
    width: 100%;
    border-radius: 5px;
    position: relative;
}
.search-wrap button {
    background: transparent;
    border: medium none;
    color: #505050;
    padding: 11px 15px 12px;
    position: absolute;
    display: block;
    right: 0px;
    top: 0;
    z-index: 10;
    font-size: 20px;
    border-radius: 0 5px 5px;
}
        </style>
    </head>
    <body class="defult-home">
        
        <!--Preloader area start here
        <div id="loader" class="loader orange-color">
            <div class="loader-container">
                <div class='loader-icon'>
                    <img src="{{ asset('assets/images/pre-logo1.png') }}" alt="">
                </div>
            </div>
        </div>
        Preloader area End here-->

        <!--Full width header Start-->
            @include('site.partials.navbar')
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-img">
                    <img src="assets/images/breadcrumbs/21.png" style="" alt="Breadcrumbs Image">
                </div>
                <div class="breadcrumbs-text white-color">
                    <h1 class="" style="color: #2a91ff; font-size:none">Course Grid 02</h1>
                </div>
            </div>
            <!-- Breadcrumbs End -->

            <!-- Popular Courses Section Start -->
            <div id="rs-popular-courses" class="rs-popular-courses style3 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">                 
                    <div class="row">    
                        
                        <div class="course-search-part row">
                            <div class=" col-md-6">
                                <div class="widget-area">
                                    <div class="search-wrap">
                                        <input type="search" placeholder="Search subjects.." name="search_query" id="search_query" class="search-input" value="">
                                        <button type="submit" id="search-query-btn" value="Search"><i class=" flaticon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="type-form col-md-6 " >
                                <form method="post" action="mailer.php">
                                    <!-- Form Group -->
                                    <div class="form-group mb-0 form-inline " style="float: right">
                                        <div class="custom-select-box mt-2">
                                            <select id="language_select" class="">
                                                <option value="">Select Medium</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id}}">{{ $language->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>   
                                    
                                        <div class="custom-select-box mx-3 mt-2" >
                                            <select id="grade_select" class="">
                                                <option value="">Select Grade</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id}}">{{ $grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <button type="button" class="btn btn-warning search_filter mt-2">Apply Filters</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                                    
                        @foreach ($subjects as $subject)  
                            @php
                            $lessons=0;
                            foreach ($subject->sections as $section){
                                $count=$section->lessons->where('approve',1)->count();
                                $lessons+=$count;
                            }
                            @endphp  
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
                                <div class="courses-item">
                                    <div class="img-part">
                                        <a href="{{route('site.subject',$subject->id) }}">
                                        <img src="{{ asset('storage/'.$subject->image) }}" alt=""></a>
                                    </div>
                                    <div class="content-part">
                                        <span><a class="categories">{{ $subject->grade->value }} {{ $subject->medium->grade_in_lang }}</a></span>
                                        <ul class="meta-part">
                                            
                                            <li class="user">{{ $subject->medium->name }}</li>
                                        </ul>
                                        <h3 class="title"><a href="{{route('site.subject',$subject->id) }}">{{ $subject->name }}</a>
                                            
                                            @if ($lessons==0)
                                            <span class="badge badge-warning" style="font-size: 10px;
                                            vertical-align: top;
                                            top: 10px; 
                                            position: relative;">Pending</span>
                                            @endif
                                            
                                        </h3>
                                        <div class="bottom-part">
                                            <div class="info-meta">
                                                <ul>            
                                                    <li class="user"><i class="fa fa-user"></i> {{ $subject->students->count() }} Students</li>
                                                </ul>
                                            </div>
                                            <div class="btn-part enroll" style="cursor:pointer" data-id="{{$subject->id}}" data-name="{{$subject->name}}" data-description="{{$subject->description}}" data-medium="{{$subject->medium->name}}">
                                                <a >Enrol Now<i class="flaticon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       @endforeach
                    </div>
                </div>
            </div>
            <!-- Popular Courses Section End -->

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

        <!-- enroll modal -->
        <div class="modal fade" tabindex="-1" id="enroll-modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <div class="card card-bordered">
                                <img src="{{ asset('images/login.jpg')}}" class="card-img-top" alt="">
                                <div class="card-inner">
                                    <h3 class="card-title" id="enroll-head"></h3>
                                    <h6 class="" id="enroll-medium"></h6>
                                    <p class="card-text" id="enroll-desc"></p>
                                    <a id="enroll-subject" data-subject=""  class="btn btn-primary text-white">Enroll Subject</a>
                                    <a data-dismiss="modal"  class="btn btn-primary text-white">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- enroll modal end -->

        
    
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
        <!-- Menu js -->
        <script src="{{ asset('assets/js/rsmenu-main.js') }}"></script> 
        <!-- wow js -->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>     
        <!-- plugins js -->
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>  
        <!-- contact form js -->
        <script src="{{ asset('assets/js/contact.form.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        @if ($current_filter)
            <script>
                var current_grade='{{ $current_filter[0] }}';
                var current_medium='{{ $current_filter[1] }}';
                var current_query='{{ $current_filter[2] }}';
                console.log(current_medium);
            </script>
        @endif

        <script>

            $(document).ready(function(){    
                $('#grade_select').val(current_grade).change();
                $('#language_select').val(current_medium).change();
                $('#search_query').val(current_query);
            });

            $('.search_filter').on('click', function() {
                $('#grade_filter').val($('#grade_select').val());
                $('#language_filter').val($('#language_select').val());
                $('#search_filter').val($('#search_query').val());
                $('#subject-form').submit() ;
            });

            
            $('#search-query-btn').on('click', function() {
                $('#grade_filter').val($('#grade_select').val());
                $('#language_filter').val($('#language_select').val());
                $('#search_filter').val($('#search_query').val());
                $('#subject-form').submit() ;
            });
            
            $('.enroll').click(function(){
                $('#enroll-head').html($(this).data("name"));
                $('#enroll-medium').html($(this).data("medium"));
                $('#enroll-desc').html($(this).data("description"));
                $("#enroll-subject").data("subject", $(this).data("id"));
                $('#enroll-modal').modal('show');
            });

            
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