<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     * email
	 * password
	 * first_name
	 * last_name
	 * added_on
	 * updated_on
	 * phone
	 * status 1,0,-1
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('added_on')->useCurrent();
            $table->timestamp('updated_on')->useCurrent();
            $table->string('password');
            $table->string('phone');
            $table->enum('status',[1,0,-1]);
            $table->rememberToken();            
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
