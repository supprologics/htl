@extends('layouts.lecturer',['title'=>'Section'])

@section('css')
    <style>
        .list-grade{
            cursor: pointer
        }
    </style>
@endsection
@section('content-fluid')

    

                <!-- content @s -->
                <div class="nk-content p-0">
                    <div class="nk-content-inner">
                        <div class="nk-content-body p-0">
                            <div class="nk-chat">
                                <div class="nk-chat-aside">
                                    <div class="nk-chat-aside-head">
                                        <div class="nk-chat-aside-user">
                                            <div class="title">All Forums</div>
                                        </div><!-- .nk-chat-aside-user -->
                                    </div><!-- .nk-chat-aside-head -->
                                    <div class="nk-chat-aside-body" data-simplebar>
                                        <div class="nk-chat-list">
                                            <h6 class="title overline-title-alt">All</h6>
                                            <ul class="chat-list">
                                                <li class="chat-item" id="all">
                                                    <a class="chat-link chat-open" href="#">
                                                        <div class="chat-media user-avatar">
                                                            <img src="./images/avatar/b-sm.jpg" alt="">
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">All Topics</div>
                                                                <span class="time">in all forums</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">
                                                                    
                                                                    <p></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--
                                                        <div class="chat-actions">
                                                            <div class="dropdown">
                                                                <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#">Mute</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="#">Hide</a></li>
                                                                        <li><a href="#">Delete</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="#">Mark as Unread</a></li>
                                                                        <li><a href="#">Ignore Messages</a></li>
                                                                        <li><a href="#">Block Messages</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    -->
                                                </li><!-- .chat-item -->
                                                
                                            </ul><!-- .chat-list -->
                                        </div><!-- .nk-chat-list -->
                                        <div class="nk-chat-list">
                                            <h6 class="title overline-title-alt">Lesson Forums</h6>
                                            <ul class="chat-list">
                                                
                                                @foreach ($mysubjects as $subject)
                                                <li class="chat-item" id="subject{{$subject->id}}">
                                                    <a class="chat-link chat-open" href="#">
                                                        <div class="chat-media user-avatar">
                                                            <img src="./images/avatar/b-sm.jpg" alt="">
                                                        </div>
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">{{ $subject->name }}</div>
                                                                <span class="time"></span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">
                                                                    
                                                                    <p>{{ $subject->sections->count() }} Forums</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--
                                                        <div class="chat-actions">
                                                            <div class="dropdown">
                                                                <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#">Mute</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="#">Hide</a></li>
                                                                        <li><a href="#">Delete</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="#">Mark as Unread</a></li>
                                                                        <li><a href="#">Ignore Messages</a></li>
                                                                        <li><a href="#">Block Messages</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    -->
                                                </li><!-- .chat-item -->
                                                @endforeach
                                                
                                            </ul><!-- .chat-list -->
                                        </div><!-- .nk-chat-list -->
                                    </div>
                                </div><!-- .nk-chat-aside -->
                                <div class="nk-chat-body ">
                                    <div class="nk-msg-head">
                                        <h4 class="title d-none d-lg-block">Subject Topics</h4>
                                        <div class="nk-msg-head-meta">
                                        </div>
                                    </div>
                                    <div class="nk-chat-panel" >
                                        <div id="ct">
                                            @foreach ($topics as $topic)
                                                <div class="card card-bordered subject{{ $topic->lesson->section->subject->id }}">
                                                    <div class="card-inner">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a href="{{ route('forum.topic',$topic->id) }}" style="float: right" class="btn btn-dim btn-outline-primary">View</a>
                                                                <h5 class="card-title">{{ $topic->topic }}</h5>
                                                                <p class="card-text">
                                                                    
                                                                    @if (strlen($topic->description)> 300)
                                                                         {{ substr($topic->description,0,300) }}...
                                                                    @else
                                                                        {{ $topic->description }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        

                                    </div><!-- .nk-reply -->
                                </div><!-- .nk-chat-body -->
                            </div><!-- .nk-chat -->
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            

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


    <script src="{{ asset('/admin/js/apps/chats.js?ver=2.0.0') }}"></script>
    <script>
        $(document).ready(function(){
            $('.nk-chat-body').removeClass('profile-shown');
            $('#content-fill').remove();
            $('#profile_view_toggle').removeClass('active');
        });

        
        var $btns = $('.chat-item').click(function() {
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

