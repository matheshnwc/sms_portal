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
							<li class="active">Sms Server Management</li>
						</ul><!-- /.breadcrumb -->

					 
					</div>

					<div class="page-content">
						 

						  
<div class="page-header">
	<h1>
		Add Sms Server Details
	</h1>
</div>
<div class="flash-message">
					@include('layouts.message')
													</div>
<div class]='row'>
	<form class="form-horizontal" role="form" action="{{url('savesmsurl')}}"  method='post'>
<div class="row clearfix"> 

							<div class="col-md-6">
								<h5 class="text-center">SMS API Details</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="url"> URL </label>
									<div class="col-sm-9">	
										<?php
								$url='';
								if(isset($smsdetails->url))
								{
									$url=$smsdetails->url;
								}
								?>					 
										<input type="url" id="url" name='url' placeholder="URL" class="col-xs-10" value='{{$url}}'>
								<span>{!!$errors->first('j[url]')!!}</span>
									</div>
								</div>
<!--
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtusername"> Username </label>
									<div class="col-sm-9">							
										<?php
								$username='';
								if(isset($smsdetails->username))
								{
									$username=$smsdetails->username;
								}
								?>				 
										<input type="text" id="txtusername" name='username' placeholder="Username" class="col-xs-10" value='{{$username}}' required>
								<span>{!!$errors->first('j[username]')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtpwd"> Password </label>
									<div class="col-sm-9">	
										<?php
								$smspwd='';
								if(isset($smsdetails->smspwd))
								{
									$password=$smsdetails->smspwd;
								}
								?>										 
										<input type="password"  name='smspwd' placeholder="Password" class="col-xs-10" value='{{$smspwd}}' required>
								<span>{!!$errors->first('j[smspwd]')!!}</span>
									</div>
								</div>
-->
<!--
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtsendername"> Sender Name </label>
									<div class="col-sm-9">	
										<?php
								$sendername='';
								if(isset($smsdetails->sendername))
								{
									$sendername=$smsdetails->sendername;
								}
								?>												 
										<input type="text" id="txtsendername" name='j[sendername]' placeholder="Sender Name" class="col-xs-10" value='{{$sendername}}' required>
								<span>{!!$errors->first('j[sendername]')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtsmscredit"> SMS Credits </label>
									<div class="col-sm-9">
										<?php
								$smscredit='';
								if(isset($smsdetails->smscredit))
								{
									$smscredit=$smsdetails->smscredit;
								}
								?>													 
										<input type="text" id="txtsmscredit" name='j[smscredit]' placeholder="SMS Credit" class="col-xs-10" value='{{$smscredit}}' required>
								<span>{!!$errors->first('j[smscredit]')!!}</span>
									</div>-->
									<?php
								$id='';
								if(isset($smsdetails->id))
								{
									$id=$smsdetails->id;
								}
								?>		
					<input type='hidden' name='id' value='{{$id}}'/>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="form-actions clearfix">
								<div class="col-md-offset-5 col-md-6">
<!--
									<button class="btn" type="button">
										<i class="ace-icon fa fa-times bigger-110"></i>
										Cancel
									</button>
-->
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
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">SMS URL</th>
														 <!--
														 <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">User Name</th>
<!--
														  <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Password</th>
														  -->
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>

													</tr>
												</thead>
																								<tbody>
																									@foreach($smsdetail as $c)
																									<tr role="row" class="odd">
							 

														<td>
															 {{$c->url}}
														</td>
														<td>

		 												 <a href="{{url('smsurl')}}/{{$c->id}}">Edit</a> 
		 												  || <a href="{{url('delsmsurl')}}/{{$c->id}}">Delete</a>

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
