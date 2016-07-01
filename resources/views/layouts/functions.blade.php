	<?php
			
	
function Username($id) {
     $roledata=DB::table('users')->where('id','=',$id)->first(); 
		 echo $roledata->firstname; 

}
function Companyname($id) {
     $roledata=DB::table('company')->where('id','=',$id)->first(); //print_r($roledata);exit;
		 echo $roledata->company_name;
	 }
	 function Contactfirstname($id) {
     $roledata=DB::table('contacts')->where('company_id','=',$id)->first();
		 echo $roledata->firstname;
		 
	 }
	 function Contactlastname($id) {
     $roledata=DB::table('contacts')->where('company_id','=',$id)->first();
		 echo $roledata->lastname;
		 
	 }
	function Username1($id) {
     $roledata=DB::table('users')->where('company_id','=',$id)->first();
		 echo $roledata->firstname;

}
function Username2($id) {
     $roledata=DB::table('users')->where('company_id','=',$id)->first();
		 echo $roledata->lastname;

}
	 function Reportlastname($id) {
     $roledata=DB::table('sms_status')->where('createdby','=',$id)->first();
		 echo $roledata->lastname;
		 
	 }



		
