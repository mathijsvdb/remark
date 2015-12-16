<?php
namespace App\Marketing;

use Carbon\Carbon;
use DB;
use MandrillMail;

class RemarkHighLightMail{

	public static function HighLights(){

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

                for($i; $i < 3; $i++){
                	
                    $popular_list[$i] = '<h2>' . $result_likes[$i]->title . '</h2>'
                                        '<p>' . $result_likes[$i]->description . '</p>
                                        <img src="http://remark.weareimd.be/uploads/' . $result_likes[$i]->image.'" alt="project image" />';

                    $new_list[$i] = '<h2>' . $result_new[$i]->title . '</h2>'
                                    '<p>' . $result_new[$i]->description . '</p>
                                    <img src="http://remark.weareimd.be/uploads/' . $result_new[$i]->image.'" alt="project image" />';
                }

                $users = DB::table('users')->get();

                foreach($users as $u){

                    if($u->highlight_mail == 1){

                        $template_content = [];
                        $message = array(
                                'subject' => 'Go checkout the higlights for this week from Remark',
                                'from_email' => 'RemarkTeam@remark.com',
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
                                                'name' => 'new_1',
                                                'content' => '<table><tr>' . $new_list[0] . '</tr></table>',
                                            ),
                                            array(
                                                'name' => 'new_2',
                                                'content' => '<table><tr>' . $new_list[1] . '</tr></table>',
                                            ),
                                            array(
                                                'name' => 'new_3',
                                                'content' => '<table><tr>' . $new_list[2] . '</tr></table>',
                                            ),
                                            array(
                                                'name' => 'popular_1',
                                                'content' => '<table><tr>' . $popular_list[0] . '</tr></table>',
                                            ),
                                            array(
                                                'name' => 'popular_2',
                                                'content' => '<table><tr>' . $popular_list[1] . '</tr></table>',
                                            ),
                                            array(
                                                'name' => 'popular_3',
                                                'content' => '<table><tr>' . $popular_list[2] . '</tr></table>',
                                            ), 
                                        )
                                    )
                                ),
                            );

                        MandrillMail::messages()->sendTemplate('remark-highlight-mail', $template_content, $message);
                    }
                }
	}
}