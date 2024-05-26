<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Portal Monitoring BI Gorontalo</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('asset/img/logo-bi.png')}}" />
    <link href="{{asset('asset/template/css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{asset('asset/img/logo-bi-biru.png')}}" width="50%" alt="logo-bi-biru"></a>
									</div>
                                    <h3 class="mb-2 mt-5"><b>Lupa Sandi?</b></h3>
                                    <p><b>Tidak perlu khawatir.</b> Silahkan masukkan email yang digunakan dan kami akan mengirimkan email untuk pembuatan password yang baru.</p>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf   
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="hello@example.com" id="email" name="email" >
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            <x-auth-session-status class="mb-4" :status="session('status')" class="text-success"/>

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Email Password Reset Link') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('asset/template/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('asset/template/js/custom.min.js')}}"></script>
    <script src="{{asset('asset/template/js/dlabnav-init.js')}}"></script>
	<script src="{{asset('asset/template/js/styleSwitcher.js')}}"></script>
</body>
</html>