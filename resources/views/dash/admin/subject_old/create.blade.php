@extends('layouts.admin',['title'=>'Subject Create'])

@section('content')
                <!-- content @s -->
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title page-title">{{ isset($subject)?'Edit':'Add'}} Subject</h4>
                            <div class="nk-block-des text-soft">
                                <p class="">* fields are required.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><a href="{{ route('subject.index') }}" class="btn btn-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <!--
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="title nk-block-title"></h4>
                            <div class="nk-block-des">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div> -->

                    @include('dash.admin.partials.error')
                    @include('dash.admin.partials.session')

                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form action="{{ isset($subject)? route('subject.update',$subject->id):route('subject.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                    @csrf
                                @if (isset($subject))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="grade_id">Grade *</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" id="grade_id" name="grade_id">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}"
                                                            @if (isset($subject))
                                                                @if ($grade->id==$subject->grade_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                            >{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="language_id">Medium *</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select" id="language_id" name="language_id">
                                                    @foreach ($mediums as $medium)
                                                        <option value="{{ $medium->id }}"
                                                            @if (isset($subject))
                                                                @if ($medium->id==$subject->language_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                            >{{ $medium->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name{{ isset($subject)?$subject->name:'' }} *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($subject)?$subject->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea  class="form-control" id="description" name="description" >{{ isset($subject)?$subject->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md btn-primary"><em class="icon ni ni-save"></em><span>Save & Next</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- .nk-block -->
                <!-- content @e -->
@endsection