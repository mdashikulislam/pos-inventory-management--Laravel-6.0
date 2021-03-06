<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'mobile'=>$faker->phoneNumber,
        'email'=>$faker->email,
        'address'=>$faker->address,
        'status'=>1,
        'created_by'=>1,
        'updated_by'=>1
    ];
});
