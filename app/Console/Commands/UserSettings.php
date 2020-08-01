<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use DB;

class UserSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user-settings:user-settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All users monthly amount limit settings update every month with this cron!';

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
        $user_data = array();
        //$user_data = User::select('id')->where('kyc_status', 'APPROVED')->get();
        $user_data = User::all();
        if(!empty($user_data) && $user_data->count() > 0)
        {
           /*  $start = date('Y-m-00');   
            $end = date('Y-m-t');
            $days = dateDiffInDays($start, $end);
            print_r($days);
            exit; */
            $updateSettings['month_start_date'] = date('Y-m-01');
            $updateSettings['month_end_date'] = date('Y-m-t');
            $updateFields['used_amount'] = 0.00;
            DB::table('settings')->update($updateSettings);
            // User::where('kyc_status', 'APPROVED')->update($updateFields);
            User::update($updateFields);
            return true;
        }
        return false;
        
    }
}
