<?php

use Illuminate\Database\Seeder;

class SeedUsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'userFirstName' => 'Someone',
            'userLastName' => 'Cool',
            'birthDate' => '1997-07-10',
            'email' => 'cool@gmail.com',
            'phone' => '204-888-9999',
            'street' => 'Donald',
            'post' => 'r3l9g6',
            'city' => 'Winnipeg',
            'image' =>'/images/man.png',
            'province' => 'Manitoba',
            'admin' => true,
            'password' =>password_hash('mypass', PASSWORD_DEFAULT)
        ]);

		DB::table('users')->insert([
			'userFirstName' => 'Smily',
			'userLastName' => 'Cool',
			'birthDate' => '1997-07-10',
			'email' => 'smilycool@gmail.com',
			'phone' => '204-888-6999',
			'street' => 'Donald',
			'post' => 'r3l9g6',
			'city' => 'Richmond Hill',
			'province' => 'Ontario',
			'password' =>password_hash('mypass', PASSWORD_DEFAULT)
		]);

        DB::table('users')->insert([
            'userFirstName' => 'Jyoti',
            'userLastName' => 'Garg',
            'birthDate' => '1997-07-10',
            'email' => 'smilycool1@gmail.com',
            'phone' => '204-888-7999',
            'street' => 'Donald',
            'post' => 'r3l9g6',
            'city' => 'Richmond Hill',
            'province' => 'Nunavut',
            'password' =>password_hash('mypass', PASSWORD_DEFAULT)
        ]);

        DB::table('users')->insert([
            'userFirstName' => 'Jasreen',
            'userLastName' => 'Cool',
            'birthDate' => '1997-07-10',
            'email' => 'smilycool2@gmail.com',
            'phone' => '204-888-8999',
            'street' => 'Donald',
            'post' => 'r3l9g6',
            'city' => 'Richmond Hill',
            'province' => 'Nova Scotia',
            'password' =>password_hash('mypass', PASSWORD_DEFAULT)
        ]);

        DB::table('users')->insert([
            'userFirstName' => 'Raymond',
            'userLastName' => 'Garg',
            'birthDate' => '1997-07-10',
            'email' => 'smilycool3@gmail.com',
            'phone' => '204-888-5999',
            'street' => 'Donald',
            'post' => 'r3l9g6',
            'city' => 'Richmond Hill',
            'province' => 'Quebec',
            'password' =>password_hash('mypass', PASSWORD_DEFAULT)
        ]);

    }
}
