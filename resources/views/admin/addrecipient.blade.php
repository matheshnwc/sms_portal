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
							<li class="active">Add Recipient</li>
						</ul><!-- /.breadcrumb -->

					 
					</div>

					<div class="page-content">
						 

						  
<div class="page-header">
	<h1>
		Add Recipient
	</h1>
</div>
<div class="flash-message">
					@include('layouts.message')
													</div>
<div class]='row'>
	<div class="col-xs-12">			 
 <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
 		<form id='frm1' name='frm1' method='get' action="{{url('addrecipient')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					{{--<div class="col-xs-4">
							<div class="dataTables_length" id="dynamic-table_length">
								<label>Display 
								<select name="pagesize" aria-controls="dynamic-table" class="form-control input-sm">
								<option value="10">10</option><option value="25">25</option>
								<option value="50">50</option><option value="100">100</option>
								</select> records</label>
								</div>
					</div>--}}
					<div class="col-xs-3">
						<div id="dynamic-table_filter" class="dataTables_filter"><label>Search:<input name='txtkeyword' type="search" class="form-control input-sm" placeholder="" aria-controls="dynamic-table" value='{{$keyword}}'></label></div></div>
						<div class="col-xs-3">
							<div id="dynamic-table_filter" class="dataTables_filter"> 
  								<input value="Search" type="submit">
  							</div>
						</div>
					</div>
		</form>
		
	{!! $addressbook->render() !!} 
		<form id='form' name='form' method='post' action="{{url('sendsms')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info">
			@if(!$addressbook->count()==0)
		<thead>
				<tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
						<label class="pos-rel">
							<input type="checkbox" class="ace">
							<span class="lbl"></span>
						</label>
					</th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">First Name</th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Last Name</th><th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">Mobile Number</th> </tr>
		</thead>
		@else
		<tr role="row" class="odd">
		<td colspan='7' class="center">
					No Records Found
		<td>
		</tr>
		@endif
			<tbody>
				@foreach($addressbook as $address)
			<tr role="row" class="odd">
					<td class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" name='chkaddress[]' value='{{$address->mobile_no}}'>
							<span class="lbl"></span>
						</label>
					</td>
					<td>
				{{ $address->firstname}}
					</td>
					<td>{{ $address->lastname}}</td>
					<td class="hidden-480"> {{ $address->mobile_no}}</td>
 				</tr>
				@endforeach
				 </tbody>
</table>
<div><input value='Select' id='frmselect' name='frmselect' type='submit'/></div>
</form>
{!!$addressbook->render()!!} 
</div>
</div>
</div>
	</div>
</div>
</div>	 
@include('layouts.footer')

