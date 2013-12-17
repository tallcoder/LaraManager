<?php

class TasksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('tasks')->truncate();

		DB::table('tasklists')->delete();
		$faker = Faker\Factory::create();

		foreach(range(1,200) as $index) {
			$t = new Task;
			$t->name = $faker->sentence;
			$t->description = $faker->paragraph;
			$t->list = $faker->randomNumber(1,20);
			$t->created_by = $faker->randomNumber(1,15);
			$t->budget_total = $faker->randomNumber(0,200);
			$t->budget_used = 0;
			$t->completed_by = $faker->randomNumber(0,15);
			$t->assigned_to = $faker->randomNumber(0,15);
			$t->begin_date = $faker->date($format = 'Y-m-d');
			$t->due_date = $faker->date($format = 'Y-m-d');
			$t->end_date = $faker->date($format = 'Y-m-d');
			$t->save();
		}
	}
}