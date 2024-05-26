@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<div class="row">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Realisasi</li>
				<li class="breadcrumb-item" aria-current="page">Penarikan</li>
				<li class="breadcrumb-item active" aria-current="page">List</li>
			</ol>
		</nav>
	</div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Realisasi Penarikan Ke Bank Indonesia</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="mb-4">
                        @php
                        $today = date('m-Y', time());
                        @endphp
                        <a href="{{ route('withdrawalRealization.add', ['periode' => $today]) }}" class="btn btn-primary btn-rounded fs-18">+ Tambah Realisasi</a>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-bordered table-responsive-sm display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">#</th>
                                    <th rowspan="2" class="text-center">Nama Bank</th>
                                    <th rowspan="2" class="text-center">Periode</th>
                                    <th colspan="7" class="text-center">Uang Pecahan Kertas</th>
                                    <th colspan="5" class="text-center">Uang Pecahan Kertas</th>
                                </tr>
                                <tr>
                                    <th>Uk 100.000</th>
                                    <th>Uk 50.000</th>
                                    <th>Uk 20.000</th>
                                    <th>Uk 10.000</th>
                                    <th>Uk 5.000</th>
                                    <th>Uk 2.000</th>
                                    <th>Uk 1.000</th>
                                    <th>Ul 1.000</th>
                                    <th>Ul 500</th>
                                    <th>Ul 200</th>
                                    <th>Ul 100</th>
                                    <th>Ul 5 0</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center ">
                                @foreach($proyeksiAll as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td class="text-nowrap">{{ $item -> bank_name }}</td>
                                    <td class="text-nowrap">{{ $item -> periode }}</td>
                                    <td>{{ $item -> uk100000 }}</td>
                                    <td>{{ $item -> uk50000 }}</td>
                                    <td>{{ $item -> uk20000 }}</td>
                                    <td>{{ $item -> uk10000 }}</td>
                                    <td>{{ $item -> uk5000 }}</td>
                                    <td>{{ $item -> uk2000 }}</td>
                                    <td>{{ $item -> uk1000 }}</td>
                                    <td>{{ $item -> ul1000 }}</td>
                                    <td>{{ $item -> ul500 }}</td>
                                    <td>{{ $item -> ul200 }}</td>
                                    <td>{{ $item -> ul100 }}</td>
                                    <td>{{ $item -> ul50 }}</td>
                                    <td>
                                        <div class="dropdown ms-auto text-end">
                                            <div class="btn-link" data-bs-toggle="dropdown">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('withdrawalRealization.view',$item->id)}}">View</a>
                                                <!-- <a class="dropdown-item" href="">Edit</a> -->
                                                <a class="dropdown-item" href="{{ route('withdrawalRealization.delete',$item->id)}}" id="delete">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection