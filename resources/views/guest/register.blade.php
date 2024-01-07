<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>

    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}"/>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <h2 class="text-center mb-4">Register</h2>
                    <div class="auto-form-wrapper">
                        <form method="post" action="{{route('guest.getRegister')}}">

                            @csrf

                            @include('alert::form')

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" id="name" name="email" class="form-control" placeholder="Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                    @include('common.partials.alert', ['field'=>'email', 'tag'=>''])
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                      <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                    </div>

                                    @include('common.partials.alert', ['field'=>'password', 'tag'=>''])
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="password_confirmation"
                                           name="password_confirmation"
                                           class="form-control" placeholder="Confirm Password">
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                      <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input id="remember" name="remember"
                                               type="checkbox" class="form-check-input"> I agree to the terms
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Register</button>
                            </div>

                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Already have and account ?</span>
                                <a href="{{route('guest.getLogin')}}" class="text-black text-small">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/shared/misc.js')}}"></script>
</body>
</html>