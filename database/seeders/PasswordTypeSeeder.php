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
            'password_type_role_id'=>'1'
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'System ve Network',
            'password_type_role_id'=>'2'
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'SAP',
            'password_type_role_id'=>'3'
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'Non-SAP',
            'password_type_role_id'=>'4'
        ]);
    }
}
