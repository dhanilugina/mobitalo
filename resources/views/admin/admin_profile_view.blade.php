@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Profile</h4>
                    <div class="dropdown ms-auto">
                        <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                </g>
                            </svg></a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> <a href="{{route('edit.profile')}}">Edit profile</a></li>
                            <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> Change Password</li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="Email" value="{{ $adminData->email}}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Fullname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Fullname" value="{{ $adminData->name}}" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Profile Picture</label>
                                <div class="col-sm-9">
                                    <div class="profile-photo">
                                        <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" width="100px" height="100px" class="img-fluid rounded" alt="">
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