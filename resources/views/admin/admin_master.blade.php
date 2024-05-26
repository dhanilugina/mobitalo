<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Mobitalo" />
	<meta property="og:title" content="Mobitalo" />
	<meta property="og:description" content="Mobitalo" />
	<meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Mobitalo</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('asset/img/logo-bi.png')}}" />
	<link href="{{asset('asset/template/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{asset('asset/template/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	
	<!-- Style css -->
    <link href="{{asset('asset/template/css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<link href="https://cdn.jsdelivr.net/bootstrap.datepicker/0.1/css/datepicker.css" rel="stylesheet">

	<!-- Datatable -->
	<link href="{{ asset('asset/template/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" href="{{ asset('asset/template/vendor/chartist/css/chartist.min.css')}}">

	<style>
		.profile-picture {
			width: 50px;
			height: 50px;
			background-color: #3498db; /* default background color */
			color: #fff; /* default text color */
			font-size: 20px;
			font-weight: bold;
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 50%;
		}
	</style>
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		@include('admin.body.header')
		
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
       @include('admin.body.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			@yield('admin')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		


		
        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.body.footer')
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('asset/template/vendor/global/global.min.js')}}"></script>
	<!-- <script src="{{asset('asset/template/vendor/chart.js/Chart.bundle.min.js')}}"></script>-->
	<script src="{{asset('asset/template/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	
	<!-- Apex Chart 
	<script src="{{asset('asset/template/vendor/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{asset('asset/template/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('asset/template/vendor/chart.js/Chart.bundle.min.js')}}"></script>-->
	
	<!-- Chart piety plugin files 
    <script src="{{asset('asset/vendor/peity/jquery.peity.min.js')}}"></script>-->
	<!-- Dashboard 1 
	
	<script src="{{asset('asset/template/vendor/owl-carousel/owl.carousel.js')}}"></script>-->
	
    <script src="{{asset('asset/template/js/custom.min.js')}}"></script>
	<script src="{{asset('asset/template/js/dlabnav-init.js')}}"></script> 

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
	<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bootstrap.datepicker/0.1/js/bootstrap-datepicker.js"></script>
   
	<!-- Datatable -->
    <script src="{{ asset('asset/template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('asset/template/js/plugins-init/datatables.init.js') }}"></script>

	<!-- Sweet Alert -->
    <script src="{{ asset('asset/template/js/code.js')}}"></script>

	<!-- jQuery Validate plugin -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: false,
				navText: ['', ''],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},	
					800:{
						items:2
					},			
					991:{
						items:2
					},
					1200:{
						items:3
					},
					1600:{
						items:4
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});

		
    	// Function to generate profile picture based on initials
		function generateProfilePicture(name) {
			var initials = name.substring(0, 2).toUpperCase(); // Extract first two characters and convert to uppercase
			document.getElementById("profilePicture").innerText = initials; // Set initials as text content of profile picture
		}

		// Example usage: generate profile picture based on a two-digit first name
		var firstName = "FR"; // Change this to your desired two-digit first name
		generateProfilePicture(firstName);

</script>

@if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type','info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break; 
        }
    </script>
@endif 

<script>
		$("#datepicker").datepicker( {
			format: "mm-yyyy",
			viewMode: "months", 
			minViewMode: "months"
		});
</script>

</body>
</html>