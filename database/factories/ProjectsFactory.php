<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

// $table->bigIncrements('id');
// $table->string('name');
// $table->text('description');
// $table->dateTime('added_on');
// $table->dateTime('updated_on');
// $table->enum('status',[1,0,-1]);
// $table->dateTime('starts_on')->nullable();
// $table->dateTime('ends_on')->nullable();
// $table->float('est_hours');
// $table->float('actual_hours');
// $table->unsignedBigInteger('owner_team_id');
// $table->unsignedBigInteger('added_by_customer_id');

$factory->define(Model::class, function (Faker $faker) {
    return [
      'name'    => $faker->text(10),
      'descrption'  => $faker->text(40),
      ''
    ];
});
