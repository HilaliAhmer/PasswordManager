<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PasswordTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PasswordType::insert([
            'type_name'=>'Bilgi İşlem',
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'System ve Network',
        ]);
    }
}
