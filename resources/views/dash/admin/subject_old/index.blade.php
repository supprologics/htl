@extends('layouts.admin',['title'=>'Subjects'])

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Subjects</h4>
                <div class="nk-block-des text-soft">
                    <p>Using the most basic table markup, here’s how based tables look by default.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="{{ route('subject.create')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Subject</span></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-preview">
            <div class="card-inner">

                @include('dash.admin.partials.error')
                @include('dash.admin.partials.session')

                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head ">
                            <th class="nk-tb-col text-left"><span class="sub-text">#</span></th>
                            <th class="nk-tb-col tb-col-mb text-left"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($subjects->reverse() as $subject)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col text-left">
                                {{ $i }}
                            </td>
                            <td class="nk-tb-col  text-left">
                                <span>{{ $subject->name }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{ route('section.index',$subject->id) }}"><em class="icon ni ni-img"></em><span>Syllabus Section</span></a></li>
                                                <li><a href="{{ route('referencedoc.index',$subject->id) }}"><em class="icon ni ni-bag"></em><span>References doc.</span></a></li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('subject.edit',$subject->id)}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                <li><a role="button" onclick="handleDelete({{$subject->id}})"><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <li>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  -->
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    
    @include('dash.admin.subject.include.modal')
@endsection


@section('script')
    <script>
        function handleDelete(id){
            var form= document.getElementById('deleteform')
            form.action='/subject/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection