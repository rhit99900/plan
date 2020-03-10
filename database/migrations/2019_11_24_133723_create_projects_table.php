<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.     
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->dateTime('added_on')->useCurrent();
            $table->dateTime('updated_on')->useCurrent();
            $table->enum('status',[1,0,-1]);
            $table->dateTime('starts_on')->nullable();
            $table->dateTime('ends_on')->nullable();
            $table->float('est_hours');
            $table->float('actual_hours');
            $table->unsignedBigInteger('owner_team_id');
            $table->unsignedBigInteger('added_by_customer_id');                                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
