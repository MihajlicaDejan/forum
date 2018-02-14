<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'      => 'Dejan Mihajlica',
            'password'  => bcrypt('admin'),
            'email'     => 'mihajlicad@gmail.com',
            'admin'     => 1,
            'avatar'    => asset('avatars/admin.jpg')
        ]);


        \App\User::create([
            'name'      => 'Vladimir Sandic',
            'password'  => bcrypt('sandic'),
            'email'     => 'sandic@example.com',
            'avatar'    => asset('avatars/subscriber.jpg')
        ]);
    }
}
