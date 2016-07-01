<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use \DB as DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade as PDF;

use App\User;
use App\client;
use App\company;
use App\contacts;
use App\send_sms;
use App\Sms_status;
use App\companyreg;
use App\smsurl;
class AdminController extends Controller {

  public function smsUrl()
  {
      $smsdetail=smsurl::get();
		return view('admin.smsurlist',compact('smsdetail'));
  }
  public function savesmsUrl(request $request)
  {
      //print_r($_POST);exit;
      $smsurl= new smsurl();
      if($_POST['id']>0)
      {
      $smsurl=$smsurl->find($_POST['id']);
      }
      $smsurl->url=$request->input('url');
   //   $smsurl->username=$request->input('username');
   ///   $smsurl->password=$request->input('smspwd');
      $smsurl->createdby=Auth::user()->id;
      $smsurl->save();
     
               $request->session()->flash('alert-success', 'Sms server settings saved successfully');
	 		return redirect('smsurl')->withInput();

              
  }
  public function delsmsUrl(request $request,$id)
{
$query=smsurl::where('id',$id)->delete(); 

 $request->session()->flash('alert-success', 'Sms server settings Deleted successfully');
	 		return redirect('smsurl')->withInput();

}
public function editsmsUrl($id)
{
	$smsdetails=smsurl::where('id',$id)->first(); 
        $smsdetail=smsurl::where('createdby','=',Auth::user()->id)->get();
	//print_r($companydetails->config);
	//$sjson=json_decode($companydetails->config);
		return view('admin.smsurlist',compact('smsdetails','smsdetail'));
}
////public function saveuser(request $request)
////{
	////print_r($_POST);exit;
////$user=new user();
////$data=$request->input('user');
////$user->firstname=$data['firstname'];
////$que=DB::table('users')->where('firstname',$user->firstname)->get();
//if(!empty($que))
//{
//return Redirect::to('userlist')->with('status','success')->with('message1','user name already Available!');
//}
//$user->lastname=$data['lastname'];
//$user->mobileno=$data['mobileno'];
//$user->email=$data['email'];
//$user->gender=$data['gender'];
//$user->password=bcrypt($data['password']);
//$user->address=$data['address'];
//$user->created_by=Auth::user()->id;
//$user->role_id=$data['role'];
//$user->company_id=$data['company_id'];
//$user->save();
//return Redirect::to('userlist');
//}
//public function Updateuser()
//{
    ////print_r($_POST);exit;
//$data=$_POST['user'];
//$query=DB::table('users')->where('id',$_POST['id'])->update($data);
//if($query==1)
//{
//return Redirect::to('userlist')->with('status','success')->with('message1','User Details Updated Successfully!');
//}
//else
//{
  //return Redirect::to('userlist')->with('status','success')->with('message1','User Details not Updated!');
  
//}
//}

//public function delUser($id)
//{
////print_r($id);exit;
//$query=DB::table('users')->where('id',$id)->delete(); //print_r($query);exit;
//if($query==1)
//{
//return Redirect::to('userlist')->with('status','success')->with('message1','User Deleted Successfully');
//}
//}
public function showCompany()
{
    $companydetails=company::where('id',Auth::user()->company_id)->get();
    $urldetails=smsurl::get();
    $where=1;
    //$urldetails=json_decode($companydetails->config);
    return view('company.companylist',compact('companydetails','urldetails','where'));
   // print_r($urldetails);exit;
}
public function Importdata(request $request )
{
//print_r($_POST);exit;
 //DB::table('temp_table')->delete();
 
    $filename=$_FILES["file"]["tmp_name"];
    // $soctype=$_POST["sourcetype"];
  //   $sourfrom=$_POST["soursefrom"];
     
    if($_FILES["file"]["size"] > 0)
    {
     
    $file = fopen($filename, "r");
    if(!$file)
    { echo "error";
	}
	     $i=1;
$company_id=Auth::user()->company_id;
$created_by=Auth::user()->id;
$todaydate=date('Y-m-d H:i:s');
             $query=0;
    while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
       { 
		  // print_r($emapData);//exit;
		if($i==1)
		{
			for($j=0;$j<count($emapData);$j++)
//		   foreach($emapData as $key)
		   {
			   $keyvalue=strtolower($emapData[$j]);
			   $columvalue = preg_replace('/\s+/', '', $keyvalue);
			  switch($columvalue)
			  {
				  case 'firstname':
                  Session::put('firstname',$j);
				  break;
				  case 'lastname':
                  Session::put('lastname',$j);
				  break;
				  case 'email':
                  Session::put('email',$j);
				  break;
				  case 'mobileno':
                  Session::put('mobileno',$j);
				  break;
				  
			  }
			  
		   }
	   }
	   


$user = DB::table('contacts')->where('mobile_no',$emapData[Session::get("mobileno")])->get(); //print_r($user);exit;
if(empty($user))
{
$columns = array('firstname'=>$emapData[Session::get("firstname")],'lastname'=>$emapData[Session::get("lastname")],
'email'=>$emapData[Session::get("email")],
'mobile_no'=>$emapData[Session::get("mobileno")]
,'created_at'=>$todaydate,'created_by'=>$created_by,'company_id'=>$company_id
//,'source_from'=>$sourfrom
);	

if($i!=1)
{
$query=DB::table('contacts')->insert(array($columns));
}   
}
$i++;
}

}

$delquery=DB::table('temp_table')->limit(1)->delete(); 
$request->session()->flash('alert-success', 'Data Imported Successfully!');
return redirect('importcontacts')->withInput();    }

public function movetoleads()
{	
		$id = Auth::user()->id;
$users = DB::table('temp_table')->where('userid',$id)->get();

foreach ($users as $user)
{
$id = Auth::user()->id;
$mobnum=$user->mob_number;

$chekdups = DB::table('new_leads')->where('mobile1', $mobnum)->orWhere('mobile2', $mobnum)->get();
	
if(empty($chekdups)){	
	
DB::table('new_leads')->insert(array('name' => $user->name, 'mobile1' => $user->mob_number, 'lead_address' => $user->address,'added_date' => $user->added_date,'leads_from' => $user->source_from,'leads_type'=>$user->source_type,'leads_current_status'=>"Waiting for Assigning",'laststatus_upby'=>$id,'added_by'=>$id));

} else {
	
DB::table('dup_leads')->insert(array('name' => $user->name, 'mobile' => $user->mob_number, 'address' => $user->address,'leads_type' => $user->source_type,'leads_from' => $user->source_from,'upload_date'=>$user->added_date));

}
    
}

DB::table('temp_table')->delete();

DB::table('temp_duplicates')->delete();
 
//$duplicateRecords = DB::table('dup_leads')->get();
	//$filename = "Duplicates.csv";
    //$handle = fopen($filename, 'w+');
    //fputcsv($handle, array('Name','Mobile','Address','Leads Type','Leads From','Updated Date'));

    //foreach($duplicateRecords as $row) {
        //fputcsv($handle, array($row->name,$row->mobile,$row->address,$row->leads_type,$row->leads_from,$row->upload_date));   
    //}

    //fclose($handle);
    //$content = Storage::disk('csv')->get('Duplicates.csv');
 //Storage::disk('csv')->put('Duplicates.csv', $content);


$dupleads = DB::table('dup_leads')->count();

if($dupleads > 0) {
	
	return Redirect::to('home/import')->with('status','success')->with('message','Data imported Successfully!'); 
	
} else {
	return Redirect::to('home/viewleads')->with('status','success')->with('message','Data imported Successfully!'); 
}
   
     


    }
 
public function saveCompany(request $request)
{
//print_r($_POST)	;exit;
$data=$request->input();

$que=DB::table('company')->where('company_name',$data['company_name'])->first(); 
if(count($que)>1)
{
$request->session()->flash('alert-warning', 'Company Name Already Exisi!');
return redirect('companylist')->withInput();
}
$company=new company();
if($_POST['from']==1)
{
if($_POST['id']>0)
{
$company=$company->find($_POST['id']);
}
$company->company_name=$data['company_name'];
$company->company_id=$data['company_id'];
$company->email=$data['email'];
$company->password=$data['password'];
$company->description=$data['description'];
$company->createdby	=Auth::user()->id;
$company->status=1;
$company->config=json_encode($_POST['j']);
$company->created_at=date('Y-m-d H:i:s');
if($company->save())
{
     $ids = $company->id;
    // print_r($ids);exit;
$user=new user();
//$data=$request->input('user');
//$id = DB::table('company')->insertGetId(); print_r($id);exit;
$user->firstname=$data['company_name'];
//$user->lastname=$data['lastname'];
//$user->mobileno=$data['mobileno'];
$user->email=$data['email'];
//$user->gender=$data['gender'];
$user->password=bcrypt($data['password']);
//$user->address=$data['address'];
$user->created_by=Auth::user()->id;
$user->role_id=2;
$user->status=1;
$user->company_id=$ids;
$user->save();
$request->session()->flash('alert-success', 'User Created Successfully!');
return redirect('companylist')->withInput();
}
}

else
{
$company=new company();
$company->company_name=$data['company_name'];
$company->company_id=$data['company_id'];
$company->email=$data['email'];
$company->password=$data['password'];
$company->description=$data['description'];
$company->createdby	=Auth::user()->id;
$company->config=json_encode($_POST['j']);
$company->status=1;
$company->created_at=date('Y-m-d H:i:s');
if($company->save())
{
         $ids = $company->id;

$user=new user();
//$data=$request->input('user');
//$id = DB::table('company')->insertGetId(); print_r($id);exit;
$user->firstname=$data['company_name'];
//$user->lastname=$data['lastname'];
//$user->mobileno=$data['mobileno'];
$user->email=$data['email'];
//$user->gender=$data['gender'];
$user->password=bcrypt($data['password']);
//$user->address=$data['address'];
$user->created_by=Auth::user()->id;
$user->role_id=2;
$user->status=1;
$user->company_id=$ids;
$user->save();

$companyreg=new companyreg();
if($_POST['id']>0)
{
$companyreg=$companyreg->find($_POST['id']);
}
$companyreg->status=0;
$companyreg->save();
$request->session()->flash('alert-success', 'Company Moved Successfully!');
return redirect('companylist')->withInput();
}
}
}
public function delCompany($id)
{
$query=DB::table('company')->where('id',$id)->delete(); 
if($query==1)
{
    //$del=User::where('company_id',)
$request->session()->flash('alert-success', 'Company Deleted Successfully!');
return redirect('companylist')->withInput();}
}
public function editcompany($id)
{
	$companydetails=DB::table('company')->where('id',$id)->first(); 
              // $urldetail=smsurl::get();
              $where=1;
	//print_r($companydetails->config);
	$urldetails=json_decode($companydetails->config);
		return view('company.companylist',compact('companydetails','urldetails','where'));
}
public function moveCompany($id)
{
	$companydetails=companyreg::where('id',$id)->first(); 
        $urldetails=smsurl::get();
        $where=2;
	//print_r($companydetails->config);
	//$urldetails=//=json_decode($companydetails->config);
		return view('company.companylist',compact('companydetails','urldetails','where'));
}
public function contactList()
{
    $com=contacts::where('company_id',Auth::user()->company_id)->get();
    return view('admin.contacts',compact('com')); 
}
public function saveContact(request $request)
{
 // print_r($_POST);exit;
$contacts=new contacts();
$data=$request->input();
//print_r($data);exit;
print_r($data['mobile_no']);
if($_POST['id']>0)
{
$contacts->updated_at=date('Y-m-d H:i:s');
$contacts=$contacts->find($_POST['id']);
}
if(empty($_POST['id']))
{
$que=DB::table('contacts')->where('firstname',$data['firstname'])->where('mobile_no',$data['mobile_no'])->first();
if(!empty($que))
{
$request->session()->flash('alert-warning', 'Contact Name Or Mobile Number Already Availbale!');
return Redirect::to('contactlist');
}
}
$contacts->firstname=$data['firstname'];
$contacts->lastname=$data['lastname'];
$contacts->email=$data['email'];
//print_r($contacts->mobile_no);exit;
$contacts->mobile_no=$data['mobile_no'];
$contacts->created_by	= Auth::user()->id;
$contacts->created_at=date('Y-m-d H:i:s');
$contacts->company_id=Auth::user()->company_id;
$contacts->save();
$request->session()->flash('alert-success', 'Contact created Successfully!');
return Redirect::to('contactlist');
}
public function editContact($id)
{       $com=contacts::where('company_id',Auth::user()->company_id)->get();
//print_r($com);exit;
	$contactdetails=DB::table('contacts')->where('id',$id)->first(); 
	//print_r($companydetails->config);
		return view('admin.contacts',compact('com','contactdetails')); 
}
public function delContact($id)
{
$query=DB::table('contacts')->where('id',$id)->delete(); 
if($query==1)
{
return Redirect::to('contactlist')->with('status','success')->with('message1','Contact Deleted Successfully');
}
}
public function savesmSettings(request $request)
{
 // print_r($_POST);exit;
$company=new company();
$data=$request->input();
//print_r($data['j']);
$companys=$company->find(Auth::user()->company_id); 
//print_r($companys);exit;
$config=json_encode($data['j']);
$updated_at=date('Y-m-d H:i:s');
$updated_by=Auth::user()->id;
$updated_at=date('Y-m-d H:i:s');
$values=array('config'=>$config,'updated_at'=>$updated_at,'updatedby'=>$updated_by);
$query=DB::table('company')->where('id',Auth::user()->company_id)->update($values);
return Redirect::to('settings');
}
public function index(Request $request)
	{ //print_r($_POST);
 	$mobilenumbers="";
 		if(isset($request['chkaddress']))
 		{
 			foreach ($request['chkaddress'] as $val)
			{ //print_r('hello');exit;
				if($mobilenumbers=="")
				{
					$mobilenumbers=$val;	
				}
				else
				{
					$mobilenumbers=$mobilenumbers.",".$val;	
				}
		 	}
 		}
		$data=send_sms::paginate(20); //print_r($data);exit;
		return view('admin.sendsms',compact('data','mobilenumbers'));
	}
	public function postsms(Request $request)
	{ //print_r($_POST);exit;
 		$validator=Validator::make($request->all(),['txtmobilenumber'=>'required','txtMessage'=>'required']);
 		if(!$validator->fails())
 		{
	 		$smsAr['msgtxt']=$request->input('unicode_text');
	 		$smsAr['numbers']=$request->input('txtmobilenumber');
	 		$this->sendSMS($smsAr);
//	 	        $request->session()->flash('alert-success', 'Message send successfully');
	 		return redirect('sendsms')->withInput();
 		}
 		return redirect('sendsms')->withErrors($validator);
	}


