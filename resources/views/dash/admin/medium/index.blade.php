@extends('layouts.admin',['title'=>'Languages'])

@section('css')
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Languages</h4>
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
                                <button onclick="add()"  class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New Language</span></button>
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
                        <tr >
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
                    <h5 class="modal-title">Language Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" method="" class="form-validate is-alter" >
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Language Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="grade_in_lang">'Grade' in relevant language</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="grade_in_lang" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" onclick="submit_add()" class="btn btn-lg btn-primary">Save</button>
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
                    <h5 class="modal-title">Edit Language Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" method="" class="form-validate is-alter" >
                        @csrf
                        <input type="hidden" name="id_edit" id="id_edit" value="">
                        <div class="form-group">
                            <label class="form-label" for="name_edit">Language Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name_edit" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="grade_in_lang_edit">'Grade' in relevant language</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="grade_in_lang_edit" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button"  onclick="submit_edit()" class="btn btn-lg btn-primary">Save</button>
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
            ajax: '{{ route('medium.getdata') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            });
            $.fn.DataTable.ext.pager.numbers_length = 7;
        }; // Extra @v1.1

        

        
        function add() {
            $('#name').val('');
            $('#modalForm').modal('show');
        }

        function submit_add() {
            $.ajax({
                type: "POST",
                url: "{{ route('medium.add') }}",
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'grade_in_lang':$('#grade_in_lang').val(),
                },
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
        }
        

        function edit(id, name,grade_in_ln) {
            $('#name_edit').val(name);
            $('#id_edit').val(id);
            $('#grade_in_lang_edit').val(grade_in_ln);
            $('#EditModalForm').modal('show');
        }

        function submit_edit() {
            $.ajax({
                type: "POST",
                url: "{{ route('medium.edit',5) }}",
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name_edit').val(),
                    'grade_in_lang':$('#grade_in_lang_edit').val(),
                    'id':$('#id_edit').val(),
                },
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
        }

        
        function del(id) {
            $('#id_delete').val(id);
            $('#deleteModal').modal('show');
        }

        function submit_delete() {
            $.ajax({
                type: "POST",
                url: "{{ route('medium.delete') }}",
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