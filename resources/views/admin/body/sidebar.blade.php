<div class="dlabnav">
	<div class="dlabnav-scroll">
		<ul class="metismenu" id="menu">
			<!-- Dashboard -->
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="las la-campground"></i>
					<span class="nav-text">Dashboard</span>
				</a>
				<ul aria-expanded="false">
					@php
						$role = Auth::user()->roles;
						$bankName = Auth::user()->bank_name;
						$bankClass = Auth::user()->bank_class;
						$year = $date = date('Y', time());;
						if($role == 'administrator' || $role == 'bank_manager'){
					@endphp
					<li><a href="{{ route('dashboardProjection.index', ['bank_name' => '', 'bank_class' => '', 'periode' => '']) }}">Proyeksi</a></li>
					<li><a href="{{ route('dashboardRealization.index', ['bank_name' => '', 'bank_class' => '', 'periode' => '']) }}">Realisasi</a></li>
					@php
						}else{
					@endphp
					<li><a href="{{ route('dashboardProjection.index', ['bank_name' => $bankName, 'bank_class' => $bankClass, 'periode' => $year]) }}">Proyeksi</a></li>
					<li><a href="{{ route('dashboardRealization.index', ['bank_name' => $bankName, 'bank_class' => $bankClass, 'periode' => $year]) }}">Realisasi</a></li>
					
					@php } @endphp
				</ul>

			</li>
			<!-- Proyeksi -->
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="las la-check-circle"></i>
					<span class="nav-text">Proyeksi</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('storeProjection.index')}}">Penyetoran</a></li>
					<li><a href="{{ route ('withdrawalProjection.index')}}">Penarikan</a></li>
					@php
					if($role == 'administrator' || $bankName == 'Bank Indonesia'){
					@endphp
					<li><a href="{{ route('destructionProjection.index')}}">Pemusnahan</a></li>
					@php } @endphp
				</ul>
			</li>

			<!-- Realisasi -->
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="las la-check-double"></i>
					<span class="nav-text">Realisasi</span>
				</a>
				<ul aria-expanded="false">
					@php
					if($role == 'administrator'){
					@endphp
					<li><a href="{{ route ('storeUleRealization.index')}}">Penyetoran ULE</a></li>
					<li><a href="{{ route ('storeUtleRealization.index')}}">Penyetoran UTLE</a></li>	
					<li><a href="{{ route ('storeRealization.index')}}">Penyetoran BI</a></li>	
					<li><a href="{{ route ('withdrawalRealization.index')}}">Penarikan</a></li>
					<li><a href="{{ route ('destructionRealization.index') }}">Pemusnahan</a></li>
					@php
					}else if($bankName == 'Bank Indonesia'){ 
					@endphp
					<li><a href="{{ route ('storeRealization.index')}}">Penyetoran</a></li>
					<li><a href="{{ route ('withdrawalRealization.index')}}">Penarikan</a></li>
					<li><a href="{{ route ('destructionRealization.index') }}">Pemusnahan</a></li>
					@php			
					}else{ 
					@endphp
					<li><a href="{{ route ('storeUleRealization.index')}}">Penyetoran ULE</a></li>
					<li><a href="{{ route ('storeUtleRealization.index')}}">Penyetoran UTLE</a></li>
					<li><a href="{{ route ('withdrawalRealization.index')}}">Penarikan</a></li>
					@php } @endphp
				</ul>
			</li>

			<!-- Tasks -->
			@php
			$role = Auth::user()->roles;
			if ($role == 'administrator' || $role == 'bank_manager'){
			@endphp
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="las la-tasks"></i>
					<span class="nav-text">Tasks</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('myRequest.index')}}">My Request</a></li>
					<li><a href="{{ route('approvalHistory.index') }}">Approval History</a></li>
				</ul>
			</li>
				
			@php
			}else{
			@endphp

			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="las la-tasks"></i>
					<span class="nav-text">Tasks</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('approvalHistory.index') }}">Approval History</a></li>
				</ul>
			</li>	

			@php
			}
			@endphp


			<!-- Tasks -->
			@php
			$role = Auth::user()->roles;
			if ($role == 'administrator'){
			@endphp
			<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="las la-tools"></i>
					<span class="nav-text">Settings</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('user.all')}}">Users</a></li>
				</ul>
			</li>
			@php
			}
			@endphp
		</ul>

		<div class="mt-5"></div>
		<hr style="width: 70%; margin: 0 auto;">


		<div class="copyright text-center">

			<p>Monitoring Bank Indonesia <br>Gorontalo</p>
			<p class="fs-12">Made with <span class="heart"></span></p>
		</div>
	</div>
</div>