<?php

use Illuminate\Database\Seeder;
use App\NavItem;

class NavItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $navItem1 = new NavItem;
        $navItem1->title = 'Home';
        $navItem1->position = 0;
        $navItem1->link = '/';
        $navItem1->save();

        $navItem2 = new NavItem;
        $navItem2->title = 'About';
        $navItem2->position = 1;
        $navItem2->link = '/about';
        $navItem2->save();

        $navItem3 = new NavItem;
        $navItem3->title = 'Blog';
        $navItem3->position = 2;
        $navItem3->link = '/blog';
        $navItem3->save();
    }
}
