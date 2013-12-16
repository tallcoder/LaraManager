<?php

class TasklistsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('projects')->truncate();

			DB::table('tasklists')->delete();
			$faker = Faker\Factory::create();

			foreach(range(1,20) as $index) {
				$l = new Tasklist;
				$l->description = $faker->paragraph;
				$l->parent_id = $faker->randomNumber(1,50);
				$l->name = $faker->sentence;
				$l->save();
			}
	}

}
