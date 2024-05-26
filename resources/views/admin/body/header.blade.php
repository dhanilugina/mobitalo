<div class="nav-header">
    <a href="{{ route('welcome') }}" class="brand-logo">
        <img src="{{asset('asset/img/logo-bi.png')}}" width="50%" height="50%">
        
        <div class="brand-title">
            <img src="{{asset('asset/img/logo-bi-title.png')}}" width="100%" height="100%">
        </div>
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
@endphp
<div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								
							<vh style="border-color: black;"></vh>
							<li class="nav-item dropdown header-profile ">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <!--<div class="profile-picture" id="profilePicture" alt=""></div>-->
									<img class="rounded-circle header-profile-user" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}"
                alt="Header Avatar">
                                    <div class="header-info ms-3">
										<span class="fs-18 font-w500 mb-2">{{$adminData->name}}</span>
										<small class="fs-12 font-w400">{{$adminData->email}}</small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('admin.profile')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="{{ route('change.password')}}" class="dropdown-item ai-icon">
                                    <i class="fas fa-key text-primary"></i>
</svg>

                                        <span class="ms-2">Change Password </span>
                                    </a>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>