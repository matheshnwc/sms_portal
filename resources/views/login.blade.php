@extends('app')

@section('content')
<!DOCTYPE html>
<html lang="en">   
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE = edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />      
	<title>Sms Management :: Sign Up</title>
	<!-- Bootstrap -->	
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" />
	    <link rel="stylesheet" href="{{asset('css/ace.min.css')}}">

	<!-- <link href="css/ace.min.css" rel="stylesheet" />-->
	<link href="{{asset('css/custom.css')}}" rel="stylesheet" />
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="no-skin">
	<nav class="navbar navbar-default" role="navigation">	   
	   <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
			<span class = "sr-only">Toggle navigation</span>
			<span class = "icon-bar"></span>
			<span class = "icon-bar"></span>
			<span class = "icon-bar"></span>
		</button>			
		<a class="navbar-brand" href="index.html">
			<img src="{{asset('images/logo.png')}}" rel="home" class="img-responsive" />			
		</a>
	   </div>	   
	   <div class="collapse navbar-collapse" id="example-navbar-collapse">		
		  <ul class="nav navbar-nav navbar-right">
			 <li class="active"><a href="#">Sign Up</a></li>				
		  </ul>
	   </div>	   
	</nav>
	<div class="main-container" id="main-container">
		<div class="main-content">
			<div class="main-content-inner">
				<div class="page-content">		
					<div class="container-fluid">
						<div class="flash-message">
					@include('layouts.message')
													</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-heading">Sign Up</div>
									<div class="panel-body">
										
										<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

											
											
											<div class="form-group">
												<label class="col-md-4 control-label">E-Mail Address</label>
												<div class="col-md-6">
													<input type="text" class="form-control" name="email" value="{{ old('email') }}">
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4 control-label">Password</label>
												<div class="col-md-6">
													<input type="password" class="form-control" name="password">
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<input type="checkbox" name="remember" class="pull-right margin-10">
												</div>
												<label class="col-md-6 control-label text-left">I agree terms and conditions</label>
											</div>
											
											
											<div class="form-group">
												<div class="col-md-4 col-md-offset-4">
													<button type="submit" class="btn btn-primary">Sign Up</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">Nestweaver</span>
						SMS Management &copy; 2016
					</span>

					&nbsp; &nbsp;
					<span class="action-buttons">
						<a href="#">
							<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
						</a>
					</span>
				</div>
			</div>
		</div>
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src = "js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src = "js/bootstrap.min.js"></script>
	<script src = "js/custom.js"></script>
</body>
</html>@endsection
