@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-fluid">
<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Proyeksi</li>
				<li class="breadcrumb-item" aria-current="page">Penarikan</li>
				<li class="breadcrumb-item active" aria-current="page">Add</li>
			</ol>
		</nav>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Proyeksi Penyetoran ke Bank Indonesia</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<form class="needs-validation" novalidate method="POST" action="{{ route('withdrawalProjection.store') }}" id="myForm">
							@csrf
							<div class="mb-3 row">
								<label class="col-lg-3 col-form-label" for="uk-100000">Periode Penyetoran
								</label>
								<div class="form-group col-lg-9">
									<input type="text" class="form-control" id="datepicker" name="periode" required>
									
								</div>
							</div>
					</div>
					<div class="row">
						<div class="mb-3 row">
							<label class="col-lg-3 col-form-label" for="uk-100000">Silahkan Pilih Uang Pecahan
							</label>
							<div class="col-lg-9">
								<ul class="nav nav-pills mb-4 light">
									<li class=" nav-item">
										<a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Uang Pecahan Kertas</a>
									</li>
									<li class="nav-item">
										<a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Uang Pecahan Koin</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="form-validation">
						<div class="row">

							<div class="tab-content">
								<div id="navpills-1" class="tab-pane active">
									<div class="row">
										<h4><u>Uang Kertas</u></h4>
									</div>
									<div class="row">
										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_100000">Pecahan 100.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_100000" name="uk_100000" placeholder="Silahkan masukkan total proyeksi pecahan 100.000">
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_50000">Pecahan 50.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_50000" name="uk_50000" placeholder="Silahkan masukkan total proyeksi pecahan 50.000">
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_20000">Pecahan 20.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_20000" name="uk_20000" placeholder="Silahkan masukkan total proyeksi pecahan 20.000" required>
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_10000">Pecahan 10.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_10000" name="uk_10000" placeholder="Silahkan masukkan total proyeksi pecahan 10.000" required>
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_5000">Pecahan 5.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_5000" name="uk_5000" placeholder="Silahkan masukkan total proyeksi pecahan 5.000" required>
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_2000">Pecahan 2.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_2000" name="uk_2000" placeholder="Silahkan masukkan total proyeksi pecahan 2.000" required>
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-6 col-form-label" for="uk_1000">Pecahan 1.000
												<span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" id="uk_1000" name="uk_1000" placeholder="Silahkan masukkan total proyeksi pecahan 1.000" required>
												<div class="invalid-feedback">
													Please enter a username.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="navpills-2" class="tab-pane">
									<div class="row">
										<h4><u>Uang Koin</u></h4>
									</div>
									<div class="mb-3 row">
										<label class="col-lg-6 col-form-label" for="ul_1000">Pecahan 1.000
											<span class="text-danger">*</span>
										</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="ul_1000" name="ul_1000" placeholder="Silahkan masukkan total proyeksi pecahan 1.000" required>
											<div class="invalid-feedback">
												Please enter a username.
											</div>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-6 col-form-label" for="ul_500">Pecahan 500
											<span class="text-danger">*</span>
										</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="ul_500" name="ul_500" placeholder="Silahkan masukkan total proyeksi pecahan 500" required>
											<div class="invalid-feedback">
												Please enter a username.
											</div>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-6 col-form-label" for="ul_200">Pecahan 200
											<span class="text-danger">*</span>
										</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="ul_200" name="ul_200" placeholder="Silahkan masukkan total proyeksi pecahan 200" required>
											<div class="invalid-feedback">
												Please enter a username.
											</div>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-6 col-form-label" for="ul_100">Pecahan 100
											<span class="text-danger">*</span>
										</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="ul_100" name="ul_100" placeholder="Silahkan masukkan total proyeksi pecahan 100" required>
											<div class="invalid-feedback">
												Please enter a username.
											</div>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-6 col-form-label" for="ul_50">Pecahan 50
											<span class="text-danger">*</span>
										</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="ul_50" name="ul_50" placeholder="Silahkan masukkan total proyeksi pecahan 100" required>
											<div class="invalid-feedback">
												Please enter a username.
											</div>
										</div>
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
                periode: {
                    required : true,
                }
            },
            messages :{
                periode: {
                    required : 'Please Enter Periode',
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