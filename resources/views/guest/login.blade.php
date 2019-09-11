<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>

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
    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
      <div class="row w-100">
        <div class="col-lg-4 mx-auto">
          <div class="auto-form-wrapper">
            <form action="#">
              <div class="form-group">
                <label class="label">Username</label>
                <div class="input-group">
                  <input id="email" name="email" type="text" class="form-control" placeholder="E-mail">
                  <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="label">Password</label>
                <div class="input-group">
                  <input id="password" name="password" type="password" class="form-control" placeholder="*********">
                  <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Login</button>
              </div>
              <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-0">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                </div>
                <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
              </div>
              <div class="form-group">
                <button class="btn btn-block g-login">
                  <img class="mr-3" src="../../../assets/images/file-icons/icon-google.svg" alt="">Log in with Google</button>
              </div>
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Not a member ?</span>
                <a href="#" class="text-black text-small">Create new account</a>
              </div>
            </form>
          </div>
          <ul class="auth-footer">
            <li>
              <a href="#">Conditions</a>
            </li>
            <li>
              <a href="#">Help</a>
            </li>
            <li>
              <a href="#">Terms</a>
            </li>
          </ul>
          <p class="footer-text text-center">copyright © 2018 EmekaMbah. All rights reserved.</p>
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