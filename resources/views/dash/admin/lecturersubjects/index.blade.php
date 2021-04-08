@extends('layouts.admin',['title'=>'Lecturer'])

@section('css')
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">{{$lecturer->name}} Subjects</h4>
                <div class="nk-block-des text-soft">
                    <p>Using the most basic table markup, here’s how based tables look by default.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <a href="{{ route('lecturer.index') }}"  class="btn btn-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            </li>
                            <li class="nk-block-tools-opt">
                                <button onclick="subjects({{$lecturer->id}},{{ $lecturer->subjects }})" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Fetch Subjects</span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-preview card-barder">
            <div class="card-inner">


                <table class="table " id="data-table">
                    <thead>
                        <tr >
                            <th>Id</th>
                            <th>Subject Name</th>
                            <th>All Lessons</th>
                            <th>Lecturer Lessons</th>
                            <th width="100px">Actions</th>
                        </tr>
                    </thead>
                </table>
                  
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->

    
    
    <!-- Subject Modal -->
    <div class="modal fade" tabindex="-1" id="SubjectModalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Subject for Lecturer</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="subject-form" action="" method="POST" enctype="multipart/form-data" name="subject-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="lecturer_id" id="lecturer_id">

                        <div class="form-group">
                            <label class="form-label">Select Subject</label>
                            <div class="form-control-wrap">
                                <select class="form-select" multiple="multiple" name="lec_subjects[]" id="lec_subjects" data-placeholder="Select Multiple options">
                                    @foreach ($all_subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            {{ $subject->name }} | {{ $subject->grade->name }} | {{ $subject->medium->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                        </div>
                        
                        <hr>
                        <div class="card card-preview">
                            <div class="">
                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="data-table2">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <!--
                                            <th class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                    <label class="custom-control-label" for="uid"></label>
                                                </div>
                                            </th>
                                            -->
                                            <th class="nk-tb-col"><span class="sub-text">User</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($all_subjects as $subject)
                                            <tr class="nk-tb-item">
                                                <!--
                                                <td class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="uid1">
                                                        <label class="custom-control-label" for="uid1"></label>
                                                    </div>
                                                </td>
                                                -->
                                                <td class="nk-tb-col">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $subject->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span>{{ $subject->grade->name }}</span>
                                                </td>
                                                <td class="nk-tb-col tb-col-md">
                                                    <span class="tb-status text-success">{{ $subject->medium->name }}</span>
                                                </td>
                                            </tr><!-- .nk-tb-item  -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        var lecturer='{{ $lecturer->id }}';
        
        NioApp.DataTable.init = function () {
            NioApp.DataTable('#data-table', {
            responsive: {
                details: true
            },
            processing: true,
            serverSide: true,
            ajax: 'lecturer-sub-getdata/'+lecturer,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'subject_id', name: 'subject_id' },
                { data: 'lesson_count', name: 'lesson_count' },
                { data: 'lec_lesson_count', name: 'lec_lesson_count' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            });
            $.fn.DataTable.ext.pager.numbers_length = 7;
        }; // Extra @v1.1

        

        

        
        function add() {
            $('#name').val('');
            $('#email').val('');
            $('#modalForm').modal('show');
            $("#lec_subjects option:selected").removeAttr("selected");
        }

        $("form#add-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('lecturer.add') }}",
                type: 'POST',
                data: $("#add-form").serialize(),
                success: function(data) {
                    $('#data-table').DataTable().ajax.reload();
                    $('#modalForm').modal('hide');
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'success', {
                        position: 'bottom-right',
                        ui: 'is-dark'
                        });
                    },100);
                    subjects(data.lec_id,'');
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
        

        function edit(id, name, email) {
            $('#edit_id').val(id);
            $('#edit_name').val(name);
            $('#edit_email').val(email);
            $('#EditModalForm').modal('show');
        }

        $("form#edit-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('lecturer.edit') }}",
                type: 'POST',
                data: $("#edit-form").serialize(),
                success: function(data) {
                    $('#data-table').DataTable().ajax.reload();
                    $('#EditModalForm').modal('hide');
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'info', {
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

        
        function del(id) {
            $('#delete_id').val(id);
            $('#deleteModal').modal('show');
        }

        $("form#delete-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('lecturer.delete') }}",
                type: 'POST',
                data: $("#delete-form").serialize(),
                success: function(data) {
                    $('#data-table').DataTable().ajax.reload();
                    $('#deleteModal').modal('hide');
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
        });

        
        function subjects(id, subjects) {
            console.log(id,subjects);
            console.log(subjects);
            var subject_array = [];
            for(var i = 0; i < subjects.length; i++)
            {
                subject_array = subject_array.concat(subjects[i]['id']);
            }
            console.log(subject_array);
            $('#lecturer_id').val(id);
            
            $('#lec_subjects').val(subject_array).change();
            $('#SubjectModalForm').modal('show');
        }

        $("form#subject-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('lecturer.subject') }}",
                type: 'POST',
                data: $("#subject-form").serialize(),
                success: function(data) {
                    $('#data-table').DataTable().ajax.reload();
                    $('#SubjectModalForm').modal('hide');
                    $("#lec_subjects option:selected").removeAttr("selected");
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