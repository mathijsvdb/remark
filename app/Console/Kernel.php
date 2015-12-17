<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Marketing\RemarkHighLightMail;
use MandrillMail;
use Carbon\Carbon;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->call(function(){

            $date = new Carbon;
            $date->subWeek();
            $url = url('/password/email');

            $result_waitingList = DB::table('users')
                ->where('created_at', '<', $date->toDateTimeString())
                ->where('accountstatus', '=', 0)
                ->get();



            foreach($result_waitingList as $w){

                $template_content = [];
                $message = array(
                    'subject' => 'Your account has been activated!',
                    'from_email' => 'RemarkTeam@remark.com',
                    'from_name' => 'Remark',
                    'to' => array(
                        array(
                            'email' => $w->email,
                            'name' => $w->firstname + ' ' + $w->lastname,
                            'type' => 'to'
                        )
                    ),
                    'merge_vars' => array(
                        array(
                            'rcpt' => $w->email,
                            'vars' => array(
                                array(
                                    'name' => 'PASSLINK',
                                    'content' => $url,
                                ),
                                array(
                                    'name' => 'FIRSTNAME',
                                    'content' => $w->firstname,
                                ),
                            )
                        )
                    ),
                );

                MandrillMail::messages()->sendTemplate('remark-activate', $template_content, $message);

            }

            $result_waitingList = DB::table('users')
                ->update(['accountstatus' => 1]);

        })->everyMinute();
    
        $schedule->call(function () {
            DB::table('ads')
                ->where('end_date', '<', Carbon::now())
                ->delete();
        })->everyMinute();

        $schedule->call(join('@', [RemarkHighLightMail::class, 'HighLights']))
            ->weekly()->mondays()->at('13:00');


            $schedule->call(function () {
                //when end_date is past, put battle on inactive
                $battles = DB::table('battles')->get();
                $now = Carbon::now();;

                foreach ($battles as $b) {
                    if($b->end_date > $now){
                        DB::table('battles')
                            ->where('b.id', $b->id)
                            ->update(array('active' => 0));
                    }
                }
            })->hourly();
    }
}
