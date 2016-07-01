@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.functions')
	<div class="main-content">
				<script src="{{asset('js/jquery-1.js')}}"></script>
				<script src="{{asset('js/jquery_005.js')}}"></script>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#dynamic-table').DataTable({
							"lengthMenu": [50, 100, 200, -1]
						});
					} );
				</script>
				<style>
					.dataTables_wrapper.no-footer {
						margin-left: 100px;
						margin-right: 90px !important;
						width: 900px;
					}
				</style>
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
							<li class="active">Reports</li>
							<li class="active">Overall SMS</li>
						</ul><!-- /.breadcrumb -->
					</div>
					<div class="page-content">
						<div class="page-header">
							<h1>
								Reports
							</h1>
						</div> 
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
    <label for="inputsm"><h4>Total Credits</h4></label>
    
  <h5>  {{$smscredit}} <h5>
  </div>
  <div class="form-group">
    <label for="inputsm"><h4>Total Send</h4></label>
    
   <h5> {{$smssend}}</h5>
  </div>
  <div class="form-group">
    <label for="inputsm"><h4>Remaining SMS</h4></label>
    
   <h5> {{$smscredit-$smssend}}</h5>
  </div>
								
								<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
									<div class="dataTables_wrapper no-footer" id="dynamic-table_wrapper">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info">
														@if(!$data->count()==0)

											<thead>
												<tr role="row">
													<th aria-label="First Name: activate to sort column descending" aria-sort="ascending" style="width: 76px;" class="sorting_asc" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">First Name</th>
													<th aria-label="First Name: activate to sort column ascending" style="width: 76px;" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Last Name</th>
													<th aria-label="Mobile Number: activate to sort column ascending" style="width: 102px;" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Mobile Number</th>
													<th style="width: 129px;" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Message: activate to sort column ascending">Message</th>
													<th aria-label="Send By: activate to sort column ascending" style="width: 56px;" class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Send By</th>
													<th aria-label="Sent Date: activate to sort column ascending" style="width: 120px;" class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Sent Date</th>
													<th aria-label="Status: activate to sort column ascending" style="width: 76px;" class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Status</th>
												</tr>
											</thead>
														@else
<tr role="row" class="odd">
		<td colspan='7' class="center">
					No Records Found
				 <td>
				</tr>
				@endif
											<tbody>	
																@foreach($data as $report)
						
												<tr role="row" class="odd">
													<td class="hidden-480 sorting_1"> <?php echo Contactfirstname($report->company_id); ?></td>
													<td class="hidden-480"> <?php echo Contactlastname($report->company_id); ?></td>
													<td>{{ $report->mobilenumber}}</td>
													<td>{{ $report->message}}</td>
													<td class="hidden-480"> <?php 
                    echo ($report->createdby); $vals=DB::table('users')->where('id','=',$report->createdby)->first(); //echo $vals->firstname; ?></td>
													<td class="hidden-480"> {{ $report->sentdate}}</td>
													<td class="hidden-480"> {{ $report->status}}</td>
	 
												</tr>
																@endforeach

												
											</tbody>
										</table>
										
									</div> 
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>				 
				 
@include('layouts.footer')
