<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_by');
            $table->string('project_name');
            $table->string('rera_reg_no');
            $table->string('property_type');
            $table->text('project_address');
            $table->string('auth_person_name');
            $table->string('contact_no');
            $table->string('email');
            $table->string('promoter_name');
            $table->string('project_start_date');
            $table->string('project_completion_date');
            $table->string('brochure');
            $table->string('link');
            $table->string('property_config');
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
        Schema::dropIfExists('project_forms');
    }
}
