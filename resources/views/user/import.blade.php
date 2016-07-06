		  <!-- Left side column. contains the logo and sidebar -->
				   @include('layouts.header')

			 @include('layouts.sidebar')

			  <!-- Content Wrapper. Contains page content -->

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
					
									   <div class="col-lg-12">
									<form method="post" enctype="multipart/form-data" action="importdata">
										
										
							
							
							
							
									<div class="form-group">
							  <label for="exampleInputEmail1">Upload File</label>
							  <input  id='upload' name="file" type="file" onchange="ValidateSingleInput(this);" required/>
							</div>
							   <div class="form-group">
								   <input type="hidden" name="route" value="importcontact">
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Import</button>
								   </div>
							</form>
							</div>
							</div>
							
					  
					   
						
					</div><!-- /.col-->
					
				
					
				</div><!-- /.row -->
				
			
					
					
			</div>	<!--/.main-->
						  <script>
			   var _validFileExtensions = [".csv"];    
    function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
			  
			  </script>
			   @include('layouts.footer')




