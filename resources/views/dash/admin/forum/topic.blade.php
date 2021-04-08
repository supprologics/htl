@extends('layouts.admin',['title'=>'Section'])

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
                                            <h6 class="title overline-title-alt">Subject Topics</h6>
                                            <ul class="chat-list">
                                                @foreach ($topics as $topic)
                                                <li class="chat-item is-unread">
                                                    <a class="chat-link " href="{{ route('forum.topic',$topic->id) }}">
                                                        <div class="chat-info">
                                                            <div class="chat-from">
                                                                <div class="name">{{ $topic->topic }}</div>
                                                                <span class="time">{{ $topic->created_at->format('d M y') }}</span>
                                                            </div>
                                                            <div class="chat-context">
                                                                <div class="text">
                                                                    <p>{{ $topic->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- .chat-item -->
                                                @endforeach
                                            </ul><!-- .chat-list -->
                                        </div><!-- .nk-chat-list -->
                                    </div>
                                </div><!-- .nk-chat-aside -->
                                <div class="nk-chat-body ">
                                    
                                    <div class="nk-msg-head">
                                        <h4 class="title d-none d-lg-block">{{ $topic_read->topic }}</h4>
                                        <div class="nk-msg-head-meta">
                                            <div class="d-none d-lg-block">
                                                <ul class="nk-msg-tags">
                                                    <li><span class="label-tag"><em class="icon ni ni-flag-fill"></em> <span>{{ $topic_read->lesson->name }}</span></span></li>
                                                </ul>
                                            </div>
                                            <ul class="nk-msg-actions">
                                                <li><a href="{{ route('lecturer.lesson',$topic_read->lesson->id)}}" class="btn btn-dim btn-sm btn-outline-light"><em class="icon ni ni-left"></em><span>Go To Lesson</span></a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-msg-reply nk-reply" >
                                        <div class="nk-reply-item">
                                            <div class="nk-reply-header">
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-blue">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-name">{{ $topic_read->user->name }}<span>({{ $topic_read->user->role->name }})</span></div>
                                                </div>
                                                <div class="date-time">{{ $topic_read->created_at->format('d M Y - G:i a') }}</div>
                                            </div>
                                            <div class="nk-reply-body">
                                                <div class="nk-reply-entry entry">
                                                    <p>{!! nl2br($topic_read->description) !!}</p>
                                                </div>
                                                <div class="attach-files" id="reply-add">
                                                    @foreach ($topic_read->replies as $reply)
                                                    <div class="nk-reply-item">
                                                        <div class="nk-reply-header">
                                                            <div class="user-card">
                                                                <div class="user-avatar sm bg-pink">
                                                                    <span>ST</span>
                                                                </div>
                                                                <div class="user-name">{{ $reply->user->name }} <span>({{ $reply->user->role->name }})</span></div>
                                                            </div>
                                                            <div class="date-time">{{ $reply->created_at->format('d M Y - G:i a') }}</div>
                                                        </div>
                                                        <div class="nk-reply-body">
                                                            <div class="nk-reply-entry entry">
                                                                <p>{!!  nl2br($reply->reply)  !!}</p>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-reply-item -->
                                                    @endforeach
                                                    
                                                    <div class="attach-foot">
                                                            <div class="nk-chat-editor" style="width: 100%">
                                                                
                                                                <div class="nk-chat-editor-upload  ml-n1">
                                                                    <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt" data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a>
                                                                    
                                                                </div>
                                                                <div class="nk-chat-editor-form">
                                                                    <form id="add-form" action="" method="POST" name="add-form" >
                                                                        @csrf
                                                                        <input type="hidden" name="topic_id" id="topic_id" value="{{ $topic_read->id }}" >
                                                                        <div class="form-control-wrap">
                                                                            
                                                                            <textarea class="form-control form-control-simple no-resize" rows="1" name="reply" id="reply" placeholder="Type your Answer..."></textarea>
                                                                            
                                                                        </div>
                                                                </div>
                                                                <ul class="nk-chat-editor-tools g-2">
                                                                    <li>
                                                                        <button type="submit" class="btn btn-round btn-primary btn-icon"><em class="icon ni ni-send-alt"></em></button>
                                                                    </li></form>
                                                                </ul>
                                                                
                                                            </div><!-- .nk-chat-editor -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .nk-reply-item -->
                                        <!--
                                        <div class="nk-reply-meta">
                                            <div class="nk-reply-meta-info"><span class="who">Iliash Hossian</span> assigned user: <span class="whom">Saiful Islam</span> at 14 Jan, 2020 at 11:34 AM</div>
                                        </div> .nk-reply-meta -->

                                        --

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


        
        $('form#add-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                type:'POST',
                url: "{{ route('forum.addreply') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#reply-add').prepend(data.topic);
                    $('#modalForm').modal('hide');
                    $('#add-form')[0].reset();
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'success', {
                        position: 'bottom-right',
                        ui: 'is-dark'
                        });
                    },100);
                    
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

