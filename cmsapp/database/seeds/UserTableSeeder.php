<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_website_manager  = Role::where('name', 'Website Manager')->first();
        $role_super_saiyajin  = Role::where('name', 'Super Saiyajin')->first();
    
        $user1 = new User();
        $user1->name = 'Yamcha';
        $user1->email = 'yamcha@cms.com';
        $user1->password = bcrypt('secret');
        $user1->theme_color = '#552211';
        $user1->save();
        $user1->roles()->attach($role_user);
    
        $user2 = new User();
        $user2->name = 'Muten Roshi';
        $user2->email = 'roshi@cms.com';
        $user2->password = bcrypt('secret');
        $user2->theme_color = '#552211';
        $user2->save();
        $user2->roles()->attach($role_website_manager);
        
        $user3 = new User();
        $user3->name = 'Son Goku';
        $user3->email = 'kakarot@cms.com';
        $user3->password = bcrypt('secret');
        $user3->theme_color = '#552211';
        $user3->save();
        $user3->roles()->attach($role_super_saiyajin);
    }
}
