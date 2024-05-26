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
                                    <h3 class="mb-2 mt-5"><b>Reset Password</b></h3>
                                    <p><b>Tidak perlu khawatir.</b> Silahkan masukkan password yang ingin di gunakan.</p>
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf   
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        
                                        <div class="mb-3">
                                            <div class="col-sm-3">
                                            <label class="mb-1 col-sm-3 col-form-label"><strong>Email</strong></label>
                                            </div>
                                           
                                            <div class="col-sm-9"> 
                                            <input type="email" class="form-control" placeholder="hello@example.com" id="email" name="email" value="{{$request->email}}" readonly>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            <x-auth-session-status class="mb-4" :status="session('status')" class="text-success"/>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" value="12345678">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4 mb-4">
                                        <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" value="12345678">

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Email Password Reset Link</button>
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