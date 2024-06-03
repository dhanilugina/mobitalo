@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Tasks</li>
				<li class="breadcrumb-item" aria-current="page">Approval History</li>
				<li class="breadcrumb-item active" aria-current="page">View</li>
			</ol>
		</nav>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Details Changes</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3">
							<p>Tanggal Request </p>
						</div>
						<div class="col-lg-3">
							<p><strong>{{ $myRequestShow -> created_at }}</strong></p>
						</div>
						<div class="col-lg-3">
							<p>Requestor </p>
						</div>
						<div class="col-lg-3">
							<p><b>{{ $myRequestShow -> created_by }}</b></p>
						</div>
						<div class="col-lg-3">
							<p>Jenis Adjustment</p>
						</div>
						<div class="col-lg-3">
							<p><b>{{ $myRequestShow -> adjustment_type }}</b></p>
						</div>
						<div class="col-lg-3">
							<p>Periode</p>
						</div>
						<div class="col-lg-3">
							<p><b>{{ $myRequestShow -> period }}</b></p>
						</div>
						<div class="col-lg-3">Show Attachment</div>
						<div class="col-lg-3">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
								Files
							</button>

							<!-- Modal -->
							<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content align-items-center">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										<embed src="data:application/pdf;base64,{{ base64_encode($fileContent) }}" width="600" height="500" type='application/pdf'>


										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<h5 class="mb-3">Uang Pecahan Kertas</h5>
								<table class="table table-bordered table-responsive-sm text-center">
									<thead>
										<tr>
											<th>#</th>
											<th>Uang Pecahan</th>
											<th>Before</th>
											<th>After</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>1</th>
											<td>100.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk100000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk100000 }}</td>
										</tr>
										<tr>
											<th>2</th>
											<td>50.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk50000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk50000 }}</td>
										</tr>
										<tr>
											<th>3</th>
											<td>20.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk20000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk20000 }}</td>
										</tr>
										<tr>
											<th>4</th>
											<td>10.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk10000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk10000 }}</td>
										</tr>
										<tr>
											<th>5</th>
											<td>5.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk5000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk5000 }}</td>
										</tr>
										<tr>
											<th>6</th>
											<td>2.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk2000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk2000 }}</td>
										</tr>
										<tr>
											<th>7</th>
											<td>1.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_uk1000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_uk1000 }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<h5 class="mb-3">Uang Pecahan Koin</h5>
								<table class="table table-bordered table-responsive-sm text-center">
									<thead>
										<tr>
											<th>#</th>
											<th>Uang Pecahan</th>
											<th>Before</th>
											<th>After</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>1</th>
											<td>1.000</td>
											<td class="text-danger">{{ $myRequestShow -> before_ul1000 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_ul1000 }}</td>
										</tr>
										<tr>
											<th>2</th>
											<td>500</td>
											<td class="text-danger">{{ $myRequestShow -> before_ul500 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_ul500 }}</td>
										</tr>
										<tr>
											<th>3</th>
											<td>200</td>
											<td class="text-danger">{{ $myRequestShow -> before_ul200 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_ul200 }}</td>
										</tr>
										<tr>
											<th>4</th>
											<td>100</td>
											<td class="text-danger">{{ $myRequestShow -> before_ul100 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_ul100 }}</td>
										</tr>
										<tr>
											<th>5</th>
											<td>50</td>
											<td class="text-danger">{{ $myRequestShow -> before_ul50 }}</td>
											<td class="text-primary">{{ $myRequestShow -> after_ul50 }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	@endsection