@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Tasks</li>
				<li class="breadcrumb-item" aria-current="page">My Request</li>
				<li class="breadcrumb-item active" aria-current="page">List</li>
			</ol>
		</nav>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Tasks <i class="las la-check-circle"></i></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-bordered table-responsive-sm" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Request</th>
                                    <th>Requestor</th>
                                    <th>Jenis Adjustment</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center ">
                                @foreach($myRequest as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item -> created_at }}</td>
                                    <td>{{ $item -> created_by }}</td>
                                    <td>
                                    @php
                                        if ($item -> adjustment_type == "PP") {
                                            echo 'Proyeksi Penyetoran';
                                        } elseif ($item -> adjustment_type == "PK") {
                                            echo 'Proyeksi Penarikan';
                                        } elseif ($item -> adjustment_type == "RP") {
                                            echo 'Proyeksi Penarikan';
                                        } elseif ($item -> adjustment_type == "PD") {
                                            echo 'Proyeksi Pemusnahan';
                                        }
                                        @endphp    
                                    </td>
                                    <td>{{ $item -> period }}</td>
                                    <td><span class="badge light badge-warning">
                                        @php
                                            if ($item -> status == "0") {
                                                echo 'New';
                                            } 
                                        @endphp    
                                    </span></td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ route('myRequest.view',$item->id)}}">Details</a>
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