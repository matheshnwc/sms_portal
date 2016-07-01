<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Sms Management :: Users Management</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" />
		<link rel="stylesheet" href="http://sms.nestweaver.com/public/css/jquery.dataTables.min.css" />
		<!-- page specific plugin styles -->
		
		<!-- text fonts -->
		<link rel="stylesheet" href="http://sms.nestweaver.com/public/cpanel/assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{asset('css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="{{asset('css/custom.css')}}" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="http://sms.nestweaver.com/public/cpanel/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="http://sms.nestweaver.com/public/cpanel/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
  		
		<script src="http://sms.nestweaver.com/public/cpanel/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="http://sms.nestweaver.com/public/cpanel/assets/js/html5shiv.min.js"></script>
		<script src="http://sms.nestweaver.com/public/cpanel/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="http://sms.nestweaver.com/public/home" class="navbar-brand">
						<img src="{{asset('/images/logo.png')}}" rel="home" class="img-responsive" />
					</a>
				</div>
					
					
				
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav"> 
											@if(Auth::user()->role_id==1)

 						<li>
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">
				  <?php $data=DB::table('companyreg')->where('status','1')->get();
echo count($data);?>              </span>

							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								@foreach($data as $val) 
								<li>
									<a href="{{url('movecompany/'.$val->id)}}">
<i class="fa fa-plus-square" aria-hidden="true"></i>
										{{$val->company_name}}
									</a>
								</li>
								@endforeach
							</ul>
						</li>
					@endif
 						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								@if(Auth::user()->profile_img>0)
								<img class="nav-user-photo" src="{{url('profilepics/'.Auth::user()->profile_img)}}" alt="Jason's Photo" />
								@else
						<img class="nav-user-photo" src="{{url('profilepics/profile.jpeg')}}" alt="Jason's Photo" />
@endif
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo Auth::user()->firstname; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="{{url('editprofile/'.Auth::user()->id)}}">
										<i class="ace-icon fa fa-power-off"></i>
										Edit Profile
									</a>
								</li> 
								<li>
									<a href="{{url('logout')}}">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
