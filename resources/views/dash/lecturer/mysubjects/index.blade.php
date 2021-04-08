@extends('layouts.lecturer',['title'=>'Syllabus'])

@section('css')
<style>
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
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">{{ $subject->name }} Syllabus Sections  <br><strong class="text-primary small">{{ $subject->grade->name }} | {{ $subject->medium->name }}</strong></h4>
                <div class="nk-block-des text-soft">
                    <p>{{ $subject->description }}</p>
                </div>
            </div><!-- .nk-block-head-content -->
            @if ($subject->ref_docs->count() >0)
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <button onclick="attach()" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Subject Related Documents</span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
            @endif
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-preview card-barder">
            <div class="card-inner">

                <div id="accordion" class="accordion">
                    @foreach ($subject->sections as $section)
                        
                        <div class="accordion-item">
                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-{{$section->id}}">
                                <h6 class="title">{{$section->name}} </h6>
                                
                                @if ($section->lessons->count() > 0)
                                    <span class="acrodion-badge badge badge-pill badge-success mx-1">{{$section->lessons->count() }} lessons</span>
                                    @foreach ($section->lessons as $lesson)
                                        @if ($lesson->flag==2)
                                            <span class="acrodion-badge badge badge-pill badge-danger mx-1">Rejected</span>
                                        @endif
                                        @if ($lesson->flag==3)
                                            <span class="acrodion-badge badge badge-pill badge-secondary mx-1">On Review</span>
                                        @endif
                                    @endforeach
                                @endif
                                <span class="accordion-icon"></span>
                            </a>
                            <div class="accordion-body collapse  @if ($loop->first) show @endif " id="accordion-item-{{$section->id}}" data-parent="#accordion" >
                                <div class="accordion-inner">
                                    <p>{{$section->description?$section->description:''}}</p>
                                    <div class="ml-4">
                                        @if ($section->lessons->count() > 0)
                                            @foreach ($section->lessons as $lesson)
                                                @if ($lesson->lecturer_id==Auth::user()->id)
                                                    
                                                    <div class="row mt-1">
                                                        <div class="col-5">
                                                            <a href="{{ route('lecturer.lesson',$lesson->id)}}" >
                                                                <span>&#8226;</span>   <span class="ff-base  fw-medium">{{ $lesson->name }}</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-2" style="text-align: right">
                                                            @if ($lesson->flag==0)
                                                                <span class="badge badge-pill badge-outline-info">Draft</span>
                                                            @endif
                                                            @if ($lesson->flag==1)
                                                                <span class="badge badge-pill badge-outline-success">Published</span>
                                                            @endif
                                                            @if ($lesson->flag==2)
                                                                <span class="badge badge-pill badge-outline-danger">Rejected</span>
                                                            @endif
                                                            @if ($lesson->flag==3)
                                                                <span class="badge badge-pill badge-outline-secondary">On Review</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-5">

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        <a onclick="add({{ $section->id }})" class="btn link link-sm mt-3">+ Add Lesson</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>  
                  
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


    <!-- Add Modal -->
    <div class="modal fade" tabindex="-1" id="modalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Lesson</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="add-form" action="{{ route('lecturer.newlesson')}}"  method="POST"  name="add-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="section_id" id="section_id" value="">
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
                        <div class="row g-3">
                            <div class="col-lg-7 offset-lg-5">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Create & Go</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="file-upload" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <div class="nk-upload-list">
                        <h6 class="title">Subject Related Documents</h6>

                        @foreach ($subject->ref_docs as $doc)
                        <div class="nk-upload-item">
                            <div class="nk-upload-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                    <g>
                                        <path d="M50,61H22a6,6,0,0,1-6-6V22l9-11H50a6,6,0,0,1,6,6V55A6,6,0,0,1,50,61Z" style="fill:#599def"></path>
                                        <path d="M25,20.556A1.444,1.444,0,0,1,23.556,22H16l9-11h0Z" style="fill:#c2e1ff"></path>
                                        <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#fff"></rect>
                                        <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#fff"></rect>
                                        <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#fff"></rect>
                                        <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#fff"></rect>
                                    </g>
                                </svg>
                            </div>
                            <div class="nk-upload-info">
                                <div class="nk-upload-title"><span class="title">{{ $doc->name}}</span></div>
                                <div class="nk-upload-size">{{ $doc->types->name}}</div>
                            </div>
                            <div class="nk-upload-action">
                                <a href="{{ route('getfile',$doc->id) }}" class="btn btn-icon " ><em class="icon ni ni-download"></em></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>

@endsection


@section('script')
    <script>
        
        function add(id) {
            $('#section_id').val(id);
            $('#lesson_name').val('');
            $('#modalForm').modal('show');
        }
        

        function attach() {
            $('#file-upload').modal('show');
        }
        
        </script>
@endsection