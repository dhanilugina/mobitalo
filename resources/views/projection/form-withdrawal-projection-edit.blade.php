@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Proyeksi</li>
				<li class="breadcrumb-item" aria-current="page">Penarikan</li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Proyeksi Penarikan ke Bank Indonesia</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<form class="needs-validation" novalidate method="POST" action="{{ route('withdrawalProjection.update') }}" enctype="multipart/form-data">
							@csrf
							<div class="mb-3 row">
								<label class="col-lg-3 col-form-label" for="uk-100000">Periode Penyetoran
								</label>
								<div class="col-lg-9">

									<input type="text" class="form-control" id="datepicker" name="periode" value="{{ $proyeksiEdit -> periode }}" disabled>
									<input type="hidden" class="form-control" id="idStoreProjection" name="idStoreProjection" value="{{ $proyeksiEdit -> id }}">
									<div class="invalid-feedback">
										Please enter a username.
									</div>
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
											<input type="text" class="form-control" id="uk_100000" name="uk_100000" value="{{ number_format($proyeksiEdit -> uk100000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
											<input type="text" class="form-control" id="uk_50000" name="uk_50000" value="{{ number_format($proyeksiEdit -> uk50000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
											<input type="text" class="form-control" id="uk_20000" name="uk_20000" value="{{ number_format($proyeksiEdit -> uk20000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
											<input type="text" class="form-control" id="uk_10000" name="uk_10000" value="{{ number_format($proyeksiEdit -> uk10000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
											<input type="text" class="form-control" id="uk_5000" name="uk_5000" value="{{ number_format($proyeksiEdit -> uk5000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
											<input type="text" class="form-control" id="uk_2000" name="uk_2000" value="{{ number_format($proyeksiEdit -> uk2000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
											<input type="text" class="form-control" id="uk_1000" name="uk_1000" value="{{ number_format($proyeksiEdit -> uk1000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
										<input type="text" class="form-control" id="ul_1000" name="ul_1000" value="{{ number_format($proyeksiEdit -> ul1000)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
										<input type="text" class="form-control" id="ul_500" name="ul_500" value="{{ number_format($proyeksiEdit -> ul500)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
										<input type="text" class="form-control" id="ul_200" name="ul_200" value="{{ number_format($proyeksiEdit -> ul200)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
										<input type="text" class="form-control" id="ul_100" name="ul_100" value="{{ number_format($proyeksiEdit -> ul100)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
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
										<input type="text" class="form-control" id="ul_50" name="ul_50" value="{{ number_format($proyeksiEdit -> ul50)}}" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="formatNumber(this)">
										<div class="invalid-feedback">
											Please enter a username.
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-12">*) silahkan lampirkan nota untuk melakukan adjustment</div>
						<div class="col-lg-8 m-2">
							<div class="form-file">
								<input type="file" class="form-file-input form-control" name="fileNota" id='fileNota'>
							</div>
						</div>
					</div>
					<div class="row m-4">
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



	<script>
		function formatNumber(input) {
			// Remove existing commas and non-numeric characters
			let value = input.value.replace(/,/g, '').replace(/\D/g, '');

			// Add commas to separate thousands
			value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

			// Update input value with formatted number
			input.value = value;
		}
	</script>

	@endsection

	