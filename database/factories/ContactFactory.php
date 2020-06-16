<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {

    //Generate a timestamp using mt_rand.
        $timestamp = mt_rand(1, time());
    
    //Format that timestamp into a readable date string.
        $randomDate = date('Y-m-d H:i:s', $timestamp);

    return [
        'user_id' => User::all()->random()->id,
        'name' => $faker->name,
        'email' => $faker->email,
        'birthday' => $randomDate,
        'company' => $faker->company,
    ];
});
