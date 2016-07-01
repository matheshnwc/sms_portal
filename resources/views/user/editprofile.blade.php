@include('layouts.header')
@include('layouts.sidebar')
 

 <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="http://sms.nestweaver.com/public/home">Home</a>
							</li>
							<li class="active">Contact Management</li>
						</ul><!-- /.breadcrumb -->

					 
					</div>

					<div class="page-content">
						 

						  
<div class="page-header">
	<h1>
	</h1>
</div>
<div class="flash-message">
					@include('layouts.message')
													</div>
<div class]='row'>

<div class="col-md-10">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-md-6">
 <form role="form" method="post" action="{{url('updateprofile')}}" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputdefault">First Name</label>
    <input class="form-control" id="inputdefault" value="{{$val->firstname}}"	 name="firstname" type="text" required>
  </div>
  <div class="form-group">
    <label for="inputlg">Last Name</label>
    <input class="form-control input" id="inputlg" name="lastname" value="{{$val->lastname}}" type="text">
  </div>
 <div class="form-group">
    <label for="inputsm">Mobile Number</label>
    <input class="form-control input-sm" id="inputsm"  name="mobileno"  pattern="[7-9]{1}[0-9]{9}" value="{{$val->mobileno}}" type="text" required>
  </div>
  <div class="form-group">
    <label for="inputsm">Password</label>
    <input class="form-control input-sm" id="inputsm"  name="password" value="" type="text" required>
  </div>
 <div class="form-group">
    <label for="inputsm">Profile Image</label>
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label for="inputsm">Address</label><br>
<textarea name="address" cols="20" rows="3">{{$val->address}}</textarea>
  </div>
  <input type="hidden" name="id" value="{{$val->id}}">
    <input type="hidden" name="route" value="editprofile">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" class="btn btn-info" value="Update Profile">
</form>
</div>
      </div>
</div>
</div>
   </div>
</div>
</div>
<!-- ./wrapper -->
@include('layouts.footer')
