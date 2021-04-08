@extends('layouts.lecturer',['title'=>'Section'])

@section('css')
    <style>
        .list-grade{
            cursor: pointer
        }
        
        .acrodion-badge{
            position: relative;
            right: 30px;
            float: right;
            margin-right: 15px;
            top: 40%;
            transform: translateY(-100%);
        }
    </style>
@endsection
@section('content')

    
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title" id="page-head"><div style="display: inline-flex"><div id="lesson_head">{{ $assignment->name }}</div>
                <div id="update-status" class="ml-3"></div></div> 
                 <br><strong class="text-primary small">Deadline : {{ $assignment->deadline }}</strong></h3>
                 @if (isset($assignment->file))
                     
                     <a class="attach-download link" href="{{route('get.assignmentattach',$assignment->id)}}"><em class="icon ni ni-download"></em><span>Download Attchment</span></a>
                 
                 @endif
            
            <div class="nk-block-des text-soft">
                <ul class="list-inline">
                    <span class="text-base">{{ $assignment->description }}</span>
                </ul>
            </div>
            
        </div>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li><a href="{{route('lecturer.lesson',$assignment->lesson->id)}}" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block-head -->


<div class="nk-block nk-block-lg">
    <div class="card card-preview card-barder">
        <div class="card-inner">

            <div id="accordion" class="accordion">
                @foreach ($assignment->answers->reverse() as $answer)
                    
                    <div class="accordion-item">
                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-{{$answer->id}}">
                            <h6 class="title">{{$answer->user->name}} </h6>
                            
                            <span class="acrodion-badge badge badge-pill badge-outline-success  mx-1">{{$answer->created_at }} answred</span>
                            @if (is_null($answer->mark))
                                <span class="acrodion-badge badge badge-pill  mx-1 markstatus{{$answer->id}} badge-danger">Not Marked</span>
                            @else
                                <span class="acrodion-badge badge badge-pill  mx-1  markstatus{{$answer->id}} badge-success">Marked</span>
                            @endif
                            <span class="accordion-icon"></span>
                        </a>
                        <div class="accordion-body collapse   " id="accordion-item-{{$answer->id}}" data-parent="#accordion" >
                            <div class="accordion-inner">
                                <p>{{$answer->description?$answer->description:''}}</p>

                                @if (is_null($answer->mark))
                                <a class="attach-download link" href="{{route('assignment.answerattach',$answer->id)}}"><em class="icon ni ni-download"></em><span>Download Attchment</span></a>
                                @endif  
                                <form id="mark-form" action="" method="POST" name="mark-form" data-id="{{ $answer->id }}">
                                    @csrf
                                    <div class="row g-4">
                                        <input type="hidden" name="answer_id" id="answer_id" value="{{ $answer->id }}">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="mark">Mark *</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="mark" name="mark" value="{{ $answer->mark?$answer->mark:old('mark') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label" for="remark">Feedback Note</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="remark" name="remark" value="{{ $answer->remark?$answer->remark:old('remark') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md btn-primary">Marked</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>  
              
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->


@endsection


@section('script')


    <script src="{{ asset('/admin/js/apps/chats.js?ver=2.0.0') }}"></script>
    <script>
        
        
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


            
        
            $('form#mark-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                type:'POST',
                url: "{{ route('assignment.marked') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('.'+data.status).html('Marked');
                    $('.'+data.status).removeClass('badge-danger');
                    $('.'+data.status).addClass('badge-success');
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

