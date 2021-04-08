

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
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the DashLite panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">Email or Username</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                                        </div>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email address or username">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            @if (Route::has('password.request'))
                                                <a class="link link-primary link-sm reset-password" tabindex="-1" >
                                                    Forgot Code?
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your passcode">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> New on our platform? <a href="{{ route('register') }}">Create an account</a>
                                </div>
                                <!--
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>
                            -->
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

    <!-- Add Modal -->
    <div class="modal fade" tabindex="-1" id="PasswordReset"  aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('password.resetmail') }}" method="POST" id="password-reset" name="password-reset"  class="form-validate is-alter" >
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="email_reset">Enter your HTL Account email address</label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="email_reset" name="email_reset" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit"  class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (isset($info))
            @if ($info=='success')
                
                <!-- Modal Alert -->
                <div class="modal fade" tabindex="-1" id="modalAlert">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                    <h4 class="nk-modal-title">Congratulations!</h4>
                                    <div class="nk-modal-text">
                                        <div class="caption-text">Your account is verified.Please login</div>
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

            @if ($info=='error')
                
                <!-- Modal Alert 2 -->
                <div class="modal fade" tabindex="-1" id="modalAlert2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                    <h4 class="nk-modal-title">Invalid verification!</h4>
                                    <div class="nk-modal-text">
                                        <p class="lead">We were unable to process your request. Please try after sometimes.</p>
                                        <p class="text-soft">If you need help please contact us at (855) 485-7373.</p>
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


            @if ($info=='sent')
                
            <!-- Modal Alert -->
            <div class="modal fade" tabindex="-1" id="modalAlert">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                        <div class="modal-body modal-body-lg text-center">
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                                <h4 class="nk-modal-title">Reset Link Sent !!</h4>
                                <div class="nk-modal-text">
                                    <div class="caption-text">HTL Account password reset link sent to your registered emial</div>
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

        @if ($info=='noaccount')
            
            <!-- Modal Alert 2 -->
            <div class="modal fade" tabindex="-1" id="modalAlert2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body modal-body-lg text-center">
                            <div class="nk-modal">
                                <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                <h4 class="nk-modal-title">Invalid Email!</h4>
                                <div class="nk-modal-text">
                                    <p class="lead">We were unable to find account related to given email address.</p>
                                    <p class="text-soft">If you need help please contact us at (855) 485-7373.</p>
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

        

        @if ($info=='changed')
                
        <!-- Modal Alert -->
        <div class="modal fade" tabindex="-1" id="modalAlert">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-lg text-center">
                        <div class="nk-modal">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                            <h4 class="nk-modal-title">Password Update !!</h4>
                            <div class="nk-modal-text">
                                <div class="caption-text">Log into HTL Account with new password.</div>
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

    @endif

    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('/admin/js/bundle.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('/admin/js/scripts.js?ver=2.0.0') }}"></script>
    
    <script>
        $(document).ready(function(){
            $('#modalAlert').modal('show');
            $('#modalAlert2').modal('show');
        });

        $(document).on('click','.reset-password',function(){
            $('#PasswordReset').modal('show');
        });

        
    </script>

</html>