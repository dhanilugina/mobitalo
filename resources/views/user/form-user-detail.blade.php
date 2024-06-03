@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Profile User</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{ route('user.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="Email" value="{{ $users->email}}" name="email" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Fullname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Fullname" value="{{ $users->name}}" name="name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="default-select form-control wide mb-3">
                                        <option>Administrator</option>
                                        <option>User Bank</option>
                                        <option>Manager</option>
                                        <option>Pengelola Kastip</option>
                                        <option>Bank Kastip</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Level Branch -->
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Kelas Bank</label>
                                <div class="col-sm-9">
                                    <select class="default-select form-control wide mb-3" name="bankClass" id="bankClass">
                                        <option value="kota" {{ $users->bank_class == 'kota' ? 'selected' : '' }}>Kota</option>
                                        <option value="kastip" {{ $users->bank_class == 'kastip' ? 'selected' : '' }}>Kastip</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="default-select form-control wide mb-3" name="status" id="status">
                                        <option value="1" {{ $users->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $users->status == 0 ? 'selected' : '' }}>Deleted</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Preview Profile Picture</label>
                                <div class="col-sm-9">
                                    <img id="showImage" src="{{ (!empty($users->profile_image))? url('upload/admin_images/'.$users->profile_image):url('upload/no_image.jpg') }}" width="100" height="100" class="img-fluid rounded" alt="">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="row justify-content-start">
                                    <div class="col-lg-12 text-start">
                                        <button type="submit" class="btn btn-outline-primary w-25">Submit</button>
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
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection