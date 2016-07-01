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
<div class]='row'>
	<form class="form-horizontal" role="form" action='http://sms.nestweaver.com/public/post-user' method='post'>
<div class="row clearfix"> 
							<div class="col-md-6">
								<h5 class="text-center">Consumer Details</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtfirstname"> First Name </label>
									<div class="col-sm-9">				 
										<input type="text" id="txtfirstname" name='txtfirstname' placeholder="First Name" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtlastname"> Last Name </label>
									<div class="col-sm-9">								 
										<input type="text" id="txtlastname" name='txtlastname' placeholder="Last Name" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtemail"> Email(User name) </label>
									<div class="col-sm-9">								 
										<input type="text" id="txtemail" name='txtemail' placeholder="Email" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtpassword"> Password </label>
									<div class="col-sm-9">
										 
										<input type="text" id="txtpassword" name='txtpassword' placeholder="Password" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtDesc"> Description </label>
									<div class="col-sm-9">								 
										<textarea  id="txtDesc" name='txtDesc' placeholder="Description" class="col-xs-10" value=''></textarea>
										<span></span>
									</div>
								</div>
							</div>		
							<div class="col-md-6">
								<h5 class="text-center">SMS API Details</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="url"> URL </label>
									<div class="col-sm-9">				 
										<input type="url" id="url" name='url' placeholder="URL" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtusername"> Username </label>
									<div class="col-sm-9">								 
										<input type="text" id="txtusername" name='txtusername' placeholder="Username" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtpwd"> Password </label>
									<div class="col-sm-9">								 
										<input type="password" id="txtpwd" name='txtpwd' placeholder="Password" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtsendername"> Sender Name </label>
									<div class="col-sm-9">										 
										<input type="text" id="txtsendername" name='txtsendername' placeholder="Sender Name" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtsmscredit"> SMS Credits </label>
									<div class="col-sm-9">										 
										<input type="text" id="txtsmscredit" name='txtsmscredit' placeholder="Sender Name" class="col-xs-10" value=''>
										<span></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-actions clearfix">
								<div class="col-md-offset-5 col-md-6">
									<button class="btn" type="button">
										<i class="ace-icon fa fa-times bigger-110"></i>
										Cancel
									</button>
									&nbsp; &nbsp; &nbsp;
									<button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Submit
									</button>
								</div>
							</div>						 	
						</div>			
	</form>

</div>



<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
												<form id='frm1' name='frm1' method='get' action='http://sms.nestweaver.com/public/addressbook'>
													<input type="hidden" name="_token" value="1pNv7Tp1alO76WtgYh1WBUZGI4O9HMwuq3IXUIRq">
	  
</div>
</form>
 	
											<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info">
																								<thead>
													<tr role="row"> 
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">First Name</th>
														 
														 <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Last Name</th>
														  <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">E-mail</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
													</tr>
												</thead>
																								<tbody>
																									<tr role="row" class="odd">
							 

														<td>
															 Kumarraj
														</td>
														<td>
															 Rajalingam
														</td>
														<td>
															 smsadmin@nestweaver.com
														</td>
														<td>

		 												 <a href='http://sms.nestweaver.com/public/edit-user/1'>Edit</a> 

		 												 														</td>
													</tr>
																									<tr role="row" class="odd">
							 

														<td>
															 Demo
														</td>
														<td>
															 User1
														</td>
														<td>
															 demo@nestweaver.com
														</td>
														<td>

		 												 <a href='http://sms.nestweaver.com/public/edit-user/2'>Edit</a> 

		 												 
		 												 || <a href='http://sms.nestweaver.com/public/remove-user/2'>Delete</a>
		 												 														</td>
													</tr>
																										 </tbody>
											</table>
 									
										</div>
 
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			@include('layouts.footer')
