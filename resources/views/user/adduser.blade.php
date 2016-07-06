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
							<li class="active">Users Management</li>
						</ul><!-- /.breadcrumb -->

					 
					</div>

					<div class="page-content">
						 

						  
<div class="page-header">
	<h1>
		Manage Users
	</h1>
</div>
<div class="flash-message">
													</div>
<div class='row'>
	<form method="post" action="saveuser">
								
								<div class="form-group col-md-6">
									<label> Name</label>
									<input class="form-control logtext" name="user[firstname]" value="" style="width:250px;" required>
								</div>
								
								<div class="form-group col-md-6">
									<label>Lastname</label>
									<input type="text" class="form-control logtext" name="user[lastname]" style="width:250px;" >
								</div>
							</div>
							
							<div class="row">
								
								<div class="form-group col-md-6">
									<label> Gender</label>
									<label class="radio-inline">
									  <input type="radio" name="user[gender]" value="Male" checked> Male
									</label>
									<label class="radio-inline">
									  <input type="radio" name="user[gender]" value="Female"> Female
									</label>
								</div>
								
								<div class="form-group col-md-6">
									<label>Email</label>
									<input type="email" class="form-control logtext" name="user[email]" style="width:250px;" value="" >
								</div>
							</div>

						   <div class="row">
                               <div class="form-group col-md-6">
									<label>Mobileno <style style="color:red">*</style></label>
									<input class="form-control logtext" name="user[mobileno]"  pattern="[7-9]{1}[0-9]{9}" style="width:250px;" required>
								</div>
								<div class="form-group col-md-6">
									<label>Password <style style="color:red">*</style></label>
									<input class="form-control logtext" name="user[password]"   style="width:250px;" required>
								</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
								 <label for="inputsm">Select Company</label>
    <select name="user[company_id]" class="form-control"  style="width:250px;">
    <option value="0" disabled="selected">--select--</option>
<?php $com=DB::table('company')->get(); ?>
@foreach($com as $val)
<option value="{{$val->id}}">{{$val->company_name}}</option>
@endforeach
</select>
                              </div>
									

									 <div class="form-group col-md-6">
									<label>Role <style style="color:red">*</style></label>
<select name="user[role]" class="form-control"  style="width:250px;">
    <option value="0" disabled="selected">--select--</option>
    <option value="2">Admin</option>
    <option value="3">User</option>				
    </select>			
    
        </div>
</div>
    								<div class="row">

										<div class="form-group col-md-6">
								<label for="inputsm">Address</label><br>
<textarea  cols="20" rows="5" name="user[address]"></textarea>
								</div>
								
								</div>
								
									 
								
										       <input type="hidden" value="userlist" name="user[route]">

							<input type="hidden" name="user[created_by]" value="<?php echo Auth::user()->id;?>">
							<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
							<div class="row">
							
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-default">Reset</button>
								</div>
						</form>
					</div>
				</div>
											</div>

				
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	<div id="container"></div>
			
			
	</div>	<!--/.main-->
  
@include('layouts.footer')



