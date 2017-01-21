<?php

namespace App\Console;

use Carbon\Carbon;
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
         //Commands\ActionNotifyWithSMSCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $dateInDatabase = null;
        $schedule->command('your:command')->daily()->at('12:00')->when(function () use ($dateInDatabase) {
            return (
                $dateInDatabase == Carbon::today() ||
                $dateInDatabase == Carbon::yesterday() ||
                $dateInDatabase == Carbon::subDays(2)
            );
        });
    }
}
