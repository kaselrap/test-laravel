<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Stanislav',
            'email' => 'kaselrap@gmail.com',
            'password' => bcrypt('CUvqS4QtN4'),
            'avatar' => '1_photo_2017-11-09_16-46-00.jpg',
            'data' => '{"gender": "0", "country": "Belarus", "last_name": "Veselov", "first_name": "Stanislav", "date_of_birth": "1998-04-01"}'
        ]);
    }
}
