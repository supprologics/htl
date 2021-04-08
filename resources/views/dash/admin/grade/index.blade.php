@extends('layouts.admin',['title'=>'Grades'])

@section('css')
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Grades</h4>
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
                                <button onclick="add()"  class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Grade</span></button>
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


                <table class="table datatable-init" id="data-table">
                    <thead>
                        <tr class="">
                            <th>Id</th>
                            <th>Name</th>
                            <th width="100px">Actions</th>
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
                    <h5 class="modal-title">Grade Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="add-form" action="" method="POST" enctype="multipart/form-data" name="add-form"  class="gy-3">
                        @csrf
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name (Shown) *</label>
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
                                    <label class="form-label" for="value">Grade For *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg"  name="value" id="value" data-search="on">
                                            <option value="pre">Under Grade 1</option>
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                            <option value="1to5">Grade 1 To 5</option>
                                            <option value="6">Grade 6</option>
                                            <option value="7">Grade 7</option>
                                            <option value="8">Grade 8</option>
                                            <option value="9">Grade 9</option>
                                            <option value="6to9">Grade 1 To 9</option>
                                            <option value="6to9">Grade 6 To 9</option>
                                            <option value="10">Grade 10</option>
                                            <option value="11">Grade 11</option>
                                            <option value="6to11">Grade 1 To 11</option>
                                            <option value="6to11">Grade 6 To 11</option>
                                            <option value="10to11">Grade 10 To 11</option>
                                            <option value="12">Grade 12</option>
                                            <option value="13">Grade 13</option>
                                            <option value="6to13">Grade 1 To 13</option>
                                            <option value="6to13">Grade 6 To 13</option>
                                            <option value="10to13">Grade 10 To 13</option>
                                            <option value="12to13">Grade 12 To 13</option>
                                            <option value="over">After School</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
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

    
    <!-- Edit Modal -->
    <div class="modal fade" tabindex="-1" id="EditModalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Grade Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    
                    <form id="edit-form" action="" method="POST" enctype="multipart/form-data" name="edit-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_name">Name (Shown) *</label>
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
                                    <label class="form-label" for="edit_value">Grade For *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg"  name="edit_value" id="edit_value"  data-search="on">
                                            <option value="pre">Under Grade 1</option>
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                            <option value="1to5">Grade 1 To 5</option>
                                            <option value="6">Grade 6</option>
                                            <option value="7">Grade 7</option>
                                            <option value="8">Grade 8</option>
                                            <option value="9">Grade 9</option>
                                            <option value="6to9">Grade 1 To 9</option>
                                            <option value="6to9">Grade 6 To 9</option>
                                            <option value="10">Grade 10</option>
                                            <option value="11">Grade 11</option>
                                            <option value="6to11">Grade 1 To 11</option>
                                            <option value="6to11">Grade 6 To 11</option>
                                            <option value="10to11">Grade 10 To 11</option>
                                            <option value="12">Grade 12</option>
                                            <option value="13">Grade 13</option>
                                            <option value="6to13">Grade 1 To 13</option>
                                            <option value="6to13">Grade 6 To 13</option>
                                            <option value="10to13">Grade 10 To 13</option>
                                            <option value="12to13">Grade 12 To 13</option>
                                            <option value="over">After School</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_image">Image *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="edit_image" id="edit_image">
                                            <label class="custom-file-label" for="edit_image">Choose file</label>
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
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_image">Current Image</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <img src="" id="edit-image" alt="">
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
            <form action="" method="post" id="deleteform">
                <input type="hidden" name="id_delete" id="id_delete" value="">
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

@endsection


@section('script')
    <script>

        NioApp.DataTable.init = function () {
            NioApp.DataTable('.datatable-init', {
            responsive: {
                details: true
            },
            processing: true,
            serverSide: true,
            ajax: '{!! route('grade.getdata') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            });
            $.fn.DataTable.ext.pager.numbers_length = 7;
        }; // Extra @v1.1
        

        
        function add() {
            $('#add-form')[0].reset();
            $('#name').val('');
            $("#value").val($("#value option:first").val());
            $('#modalForm').modal('show');
        }

        $("form#add-form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('grade.add') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,                                                                                                             
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
        

        function edit(id, name,value,image) {
            $('#edit-form')[0].reset();
            $('#edit_id').val(id);
            $('#edit_name').val(name);
            $('#edit_value').val(value).change();
            $("#edit-image").attr('src',"{{asset('storage')}}/"+image);
            $('#EditModalForm').modal('show');
        }

        $("form#edit-form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('grade.edit') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,  
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
            $('#id_delete').val(id);
            $('#deleteModal').modal('show');
        }

        function submit_delete() {
            $.ajax({
                type: "POST",
                url: "{{ route('grade.delete') }}",
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id_delete').val(),
                },
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
        }
        </script>
@endsection