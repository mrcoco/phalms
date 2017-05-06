<!DOCTYPE HTML>
<html>
<head>
<title>Zfl-Admin - Zakat For Life Administrator Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Zakat For Life Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
{{ stylesheet_link(["admin/css/bootstrap.min.css","media":"screen"]) }}
<!-- Custom CSS -->
{{ stylesheet_link(["admin/css/style.css","media":"screen"]) }}
<!-- Graph CSS -->
{{ stylesheet_link(["admin/css/font-awesome.css","media":"screen"]) }}
<!-- jQuery -->
{{ stylesheet_link('bootgrid/jquery.bootgrid.css') }}
<!-- lined-icons -->
{{ stylesheet_link(["admin/css/icon-font.min.css","media":"screen"]) }}
<!-- //lined-icons -->
{{ stylesheet_link('trumbowyg/dist/ui/trumbowyg.min.css') }}
{{ stylesheet_link('admin/css/bootstrap-datepicker3.css') }}



<!-- chart -->
{{ javascript_include("admin/js/Chart.js") }}
<!-- //chart -->
<!--animate-->
{{ stylesheet_link(["admin/css/animate.css","media":"all"]) }}
{{ stylesheet_link('css/toastr.min.css') }}
{{ javascript_include("admin/js/wow.min.js") }}
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!--webfonts->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
 <!-- Meters graphs -->
<script src=""></script>
{{ javascript_include("admin/js/jquery-1.10.2.min.js") }}
<!-- Placed js at the end of the document so the pages load faster -->
	<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
	<script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('8e9e51055c3857364c1e', {
            cluster: 'ap1',
            encrypted: true
        });
        var a_mesg= [];
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            a_mesg["alert"] = "sukses";
            a_mesg["title"] = data.title;
            a_mesg["msg"] = "#donation program "+data.message;
            notif_show(a_mesg);
            notification();
        });
	</script>
</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="#">Zakat <span>ForLife</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="{{ url() }}"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a href="#"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
						<li class="menu-list">
							<a href="#"><i class="lnr lnr-cog"></i>
								<span>Setting</span></a>
								<ul class="sub-menu-list">
									<li>{{ link_to("users", "Users") }} </li>
									<li>{{ link_to("permissions", "Permission") }}</li>
								</ul>
						</li>
						<li><a href="forms.html"><i class="lnr lnr-picture"></i> <span>Image</span></a>
							<ul class="sub-menu-list">
								<li>{{ link_to("banner", "Banner") }} </li>
								<li>{{ link_to("gallery", "Gallery") }} </li>
							</ul>
						</li>
						<li><a href="tables.html"><i class="lnr lnr-rocket"></i> <span>campaign</span></a>
							<ul class="sub-menu-list">
								<li>{{ link_to("program", "Program") }} </li>
								<li>{{ link_to("program/category", "Category") }} </li>
							</ul>
						</li>              
						<li class="menu-list"><a href="#"><i class="lnr lnr-envelope"></i> <span>Inbox</span></a>
							<ul class="sub-menu-list">
								<li>{{ link_to("donation", "Donation") }} </li>
								<li>{{ link_to("newsletter", "Compose Newsletter") }} </li>
							</ul>
						</li>      
						<li class="menu-list"><a href="#"><i class="lnr lnr-indent-increase"></i> <span>Content</span></a>
							<ul class="sub-menu-list">
								<li>{{ link_to("blog", "Content") }} </li>
								<li>{{ link_to("blog/category", "Category") }} </li>
							</ul>
						</li>
						<li>{{ link_to("service", '<i class="lnr lnr-select"></i> <span>Service</span>') }}</li>
						<li class="menu-list"><a href="#"><i class="lnr lnr-book"></i>  <span>Pages</span></a> 
							<ul class="sub-menu-list">
								<li>{{ link_to("page", "Pages") }} </li>
								<li>{{ link_to("page/category", "Category") }} </li>
							</ul>
						</li>
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge" id="count_donation"></span></a>
									<ul class="dropdown-menu" id="list_donation">
										<li>
											<div class="notification_bottom">
												<a href="{{ url("donation") }}">See all Donation</a>
											</div>
										</li>
									</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue" id="count_confirm"></span></a>
									<ul class="dropdown-menu" id="list_confirm">
										 <li>
											<div class="notification_bottom">
												<a href="{{ url("donation") }}">See all confirmation</a>
											</div> 
										</li>
									</ul>
							</li>
							<div class="clearfix"></div>	
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(admin/images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p>Dwi Agus<span>Administrator</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li>{{ link_to("#", '<i class="fa fa-user"></i>Profile') }} </li> 
									<li>{{ link_to("session/logout", '<i class="fa fa-sign-out"></i> Logout') }}</li> 
								
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		           	
					<div class="clearfix"></div>
				</div>
			  </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->
    
			<div id="page-wrapper">    
				<div class="graphs">
            		{{ content()}}									
					<div class="clearfix"> </div>
				</div>

			</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2017 Zakat For Life Admin Panel. All Rights Reserved | <a href="https://http://baitulmalfkam.com//" target="_blank">Baitulmal FKAM.</a></p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
{{ javascript_include("admin/js/jquery.nicescroll.js") }}
{{ javascript_include("admin/js/scripts.js") }}
<!-- Bootstrap Core JavaScript -->
{{ javascript_include("admin/js/bootstrap.min.js") }}
{{ javascript_include("admin/js/bootstrap-datepicker.js") }}
{{ javascript_include("js/toastr.min.js") }}
{{ javascript_include("js/alert.js") }}
{{ javascript_include("bootgrid/jquery.bootgrid.js") }}
{{ javascript_include('js/jquery.form.min.js') }}
{{ javascript_include('admin/js/jquery.maskMoney.js') }}
{{ javascript_include('tableexport/libs/FileSaver/FileSaver.min.js') }}
{{ javascript_include('tableexport/libs/js-xlsx/xlsx.core.min.js') }}
{{ javascript_include('tableexport/tableExport.min.js') }}
{% if js is defined %}
    {{ partial(js) }}
{% endif %}
{% if wysiwyg is defined %}
    {{ javascript_include('trumbowyg/dist/trumbowyg.min.js') }}
{% endif %}

 <script>
	 notification();
	 function notification() {
         $.getJSON("{{ url('alertdonation') }}", function (data) {
             $('#count_donation').html(data.count);
             $.each(data.result, function(index, element) {
                 var _html = '<li><a href="#"><div class="user_img"><img src="images/1.png" alt=""></div><div class="notification_desc"><p>'+element.name+'</p><p><span>'+element.program+'</span></p></div><div class="clearfix"></div></a></li>'
                 $('#list_donation').prepend(_html);
             });
         });
         $.getJSON("{{ url('alertconfirmation') }}", function (data) {
             $('#count_confirm').html(data.count);
             $.each(data.result, function(index, element) {
                 var __html = '<li><a href="#"><div class="user_img"><img src="images/1.png" alt=""></div><div class="notification_desc"><p>'+element.name+'</p><p><span>'+element.program+'</span></p></div><div class="clearfix"></div></a></li>'
                 $('#list_confirm').prepend(__html);
             });
         });
     }

 </script>

</body>
</html>