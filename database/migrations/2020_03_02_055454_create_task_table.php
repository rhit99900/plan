<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();            
            $table->timestamp('added_on')->useCurrent();
            $table->unsignedBigInteger('project_id');
            $table->integer('indentation_level');
            $table->unsignedBigInteger('task_id')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->timestamp('starts_on')->nullable();
            $table->timestamp('ends_on')->nullable();
            $table->double('est_hours')->nullable();
            $table->double('actual_hours')->nullable();
            $table->unsignedBigInteger('added_by_customer_id');

            $table->foreign('project_id')
                  ->references('id')->on('projects')
                  ->onDelete('cascade');
           
            $table->foreign('added_by_customer_id')
                  ->references('id')->on('customers')
                  ->onDelete('cascade');                              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
