<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        // $BTUser = Permission::create(['name'=>'Bilgi Teknolojileri Uzmanı']);
        // $SNUtUser = Permission::create(['name'=>'Sistem ve Network Uzmanı']);
        // $SAPtUser = Permission::create(['name'=>'SAP İş Analisti']);
        // $NONSAPtUser = Permission::create(['name'=>'Non-SAP İş Analisti']);
    }
}
