<?php

use Illuminate\Support\Facades\Schema;
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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('ticket', function (Blueprint $table) {
            $table->bigIncrements('ticket_id');
            $table->integer('service_id');
            $table->integer('level');            
            $table->string('comment');            
            $table->integer('status');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('ticket_support', function (Blueprint $table) {
            $table->bigIncrements('ticket_support_id');
            $table->integer('ticket_id');
            $table->integer('user_id');            
            $table->string('comment');            
            $table->integer('status');
            $table->integer('time_consumed');
            $table->dateTime('time_finished');
            $table->timestamps();
        });
        Schema::create('service', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('service_name');
            $table->integer('service_deadline');                        
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
        Schema::dropIfExists('users');
    }
}
