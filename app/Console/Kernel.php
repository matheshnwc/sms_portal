<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\Admin\AdminController;
use \DB as DB;
use App\Http\Controllers\Admin;
use Illuminate\Console\Command;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\HappyBirthday::class,
        \App\Console\Commands\LogDemo::class,
    ];
    

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//$schedule->command('log:demo')->hourly();
//$schedule->command('sms:birthday')->hourly();
//$schedule->call('App\Http\Controllers\Admin\AdminController@test')->everyMinute();  
 $schedule->call(function () {
$qu=DB::table('reccuring_invoice_details')->where('reccuring_period','>',0)->where('sms_period','>',0)->get();
foreach($qu as $q)
{
	$sms=strtotime($q->smsdate); echo $sms; echo "-----";
	$today=strtotime(date('M j Y'));
	$from="W3cert Technologies";
	$to=$q->tocompany;
	$query=DB::table('client')->where('id',$q->tocompany)->first(); 
    $client_name=$query->first_name;
	$invoiceno=$q->invoiceno;
	$total=$q->total;
	$invoicedate=$q->invoicedate;
	$invoicedue=$q->invoicedue;
	if($sms==$today)
	{

	
	//$smsdate=date('M j Y', strtotime("+".$invoicedue."days",strtotime($invoicedate)));  $e=strtotime($invoiceduedate); 

    $to="8508782702";
    $url='http://sms.w3cert.in/api/sendmsg.php?';
    $uname='TQMreport';
    $pwd='05550';
    $sms ="Hi"." ".$client_name."!"." "."Your Invoice Due Date is"." ".$invoicedue." "."Geneareted On"." ".$invoicedate." ".
    "Invoice No"." "."#".$invoiceno." "."Total Amount" ." "."Rs.".$total;
  //  echo $sms;
    $sender     ='Jwahar';
    $priority   ='ndnd';
    $stype      ='normal';
    $sms = urlencode($sms);
    $sender = urlencode($sender);
  //  $parameters="user=$uname&pass=$pwd&sender=$sender&phone=$to&text=$sms&priority=$priority&stype=$stype";
  // $fp = fopen("$url$parameters", "r");
   //$response = stream_get_contents($fp);
      
      } 
      } })->everyMinute();
}
//DB::table('roles')->where('id', 1)->update(['role_slug' => 1])->everyMinute();       

}

