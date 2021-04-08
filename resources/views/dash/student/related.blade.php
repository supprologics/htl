@extends('layouts.student',['title'=>'Section'])

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
                <h3 class="nk-block-title page-title" id="page-head"><div style="display: inline-flex"><div id="lesson_head">Available Subjects for your preferences</div>
                    <div id="update-status" class="ml-3"></div></div> 
                     <br><strong class="text-primary small"></strong></h3>
                
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <span class="text-base">Enroll Subjects related to you.</span>
                        </ul>
                    </div>
                
            </div>
        </div>
    </div><!-- .nk-block-head -->

    
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title"><span>Related Subjects</span> <span id="head-name"></span></h4>
                                <div class="nk-block-des">
                                </div>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Subjects</h6>
                            </div> 

                            <div id="ct">

                                @foreach ($related_subjects as $subject)

                                    <div class="data-item grade{{$subject->grade_id}} " data-toggle="modal" data-target="#profile-edit">
                                        <div class="data-col">
                                            <span class="data-value mx-2" style="min-width:100px ">{{ $subject->name }} - {{ $subject->medium->name }}</span>
                                            
                                        </div>
                                        <div class="data-col data-col-end">
                                            <div class="user-avatar bg-light mx-1 enroll" data-id="{{$subject->id}}" data-name="{{$subject->name}}" data-description="{{$subject->description}}" data-medium="{{$subject->medium->name}}" >
                                                <em class="icon ni ni-eye"></em>
                                            </div>
                                        </div>
                                        
                                    </div><!-- data-item -->

                                @endforeach
                            </div>

                            
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true" style="min-height: 70vh">
                    <div class="card-inner-group" data-simplebar>
                        <div class="card-inner">
                            <div class="user-card">
                                <div class="user-avatar bg-primary">
                                    <em class="icon ni ni-focus"></em>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text"> Preferences</span>
                                    <span class="sub-text">Click <strong><a href="{{ route('mediumandgrade') }}" class="mx-1"> here </a></strong> for change preferences.</span>
                                </div>
                            </div><!-- .user-card -->
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="user-account-info py-0">
                                <h6 class="overline-title-alt">Selected Medium</h6>
                                @foreach ($relatedlanguages as $medium)
                                <span class="badge badge-pill badge-primary ">{{ $medium->name }}</span>
                                @endforeach
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <ul class="link-list-menu">
                                <li class="list-grade" id="all"><a ><em class="icon ni ni-star-fill"></em><span>All Subjects</span></a></li>
                                @foreach ($relatedgrades as $grade)
                                    <li class="list-grade" id="grade{{$grade->id}}"><a ><em class="icon ni ni-star-fill"></em><span>{{ $grade->name}}</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- card-aside -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->

            

    <!-- Modal Alert -->
    <div class="modal fade" tabindex="-1" id="enroll-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <div class="card card-bordered">
                            <img src="{{ asset('images/login.jpg')}}" class="card-img-top" alt="">
                            <div class="card-inner">
                                <h5 class="card-title" id="enroll-head"></h5>
                                <h6 class="" id="enroll-medium"></h6>
                                <p class="card-text" id="enroll-desc"></p>
                                <a id="enroll-subject" data-subject=""  class="btn btn-primary text-white">Enroll Subject</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script>
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

