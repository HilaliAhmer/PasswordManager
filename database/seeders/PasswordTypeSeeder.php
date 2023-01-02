<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'password_type_role_id'=>'1',
            'slug'=>Str::slug('Bilgi İşlem')
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'System ve Network',
            'password_type_role_id'=>'2',
            'slug'=>Str::slug('System ve Ağ')
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'SAP',
            'password_type_role_id'=>'3',
            'slug'=>Str::slug('SAP')
        ]);
        \App\Models\PasswordType::insert([
            'type_name'=>'Non-SAP',
            'password_type_role_id'=>'4',
            'slug'=>Str::slug('Non-SAP')
        ]);
    }
}
