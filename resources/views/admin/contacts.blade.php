@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.functions')


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
		Add Contact Details
	</h1>
</div>
<div class="flash-message">
					@include('layouts.message')
													</div>
<div class]='row'>
	<form class="form-horizontal" role="form" action="{{url('savecontact')}}"  method='post'>
<div class="row clearfix"> 
							<div class="col-md-6">
								<h5 class="text-center">Contact Details</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtfirstname"> First Name </label>
									<div class="col-sm-9">
										<?php
								$firstname='';
								if(isset($contactdetails->firstname))
								{
									$firstname=$contactdetails->firstname;
								}
								?>		 				 
										<input type="text" id="txtfirstname" name='firstname' placeholder="First Name" class="col-xs-10" value='{{$firstname}}' required>
								<span><br>{!!$errors->first('firstname')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtlastname"> Last Name </label>
									<div class="col-sm-9">			
										<?php
								$lastname='';
								if(isset($contactdetails->lastname))
								{
									$lastname=$contactdetails->lastname;
								}
								?>		 					 
										<input type="text" id="txtlastname" name='lastname' placeholder="Last Name" class="col-xs-10" value='{{$lastname}}' required>
									</div><span>{!!$errors->first('lastname')!!}</span>

								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtemail"> Email</label>
									<div class="col-sm-9">	
										<?php
								$email='';
								if(isset($contactdetails->email))
								{
									$email=$contactdetails->email;
								}
								?>		 							 
										<input type="text" id="txtemail" name='email' placeholder="Email" class="col-xs-10" value='{{$email}}' required>
								<br>{!!$errors->first('email')!!}
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtpassword"> Mobile No </label>
									<div class="col-sm-9">
										 <?php
								$mobileno='';
								if(isset($contactdetails->mobile_no))
								{
									$mobileno=$contactdetails->mobile_no;
								}
								?>		 	
										<input type="text" id="txtpassword" name='mobile_no' placeholder="Mobile No"  pattern="[7-9]{1}[0-9]{9}" class="col-xs-10" value='{{$mobileno}}' required>
								<span>{!!$errors->first('mobileno')!!}</span>
									</div>
								</div>
                                                                <!--
							</div>		
							<div class="col-md-6">
								<h5 class="text-center">SMS API Details</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="url"> URL </label>
									<div class="col-sm-9">	
                                                                -->
                                                                <?php
								$id='';
								if(isset($contactdetails->id))
								{
									$id=$contactdetails->id;
								}
								?>		
					<input type='hidden' name='id' value='{{$id}}'/>
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
<input type="hidden" name="_token" value="<?php echo csrf_token();?>">

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
                                                                                                                  <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Mobile Number</th>

<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Created By</th>

														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Options</th>
													</tr>
												</thead>
																								<tbody>
																									
																									@foreach($com as $c)
																									<tr role="row" class="odd">
	
														<td>
															 {{$c->firstname}}
														</td>
														<td>
 {{$c->lastname}}

														</td>
														<td>
															 {{$c->email}}
														</td>
                                                                                                                <td>
															 {{$c->mobile_no}}
														</td>
                                                                                                                <td>
															 <?php Username($c->created_by); ?>
														</td>
														<td>

		 												 <a href="{{url('contactlist')}}/{{$c->id}}">Edit</a> 
		 												  || <a href="{{url('delcontact')}}/{{$c->id}}">Delete</a>

		 												 														</td>
													</tr>
																									
													@endforeach
																										 </tbody>
											</table>
 									
										</div>
 
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			@include('layouts.footer')
