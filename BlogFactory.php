<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
	return [
		'author_id' => function () {
			return factory(App\User::class)->create()->id;
		},
		'title' => $faker->sentence,
		'details' => $faker->paragraph,

	];
});
