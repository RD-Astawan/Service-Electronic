<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title','Admin Dashboard')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @stack('css-page')
	
	
	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
   
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
		#panel-pemasukan{
			display: none;
		}
	</style>
</head>
<body>
	@include('sweetalert::alert')
	
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="#" class="logo">
					<!-- <img src=" {//{ asset('assets/img/logoazzara.svg') }}" alt="navbar brand" class="navbar-brand"> -->
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
            @include('layouts.nav-header')
		</div>
            @include('layouts.sidebar')
		<div class="main-panel">
			@yield('content')
			
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<!-- jQuery UI -->
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
	<!-- Bootstrap Toggle -->
	<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
	<!-- Datatables -->
	<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
	<!-- Azzara JS -->
	<script src="{{ asset('assets/js/ready.min.js') }}"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="{{ asset('assets/js/setting-demo.js') }}"></script>
	<script >
		function switch_btn() {
			$('#panel-pemasukan').toggle(1000);
		}

		function selectFunction() {
			var id_user = document.getElementById("selectInput").value;
			// document.getElementById("dumetschool").innerHTML = "Kamu memilih Kursus di Dumet School " + x;
			//alert(x);
			$.ajax({
				type: "GET",
				url: "/selectForm/"+id_user,
				success: function(response){
					$('#no_hp').val(response.user.no_hp);
				}
			});
		}

		$(document).ready(function() {
			$('#add-row').DataTable({
			});

         // var checkbox = document.getElementById('checkbox');
         // var checkbox = document.getElementById('checkbox2');
         // var delivery_div = document.getElementById('delivery');
         // var showHiddenDiv = function(){
         //    if(checkbox.checked || checkbox.checked2) {
         //    delivery_div.style['display'] = 'block';
         //    } else {
         //    delivery_div.style['display'] = 'none';
         //    } 
         // }
         // checkbox.onclick = showHiddenDiv;
         // showHiddenDiv();

		});
	</script>
	 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
	 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	 <script>
		 $(document).ready(function() {
			$('.contact').select2();
			$('#panel-pemasukan').hide();
			//for cheked form user and pass
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			if(username=='' && password==''){
				$('#formCheked').hide();
			}
		 });
	 </script>
	 <script>
		const add = document.querySelectorAll(".input-group .add_list")
		add.forEach(function(e){
			e.addEventListener('click', function(){
				let element = this.parentElement
				//console.log(element);
				let newElement = document.createElement('div')
				newElement.classList.add('input-group')
				newElement.innerHTML = '<input type="text" name="list_tips[]" class="form-control input-square mt-3" placeholder="" aria-label="" aria-describedby="basic-addon1" required><button class="btn btn-danger btn-border input-group-prepend mt-3 remove_list" type="button">Remove</button>'
				document.getElementById('extra-list').appendChild(newElement)
				callEvent()
				
			})
		})
		callEvent()
		function callEvent(){
			document.querySelectorAll('.remove_list').forEach(function(remove){
					remove.addEventListener('click',function(elmClick){
						elmClick.target.parentElement.remove()
					})
				})
		}
	</script>
	<script>
		$(document).ready(function() {
			$('.level').click(function() {
				var kdr = $("input[type=radio][name=level]:checked").val();
				var kd = document.getElementById("read_2").value;
				if (kdr) {
					if(kdr=="admin"){
						$('#read').val("ADM"+kd);
					}
					else if(kdr=="teknisi"){
						$('#read').val("TEK"+kd);
					}
					else{
						$('#read').val("CUS"+kd);
					}
					//$('#read').val(value+kd);
				}
				else {
					alert('Nothing is selected');
				}

			})
      });

	 </script>
    <script>
		$(document).ready(function() {
         $("#delivery").hide();
			$('.ts').change(function() {
				if($('.ts').is(":checked"))   
               $("#delivery").show();
            else
               $("#delivery").hide();
			})
         $('.ta').change(function() {
				if($('.ta').is(":checked"))   
               $("#delivery").hide();
            else
               $("#delivery").hide();
			})
      });

	 </script>
</body>
</html>