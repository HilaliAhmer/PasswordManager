<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $standartUser = Role::create(['name'=>'IT Standart User']);
        $adminUser = Role::create(['name'=>'IT Super Admin']);
        $ITOPUser = Role::create(['name'=>'IT SAP']);
        $ITFUNCtUser = Role::create(['name'=>'IT Non-SAP']);

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create demo users
        $user = \App\Models\User::factory()->create([
            'name'=>'Selahattin Açıkgöz',
            'email'=>'s.acikgoz@korsini.com',
            'type'=>'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$1iNDp4q5TcpHYTw.JsnH8ut3mf38biw8QT9eVaaG2JsCKepretM4q', // Trapper35!
            'remember_token' => Str::random(10),
            'slug'=>str::slug('Selahattin Açıkgöz'),
        ]);
        $user->assignRole($adminUser);

        // $BTUser = Permission::create(['name'=>'Bilgi Teknolojileri Uzmanı']);
        // $SNUtUser = Permission::create(['name'=>'Sistem ve Network Uzmanı']);
        // $SAPtUser = Permission::create(['name'=>'SAP İş Analisti']);
        // $NONSAPtUser = Permission::create(['name'=>'Non-SAP İş Analisti']);
    }
}
