<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class admin extends Model{
	
	protected $table ='users';
	public $timestamps = false;

	//public static function insert($values){
		
		//$date_today=date('Y-m-d');
		//
			//$id = Auth::user()->id;
	
	//$insert=DB::table('users')->insert(array('firstname' => $values['txtname'],'lastname' => $values['txtlastname'],'email' => $values['txtemail'],'password' => Hash::make($values['txtpassword']),'updated_at' => $date_today,'role_id' => $values['roleid'],'hos_id' => $hospitalid,'add_by' => $id));
		 
	//if($insert){ 
		
		//return true; } else { 
			
			//return false; }
	
        //}
        
        //public static function admininsert($values){
		
		//$date_today=date('Y-m-d');
		
		//$id = Auth::user()->id;
	
	//$insert=DB::table('users')->insert(array('firstname' => $values['txtname'],'lastname' => $values['txtlastname'],'email' => $values['txtemail'],'password' => Hash::make($values['txtpassword']),'updated_at' => $date_today,'role_id' => 10,'hos_id' => $values['hos_id'],'add_by' => $id));
		 
	//if($insert){ 
		
			//$permission=implode(",",$values['moduleper']);
			//$id = Auth::user()->id;
		
		//$lastinsid=DB::getPdo()->lastInsertId();
		
		//$insert=DB::table('modulepermission')->insert(array('user_id' => $lastinsid,'permission' => $permission,'created_by' => $id));
		
		//return true; } else { 
			
			//return false; }
	
        //}
	
	
	
	//} 
}


?>
