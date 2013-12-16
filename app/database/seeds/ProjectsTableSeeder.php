<?php

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('projects')->truncate();

			DB::table('projects')->delete();
			$faker = Faker\Factory::create();

			foreach(range(1,50) as $index) {

				$p = new Project;
					$p->name = $faker->unique()->company;
					$p->user_id = $faker->randomNumber(1,16);
					$p->budget_total = $faker->randomNumber(0, 50000);
					$p->budget_used = $faker->randomNumber(0, $p->budget_total);
					$p->completed = $faker->boolean(10);
					$p->description = $faker->paragraph;
					$p->url = $faker->url;
					$p->save();
			}
		// Uncomment the below to run the seeder
		// DB::table('projects')->insert($projects);
	}

}
