@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<div class="row">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Realisasi</li>
				<li class="breadcrumb-item" aria-current="page">Penarikan</li>
				<li class="breadcrumb-item active" aria-current="page">View</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Realisasi Penarikan ke Bank Indonesia</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="mb-3 row">
							<label class="col-lg-3 col-form-label" for="uk-100000">Periode Penyetoran
							</label>
							<div class="col-lg-9">
								<input type="text" class="form-control" id="datepicker" name="periode" value="{{ $proyeksiView -> periode }}" disabled>
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
											<input type="text" class="form-control" id="uk_100000" name="uk_100000" value="{{ $proyeksiView -> uk100000}}" disabled>
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
											<input type="text" class="form-control" id="uk_50000" name="uk_50000" value="{{ $proyeksiView -> uk50000}}" disabled>
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
											<input type="text" class="form-control" id="uk_20000" name="uk_20000" value="{{ $proyeksiView -> uk20000}}" disabled>
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
											<input type="text" class="form-control" id="uk_10000" name="uk_10000" value="{{ $proyeksiView -> uk10000}}" disabled>
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
											<input type="text" class="form-control" id="uk_5000" name="uk_5000" value="{{ $proyeksiView -> uk5000}}" disabled>
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
											<input type="text" class="form-control" id="uk_2000" name="uk_2000" value="{{ $proyeksiView -> uk2000}}" disabled>
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
											<input type="text" class="form-control" id="uk_1000" name="uk_1000" value="{{ $proyeksiView -> uk1000}}" disabled>
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
										<input type="text" class="form-control" id="ul_1000" name="ul_1000" value="{{ $proyeksiView -> ul1000}}" disabled>
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
										<input type="text" class="form-control" id="ul_500" name="ul_500" value="{{ $proyeksiView -> ul500}}" disabled>
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
										<input type="text" class="form-control" id="ul_200" name="ul_200" value="{{ $proyeksiView -> ul200}}" disabled>
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
										<input type="text" class="form-control" id="ul_100" name="ul_100" value="{{ $proyeksiView -> ul100}}" disabled>
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
										<input type="text" class="form-control" id="ul_50" name="ul_50" value="{{ $proyeksiView -> ul50}}" disabled>
										<div class="invalid-feedback">
											Please enter a username.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>



	@endsection