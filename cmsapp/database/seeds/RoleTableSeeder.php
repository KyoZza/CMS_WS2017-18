<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role();
        $role1->name = 'User';
        $role1->description = 'Basic Access rights';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'Website Manager';
        $role2->description = 'Allowed to edit the Website';
        $role2->save();
    
        $role3 = new Role();
        $role3->name = 'Super Saiyajin';
        $role3->description = 'Over 9000. Full Access right';
        $role3->save();
    }
}
