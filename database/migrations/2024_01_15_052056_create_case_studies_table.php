<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('psy_id')->unsigned()->index();
            $table->foreign('psy_id')->references('id')->on('users')->onDelete('cascade');

            $table->longText('problem_discussion');
            $table->string('number_siblings')->nullable();
            $table->string('birth_order')->nullable();
            $table->longText('parents_information')->nullable();
            $table->longText('p_history_psy')->nullable();
            $table->longText('f_history_psy')->nullable();
            $table->longText('m_history_psy')->nullable();
            $table->longText('self_harm')->nullable();
            $table->longText('development_history')->nullable();
            $table->longText('educational_history')->nullable();
            $table->string('contract_person')->nullable();
            $table->longText('presenting_symptoms')->nullable();
            $table->longText('significant_history_presenting')->nullable();
            $table->longText('mental_status_examination')->nullable();
            $table->longText('condition_identified')->nullable();
            $table->longText('treatment_goal')->nullable();
            $table->longText('assessment')->nullable();
            $table->longText('treatment_plan')->nullable();
            $table->string('status')->nullable();

            // for referral
            $table->string('r_name')->nullable();
            $table->string('r_id')->nullable();
            $table->string('r_department')->nullable();
            $table->string('r_designation')->nullable();
            $table->string('r_contract')->nullable();
            $table->string('r_email')->nullable();


            // Request Appointment Date
            $table->string('r_a_date')->nullable();
            $table->string('r_a_time_slot')->nullable();

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
        Schema::dropIfExists('case_studies');
    }
}
