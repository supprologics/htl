

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png')}}.">
    <!-- Page Title  -->
    <title>Login | HTL Foundation</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('/admin/css/dashlite.css?ver=2.0.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('/admin/css/theme.css?ver=2.0.0') }}">
    <style>
    </style>
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{ route('welcome')}}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                    </a>
                                </div>
                                @if ($info=='success')
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">A fresh verification link has been sent to your email address.</h5>
                                            <div class="nk-block-des text-success">
                                                <p>Before proceeding, please check your email for a verification link.</p>
                                            </div>
                                            <div class="nk-block-des text-danger">
                                                <p>If you did not receive the email.<a class="text-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Click here</a></p>
                                                <div class="collapse" id="collapseExample">
                                                    <a  onclick="event.preventDefault();  document.getElementById('resend-verify').submit();" style="cursor: pointer">Resend verification link.</a>
                                                                
                                                    <form id="resend-verify" action="{{ route('resend.verify') }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="resend_email" id="resend_email" value="{{ $user->email }}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Unable to Process!</h5>
                                            <div class="nk-block-des text-success">
                                                <p>We are sorry, we were unable to process your request. Please try after sometimes.</p>
                                                <p class="text-soft">If you need help please contact us at (855) 485-7373.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; {{ now()->year }} Prologics. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch" style="background: url('/images/login.jpg');background-repeat: no-repeat;background-size: cover;"></div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>

    
    @if (isset($again))
                
            <!-- Modal Alert -->
            <div class="modal fade" tabindex="-1" id="modalAlert">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-lg text-center">
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                <h4 class="nk-modal-title">Verify Link Send Again!</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">Please check the verification link sent to your email.</strong> </div>
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


    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('/admin/js/bundle.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('/admin/js/scripts.js?ver=2.0.0') }}"></script>
    
    <script>
        $(document).ready(function(){
            $('#modalAlert').modal('show');
        });
    </script>

</html>