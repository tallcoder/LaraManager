<?php

class UsersTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();
		$f = Faker\Factory::create();

		foreach(range(1,15) as $index) {
			$u = new User;
			$u->username = $f->username;
			$u->first_name = $f->firstName;
			$u->last_name = $f->lastName;
			$u->phone = $f->phoneNumber;
			$u->password = Hash::make($f->word);
			$u->email = $f->email;
			$u->usertype = 'client';
			$u->userperms = '111';
			$u->save();
		}

		$u = new User;
		$u->username = 'mike';
		$u->password = Hash::make('asdf');
		$u->email = 'mike@mjdugan.com';
		$u->usertype = 'admin';
		$u->userperms = 777;
		$u->first_name = 'Mike';
		$u->last_name = 'Dugan';
		$u->phone = '410-555-5123';
		$u->save();

	}
}