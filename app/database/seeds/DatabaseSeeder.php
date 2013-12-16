<?php 

class DatabaseSeeder extends Seeder {
	public function run() {
		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded');

		$this->call('ProjectsTableSeeder');
		$this->command->info('Projects table seeded');
	}
}