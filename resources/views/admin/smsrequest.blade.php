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
								<a href="{{url('home')}}">Home</a>
							</li>
							<li class="active">Sms Server Management</li>
						</ul><!-- /.breadcrumb -->

					 
					</div>

					<div class="page-content">
						 

						  
<div class="page-header">
	<h1>
		 Sms Request Details
	</h1>
</div>
<div class="flash-message">
					@include('layouts.message')
													</div>
<div class]='row'>
	<form class="form-horizontal" role="form" action="{{url('sendsmsRequest')}}"  method='post'>
<div class="row clearfix"> <?php //print_r($edit_data);exit; ?>

							<div class="col-md-6">
								<h5 class="text-center">SMS Credit Request</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="url"> Company Name </label>
									<div class="col-sm-9">	
										<?php //print_r($company_id);exit; 
								$company_name1='';
								if(isset($company_id))
								{
									$company_name1=$company_id;
								}
								?>					 
										<input type="text" name='company_name' placeholder="Company Name" class="col-xs-10" value='{{$company_name1}}'>
								<span>{!!$errors->first('sms_credits')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="url"> Number Of SMS </label>
									<div class="col-sm-9">	
										<?php
								$request_sms='';
								if(isset($edit_data->request_sms))
								{
									$request_sms=$edit_data->request_sms;
								}
								?>					 
										<input type="text" name='sms_credits' placeholder="No of SMS" class="col-xs-10" value='{{$request_sms}}'>
								<span>{!!$errors->first('sms_credits')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtusername">Request  Message </label>
									<div class="col-sm-9">							
										<?php
								$message='';
								if(isset($edit_data->message))
								{
									$message=$edit_data->message;
								}
								?>				 
										<textarea  name='message' class="col-xs-10" > {{$message}}</textarea>
								<span>{!!$errors->first('message')!!}</span>
									</div>
								</div>
								</div>
															<div class="col-md-6">
								<h5 class="text-center">Send Request Details</h5>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="url"> Credit SMS </label>
									<div class="col-sm-9">	
										<?php
								$credited_sms='';
								if(isset($edit_data->credited_sms))
								{
									$credited_sms=$edit_data->credited_sms;
								}
								?>					 
										<input type="text" name='credited_sms' placeholder="No of SMS" class="col-xs-10" value='{{$request_sms}}'>
								<span>{!!$errors->first('sms_credits')!!}</span>
									</div>
								</div>
                                
								
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtusername"> Status </label>
									<div class="col-sm-9">							
										<?php
								$message='';
								if(isset($edit_data->message))
								{
									$message=$edit_data->message;
								}
								?>	
											 
                       <input type="radio" name="status" value="1" checked>Approved
                       <input type="radio" name="status" value="2">Rejected
								<span>{!!$errors->first('message')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtusername">Reply  Message </label>
									<div class="col-sm-9">							
										<?php
								$message='';
								if(isset($edit_data->message))
								{
									$message=$edit_data->message;
								}
								?>				 
										<textarea  name='reply_message' class="col-xs-10" value='{{$message}}' required> </textarea>
								<span>{!!$errors->first('message')!!}</span>
									</div>
								</div>
								
									<?php
								$id='';
								if(isset($edit_data->id))
								{
									$id=$edit_data->id;
								}
								?>		
					<input type='hidden' name='route' value='smsrequests'/>
					<?php
								$company_id='';
								if(isset($edit_data->company_id))
								{
									$company_id=$edit_data->company_id;
								}
								?>		
					<input type='hidden' name='company_id' value="{{$company_id}}"/>
					<?php
								$send_by='';
								if(isset($edit_data->send_by))
								{
									$send_by=$edit_data->send_by;
								}
								?>		
					<input type='hidden' name='send_by' value="{{$send_by}}"/>
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
 	
											<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info">
																								<thead>
													<tr role="row"> 
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Company Name</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Request Code</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Request SMS</th>
													    <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Request Message</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Status</th>
 														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Credited SMS</th>
														<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Approved Date</th>
														<th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>

													</tr>
												</thead>
																								<tbody>
																									@foreach($data as $c)
																									<tr role="row" class="odd">
																										<td> <?php echo Companyname($c->company_id); ?>
																</td>
							 
  <td>
															 {{$c->request_code}}
														</td>
														<td>
															 {{$c->request_sms}}
														</td>
														<td>
															 {{$c->message}}
														</td>
														<td>
															 @if($c->status==1)
															 <font color='green'>Approved</font>
															 @elseif($c->status==0)
														 <font color='orange'>Waiting</font>
														 @elseif($c->status==2)
														 <font color='red'>Rejected</font>
															 @endif
														</td>
														<td>
															 {{$c->credited_sms}}
														</td>
														<td>									
              {{$c->updated_at}}

														</td>
														<td>

		 												 <a href="{{url('editsmsrequest')}}/{{$c->id}}">Edit</a> 
		 												  || <a href="{{url('delsmsrequest')}}/{{$c->id}}">Delete</a>

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
