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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*$schedule->call(function() 
        {
            $price = Option::where('name', 'debt_price')->value('value');
            $late_date = new Carbon(TakenBooks::where('end_day', '<', Carbon::now())->value('end_day'));
            $now = Carbon::now();
            $time_late = ($late_date->diff($now)->days);
            $debt = $time_late*$price;
            TakenBooks
        })*/
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
