<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('accountstatus');
            $table->string('image');
            $table->string('bio');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('website');
            $table->boolean('comment_mail')->default(1);
            $table->boolean('highlight_mail')->default(1);
            $table->integer('referral_amount')->default(3);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
