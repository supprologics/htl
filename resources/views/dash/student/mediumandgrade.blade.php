@extends('layouts.student',['title'=>'Section'])

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

        label {
            display:block;
            border:solid 1px gray;
            line-height:40px;
            height:40px;
            border-radius:40px;
            -webkit-font-smoothing: antialiased; 
            margin:10px;
            font-family:Arial,Helvetica,sans-serif;
            color:gray;
            text-align:center;
        }

        input[type=checkbox] {
            display: none;
        }

        input:checked + label {
            border: solid 1px #307BD8;
            background: #307BD8;
            color: white;
        }

        input:checked + label:before {
            content: "\2713 ";
        }


        /* new stuff */
        .check {
            visibility: hidden;
            padding-right: 15px;
            padding-left: 15px;
        }

        input:checked + label .check {
            visibility: visible;
        }

        input.checkbox:checked + label:before {
            content: "";
        }
    </style>
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title" id="page-head"><div style="display: inline-flex"><div id="lesson_head">Setup Account Preferences</div>
                    <div id="update-status" class="ml-3"></div></div> 
                     <br><strong class="text-primary small"></strong></h3>
                
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <span class="text-base">Update your learning medium and grade.this will be affect to your course selecton.</span>
                        </ul>
                    </div>
                
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form action="{{ route('preferencesupdate') }}" method="post" id="preference-update">
        @csrf
            
        <div class="nk-block nk-block-lg">
            <div class="card card-preview card-barder">
                <div class="card-inner">

                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                            <h5 class="title">Select Prefer Learning Mediums</h5>
                        </div><!-- .nk-block-head -->
                        <div class="row">
                            @foreach ($languages as $language)
                                <div class="col-md-3 col-sm-6">
                                    <div class="card">
                                        <input id="language{{ $language->id }}" type="checkbox" name="languages[]" value="{{ $language->id}}" class="language-checkbox"
                                        @foreach ($mylanguages as $mylanguage)
                                            @if ($mylanguage->language_id==$language->id)  checked  @endif
                                        @endforeach
                                        />
                                        <label class="language-label" for="language{{ $language->id }}">{{ $language->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div><!-- .nk-block -->
                    
                </div>
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->
        
        <div class="nk-block nk-block-lg">
            <div class="card card-preview card-barder">
                <div class="card-inner">

                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                            <h5 class="title">Select Prefer Learning Grade</h5>
                        </div><!-- .nk-block-head -->
                        <div class="row">
                            @foreach ($grades as $grade)
                                <div class="col-md-3 col-sm-6">
                                    <input id="grade{{ $grade->id }}" type="checkbox" name="grades[]" value="{{ $grade->id}}" class="grade-checkbox"
                                    @foreach ($mygrades as $mygrade)
                                        @if ($mygrade->grade_id==$grade->id)  checked  @endif
                                    @endforeach
                                    />
                                    <label class="grade-label" for="grade{{ $grade->id }}">{{ $grade->name }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div><!-- .nk-block -->
                    
                </div>
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->

        <div class="nk-block nk-block-lg nk-block-head-content">

                        <button type="submit" class="btn btn-primary">
                            <em class="icon ni ni-save"></em>
                            <span>Save Preferences</span>
                        </button>

        </div> <!-- nk-block -->

    </form>
        @if (isset($session_subject))
            @if ($session_subject['status']=='success')
                
                <!-- Modal Alert -->
                <div class="modal fade" tabindex="-1" id="modalAlert">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                    <h4 class="nk-modal-title">Success!</h4>
                                    <div class="nk-modal-text">
                                        <div class="caption-text message">{{ $session_subject['message']}}</div>
                                    </div>
                                    <div class="nk-modal-action">
                                        <a class="btn btn-lg btn-mw btn-primary" data-dismiss="modal">OK</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($session_subject['status']=='error')
                
                <!-- Modal Alert 2 -->
                <div class="modal fade" tabindex="-1" id="modalAlert2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                    <h4 class="nk-modal-title">Cant Process Your Request!</h4>
                                    <div class="nk-modal-text">
                                        <p class="lead message">We were unable to process your request. Please try after sometimes.</p>
                                        <p class="text-soft message">If you need help please contact us at (855) 485-7373.</p>
                                    </div>
                                    <div class="nk-modal-action mt-5">
                                        <a  class="btn btn-lg btn-mw btn-light" data-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            </div><!-- .modal-body -->
                        </div>
                    </div>
                </div>
            @endif
        @endif

@endsection


@section('script')
    <script>
        $("form#preference-update").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('preferencesupdate') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,  
                success: function(data) {
                    window.location.href = '/related-subjects';
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

