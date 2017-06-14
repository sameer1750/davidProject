<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalaryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('gross_salary');
            $table->date('applicable_from_date');
            $table->integer('basic_salary');
            $table->integer('hra');
            $table->integer('special_allowance');
            $table->integer('medical_allowance');
            $table->integer('other_allowance');
            $table->integer('conveyance');
            $table->integer('incentive');
            $table->integer('income_tax');
            $table->integer('profession_tax');
            $table->integer('pf_deduction');
            $table->integer('per_month_deduction');
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
        Schema::drop('salary_details');
    }
}
