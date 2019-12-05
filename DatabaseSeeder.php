<?php

use App\Model\Blog;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		factory(User::class, 10)->create()->each(function ($user) {
			//create 5 posts for each user
			factory(Blog::class, 5)->create(['author_id' => $user->id]);
		});
	}
}
