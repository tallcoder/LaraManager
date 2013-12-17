<?php 

class DatabaseSeeder extends Seeder {
	public function run() {
		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded');

		$this->call('ProjectsTableSeeder');
		$this->command->info('Projects table seeded');

		$this->call('TasksTableSeeder');
		$this->command->info('tasks table seeded');

		$this->call('TasklistsTableSeeder');
		$this->command->info('tasklist table seeded');
	}
}