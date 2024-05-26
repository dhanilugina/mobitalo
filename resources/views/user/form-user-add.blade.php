@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active" aria-current="User">User</li>
			<li class="breadcrumb-item active" aria-current="Add">Tambah</li>
		</ol>
	</nav>
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Create User</h4>
				</div>
				<div class="card-body">
					<div class="form-validation">
						<form method="post" action="{{ route('user.store') }}" class="needs-validation" novalidate id="myForm">
							@csrf
							<div class="row">

								<div class="mb-3 row">
									<label class="col-lg-3 col-form-label" for="uk-100000">Email
										<span class="text-danger">*</span>
									</label>
									<div class="form-group col-lg-9">
										<input type="text" name="email" id="email" class="form-control" id="uk-100000" placeholder="Silahkan masukkan email">
										
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-lg-3 col-form-label" for="uk-50000">Fullname
										<span class="text-danger">*</span>
									</label>
									<div class="form-group col-lg-9">
										<input type="text" name="name" id="name" class="form-control" id="uk-50000" placeholder="Silahkan masukkan Nama Lengkap">
										
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Role</label>
									<div class="form-group col-sm-9">
										<select name="roles" id="roles" class="default-select form-control wide mb-3">
										@foreach($roles as $roles)
											<option value = '{{ $roles->role_name }}'>{{ $roles->role_name }}</option>
										@endforeach
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label">Nama Bank</label>
									<div class="form-group col-sm-9">
										<select name="bank_name" id="bank_name" class="default-select form-control wide mb-3">
										
										@foreach($allBanks as $bank)
											<option value='{{ $bank->bank_name }}'>{{ $bank->bank_name }}</option> 
										@endforeach
										</select>
									</div>
								</div>

							</div>
							<div class="row m-2">
								<div class="row justify-content-start">
									<div class="col-lg-12 text-start">
										<button type="submit" class="btn btn-outline-primary w-25">Submit</button>
										<button type="reset" class="btn btn-outline-warning w-25">Reset</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 email: {
                    required : true,
                },
				roles: {
                    required : true,
                },
				bank_name: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                roles: {
                    required : 'Please Select roles',
                },
				bank_name: {
                    required : 'Please Select Bank Name',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection