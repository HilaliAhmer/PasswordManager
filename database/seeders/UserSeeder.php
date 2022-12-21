<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'name'=>'Selahattin Açıkgöz',
            'email'=>'s.acikgoz@korsini.com',
            'type'=>'admin',
            'role'=>'2',
            'email_verified_at' => now(),
            'password' => '$2y$10$1iNDp4q5TcpHYTw.JsnH8ut3mf38biw8QT9eVaaG2JsCKepretM4q', // Trapper35!
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(10)->create();
    }
}
