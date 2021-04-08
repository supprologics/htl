@extends('layouts.admin',['title'=>'Lecturer'])

@section('css')
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Students</h4>
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
                                <!--
                                <button onclick="add()"  class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Lecturer</span></button>
                                -->
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->

    <!-- Add Modal -->
    <div class="modal fade" tabindex="-1" id="modalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lecturer Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="add-form" name="add-form" class="gy-3">
                        @csrf
                        <input type="hidden" name="role_id" id="role_id" value="2" >
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="name">Lecturer Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name"name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="email"name="email" value="{{ old('email') }}">
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

    
    <!-- Edit Modal -->
    <div class="modal fade" tabindex="-1" id="EditModalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Lecturer Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="edit-form" name="edit-form" class="gy-3">
                        @csrf
                        <input type="hidden" name="edit_id" id="edit_id" value="">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_name">Lecturer Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit_name"name="edit_name" value="{{ old('edit_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_email">Email *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="edit_email"name="edit_email" value="{{ old('edit_email') }}">
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

    
    <!-- Modal Alert -->
    <div class="modal fade" tabindex="-1"  role="dialog" id="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST"  name="delete-form"  id="delete-form">
                @csrf
                <input type="hidden" name="delete_id" id="delete_id" value="">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                            <h4 class="nk-modal-title">Delete Lecturer!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Are you sure, you want to <strong>delete</strong> this lecturer ?</div>
                                <span class="sub-text-sm">This action can not be revert.</span>
                            </div>
                            <div class="nk-modal-action">
                                <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                <button type="submit"   class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </div><!-- .modal-body -->
                </div>
            </form>
        </div>
    </div>

    
    
@endsection

@section('script')
    <script>

        NioApp.DataTable.init = function () {
            NioApp.DataTable('#data-table', {
            responsive: {
                details: true
            },
            processing: true,
            serverSide: true,
            ajax: '{{ route('enrolled.stu_getdata') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'dob', name: 'dob' },
                { data: 'contact', name: 'contact' },
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