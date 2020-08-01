<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Exports\SalesReport;
use App\Exports\UserWalletBallanceReport;
use App\Exports\UsersDepositAmountReport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;
class EmailBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $subject = "Zopay Daily Report Details: ".date('d-m-Y', strtotime("-1 days"));   
        //$mails = ['manikantakumars123@gmail.com', 'narendar.n@tesync.net']; 
        $mails = ['manikantakumars123@gmail.com', 'narendar.n@tesync.net', 'rizwan@allo.ae', 'muralidharan@allo.ae', 'rpp@coregrocer.com'];                     
        //$mails = [];
               
        Excel::store(new SalesReport(), ''.date('d-m-Y', strtotime("-1 days")).'-daily-sales-summary-report.csv', 'sales_report');
        $file[] = storage_path('daily-reports/sales-reports/'.date('d-m-Y', strtotime("-1 days")).'-daily-sales-summary-report.csv');

        Excel::store(new UserWalletBallanceReport(), ''.date('d-m-Y', strtotime("-1 days")).'-user-wallet-balance-report.csv', 'user_wallet_balance_report');
        $file[] = storage_path('daily-reports/user-wallet-balance-reports/'.date('d-m-Y', strtotime("-1 days")).'-user-wallet-balance-report.csv');

        Excel::store(new UsersDepositAmountReport(), ''.date('d-m-Y', strtotime("-1 days")).'-users-deposit-amount-report.csv', 'users_deposit_amount_report');
        $file[] = storage_path('daily-reports/users-deposit-amount-report/'.date('d-m-Y', strtotime("-1 days")).'-users-deposit-amount-report.csv');
        
        sendMail('Anoop Vukka', 'anoop.vukka@gmail.com', array(), 'daily-report-mail', $subject, 'no-reply@zopay.me', 'ZOPAY', $file, $mails);
        //sendMail('Manikanta Kumar', 'manikantakumars123@gmail.com', array(), 'daily-report-mail', $subject, 'no-reply@zopay.me', 'ZOPAY', $file, $mails);
        
    }
}
