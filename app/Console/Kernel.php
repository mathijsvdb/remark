<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
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
    

        $schedule->call(function () {

                $date = new Carbon;
                $date->subWeek();

                $result_new = DB::table('projects')
                    ->where('created_at', '>', $date->toDateTimeString() )
                    ->orderBy(DB::raw('RAND()'))
                    ->take(3)
                    ->get();

                $result_likes = DB::table('likes')
                    ->where('likes.created_at', '>', $date->toDateTimeString() )
                    ->join('projects', 'projects.id', '=', 'likes.project_id')
                    ->select(DB::raw('projects.id, count(likes.project_id) as likes_count'))
                    ->groupBy('likes.project_id')
                    ->orderBy('likes.project_id', 'desc')
                    ->take(3)
                    ->get();

                var_dump($result_new);
                var_dump($result_likes);

                $users = DB::table('users')->get();

                foreach($users as $u){

                    if($u->highlight_mail == 1){

                        $template_content = [];
                        $message = array(
                                'subject' => 'Go checkout the higlights for this week from Remark',
                                'from_email' => 'noreply@remark.com',
                                'from_name' => 'Remark',
                                'to' => array(
                                    array(
                                        'email' => $u->email,
                                        'name' => $u->firstname + ' ' + $u->lastname,
                                        'type' => 'to'
                                    )
                                ),
                                'merge_vars' => array(
                                    array(
                                        'rcpt' => $u->email,
                                        'vars' => array(
                                            array(
                                                'name' => 'highlights',
                                                'content' => $result_new,
                                            ),
                                            array(
                                                'name' => 'POPULAR',
                                                'content' => $result_likes,
                                            )
                                        )
                                    )
                                ),
                            );

                        MandrillMail::messages()->sendTemplate('remark_highlight_mail', $template_content, $message);
                    }
                }
       
            })->everyMinute();
    }
}
