@extends('layouts.student',['title'=>'Section'])

@section('css')
    <style>
        .list-grade{
            cursor: pointer
        }
    </style>
@endsection
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title" id="page-head"><div style="display: inline-flex"><div id="lesson_head">User Profile</div>
                    <div id="update-status" class="ml-3"></div></div> 
                     <br><strong class="text-primary small"></strong></h3>
                
                    <div class="nk-block-des text-soft">
                        <ul class="list-inline">
                            <span class="text-base">Update your profile.</span>
                        </ul>
                    </div>
                
            </div>
        </div>
    </div><!-- .nk-block-head -->

    
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Personal Information</h4>
                                <div class="nk-block-des">
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <button class="btn btn-primary update_profile"><em class="icon ni ni-user"></em><span>Update Profile Details</span></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Basics</h6>
                            </div>
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">First Name</span>
                                    <span class="data-value">{{ Auth::user()->first_name }}</span>
                                </div>
                                <div class="data-col data-col-end update_profile"><span class="data-more update_profile"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Last Name</span>
                                    <span class="data-value">{{ Auth::user()->last_name?Auth::user()->last_name:'Not Available' }}</span>
                                </div>
                                <div class="data-col data-col-end update_profile"><span class="data-more update_profile"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Email</span>
                                    <span class="data-value">{{ Auth::user()->email }}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Phone Number</span>
                                    <span class="data-value ">{{ Auth::user()->contact?Auth::user()->contact:'Not Available' }}</span>
                                </div>
                                <div class="data-col data-col-end update_profile"><span class="data-more update_profile"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div><!-- data-item -->
                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Date of Birth</span>
                                    <span class="data-value">{{  date('d M Y',strtotime(Auth::user()->dob)) }}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Security</h6>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Change Password</span>
                                    <span class="data-value">*******</span>
                                </div>
                                <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
            

    <!-- Edit Modal -->
    <div class="modal fade" tabindex="-1" id="ProfileModalForm"  aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile Info</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="profile-form" action="" method="POST" enctype="multipart/form-data" name="profile-form"  class="gy-3">
                        @csrf
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">First Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="first_name"name="first_name" value="{{ Auth::user()->first_name?Auth::user()->first_name:old('first_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">Last Name *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="last_name"name="last_name" value="{{ Auth::user()->last_name?Auth::user()->last_name:old('last_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-center">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="form-label" for="contact">Contact Number *</label>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="contact"name="contact" value="{{ Auth::user()->contact?Auth::user()->contact:old('contact') }}">
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


@endsection


@section('script')
    <script>

        $('.update_profile').click(function(){
            $('#ProfileModalForm').modal('show');
        });

        
        $("form#profile-form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('profile.update') }}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,  
                success: function(data) {
                    $('#ProfileModalForm').modal('hide');
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

    </script>
@endsection

