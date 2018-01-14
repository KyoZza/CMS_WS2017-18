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
        $user1->avatar = 'yamcha.jpg';
        $user1->save();
        $user1->roles()->attach($role_user);
    
        $user2 = new User();
        $user2->name = 'Muten Roshi';
        $user2->email = 'roshi@cms.com';
        $user2->password = bcrypt('secret');
        $user2->theme_color = '#552211';
        $user2->avatar = 'roshi.jpg';
        $user2->save();
        $user2->roles()->attach($role_website_manager);
        
        $user3 = new User();
        $user3->name = 'Son Goku';
        $user3->email = 'kakarot@cms.com';
        $user3->password = bcrypt('secret');
        $user3->theme_color = '#552211';
        $user3->avatar = 'goku-tard.jpg';
        $user3->save();
        $user3->roles()->attach($role_super_saiyajin);

        $user4 = new User();
        $user4->name = 'Lord Frieza';
        $user4->email = 'frieza@cms.com';
        $user4->password = bcrypt('secret');
        $user4->theme_color = '#552211';
        $user4->avatar = 'frieza-tard.jpg';
        $user4->save();
        $user4->roles()->attach($role_website_manager);

        $user5 = new User();
        $user5->name = 'Vegeta';
        $user5->email = 'vegeta@cms.com';
        $user5->password = bcrypt('secret');
        $user5->theme_color = '#552211';
        $user5->avatar = 'vegeta-tard2.jpg';
        $user5->save();
        $user5->roles()->attach($role_super_saiyajin);

        $user6 = new User();
        $user6->name = 'Krillin';
        $user6->email = 'krillin@cms.com';
        $user6->password = bcrypt('secret');
        $user6->theme_color = '#552211';
        $user6->avatar = 'krillin-tard.jpg';
        $user6->save();
        $user6->roles()->attach($role_user);

        $user7 = new User();
        $user7->name = 'Son Gohan';
        $user7->email = 'gohan@cms.com';
        $user7->password = bcrypt('secret');
        $user7->theme_color = '#552211';
        $user7->avatar = 'gohan-tard3.jpg';
        $user7->save();
        $user7->roles()->attach($role_user);
    }
}
