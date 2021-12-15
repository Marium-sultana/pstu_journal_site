<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Admin panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link  href="{{asset('public/asset/css/bootstrap-cerulean.css')}}" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="{{asset('public/asset/css/bootstrap-responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/asset/css/charisma-app.css')}}" rel="stylesheet">
	<link href="{{asset('public/asset/css/jquery-ui-1.8.21.custom.css')}}" rel="stylesheet">
	<link href="{{asset('public/asset/css/fullcalendar.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/fullcalendar.print.css')}}" rel='stylesheet'  media='print'>
	<link href="{{asset('public/asset/css/chosen.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/uniform.default.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/colorbox.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/jquery.cleditor.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/jquery.noty.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/noty_theme_default.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/elfinder.min.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/elfinder.theme.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/jquery.iphone.toggle.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/opa-icons.css')}}" rel='stylesheet'>
	<link href="{{asset('public/asset/css/uploadify.css')}}" rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome to Admin Login</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
				<div class="alert alert-info">
						<h3 style="color: red" id = "message_alert"> 
							<?php
								//$msg=$this->session->userdata('message');
							$msg = '';
								if($msg)
								{
									echo $msg;
									$this->session->unset_userdata('message');
								}
							
							?>
						</h3>
					</div>
					@if($message = Session::get('danger'))
						<div class="alert alert-danger">
							{{$message}}
						</div>
					@endif
                    <form class="form-horizontal" action="{{url('admin/checkLogin')}}" method="post">
                    @csrf
						<fieldset>
						<div class="login_section">
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on">
                                    <i class="icon-user"></i>
                                </span>
                                <input autofocus class="input-large span10" name="admin_email" id="username" type="text"  />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on">
                                    <i class="icon-lock"></i>
                                </span>
                                <input class="input-large span10" name="admin_password" id="password" type="password" />
							</div>
							<div class="clearfix"></div>
							<p class="center span5">
								<button type="submit" class="btn btn-primary">Login</button>
								<button type="button" class="btn btn-warning" id="forget_pass">Forget Password</button>
							</p>
							</div>

							<div class= "recovery_section">
							<div class="input-prepend recovery" title="Email Address" data-rel="tooltip" style="display:none">
								<span class="add-on"><i class="icon-user"></i></span>
								<input autofocus class="input-large span10" name="recovery_email" id="recovery_email" type="text" placeholder="Enter your email address"/>
								<button type="button" class="btn btn-success" id="get_otp">Get OTP</button>
							</div>
							<div class="input-prepend otp" title="OTP" data-rel="tooltip" style="display:none">
								<span class="add-on"><i class="icon-user"></i></span>
								<input autofocus class="input-large span10" name="otp" id="otp" type="text"  placeholder="Insert OTP"/>
								<button type="button" class="btn btn-success" id="otp_submit">submit</button>
							</div>
							<div class="input-prepend new_pass" title="Recovery Password" data-rel="tooltip" style="display:none" >
								<span class="add-on"><i class="icon-lock"></i></span>
								<input autofocus class="input-large span7" name="new password" id="new_pass_val" type="password" placeholder="Enter new passward" /><br>
								<span class="add-on"><i class="icon-lock"></i></span>
								<input autofocus class="input-large span7" name="confirm password" id="confirm_pass_val" type="password" placeholder="Confirm passward" />
								<button type="button" class="btn btn-success" id="new_pass_submit">submit</button>
							</div>
						</div>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="{{asset('public/asset/js/jquery-1.7.2.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset('public/asset/js/jquery-ui-1.8.21.custom.min.js')}}"></script>
	<!-- transition / effect library -->
	<script src="{{asset('public/asset/js/bootstrap-transition.js')}}"></script>
	<!-- alert enhancer library -->
	<script src="{{asset('public/asset/js/bootstrap-alert.js')}}"></script>
	<!-- modal / dialog library -->
	<script src="{{asset('public/asset/js/bootstrap-modal.js')}}"></script>
	<!-- custom dropdown library -->
	<script src="{{asset('public/asset/js/bootstrap-dropdown.js')}}"></script>
	<!-- scrolspy library -->
	<script src="{{asset('public/asset/js/bootstrap-scrollspy.js')}}"></script>
	<!-- library for creating tabs -->
	<script src="{{asset('public/asset/js/bootstrap-tab.js')}}"></script>
	<!-- library for advanced tooltip -->
	<script src="{{asset('public/asset/js/bootstrap-tooltip.js')}}"></script>
	<!-- popover effect library -->
	<script src="{{asset('public/asset/js/bootstrap-popover.js')}}"></script>
	<!-- button enhancer library -->
	<script src="{{asset('public/asset/js/bootstrap-button.js')}}"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="{{asset('public/asset/js/bootstrap-collapse.js')}}"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="{{asset('public/asset/js/bootstrap-carousel.js')}}"></script>
	<!-- autocomplete library -->
	<script src="{{asset('public/asset/js/bootstrap-typeahead.js')}}"></script>
	<!-- tour library -->
	<script src="{{asset('public/asset/js/bootstrap-tour.js')}}"></script>
	<!-- library for cookie management -->
	<script src="{{asset('public/asset/js/jquery.cookie.js')}}"></script>
	<!-- calander plugin -->
	<script src="{{asset('public/asset/js/fullcalendar.min.js')}}"></script>
	<!-- data table plugin -->
	<script src="{{asset('public/asset/js/jquery.dataTables.min.js')}}"></script>

	<!-- chart libraries start -->
	<script src="{{asset('public/asset/js/excanvas.js')}}"></script>
	<script src="{{asset('public/asset/js/jquery.flot.min.js')}}"></script>
	<script src="{{asset('public/asset/js/jquery.flot.pie.min.js')}}"></script>
	<script src="{{asset('public/asset/js/jquery.flot.stack.js')}}"></script>
	<script src="{{asset('public/asset/js/jquery.flot.resize.min.js')}}"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="{{asset('public/asset/js/jquery.chosen.min.js')}}"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="{{asset('public/asset/js/jquery.uniform.min.js')}}"></script>
	<!-- plugin for gallery image view -->
	<script src="{{asset('public/asset/js/jquery.colorbox.min.js')}}"></script>
	<!-- rich text editor library -->
	<script src="{{asset('public/asset/js/jquery.cleditor.min.js')}}"></script>
	<!-- notification plugin -->
	<script src="{{asset('public/asset/js/jquery.noty.js')}}"></script>
	<!-- file manager library -->
	<script src="{{asset('public/asset/js/jquery.elfinder.min.js')}}"></script>
	<!-- star rating plugin -->
	<script src="{{asset('public/asset/js/jquery.raty.min.js')}}"></script>
	<!-- for iOS style toggle switch -->
	<script src="{{asset('public/asset/js/jquery.iphone.toggle.js')}}"></script>
	<!-- autogrowing textarea plugin -->
	<script src="{{asset('public/asset/js/jquery.autogrow-textarea.js')}}"></script>
	<!-- multiple file upload plugin -->
	<script src="{{asset('public/asset/js/jquery.uploadify-3.1.min.js')}}"></script>
	<!-- history.js')}} for cross-browser state change on ajax -->
	<script src="{{asset('public/asset/js/jquery.history.js')}}"></script>
	<!-- application script for Charisma demo -->
	<script src="{{asset('public/asset/js/charisma.js')}}"></script>
	
	<script>
	var new_otp = 0;
		$('#forget_pass').click(function(){
			$('.recovery').show();
			$('.login_section').hide();
			

		});
		$('#get_otp').click(function(){
			
			var recovery_mail = $('#recovery_email').val();
			if(recovery_mail == ''){
				//$("#message_alert").show();
				$("#message_alert").html("Please Insert Email Address!!!");
				return false;
			}else{
				$("#message_alert").html("");
				var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(!regex.test(recovery_mail)) {
					$("#message_alert").html("Invalid Email Address!!!");
					return false;
				}
				$("#message_alert").html("Check your mail for OTP!!!");
			}
			
			$.ajax(
				{
					url: "otp_generate",
					data: {recovery_mail:recovery_mail},
				 success: function(result){
					 if(result != 0){
						$('.otp').show();
						console.log(result);
						new_otp = result;
					 }else{
						$("#message_alert").html("Mail address not Found!!!");
						return false;
					 }
					
 			 }});
		});

		
		$('#otp_submit').click(function(){
			var input_otp = $('#otp').val();
			 if(input_otp == new_otp ){
				 $('.new_pass').show();
				 $('.recovery').hide();
				 $('.otp').hide();
				 $("#message_alert").html("");
			 }else{
				$('#otp').val('');
				$("#message_alert").html("OTP not matched!!!");
				return false;
			 }
			
		});
		$('#new_pass_submit').click(function(){
			var input_new_pass = $('#new_pass_val').val();
			var input_confirm_pass = $('#confirm_pass_val').val();
			if(input_new_pass === input_confirm_pass){
			var recovery_mail = $('#recovery_email').val();
				$.ajax(
				{
					url: "update_pass",
					data: {new_pass:input_new_pass, recovery_mail:recovery_mail},
				 success: function(result){
					 if(result == 1){
						$('.recovery_section').hide();
						$('.login_section').show();
						$("#message_alert").html("Password has been updated!!! Please login!!! ");
					 }
					
 			 }});
			}
		})
	</script>	
		
	</body>
</html>
