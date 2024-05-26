@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Users</h4>
                            </div>
                            <div class="card-body">	
                            <div class="row">
                                    <div class="mb-4">
										<a href="{{ route('user.add')}}" class="btn btn-primary btn-rounded fs-18">+ Add User</a>
									</div>
                                </div>
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover table-bordered table-responsive-sm" style="min-width: 845px">
                                        <thead  class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Created Date</th>
                                                <th>Email</th>
                                                <th>Fullname</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th width="70px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $item)
                                        <?php $status = $item->status; ?>
                                            <tr >
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item -> created_at }}</td>
												<td>{{ $item -> email }}</td>
												<td>{{ $item -> name }}</td>
												<td>{{ $item -> roles }}</td>
												<td><span class="badge light {{ $status == '1' ? 'badge-primary' : 'badge-warning' }}">{{ $status == '1' ? 'Active' : 'Deleted' }}</span>
</td>
												<td>
                                                <a class="btn btn-outline-primary" href="{{ route('user.edit',$item->id)}}"><i class="las la-paper-plane"></i> Details</a>
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

@if (Session::has('message'))
<script>
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Your work has been saved",
    showConfirmButton: false,
    timer: 1500
    });
</script>
@endif
@endsection