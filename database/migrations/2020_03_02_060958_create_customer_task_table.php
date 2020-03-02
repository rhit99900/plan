<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerTask', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('task_id');
            $table->double('est_hours')->nullable();
            $table->double('actual_hours')->nullable();
            $table->enum('status',['1','0'])->default('1');            
            $table->timestamp('added_on')->useCurrent();
            $table->timestamp('updated_on')->useCurrent();

            $table->foreign('customer_id')
                  ->references('id')->on('customers');
            
            $table->foreign('task_id')
                  ->references('id')->on('tasks');                                                                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customerTask');
    }
}
