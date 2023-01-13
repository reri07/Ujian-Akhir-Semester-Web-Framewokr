<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('pages/img/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter" id="Vlogin">
        <div class="container-register100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('logins/images/img-04.jpg') }}" alt="IMG" style="margin-top: 136px">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <span class="login100-form-title">
                        Daftar
                    </span>

                    <div class="wrap-input100 validate-input @error('nama') alert-validate @enderror"
                        data-validate="@error('nama') {{ $message }} @enderror">
                        <input class="input100" type="text" name="nama" placeholder="Nama"
                            value="{{ old('nama') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input @error('nik') alert-validate @enderror"
                        data-validate="@error('nik') {{ $message }} @enderror">
                        <input class="input100" type="text" name="nik" placeholder="No. NIK"
                            value="{{ old('nik') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input @error('alamat') alert-validate @enderror"
                        data-validate="@error('alamat') {{ $message }} @enderror">
                        <input class="input100" type="text" name="alamat" placeholder="Alamat"
                            value="{{ old('alamat') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input @error('noHp') alert-validate @enderror"
                        data-validate="@error('noHp') {{ $message }} @enderror">
                        <input class="input100" type="number" name="noHp" placeholder="No. Handphone"
                            value="{{ old('noHp') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100  @error('email') alert-validate @enderror"
                        data-validate="@error('email') {{ $message }} @enderror">
                        <input class="input100" type="text" name="email" placeholder="Email"
                            value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input @error('pass') alert-validate @enderror"
                        data-validate="@error('pass') {{ $message }} @enderror">
                        <input class="input100" type="password" name="pass" placeholder="Password Baru"
                            value="{{ old('pass') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input @error('confirm') alert-validate @enderror"
                        data-validate="@error('confirm') {{ $message }} @enderror">
                        <input class="input100" type="password" name="confirm" placeholder="Konfirmasi">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Daftar
                        </button>
                    </div>
                    <div class="text-center p-t-67">
                        <a class="txt2" href="{{ route('login.index') }}">
                            Already Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="{{ asset('logins/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('logins/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('logins/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('logins/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('logins/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    {{-- <script src="{{ asset('logins/js/main.js') }}"></script> --}}

</body>

</html>
