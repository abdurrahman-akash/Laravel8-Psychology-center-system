<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('case_id')->unsigned()->index();
            $table->foreign('case_id')->references('id')->on('case_studies')->onDelete('cascade');

            $table->bigInteger('schedule_id')->unsigned()->index();
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');

            $table->bigInteger('psy_id')->unsigned()->index();
            $table->foreign('psy_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('order_by');
            $table->longText('presenting_issue');
            $table->longText('session_activities');
            $table->longText('Take_out');
            $table->string('image')->nullable();
            $table->string('Next_date_follow')->nullable();
            $table->string('Next_date_time_slot')->nullable();

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
        Schema::dropIfExists('sessions');
    }
}
