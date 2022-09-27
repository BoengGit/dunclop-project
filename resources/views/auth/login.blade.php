<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('backend/assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Dunclop</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon/logo-app.ico') }}" />

    <!-- Boostarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Css Syntax -->
    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 40%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 50%;
            }
        }
    </style>
  </head>

  <body>
    <!-- Content -->

    <section class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-6 text-black">

                    <div class="px-5 ms-xl-4">
                        <center>
                            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;">
                                <img src="{{ asset('backend/assets/img/favicon/logo-app.png') }}" alt="logo-dunclop" style="width: 40%">
                            </i>
                        </center>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form style="width: 23rem;" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                        <div class="form-outline mb-4">
                        <input type="email" id="form2Example18" class="form-control form-control-lg" name="email"/>
                        <label class="form-label" for="form2Example18">Email address</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" id="form2Example28" class="form-control form-control-lg" name="password"/>
                        <label class="form-label" for="form2Example28">Password</label>
                        </div>

                        <div class="pt-1 mb-4">
                        <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                        <p>Apa.. belum punya akun?! <a href="{{ route('register') }}" class="link-info">Register Dulu Aja</a></p>

                    </form>

                    </div>

                </div>
                <div class="col-sm-6 px-5 d-none d-sm-block">
                    <img src="https://images.unsplash.com/photo-1663365848016-625bcd136340?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1964&q=80"
                    alt="Login image" class="w-100 vh-90 pd-5" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <!-- Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
  </body>
</html>
