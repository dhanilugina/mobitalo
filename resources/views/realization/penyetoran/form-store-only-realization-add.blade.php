@extends('admin.admin_master')
@section('admin')
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
			<li class="breadcrumb-item" aria-current="page">Realisasi</li>
			<li class="breadcrumb-item" aria-current="page">Penyetoran</li>
			<li class="breadcrumb-item active" aria-current="page">Add</li>
		</ol>
	</nav>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Realisasi Penyetoran Bank Indonesia</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<form class="needs-validation" novalidate method="get" action="{{ route('storeUleRealization.add') }}">
							@csrf
							<div class="mb-3 row">

								<div class="col-lg-3">
									<label class="col-form-label">Periode Penarikan
									</label>
								</div>

								<div class="col-lg-6">
									<input type="text" class="form-control" id="datepicker2" name="periode" value="{{request()->input('periode')}}" required>
									<div class="invalid-feedback">
										Please enter a username.
									</div>
								</div>

								<div class="col-lg-3">
									<button class="btn btn-primary" type="submit">Cek Proyeksi
									</button>
								</div>


							</div>
						</form>
						<form class="needs-validation" novalidate method="POST" action="{{ route('storeUleRealization.store') }}" id="myForm">
							@csrf
							<div class="mb-3 row">
								<label class="col-lg-3 col-form-label" for="uk-100000">Tanggal Penyetoran
								</label>
								<div class="form-group col-lg-6">
									<input type="text" class="form-control" id="datepicker1" name="periode_penyetoran" required>
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
										<h4 class="col-lg-4"><u>Uang Kertas</u></h4>
										<h4 class="col-lg-4"><u>Realisasi</u></h4>
										<h4 class="col-lg-4"><u>Proyeksi</u></h4>
									</div>
									<div class="row">
										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_100000">Pecahan 100.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_100000" name="uk_100000" placeholder="ie. 100.000">

											</div>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_100000" name="sisa_uk_100000" value="{{ $sisaUk100000 }}" disabled>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_50000">Pecahan 50.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_50000" name="uk_50000" placeholder="ie. 50.000">
												
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_50000" name="sisa_uk_50000" value="{{ $sisaUk50000 }}" disabled>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_20000">Pecahan 20.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_20000" name="uk_20000" placeholder="ie. 20.000">
												
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_20000" name="sisa_uk_20000" value="{{ $sisaUk20000 }}" disabled>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_10000">Pecahan 10.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_10000" name="uk_10000" placeholder="ie. 10.000">
												
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_10000" name="sisa_uk_10000" value="{{ $sisaUk10000 }}" disabled>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_5000">Pecahan 5.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_5000" name="uk_5000" placeholder="ie. 5.000">
												
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_5000" name="sisa_uk_5000" value="{{ $sisaUk5000 }}" disabled>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_2000">Pecahan 2.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_2000" name="uk_2000" placeholder="ie. 2.000">
												
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_2000" name="sisa_uk_2000" value="{{ $sisaUk2000 }}" disabled>
											</div>
										</div>

										<div class="mb-3 row">
											<label class="col-lg-4 col-form-label" for="uk_1000">Pecahan 1.000
												<span class="text-danger">*</span>
											</label>
											<div class="form-group col-lg-4">
												<input type="text" class="form-control" id="uk_1000" name="uk_1000" placeholder="ie.  1.000">
												
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="sisa_uk_1000" name="sisa_uk_1000" value="{{ $sisaUk1000 }}" disabled>
											</div>
										</div>
									</div>
								</div>
								<div id="navpills-2" class="tab-pane">
									<div class="row">
										<h4 class="col-lg-4"><u>Uang Koin</u></h4>
										<h4 class="col-lg-4"><u>Realisasi</u></h4>
										<h4 class="col-lg-4"><u>Proyeksi</u></h4>
									</div>
									<div class="mb-3 row">
										<label class="col-lg-4 col-form-label" for="ul_1000">Pecahan 1.000
											<span class="text-danger">*</span>
										</label>
										<div class="form-group col-lg-4">
											<input type="text" class="form-control" id="ul_1000" name="ul_1000" placeholder="ie. 1.000">
											
										</div>
										<div class="form-group col-lg-4">
											<input type="text" class="form-control" id="sisa_ul_1000" name="sisa_ul_1000" value="{{ $sisaUl1000 }}" disabled>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-4 col-form-label" for="ul_500">Pecahan 500
											<span class="text-danger">*</span>
										</label>
										<div class="form-group col-lg-4">
											<input type="text" class="form-control" id="ul_500" name="ul_500" placeholder="ie. 500">
											
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="sisa_ul_500" name="sisa_ul_500" value="{{ $sisaUl500 }}" disabled>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-4 col-form-label" for="ul_200">Pecahan 200
											<span class="text-danger">*</span>
										</label>
										<div class="form-group col-lg-4">
											<input type="text" class="form-control" id="ul_200" name="ul_200" placeholder="ie. 200">
											
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="sisa_ul_200" name="sisa_ul_200" value="{{ $sisaUl200 }}" disabled>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-4 col-form-label" for="ul_100">Pecahan 100
											<span class="text-danger">*</span>
										</label>
										<div class="form-group col-lg-4">
											<input type="text" class="form-control" id="ul_100" name="ul_100" placeholder="ie. 100">
											
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="sisa_ul_100" name="sisa_ul_100" value="{{ $sisaUl100 }}" disabled>
										</div>
									</div>

									<div class="mb-3 row">
										<label class="col-lg-4 col-form-label" for="ul_50">Pecahan 50
											<span class="text-danger">*</span>
										</label>
										<div class="form-group col-lg-4">
											<input type="text" class="form-control" id="ul_50" name="ul_50" placeholder="ie. 100" required>
											
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="sisa_ul_50" name="sisa_ul_50" value="{{ $sisaUl50 }}" disabled>
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
</div>


	<!-- Include Bootstrap Datepicker library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

	<script>
		$(document).ready(function() {
			$("#datepicker1").datepicker({
				format: "dd-mm-yyyy",
			});

			$("#datepicker2").datepicker({
				format: "mm-yyyy",
				viewMode: "months",
				minViewMode: "months"
			});

		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#myForm').validate({
				rules: {
					periode_penyetoran: {
						required: true,
					},
					uk_100000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_100000').val());
                		}
					},
					uk_50000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_50000').val());
                		}
					},
					uk_20000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_20000').val());
                		}
					},
					uk_10000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_10000').val());
                		}
					},
					uk_5000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_5000').val());
                		}
					},
					uk_2000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_2000').val());
                		}
					},
					uk_1000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_uk_1000').val());
                		}
					},
					ul_1000: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_ul_1000').val());
                		}
					},
					ul_500: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_ul_500').val());
                		}
					},
					ul_200: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_ul_200').val());
                		}
					},
					ul_100: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_ul_100').val());
                		}
					},
					ul_50: {
						max: function() {
						// Compare uk_100000 value with sisa_uk_100000
						return parseFloat($('#sisa_ul_50').val());
                		}
					},
				},
				messages: {
					periode_penyetoran: {
						required: 'Please Enter Periode',
					},
					uk_100000: {
						max: 'Value must be less than or equal to sisa_uk_100000'
					},
					uk_50000: {
						max: 'Value must be less than or equal to sisa_uk_50000'
					},
					uk_20000: {
						max: 'Value must be less than or equal to sisa_uk_20000'
					},
					uk_10000: {
						max: 'Value must be less than or equal to sisa_uk_10000'
					},
					uk_5000: {
						max: 'Value must be less than or equal to sisa_uk_5000'
					},
					uk_2000: {
						max: 'Value must be less than or equal to sisa_uk_2000'
					},
					uk_1000: {
						max: 'Value must be less than or equal to sisa_uk_1000'
					},
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				},
			});
		});
	</script>
	@endsection