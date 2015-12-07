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
                    'from_email' => 'noreply@remark.com',
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
        })->daily();

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
                                                'name' => 'highlights_title_1',
                                                'content' => $result_new[0]->title,
                                            ),
                                            array(
                                                'name' => 'highlights_title_2',
                                                'content' => $result_new[1]->title,
                                            ),
                                            array(
                                                'name' => 'highlights_title_3',
                                                'content' => $result_new[2]->title,
                                            ),
                                            array(
                                                'name' => 'highlights_description_1',
                                                'content' => $result_new[0]->body,
                                            ),
                                            array(
                                                'name' => 'highlights_description_2',
                                                'content' => $result_new[1]->body,
                                            ),
                                            array(
                                                'name' => 'highlights_description_3',
                                                'content' => $result_new[2]->body,
                                            ),
                                            array(
                                                'name' => 'POPULAR',
                                                'content' => $result_likes[0],
                                            )
                                        )
                                    )
                                ),
                            );

                        // MandrillMail::messages()->sendTemplate('remark_highlight_mail', $template_content, $message);
                    }
                }
       
            })->weekly()->mondays()->at('13:00');


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
