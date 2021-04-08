@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    
</div>


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