	/*
	* send SMS while call.
	* $numbers - comma seperated numbers in string format
	* $msgtxt - Text message what needs to be sent.
	*/
	function smsStatu($data)
	{
		if($data == '001')
			return "Invalid Number";
		if($data == '002')
			return "Absent Subscriber";
		if($data == '003')
			return "Memory Capacity Exceeded";
		if($data == '004')
			return "Mobile Equipment Error";
		if($data == '005')
			return "Network Error";
		if($data == '006')
			return "Barring";
		if($data == '007')
			return "Invalid Sender ID";
		if($data == '008')
			return "Dropped";
		if($data == '009')
			return "NDNC Failed";
		if($data == '100')
			return "Misc. Error";
		else
			return " NO Status Response";
	}
	function sendSMS($smsAr) 
	{      
            
// get the details from settings table
		$values 	=   company::where('id','=',Auth::user()->company_id)->first();
                $setting_data=json_decode($values->config);
                $url1 			= 	$setting_data->url; //print_r($url1);exit;
		$username1 		= 	$setting_data->username;
		$password1		=	$setting_data->password;
 		$sms_credit 		=	$setting_data->smscredit; // print_r($sms_credit);exit;
               $urlconfig=smsurl::where('id',$url1)->first();
                //print_r($urlconfig->url);exit;
                 $url 			= 	$urlconfig->url; //print_r($url1);exit;
		// $username		= 	$urlconfig->username;
		// $password	=	$urlconfig->password;
		$sender_name	= 	'NWC';
	    $serverURL  = $url;
	    $uid        = $username;	//Your Username provided by ValueFirst
	    $pwd        = htmlentities($password);
	    $content = $smsAr['msgtxt']; 
	    $number = $smsAr['numbers'];
	    $messageStatu='';
	    $statuCode='';
	    $sentDate='';
	    $numbers=explode(",", $number);
	    $messages="";
	    $cnt=0;
	    $insert_status=array();
	    foreach($numbers as $val)
	    {// print_r('hello');exit;
                $totalsms=DB::table('sms_status')->where('company_id',Auth::user()->company_id)->get();
               //print_r($totalsms);exit;
                $smssend=count($totalsms);  //print_r($smssend) ;exit;
                if($smssend<=$sms_credit)
                {                                
	    	$cnt=$cnt+1;
	    	$messages=$messages.'<SMS UDH="0" CODING="2" TEXT="'.$content.'" PROPERTY="0" ID="'.$cnt.'"><ADDRESS FROM="'.$sender_name.'" TO="'.$val.'" SEQ="'.$cnt.'" TAG="some clientside random data" /></SMS>';
	    	//print_r($messages);exit;
                $data['phone']=$val;
	    	$data['guid']="";
	    	$data['sentdate']=date("Y-m-d H:i:s");
	    	$data['status']='';
	    	$data['message']=$smsAr['msgtxt'];
	    	$data['reason_code']='';
	    	$data['error_code']='';
	    	$data['sms_status_update']='0';
	    	$data['seq']=$cnt;
	    	array_push($insert_status,$data);
                }
                else
                {
                    return Redirect::to('sendnsms')->with('status','success')->with('message2','Sms Credit Limit reached SMS will not send!');
                   // return Redirect::to('sendsms')->with('status','success')->with('message','Sms Credit Limit reached SMS will not send!');
                }
                }
	    

	    $data =  'data='.urlencode('<?xml version="1.0" encoding="ISO-8859-1"?><!DOCTYPE MESSAGE SYSTEM "http://127.0.0.1/psms/dtd/messagev12.dtd" ><MESSAGE VER="1.2"><USER USERNAME="'.$uid.'" PASSWORD="'.$pwd.'"/>'.$messages.'</MESSAGE>').'&action=send';
	   // print_r($data);
	    $objURL = curl_init($serverURL);
	    curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
	    curl_setopt($objURL,CURLOPT_POST,1);
	    curl_setopt($objURL, CURLOPT_POSTFIELDS,$data);
	    $retval = trim(curl_exec($objURL));
	  //  print_r($retval);
	    curl_close($objURL);
	    $reslutData1 = (array)simplexml_load_string($retval);
	 //   print_r($reslutData1);exit;
	    if($cnt==1)
	    {
	    	$insert_status[0]['guid']=(string)$reslutData1['GUID']['GUID'];
	    	$insert_status[0]['error_code']=(string)$reslutData1['GUID']->ERROR['CODE'];
	    	if($insert_status[0]['error_code']!='')
	    	{
	    		$insert_status[0]['sms_status_update']='2';
	    		$insert_status[0]['status']='Invalid Number';
	    	}
	    }
	    else
	    {
	   		foreach($reslutData1['GUID'] as $key=>$val)
	   		{	
	   			$insert_status[$key]['guid']=(string)$val['GUID'];
	   			$insert_status[$key]['error_code']=(string)$val->ERROR['CODE'];
	   			if($insert_status[$key]['error_code']!='')
		    	{
		    		$insert_status[$key]['sms_status_update']='2';
		    		$insert_status[$key]['status']='Invalid Number';
		    	}
	   		}
	    }
		$status_request="";
		$cnt=0;
	 	foreach($insert_status as $val)
	 	{
	 		$cnt=$cnt+1;
	 		$status_request=$status_request.'<GUID GUID="'.$val['guid'].'"><STATUS SEQ="'.$cnt.'" /></GUID>';
	 
	 	}
	    if($status_request!='')
	    {
			$StatusData =  'data='.urlencode('<?xml version="1.0" encoding="ISO-8859-1"?><!DOCTYPE STATUSREQUEST SYSTEM "http://127.0.0.1/psms/dtd/requeststatusv12.dtd" ><STATUSREQUEST VER="1.2"><USER USERNAME="'.$uid.'" PASSWORD="'.$pwd.'"/>'.$status_request.'</STATUSREQUEST>').'&action=status';
			$objURL = curl_init($serverURL);		
			curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 		
			curl_setopt($objURL,CURLOPT_POST,1);		
			curl_setopt($objURL, CURLOPT_POSTFIELDS,$StatusData);		
			$finalData = trim(curl_exec($objURL));		
			curl_close($objURL);				
			$reslutData = (array)simplexml_load_string($finalData);

			if($cnt==1)
			{
				$insert_status[0]['reason_code']	= (string)$reslutData['GUID']->STATUS['REASONCODE'];
				$insert_status[0]['error_code']		= (string)$reslutData['GUID']->STATUS['ERR'];
				if($insert_status[0]['reason_code']!='')
				{
					$insert_status[0]['status']=$this->smsStatu($insert_status[0]['reason_code']);
				}
			}
			else
			{
				foreach($reslutData['GUID'] as $key=>$val)
				{
					foreach($val as $key1=>$val1)
					{
	 					$insert_status[$key]['reason_code']	=(string)$val1['REASONCODE'];
						$insert_status[$key]['error_code']	=(string)$val1['ERR'];
						if($insert_status[$key]['reason_code']!='')
						{
							$insert_status[$key]['status']=$this->smsStatu($insert_status[$key]['reason_code']);
						}
					}
				}
			}
			foreach($insert_status as $val)
			{
				$this->add_sms_status($val);
			}
                         return Redirect::to('userlist')->with('status','success')->with('message2','Sms Send Successfully!'); 
	    }
	}
        public function addrecipient(Request $request)
	{  
		$keyword=$request->input('txtkeyword');
		$addressbook=contacts::whereRaw("(firstname like '%".$keyword."%'  OR lastname like '%".$keyword."%') AND created_by='".Auth::user()->id."'")->paginate(25);
		return view('admin.addrecipient',compact('addressbook','keyword'));
	}
	function add_sms_status($data)
	{
		$data1			        	=	new Sms_status;
		$data1->GUID 				=	$data['guid'];
		$data1->mobilenumber 	         	=	$data['phone'];
		$data1->errorcode 			=	$data['error_code'];
		$data1->reasoncode 			=	$data['reason_code'];
		$data1->status 		 		=	$data['status'];
		$data1->message		 		=	$data['message'];
		$data1->seq 				=	$data['seq'];
		$data1->sentdate 			=	$data['sentdate'];
		$data1->sms_status_update        	= 	$data['sms_status_update'];
                $data1->company_id 	                = 	Auth::user()->company_id;;
		$data1->createdby 			= 	Auth::user()->id;
		$data1->save();
	}
 
public function smsReports()
	{
		//return Auth::user()->id;
		$data=Sms_status::where('createdby','=',Auth::user()->id)->get();
		return view('admin.reports',compact('data'));
	}
        public function overallSms()
	{
		$data=Sms_status::where('company_id','=',Auth::user()->company_id)->get();
                $smssend=count($data);   
                $values =  company::where('id','=',Auth::user()->company_id)->first();
                $setting_data=json_decode($values->config);
		$smscredit = $setting_data->smscredit; // print_r
		return view('admin.overallsms',compact('data','smssend','smscredit'));
	}
          public function userwiseSms()
	{         
       		 $datas=Sms_status::where('company_id','=',Auth::user()->company_id)->get();
		 $user=user::where('company_id','=',Auth::user()->company_id)->get();
                // print_r($datas);
                // print_r($user);exit;
                  $smssend=count($datas);   
                  //$values =  company::where('id','=',Auth::user()->company_id)->first();
                //  $setting_data=json_decode($values->config);
		  //$smscredit = $setting_data->smscredit; // print_r
		return view('admin.userwisesms',compact('datas','user','smssend'));//,'smscredit'));
	}
        public function getuseReport(request $request)
        {   //print_r($_POST);exit;
                $id=$request->input('id');
                $user=user::where('company_id','=',Auth::user()->company_id)->get();
          	$datas=sms_status::where('createdby','=',$id)->get();
                $smssend=count($datas);   
              //  $values =  company::where('id','=',$id)->first();
                //$setting_data=json_decode($values->config);
		//$smscredit = $setting_data->smscredit; 
                return view('admin.userwisesms',compact('datas','user','smssend'));//,'smssend','smscredit'));

        }
        }



