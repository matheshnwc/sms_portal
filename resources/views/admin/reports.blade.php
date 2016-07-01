@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.functions')
<script src='https://code.jquery.com/jquery-1.12.0.min.js'></script>
<script src='https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js'></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#dynamic-table').DataTable({
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]
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
<div class="page-header">
<h1>
Reports
</h1>
</div>
 
<div class='row'>
	<div class="col-xs-12">
 				
            
<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
 
	 
	 
		<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info">
			@if(!$data->count()==0)
			<thead>
				<tr role="row"> 
                                    <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >First Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Last Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Mobile Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Message</th>
                                  <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Send By</th>
					<th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" >Sent Date</th> 
					<th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">Status</th>
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
		                        <td class="hidden-480"> <?php echo Contactfirstname($report->company_id); ?></td>
					<td class="hidden-480"> <?php echo Contactlastname($report->company_id); ?></td>
					<td>{{ $report->mobilenumber}}</td>
                                        <td>{{ $report->message}}</td>
                                        <td class="hidden-480"> <?php echo Username($report->createdby); ?></td>
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
				 
@include('layouts.footer')
