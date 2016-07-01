<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_status extends Model {
	//	
	protected $filable = [
	'GUID',
	'message',
	'mobilenumber',
	'errorcode',
	'reasoncode',
	'status',
	'sentdate',
	'sms_status_update',
	'seq',
	'createdby'
	];
	protected $table = 'sms_status';
}
