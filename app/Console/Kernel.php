<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\EtisaletPendingTransactions::class,
         Commands\UserSettings::class,
         Commands\EmailBackup::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('pending:transactions')
                  ->timezone('Asia/Dubai')
                  ->everyMinute();

         $schedule->command('user-settings:user-settings')
                  ->timezone('Asia/Dubai')
                  ->monthly();

         $schedule->command('backup:cron')
                  ->timezone('Asia/Dubai')
                  ->daily();
         /* $schedule->command('backup:cron')
                  ->everyMinute(); */
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
