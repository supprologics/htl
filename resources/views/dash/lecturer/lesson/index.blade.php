@extends('layouts.lecturer',['title'=>'Section'])

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <style>
        .card-aside{
            min-height: 100%;
        }
        .ck-editor__editable {
            min-height: 180px;
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
                    <div id="update-status" class="ml-3"></div></div> 
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
                            <li><a href="{{route('lecturer.mysubject',$lesson->section->subject_id)}}" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></li>
                            <li><a onclick="toapprovel()" class="btn btn-success btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>To Approvel</span></a></li>
                            
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
                                        
                                        @if ($lesson->video<>null)
                                            <div class="">
                                                <a id="add-video" class="btn btn-success btn-sm d-none d-sm-inline-flex " style="color: white"><em class="icon ni ni-plus"></em><span>Edit Video</span></a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row video-uploader-toggle mb-3 " style="border:  1px dashed #18B389; border-radius:10px; display:none;">
                                        <div class="col-7 my-5 " >
                                            <form id="uploadForm1" class=" m-3" enctype="multipart/form-data" >
                                                @csrf
                                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input" id="fileInput" required>
                                                            <label class="custom-file-label " for="fileInput">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" name="submit" class="btn btn-success">Upload</button>
                                                </div>
                                            </form>
                                            <!-- Progress bar -->
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" ></div>
                                            </div>
                                            <!-- Display upload status -->
                                            <div id="uploadStatus"></div>
                                        </div>
                                        <div class="col-5  my-5" style="border-left: 2px dashed #18B389;">
                                            <button type="button" name="submit" class="btn btn-lg btn-success" style="
                                            position: absolute;
                                            top: 50%;
                                            left: 50%;
                                            -ms-transform: translate(-50%, -50%);
                                            transform: translate(-50%, -50%);">Record Video</button>
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
                                    @else
                                    <div class="row video-uploader mb-3" style="border:  1px dashed #18B389; border-radius:10px; ">
                                        <div class="col-7 my-5" >
                                            <form id="uploadForm1" class=" m-3" enctype="multipart/form-data" >
                                                @csrf
                                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input" id="fileInput" required>
                                                            <label class="custom-file-label " for="fileInput">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="submit" name="submit" class="btn btn-success">Upload</button>
                                                </div>
                                            </form>
                                            <!-- Progress bar -->
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                            </div>
                                            <!-- Display upload status -->
                                            <div id="uploadStatus"></div>
                                        </div>
                                        <div class="col-5 text-center my-5" style="border-left: 2px dashed #18B389;">
                                            <button type="button" name="submit" class="btn btn-lg btn-success">Record Video</button>
                                        </div>
                                    </div>
                                    @endif
                                </div><!-- .nk-block -->
                                <div class="nk-divider divider md"></div>
                                <div class="nk-block">
                                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                                        <h5 class="title">Lesson Description</h5>
                                        <a onclick="add()" class="link link-sm">+ Update Description</a>
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
                                        <div class="mb-3">
                                            <a onclick="addattchment()" class="btn btn-success btn-sm d-none d-sm-inline-flex" style="color: white"><em class="icon ni ni-plus"></em><span>Add</span></a>
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
                                                                        <li><a onclick="del_attach({{$attach->id}})" class="remove_file" id="{{$attach->id}}">Remove</a></li>
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
                                    <div class="nk-block-between ">
                                        <div class="nk-block-head nk-block-head-line">
                                            <h6 class="title overline-title text-base">Lesson Assignments</h6>
                                        </div><!-- .nk-block-head -->
                                        <div class="">
                                            <a onclick="add_assignment()" class="btn btn-success btn-sm d-none d-sm-inline-flex " style="color: white"><em class="icon ni ni-plus"></em><span>Add Assignment</span></a>
                                        </div>
                                    </div>

                                    
                                    <div class="" id="assignment-add">

                                        @foreach ($lesson->assignments as $assignment)
                                              
                                            <div class="card card-bordered my-1 assignment{{$assignment->id}}">
                                                <div class="card-inner">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a  class="btn btn-round btn-icon btn-md btn-light mr-1" onclick="del_assignment({{$assignment->id}})" style="float: right"><em class="icon ni ni-trash"></em></a>
                                                            <a  class="btn btn-round btn-icon btn-md btn-light mr-1 assignment-edit"  data-id="{{$assignment->id}}" data-name="{{ $assignment->name }}" data-description="{{ $assignment->description }}" data-deadline="{{ $assignment->deadline }}" style="float: right"><em class="icon ni ni-edit"></em></a>
                                                            <h5 class="card-title">{{$assignment->name}}</h5>
                                                            <p class="card-text">{{$assignment->description}}</p>
                                                            <div class="attach-foot">
                                                                <span class="attach-info">Deadline : {{$assignment->deadline}}</span>
                                                                @if (isset($assignment->file))
                                                                    
                                                                    <a class="attach-download link" href="{{route('get.assignmentattach',$assignment->id)}}"><em class="icon ni ni-download"></em><span>Download Attchment</span></a>
                                                                
                                                                @endif
                                                            </div>
                                                            <div class="attach-foot">
                                                                <span class="attach-info">Answer Count : {{$assignment->answers->count()}}</span>
                                                                
                                                                <span class="attach-info "><a href="{{ route('assignment.answersview',$assignment->id) }}"><em class="icon ni ni-eye"></em><span>View Answers</span></a></span>
                                                                
                                                                <span class="attach-download link">Marked Count : {{$assignment->answers->whereNotNull('mark')->count()}}</span>
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
                                                            @if (Auth::user()->role_id!=3)
                                                            <a  onclick="del_topic({{$topic->id}})"  class="btn btn-round btn-icon btn-md btn-light mr-1"  style="float: right"><em class="icon ni ni-trash"></em></a>
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
                <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                    <div class="card-inner-group" data-simplebar>
                        <div class="card-inner">
                            <div class="user-card user-card-s2">
                                <div class="user-avatar lg bg-primary">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <div class="badge badge-outline-light badge-pill ucap">Lecturer</div>
                                    <h5>{{Auth::user()->name}}</h5>
                                    <span class="sub-text">{{Auth::user()->email}}</span>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner card-inner-sm">
                            <ul class="btn-toolbar justify-center gx-1">
                 
                                    
                            <div class="profile-balance">
                                <div class="profile-balance-group gx-4">
                                    <div class="profile-balance-sub">
                                        <div class="profile-balance-amount">
                                            <div class="number">0 <small class="currency currency-usd">Lesson Views</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </ul>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="row text-center">
                                <div class="col">
                                    <div class="profile-stats">
                                        <span class="amount desc-stats">@if ($lesson->description==null)
                                            Empty
                                        @else
                                            Filled
                                        @endif</span>
                                        <span class="sub-text">Description</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="profile-stats">
                                        <span class="amount attach-amount">{{ $lesson->attachments->count()}}</span>
                                        <span class="sub-text">Attachments</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="profile-stats">
                                        <span class="amount">{{ $lesson->assignments->count()}}</span>
                                        <span class="sub-text">Assignments</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <h6 class="overline-title-alt mb-2">Dates</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <span class="sub-text">Create At:</span>
                                    <span>{{$lesson->created_at->format('M d Y g:i A')}}</span>
                                </div>
                                <div class="col-12">
                                    <span class="sub-text">Last Update At:</span>
                                    <span>{{$lesson->updated_at->format('M d Y g:i A')}}</span>
                                </div>
                            </div>
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
                    <h5 class="modal-title">Lesson Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                    <form id="add-form" action="" method="POST" name="add-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="lesson_desc_id" id="lesson_desc_id" value="{{ $lesson->id }}">
                        <div class=" form-group">
                            <label class="form-label" for="lesson_description">Description</label>
                            <div class="form-control-wrap">
                                <textarea name="lesson_description" id="lesson_description" cols="30" rows="8" class="form-control ck-editor__editable">{{$lesson->description}}</textarea>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-7 offset-lg-5">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Add  modalFormAttachement -->
    <div class="modal fade" tabindex="-1" id="modalFormAttachement"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Attachment Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                    <form id="attachment-form" action="" method="POST" enctype="multipart/form-data" name="attachment-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="attch_lesson_id" id="attch_lesson_id" value="{{ $lesson->id }}">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="lesson_attch_name">Attachment Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="lesson_attch_name"name="lesson_attch_name" value="{{ old('lesson_attch_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="lesson_attach_file_path">Document *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="lesson_attach_file_path" id="lesson_attach_file_path">
                                            <label class="custom-file-label" for="lesson_attach_file_path">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-7 offset-lg-5">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modalFormStatus -->
    <div class="modal fade" tabindex="-1" id="modalFormStatus"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set Lesson Status</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                    <form id="status-form" action="" method="POST"  name="status-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="lesson_status_id" id="lesson_status_id" value="{{ $lesson->id }}">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="lesson_name">Lesson Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="lesson_name"name="lesson_name" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="status_type">Status *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg" name="status_type" id="status_type">
                                            <option value="0">Keep as draft</option>
                                            <option value="3">Apply to Publish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-7 offset-lg-5">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete modalFormAttachement -->
    <div class="modal fade" tabindex="-1"  role="dialog" id="deleteModalAttach" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="deleteformAttch">
                <input type="hidden" name="id_delete_attach" id="id_delete_attach" value="">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                            <h4 class="nk-modal-title">Delete Grade!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Are you sure, you want to <strong>delete</strong> this grade ?</div>
                                <span class="sub-text-sm">This action can not be revert.</span>
                            </div>
                            <div class="nk-modal-action">
                                <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                <button type="button"  onclick="submit_delete()" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </div><!-- .modal-body -->
                </div>
            </form>
        </div>
    </div>


    <!-- forum topics -->
        <!-- Add Modal -->
        <div class="modal fade" tabindex="-1" id="TopicmodalForm"  aria-modal="true" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Topic Info</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form id="topic-add-form" action="" method="POST" name="topic-add-form" >
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
                        <form id="topic-edit-form" action="" method="POST" name="topic-edit-form" >
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

        
        <!-- delete modalFormAttachement -->
        <div class="modal fade" tabindex="-1"  role="dialog" id="deleteModalTopic" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="post" id="deleteformTopic">
                    <input type="hidden" name="id_delete_topic" id="id_delete_topic" value="">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-lg text-center">
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                                <h4 class="nk-modal-title">Delete This Topic!</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">Are you sure, you want to <strong>delete</strong> this topic ?</div>
                                    <span class="sub-text-sm">This action can not be revert.</span>
                                </div>
                                <div class="nk-modal-action">
                                    <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                    <button type="button"  onclick="submit_delete_topic()" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </div><!-- .modal-body -->
                    </div>
                </form>
            </div>
        </div>
    
    <!--end forum topics -->

    
    <!-- assignments -->
        <!-- Add Modal -->
        <div class="modal fade" tabindex="-1" id="AssignmentmodalForm"  aria-modal="true" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assignment Info</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form id="assignment-add-form" action="" method="POST" name="assignment-add-form" >
                            @csrf
                            <div class="row g-4">
                                <input type="hidden" name="assignment_lesson_id" value="{{ $lesson_id }}">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="assignment_name">Name *</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="assignment_name" name="assignment_name" value="{{ old('assignment_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="assignment_description">Description *</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" name="assignment_description" id="assignment_description" cols="30" rows="5">{{ old('assignment_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="assignment_file">Assignment Attachment *</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="assignment_file" id="assignment_file">
                                                <label class="custom-file-label" for="assignment_file">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="assignment_deadline">Deadline *</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="assignment_deadline" id="assignment_deadline" data-date-format="yyyy-mm-dd" class="form-control date-picker goto-date" value="{{ old('assignment_deadline') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-primary">Add Assignment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Edit Modal -->
        <div class="modal fade" tabindex="-1" id="EditAssignmentmodalForm"  aria-modal="true" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Assignment Info</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form id="assignment-edit-form" action="" method="POST" name="assignment-edit-form" >
                            @csrf
                            
                            <div class="row g-4">
                                <input type="hidden" name="edit_assignment_id" id="edit_assignment_id"  value="">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="edit_assignment_name">Name *</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="edit_assignment_name" name="edit_assignment_name" value="{{ old('edit_assignment_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" for="edit_assignment_description">Description *</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" name="edit_assignment_description" id="edit_assignment_description" cols="30" rows="5">{{ old('edit_assignment_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="edit_assignment_file">Assignment Attachment *</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="edit_assignment_file" id="edit_assignment_file">
                                                <label class="custom-file-label" for="edit_assignment_file">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="edit_assignment_deadline">Deadline *</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="edit_assignment_deadline" id="edit_assignment_deadline" data-date-format="yyyy-mm-dd" class="form-control date-picker goto-date" value="{{ old('edit_assignment_deadline') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md btn-primary">Update Assignment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- delete modalFormAttachement -->
        <div class="modal fade" tabindex="-1"  role="dialog" id="deleteModalAssignment" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="post" id="deleteformAssignment">
                    <input type="hidden" name="id_delete_assignment" id="id_delete_assignment" value="">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-lg text-center">
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                                <h4 class="nk-modal-title">Delete This Assignment!</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">Are you sure, you want to <strong>delete</strong> this assignment ?</div>
                                    <span class="sub-text-sm">This action can not be revert.</span>
                                </div>
                                <div class="nk-modal-action">
                                    <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                    <button type="button"  onclick="submit_delete_assignment()" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </div><!-- .modal-body -->
                    </div>
                </form>
            </div>
        </div>

        
        <!-- Edit Modal -->
        <div class="modal fade" tabindex="-1" id="AssignmentAnswers"  aria-modal="true" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Assignment Info</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div id="accordion" class="accordion">
                            <div class="accordion-item">
                                <a href="#" class="accordion-head" data-toggle="collapse" data-target="#accordion-item-1">
                                    <h6 class="title">What is Dashlite?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse show" id="accordion-item-1" data-parent="#accordion">
                                    <div class="accordion-inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-2">
                                    <h6 class="title">What are some of the benefits of receiving my bill electronically?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="accordion-item-2" data-parent="#accordion" >
                                    <div class="accordion-inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-3">
                                    <h6 class="title">What is the relationship between Dashlite and payment?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="accordion-item-3" data-parent="#accordion" >
                                    <div class="accordion-inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-4">
                                    <h6 class="title">What are the benefits of using Dashlite?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="accordion-item-4" data-parent="#accordion" >
                                    <div class="accordion-inner">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                          </div>  
                    </div>
                </div>
            </div>
        </div>
    
    <!--end forum assignments -->
@endsection


@section('script')
    
    <script type="text/javascript">
        var lesson_id='{{$lesson->id}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            statusload();
        });
        function statusload(){
            $.ajax({
                type:'POST',
                url: "{{ route('lesson.getstatus') }}",
                data:{
                    'id':lesson_id,
                },
                success: function(data) {
                    $('#update-status').empty();
                    $('#update-status').append(data.status);
                }
            });
        }

        //assignment
        function add_assignment(){

            $('#assignment_name').val('');
            $('#assignment_deadline').val('');
            $('#assignment_file').val('');
            $('#assignment_description').val('');
            $('#AssignmentmodalForm').modal('show');
        }
        $('form#assignment-add-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: "{{ route('assignment.add') }}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#assignment-add').prepend(data.assignment);
                $('#AssignmentmodalForm').modal('hide');
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

        $(document).on("click", ".assignment-edit", function(){
            $('#edit_assignment_id').val($(this).data('id'));
            $('#edit_assignment_name').val($(this).data('name'));
            $('#edit_assignment_deadline').val($(this).data('deadline'));
            $('#edit_assignment_description').val($(this).data('description'));
            $('#EditAssignmentmodalForm').modal('show');
        });

        $('form#assignment-edit-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: "{{ route('assignment.edit') }}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
                success: function(data) {
                    $('.'+data.assignment_id).remove();
                    $('#assignment-add').prepend(data.assignment);
                    $('#EditAssignmentmodalForm').modal('hide');
                    $('#assignment-edit-form')[0].reset();
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
        
        function del_assignment(id) {
            $('#id_delete_assignment').val(id);
            $('#deleteModalAssignment').modal('show');
        }

        function submit_delete_assignment() {
            $.ajax({
                type: "POST",
                url: "{{ route('assignment.hide') }}",
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id_delete_assignment').val(),
                },
                success: function(data) {
                    $('.'+data.remove).remove();
                    $('#deleteModalAssignment').modal('hide');
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'warning', {
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
        }

        
        $(document).on("click", ".view-answers", function(){
            $('#AssignmentAnswers').modal('show');
        });

        //forum topic
        function add_topic(){

            $('#topic').val('');
            $('#description').val('');
            $('#TopicmodalForm').modal('show');
        }

        $('form#topic-add-form').submit(function(e) {
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
                $('#TopicmodalForm').modal('hide');
                $('#topic-add-form')[0].reset();
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

        $(".topic-edit").click(function(){
            $('#edit_id').val($(this).data('id'));
            $('#edit_topic').val($(this).data('topic'));
            $('#edit_description').val($(this).data('description'));
            $('#EditmodalForm').modal('show');
        });

        $('form#topic-edit-form').submit(function(e) {
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
                    $('#topic-edit-form')[0].reset();
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
        
        function del_topic(id) {
            $('#id_delete_topic').val(id);
            $('#deleteModalTopic').modal('show');
        }

        function submit_delete_topic() {
            $.ajax({
                type: "POST",
                url: "{{ route('forum.hide') }}",
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id_delete_topic').val(),
                },
                success: function(data) {
                    $('.'+data.remove).remove();
                    $('#deleteModalTopic').modal('hide');
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'warning', {
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
        }
            
    </script>
    
    <script>
        var title = $("#lesson_head").text();
        function toapprovel() {
            $('#lesson_name').val(title);
            $('#modalFormStatus').modal('show');
        }
        $('form#status-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('lesson.status') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#modalFormStatus').modal('hide');
                    $('#lesson_head').text(data.name);
                    statusload();
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

        // acrodin item1
            CKEDITOR.replace('lesson_description', {
            });

            $(document).ready(function(){
                $('#my-video').bind('contextmenu',function() { return false; });
            });

            $('#add-video').click(function(){
                $('.video-uploader-toggle').toggle('slow','swing');
            });

            $("#uploadForm1, #uploadForm2").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete+'%');
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: "{{ route('lecturer.upload') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $(".progress-bar").width('0%');
                    },
                    error:function(){
                    },
                    success: function(data){
                        $('#fileInput').val('');
                        $('.video-uploader').hide();
                        statusload();

                        setTimeout(function () {
                                toastr.clear();
                                NioApp.Toast(data.message, 'success', {
                                position: 'bottom-right',
                                ui: 'is-dark'
                                });
                            },100);
                        window.location.href = 'lesson-content/'+data.id;
                    },
                    error: function (err) {
                        $(".progress-bar").width('0%');
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

            $("#fileInput").change(function(){
                var allowedTypes = [ 'video/mp4'];
                var file = this.files[0];
                var fileType = file.type;
                if(!allowedTypes.includes(fileType)){
                    setTimeout(function () {
                            toastr.clear();
                            NioApp.Toast('Please upload mp4', 'error', {
                            position: 'bottom-right',
                            ui: 'is-dark'
                            });
                        },100);
                    $("#fileInput").val('');
                    return false;
                }
            });
            
            function add() {
                $('#modalForm').modal('show');
            }

            $('form#add-form').submit(function(e) {
            //ajax ckeditor submit      
                for ( instance in CKEDITOR.instances ) {
                    CKEDITOR.instances[instance].updateElement();
                }
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ route('lesson-content.update') }}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".bq-note-text").empty();
                        statusload();
                        $(".bq-note-text").append(data.description);
                        $("textarea#lesson_description").val(data.description); 
                        $(".desc-stats").text('Filled');
                        $('#modalForm').modal('hide');
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
        // acrodin item1 end
        
        // acrodin item2
            function addattchment() {
                $('#modalFormAttachement').modal('show');
            }
            $('form#attachment-form').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ route('lesson.attachadd') }}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#emptyAttch').remove();
                        $('.attach').append(data.tr);
                        $('.attach-amount').text(data.count);
                        statusload();
                        $('#modalFormAttachement').modal('hide');
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

            function del_attach(id) {
                $('#id_delete_attach').val(id);
                $('#deleteModalAttach').modal('show');
            }

            function submit_delete() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('lessonattach.delete') }}",
                    data:{
                        '_token':$('input[name=_token]').val(),
                        'id':$('#id_delete_attach').val(),
                    },
                    success: function(data) {
                        $('#attachment-'+data.id).remove();
                        $('#deleteModal').modal('hide');
                        $('.attach-amount').text(data.count);
                        setTimeout(function () {
                            toastr.clear();
                            NioApp.Toast(data.message, 'warning', {
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
            }
            
        // acrodin item2 end
	
    </script>
@endsection

