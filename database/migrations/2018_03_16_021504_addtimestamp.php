<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addtimestamp extends Migration
{
    /**
     * Run the migrations.
     * Adiciona a todas las tablas de la base de datos los campos para los timestamp de creación y actualización
     * @return void
     */
    public function up()
    {
         Schema::table('alert', function (Blueprint $table) {
      //  $table->string('ID_STATE_TYPE')->autoIncrement()->change();
        $table->timestamps(); 
        });

        Schema::table('as_src', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('assessment_plan_log', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('block_course', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('cdio', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('cdio_course_mtx', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('cdio_lvl', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('cdio_outcome_mtx', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('cdio_skill', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('cdio_skill_pi', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('compl_src', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('course', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('course_professor', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('eval_cycle', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('eval_report', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('evide_file', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('faculty', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('faculty_user', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('main_cycle', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('menu', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('menu_role', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('method', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('outcome', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('outcome_cycle_as', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('outcome_log', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('outcome_peo_mtx', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('param_smc', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('peo', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('period', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('pi_smc', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('plan_smc', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('program_smc', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('role_cip', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('rubric_file', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('state_smc', function (Blueprint $table) {
        $table->timestamps(); 
        });

     //   Schema::table('state_type', function (Blueprint $table) {
     //   $table->timestamps(); 
     //   });

        Schema::table('user_as_src', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('user_cip', function (Blueprint $table) {
        $table->timestamps(); 
        });

        Schema::table('user_cip_role_cip', function (Blueprint $table) {
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
        //
    }
}
