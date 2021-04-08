@extends('layouts.admin',['title'=>'Syllabus'])

@section('css')
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">{{ $subject->name }} Syllabus Sections</h4>
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
                                <a href="{{ route('subject.index') }}"  class="btn btn-primary"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            </li>
                            <li class="nk-block-tools-opt">
                                <button onclick="add()"  class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Section</span></button>
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
                            <th>Syllabus No.</th>
                            <th width="100px">Actions</th>
                        </tr>
                    </thead>
                </table>
                  
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


    <!-- Add Modal -->
    <div class="modal fade" tabindex="-1" id="modalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Syllabus Section Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                    <form id="add-form" action=""  method="POST"  name="add-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="subject_id" id="subject_id" value="{{ $subject->id }}">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="name">Section Name *</label>
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
                                    <label class="form-label" for="section_no">Section No *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="section_no" name="section_no" value="{{ old('section_no') }}">
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Syllabus Section Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                    <form id="edit-form" action=""  method="POST" name="edit-form"  class="gy-3">
                        @csrf
                        <input type="hidden" name="edit_id" id="edit_id" value="">
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_name">Document Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit_name"name="edit_name" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="edit_section_no">Section No *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit_section_no" name="edit_section_no" value="{{ old('edit_section_no') }}">
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
                                        <textarea name="edit_description" id="edit_description" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
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
            <form action="" id="delete-form" method="post" id="deleteform">
                @csrf
                <input type="hidden" name="id_delete" id="id_delete" value="">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                            <h4 class="nk-modal-title">Delete Syllabus Section!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Are you sure, you want to <strong>delete</strong> this section ?</div>
                                <span class="sub-text-sm">This action can not be revert.</span>
                            </div>
                            <div class="nk-modal-action">
                                <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                <button type="submt"   class="btn-lg btn-mw btn-danger">Yes, Delete</button>
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
        var subject_id='{{ $subject->id }}';
        
        NioApp.DataTable.init = function () {
            NioApp.DataTable('.datatable-init', {
            responsive: {
                details: true
            },
            processing: true,
            serverSide: true,
            ajax: 'section-getdata/'+subject_id,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'section_no', name: 'section_no' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            });
            $.fn.DataTable.ext.pager.numbers_length = 7;
        }; // Extra @v1.1
        

        
        function add() {
            $('#name').val('');
            $('#description').val('');
            $('#section_no').val('');
            $('#modalForm').modal('show');
        }

        $("form#add-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('section.add') }}",
                type: 'POST',
                data: $("#add-form").serialize(),
                success: function(data) {
                    $('#data-table').DataTable().ajax.reload();
                    setTimeout(function () {
                        toastr.clear();
                        NioApp.Toast(data.message, 'success', {
                        position: 'bottom-right',
                        ui: 'is-dark'
                        });
                    },100);
                    $('#name').val('');
                    $('#description').val('');
                    $('#section_no').val('');
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
        

        function edit(id, name,description,section_no) {
            $('#edit_id').val(id);
            $('#edit_name').val(name);
            $('#edit_description').val(description);
            $('#edit_section_no').val(section_no);
            $('#EditModalForm').modal('show');
        }

        $("form#edit-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('section.edit') }}",
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
            $('#id_delete').val(id);
            $('#deleteModal').modal('show');
        }

        $("form#delete-form").submit(function(e) {
            e.preventDefault();    

            $.ajax({
                url: "{{ route('section.delete') }}",
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