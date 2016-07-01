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
							<li class="active">SMS Server Configuration</li>
						</ul><!-- /.breadcrumb -->

					 
					</div>

					<div class="page-content">
						 

						  
<div class="page-header">
	<h1>
		Update Server Details
	</h1>
</div>
<div class="flash-message">
													</div>
<div class]='row'>
	<form class="form-horizontal" role="form" action="{{url('savesmsettings')}}"  method='post'>
<div class="row clearfix"> 
							<div class="col-md-6">
								<h5 class="text-center">Server Details</h5>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtfirstname"> Url </label>
									<div class="col-sm-9">
										<?php $query=DB::table('company')->where('id',Auth::user()->company_id)->first();
										//$settings=json_decode($val->config);
										$val=json_decode($query->config);	 ?>	 
										<input type="text" id="txtfirstname" name='j[url]' placeholder="Url"  readonly class="col-xs-10" value='{{$val->url}}' required>
								<span><br>{!!$errors->first('url')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtlastname"> username </label>
									<div class="col-sm-9">			
								 					 
										<input type="text" id="txtlastname" name='j[username]' placeholder="User Name" readonly class="col-xs-10" value='{{$val->username}}' required>
									</div><span>{!!$errors->first('username')!!}</span>

								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtemail"> Password</label>
									<div class="col-sm-9">	
									 							 
										<input type="text" id="txtemail" name='j[password]' placeholder="Password" class="col-xs-10" readonly value='{{$val->password}}' required>
								<br>{!!$errors->first('password')!!}
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtpassword"> sendername </label>
									<div class="col-sm-9">
									<input type="text" id="txtpassword" name='j[sendername]' placeholder="Mobile No" class="col-xs-10" value='{{$val->sendername}}' required>
								<span>{!!$errors->first('sendername')!!}</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="txtpassword"> Sms Credit </label>
									<div class="col-sm-9">
									<input type="text" id="txtpassword" name='j[smscredit]' placeholder="Mobile No" class="col-xs-10" readonly value='{{$val->smscredit}}' required>
								<span>{!!$errors->first('smscredit')!!}</span>
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
 	
											
 
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			@include('layouts.footer')
