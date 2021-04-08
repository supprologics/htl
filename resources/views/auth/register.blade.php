


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
    <title>Registration | HTL Foundation</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('/admin/css/dashlite.css?ver=2.0.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('/admin/css/theme.css?ver=2.0.0') }}">
</head>

<body class="nk-body npc-crypto bg-white pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
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
                            <h5 class="nk-block-title">Register</h5>
                            <div class="nk-block-des">
                                <p>Create New HTL Web Platform - Student Account</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email or Username</label>
                            <input type="text" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email"  id="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label class="form-label mb-0">Date of birth</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="month">Month</label>
                                    <input type="text" class="form-control form-control-lg @error('month') is-invalid @enderror" id="month" name="month"  value="{{ old('month') }}" required autocomplete="month" autofocus placeholder="02">
                                    @error('month')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="day">Date</label>
                                    <input type="text" class="form-control form-control-lg @error('day') is-invalid @enderror" id="day" name="day"  value="{{ old('day') }}" required autocomplete="day" autofocus placeholder="12">
                                    @error('day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="year">Year</label>
                                    <input type="text" class="form-control form-control-lg @error('year') is-invalid @enderror" id="year" name="year"  value="{{ old('year') }}" required autocomplete="year" autofocus placeholder="2004">
                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Enter your passcode" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="form-label" for="password">Confirm Password</label>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password-confirm" placeholder="Enter your passcode" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> Already have an account ? <a href="{{ route('login') }}"><strong>Sign in instead</strong></a>
                    </div>
                    <!--
                        <div class="text-center pt-4 pb-3">
                            <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                        </div>
                        <ul class="nav justify-center gx-8">
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
                        </ul><!-- nav -->
                    </div>
                    <div class="mt-3">
                        <p>&copy; {{ now()->year }} Prologics. All Rights Reserved.</p>
                    </div>
                </div><!-- nk-block -->
            </div><!-- .nk-split-content -->
            <div class="nk-split-content nk-split-stretch" style="background: url('/images/login.jpg');background-repeat: no-repeat;background-size: cover;"></div><!-- .nk-split-content -->
        </div><!-- .nk-split -->
    </div><!-- app body @e -->

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
                                        <div class="caption-text">Your account has been created.<strong>Please check the verification link sent to your email.</strong> </div>
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
                                    <h4 class="nk-modal-title">Unable to Process!</h4>
                                    <div class="nk-modal-text">
                                        <p class="lead">We are sorry, we were unable to process your request. Please try after sometimes.</p>
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

    @endif

    <!-- JavaScript -->
    <script src="{{ asset('admin/js/bundle.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('admin/js/scripts.js?ver=2.0.0') }}"></script>

    <script>
        $(document).ready(function(){
            $('#modalAlert').modal('show');
            $('#modalAlert2').modal('show');
        });
    </script>
</body>

</html>