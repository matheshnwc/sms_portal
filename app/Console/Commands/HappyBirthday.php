<?php

namespace App\Console\Commands;
use App\Http\Controllers\Admin\AdminController;
use \DB as DB;
use App\Http\Controllers\Admin;
use Illuminate\Console\Command;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
protected $description = 'Sends a Happy birthday message to users via SMS';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
 $users=DB::table('users')->get(); 
\Log::info('$user @ ' . \Carbon\Carbon::now());
 //$this->info('The happy birthday messages were sent successfully!');

 
}
}
