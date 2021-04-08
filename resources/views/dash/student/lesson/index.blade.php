@extends('layouts.student',['title'=>'Syllabus Section'])

@section('css')
    <style>
        .card-aside{
            min-height: 100%;
        }
        
    </style>
@endsection
@php
    $lesson_id=$lesson->id;;
@endphp
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title" id="page-head"><div style="display: inline-flex"><div id="lesson_head">{{ $lesson->name }}</div>
                     <br><strong class="text-primary small">{{ $lesson->section->name }}</strong></h3>
                
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <span class="text-base">{{ $lesson->section->description }}</span>
                    </ul>
                </div>
                
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li><a href="{{route('student.mysubject',$lesson->section->subject_id)}}" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></li>
                        </ul>
                    </div>
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
                            <a class="nav-link active" data-toggle="tab" href="#tabItem1"><em class="icon ni ni-user-circle"></em><span>Overview</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabItem2"><em class="icon ni ni-repeat"></em><span>Attachments</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabItem3"><em class="icon ni ni-file-text"></em><span>Assignments</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabItem4"><em class="icon ni ni-file-text"></em><span>Forum</span></a>
                        </li>
                        <li class="nav-item nav-item-trigger d-xxl-none">
                            <a  class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabItem1">
                            <div class="card-inner">
                                <div class="nk-block" >
                                    <div class="nk-block-between mb-3">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">Main Content</h6>             
                                        </div>
                                        <div class="">
                                            <a href="" class="btn btn-success btn-sm d-none d-sm-inline-flex " style="color: white"><em class="icon ni ni-plus"></em><span>Go To Forum</span></a>
                                        </div>
                                        
                                    </div>
                                    @if (isset($lesson->video))
                                    <div class="video-player">
                                        <div id="lesson-{{$lesson->id}}" style="border-top: 1px dashed #96A7BC;">
                                            <div class="row my-3" >
                                                <div class="nk-block text-center mx-auto">

                                                    <video id="my-video" width="100%" style="display: block; margin: 0 auto;"
                                                     poster="images/login.jpg" controls>
                                                        <source src="{{ $lesson->video }}" type="video/mp4">
                                                        Your browser does not support HTML video.
                                                    </video>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div><!-- .nk-block -->
                                <div class="nk-divider divider md"></div>
                                <div class="nk-block">
                                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                                        <h5 class="title">Lesson Description</h5>
                                    </div><!-- .nk-block-head -->
                                    <div class="bq-note">
                                        <div class="bq-note-item">
                                            <div class="bq-note-text">
                                                {!! $lesson->description?$lesson->description:'<h4>'.$lesson->name.'</h4><br>Please update lesson description.' !!}
                                            </div>
                                        </div><!-- .bq-note-item -->
                                    </div><!-- .bq-note -->
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                        </div>
                        <div class="tab-pane" id="tabItem2">
                            <div class="card-inner">
                                <div class="nk-block" >
                                    
                                    <div class="nk-block-between ">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">Lesson Attchments</h6>                
                                        </div>
                                    </div>
                                    <div class="card card-bordered card-preview">
                                        <table class="table table-tranx">
                                            <thead>
                                                <tr class="tb-tnx-head">
                                                    <th class="tb-tnx-info">
                                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                            <span>Name</span>
                                                        </span>
                                                    </th>
                                                    <th class="tb-tnx-action">
                                                        <span>&nbsp;</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="attach">
                                                @if ($lesson->attachments->count() > 0)
                                                @foreach ($lesson->attachments as $attach)
                                                    <tr class="tb-tnx-item" id="attachment-{{ $attach->id}}">
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="title">{{$attach->name}}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="{{route('get.lessonattach',$attach->id)}}">Download</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                    <tr class="tb-tnx-item" id="emptyAttch">
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="title">No Attchments</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-action">
                                                        </td>
                                                    </tr>
                                                    
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                        </div>
                        <div class="tab-pane" id="tabItem3">
                            <div class="card-inner">
                                <div class="nk-block" >
                                    <div class="nk-block-head nk-block-head-line">
                                        <h6 class="title overline-title text-base">Lesson Assignments</h6>
                                    </div><!-- .nk-block-head -->

                                    <div class="" id="assignment-add">

                                        @foreach ($lesson->assignments as $assignment)
                                              
                                            <div class="card card-bordered my-1 assignment{{$assignment->id}}">
                                                <div class="card-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a  class="btn btn-round btn-icon btn-md btn-light mr-1" onclick="answer_assignment({{$assignment->id}})" style="float: right"><em class="icon ni ni-reply"></em></a>
                                                            <h5 class="card-title">{{$assignment->name}}</h5>
                                                            <p class="card-text">{{$assignment->description}}</p>
                                                            <div class="attach-foot">
                                                                <span class="attach-info">Deadline : {{$assignment->deadline}}</span>
                                                                @if (isset($assignment->file))
                                                                    
                                                                    <a class="attach-download link" href="{{route('get.assignmentattach',$assignment->id)}}"><em class="icon ni ni-download"></em><span>Download Attchment</span></a>
                                                                
                                                                @endif
                                                            </div>
                                                            <div class="" id="answer-add{{$assignment->id}}">
                                                                @foreach ($assignment->answers->where('user_id',Auth::user()->id) as $answer)
                                                                    <div class="attach-foot">
                                                                        <span class="attach-info">Submited : {{$answer->created_at}}</span>
                                                                        <span class="attach-info">Mark : {{$answer->mark?$answer->mark:'-'}}</span>
                                                                        <a class="" onclick="answer_view({{$answer->id}},'{{$answer->description}}','{{$answer->file}}','{{$answer->mark?$answer->mark:'Not Marked'}}','{{$answer->remark?$answer->remark:'No Feedback'}}')" >
                                                                            <em class="icon ni ni-eye"></em><span>{{ $answer->remark?'View Feedback':'View'}}</span>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                        </div>
                        <div class="tab-pane" id="tabItem4">
                            <div class="card-inner">
                                <div class="nk-block" >
                                    
                                    <div class="nk-block-between ">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">Forum Topics</h6>                
                                        </div>
                                        <div class="">
                                            <a onclick="add_topic()" class="btn btn-success btn-sm d-none d-sm-inline-flex " style="color: white"><em class="icon ni ni-plus"></em><span>Ask Question</span></a>
                                        </div>
                                    </div>
                                    <div class="" id="topic-add">

                                        @foreach ($lesson->topics as $topic)
                                            <div class="card card-bordered  my-1  topic{{$topic->id}}" >
                                                <div class="card-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a  href="{{ route('forum.topic',$topic->id) }}" class="btn btn-round btn-icon btn-md btn-light mr-1"  style="float: right"><em class="icon ni ni-eye"></em></a>
                                                            @if ($topic->user_id==Auth::user()->id)
                                                            <a class="btn btn-round btn-icon btn-md btn-light mr-1 topic-edit"  data-id="{{$topic->id}}" data-topic="{{ $topic->topic }}" data-description="{{ $topic->description }}" style="float: right"><em class="icon ni ni-edit"></em></a>
                                                            @endif
                                                            <h5 class="card-title">{{ $topic->topic }}</h5>
                                                            <p class="card-text">{{ $topic->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                        </div>
                    </div>
                </div><!-- .card-content -->
                <div class=" card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                    <div class="card-inner-group" data-simplebar>
                        
                        <div class="card-inner card-inner-sm">
                            <ul class="btn-toolbar justify-center gx-1">
                 
                                    
                            <div class="profile-balance">
                                <div class="profile-balance-group gx-4">
                                    <div class="profile-balance-sub">
                                        <div class="profile-balance-amount">
                                            <div class="number"><small class="currency currency-usd">Qucik </small>Links</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </ul>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <h6 class="overline-title-alt mb-2">{{$lesson->section->subject->name}}</h6>

                            @foreach ($lesson->section->subject->sections as $section)
                                
                                <div class="row g-3">
                                    <div class="col-12">
                                        <span class="sub-text"><span>&#8226;</span> {{ $section->name }}</span>
                                        @foreach ($section->lessons as $lesson)
                                            @if ($lesson->approve==1)
                                                <span class="ml-4"><span >&#x25B8;</span><a href="{{ route('student.lesson',$lesson->id)}}">{{$lesson->name }}</a></span><br>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            @endforeach

                        </div><!-- .card-inner -->

                    </div><!-- .card-inner -->
                </div><!-- .card-aside -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->



    <!-- Add Modal -->
    <div class="modal fade" tabindex="-1" id="modalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Topic Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="add-form" action="" method="POST" name="add-form" >
                        @csrf
                        <div class="row g-4">
                            <input type="hidden" name="lesson_id" value="{{ $lesson_id }}">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="topic">Topic *</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="topic" name="topic" value="{{ old('topic') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description *</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">Ask Question</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Edit Modal -->
    <div class="modal fade" tabindex="-1" id="EditmodalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Topic Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="edit-form" action="" method="POST" name="add-form" >
                        @csrf
                        <div class="row g-4">
                            <input type="hidden" name="edit_id"  id="edit_id" value="">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit_topic">Topic *</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit_topic" name="edit_topic" value="{{ old('edit_topic') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit_description">Description *</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="edit_description" id="edit_description" cols="30" rows="5">{{ old('edit_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">Ask Question</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Assignment Answer Modal -->
    <div class="modal fade" tabindex="-1" id="AssignmentmAnswerodalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignment_name">Assignment Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="assignment-answer-add-form" action="" method="POST" name="assignment-answer-add-form" >
                        @csrf
                        <div class="row g-4">
                            <input type="hidden" name="assignment_id" id="assignment_id" value="">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="assignment_answer_description">Answer as text *</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="assignment_answer_description" id="assignment_answer_description" cols="30" rows="5">{{ old('assignment_answer_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="assignment_answer_file">Assignment Attachment </label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="assignment_answer_file" id="assignment_answer_file">
                                            <label class="custom-file-label" for="assignment_answer_file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">Submit Answer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Assignment Answer Modal -->
    <div class="modal fade" tabindex="-1" id="AnswerViewModalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignment_name">Answer Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="answer_view_description">Answer as text *</label>
                                    <div class="form-control-wrap">
                                        <textarea disabled class="form-control" name="answer_view_description" id="answer_view_description" cols="30" rows="5">{{ old('answer_view_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="attach-foot">
                                        <a class="attach-download link answer-attach-downlaod" href=""><em class="icon ni ni-download"></em><span>Download Attchment</span></a>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card bg-light" >
                                    <div class="card-body">
                                        <div class="row">
                                            Marks : <p id="answer-marks"></p>
                                        </div>
                                        <div class="row">
                                            Feedback : <p id="answer-feedback"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    
    <script type="text/javascript">
    
    
    </script>
    
    <script>

            $(document).ready(function(){
                $('#my-video').bind('contextmenu',function() { return false; });
            });


            function add_topic(){

                $('#topic').val('');
                $('#description').val('');
                $('#modalForm').modal('show');
            }

            $('form#add-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                type:'POST',
                url: "{{ route('forum.topicadd') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#topic-add').append(data.topic);
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

            $(document).on("click", ".topic-edit", function(){
                $('#edit_id').val($(this).data('id'));
                $('#edit_topic').val($(this).data('topic'));
                $('#edit_description').val($(this).data('description'));
                $('#EditmodalForm').modal('show');
            });

            $('form#edit-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
                $.ajax({
                type:'POST',
                url: "{{ route('forum.topicedit') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                    success: function(data) {
                        $('.'+data.topic_id).remove();
                        $('#topic-add').append(data.topic);
                        $('#EditmodalForm').modal('hide');
                        $('#edit-form')[0].reset();
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
            

            
        //assignment
        function answer_assignment(id){
            console.log(id);
            $('#assignment_id').val(id);
            $('#assignment_answer_description').val('');
            $('#assignment_answer_file').val('');
            $('#AssignmentmAnswerodalForm').modal('show');
        }

        $('form#assignment-answer-add-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('assignment.answer') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#'+data.assignment).append(data.answer);
                    $('#AssignmentmAnswerodalForm').modal('hide');
                    $('#assignment-add-form')[0].reset();
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
        
        
        function answer_view(id,description,file,mark,remark){
            console.log(id);
            $('#answer_view_description').val(description);
            $('#answer-marks').html(mark);
            $(".answer-attach-downlaod").attr("href", "/assignment-answer-file/"+id)
            $('#answer-feedback').html(remark);
            $('#AnswerViewModalForm').modal('show');
        }
    </script>
@endsection

