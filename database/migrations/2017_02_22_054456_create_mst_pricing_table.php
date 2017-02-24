<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->string('monthly')->nullable();
            $table->string('yearly')->nullable();
            $table->string('status')->nullable();
            $table->string('order')->nullable();
            $table->string('rating')->nullable();
            $table->string('review_count')->nullable();
            $table->string('first_feature')->nullable();
            $table->string('second_feature')->nullable();
            $table->string('third_feature')->nullable();
            $table->string('fourth_feature')->nullable();

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
        Schema::drop("mst_pricing");
    }
}
