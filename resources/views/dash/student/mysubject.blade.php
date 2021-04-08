@extends('layouts.student',['title'=>'My Subjects'])

@section('css')
    <style>
        .list-grade{
            cursor: pointer
        }
    </style>
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title" id="page-head"><div style="display: inline-flex"><div id="lesson_head">My Subjects</div>
                    <div id="update-status" class="ml-3"></div></div> 
                     <br><strong class="text-primary small"></strong></h3>
                
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <span class="text-base">Enrolled Subjects.</span>
                        </ul>
                    </div>
                
            </div>
        </div>
    </div><!-- .nk-block-head -->

    
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-content">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                        

                        <li class="nav-item">
                            <a class="list-grade nav-link " id="all" ><em class="icon ni ni-star-fill"></em><span>All Subjects</span></a>
                        </li>
                        @foreach ($mygrades as $grade)
                            <li class="nav-item">
                                <a class="nav-link list-grade" id="grade{{$grade->id}}" ><em class="icon ni ni-star-fill"></em><span>{{ $grade->name}}</span></a>
                            </li>
                        @endforeach
                    </ul><!-- .nav-tabs -->
                    <div class="card-inner">
                        <div class="nk-block">
                            
                            <div id="ct">

                                @foreach ($mysubjects as $subject)
                                <div class="grade{{$subject->grade_id}}">

                                    <div class="row ">
                                        <div class="col-2"> 
                                            <img src="{{ asset('images/login.jpg')}}" class="card-img-left" alt="">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-inner">
                                                <h5 class="card-title">{{ $subject->name }} <p class="card-text">Medium : {{ $subject->medium->name }} </p></h5>
                                                <p class="card-text">{{ substr($subject->description,0,75)}}</p>
                                            </div>
                                        </div>
                                        @if (auth()->user()->role_id=='3')
                                            <div class="col">
                                                <a href="{{ route('student.mysubject',$subject->id)}}" class="btn btn-primary">Lessons</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="nk-divider divider md"></div>
                                </div>

                                @endforeach
                            </div>

                        </div><!-- .nk-block -->
                    </div><!-- .card-inner -->
                </div><!-- .card-content -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->


@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('.nav-item').removeClass('active');
            $('#all').addClass('active');
        });

        var $btns = $('.list-grade').click(function() {
            if (this.id == 'all') {
                $('#ct > div').show();
            } else {
                var $el = $('.' + this.id).show();
                $('#ct > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');
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
                    '_token':$('input[name=_token]').val(),
                    'subject_id':$(this).data("subject"),
                },
                success: function(data) {
                    $('#enroll-modal').modal('hide');
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
@endsection

