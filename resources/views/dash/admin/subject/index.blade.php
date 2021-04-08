@extends('layouts.admin',['title'=>'Subjects'])

@section('css')
@endsection
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
                            <li class="nk-block-tools-opt">
                                <button onclick="add()"  class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Subject</span></button>
                                </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-preview card-barder" >
            <div class="card-inner">

                <table class=" table datatable-init" id="data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Medium</th>
                            <th>Grade</th>
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
                    <h5 class="modal-title">Subject Info</h5>
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
                                    <label class="form-label" for="name">Subject Name *</label>
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
                                    <label class="form-label" for="medium">Medium *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg"  name="medium" id="medium">
                                            @foreach ($mediums as $medium)
                                                <option value="{{ $medium->id }}">{{ $medium->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="grade">Grade *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg"  name="grade" id="grade">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
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
                        <div class="row g-3 ">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
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
                    <h5 class="modal-title">Edit Subject Info</h5>
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
                                    <label class="form-label" for="edit_name">Subject Name *</label>
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
                                    <label class="form-label" for="edit_medium">Medium *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg"  name="edit_medium" id="edit_medium">
                                            @foreach ($mediums as $medium)
                                                <option value="{{ $medium->id }}">{{ $medium->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_grade">Grade *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select form-control form-control-lg"  name="edit_grade" id="edit_grade">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
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
                        <div class="row g-3 ">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_description">Description</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <textarea name="edit_description" id="edit_description" cols="30" rows="4" class="form-control">{{ old('edit_description') }}</textarea>
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
            <form id="delete-form" action="" method="POST" enctype="multipart/form-data" name="delete-form"  class="gy-3">
                @csrf
                <input type="hidden" name="delete_id" id="delete_id" value="">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                            <h4 class="nk-modal-title">Delete Subject!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Are you sure, you want to <strong>delete</strong> this subject ?</div>
                                <span class="sub-text-sm">This action can not be revert.</span>
                            </div>
                            <div class="nk-modal-action">
                                <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                <button type="submit"  class="btn-lg btn-mw btn-danger">Yes, Delete</button>
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
            ajax: '{!! route('subject.getdata') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'language_id', name: 'medium' },
                { data: 'grade_id', name: 'grade' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            });
            $.fn.DataTable.ext.pager.numbers_length = 7;
        }; // Extra @v1.1
        

        
        function add() {
            $('#name').val('');
            $("#medium").val($("#medium option:first").val());
            $("#grade").val($("#grade option:first").val());
            $('#description').val('');
            $('#modalForm').modal('show');
        }

        $("form#add-form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('subject.add') }}",
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
        

        function edit(id, name, medium, grade, description,image) {
            console.log(image);
            $('#edit-form')[0].reset();
            $('#edit_id').val(id);
            $('#edit_name').val(name);
            $('#edit_medium').val(medium).change();
            $('#edit_grade').val(grade).change();
            $('#edit_description').val(description);
            $("#edit-image").attr('src',"{{asset('storage')}}/"+image);
            $('#EditModalForm').modal('show');
        }

        $("form#edit-form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('subject.edit') }}",
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
            $('#delete_id').val(id);
            $('#deleteModal').modal('show');
        }

        $("form#delete-form").submit(function(e) {
            e.preventDefault();    
            $.ajax({
                url: "{{ route('subject.delete') }}",
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

        
        </script>
@endsection