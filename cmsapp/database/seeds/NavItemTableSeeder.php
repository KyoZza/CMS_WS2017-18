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
        $navItem1->language = 'en';
        $navItem1->save();

        $navItem2 = new NavItem;
        $navItem2->title = 'About';
        $navItem2->position = 1;
        $navItem2->link = '/about';
        $navItem2->language = 'en';
        $navItem2->save();

        $navItem3 = new NavItem;
        $navItem3->title = 'Blog';
        $navItem3->position = 2;
        $navItem3->link = '/blog';
        $navItem3->language = 'en';
        $navItem3->save();
//de

        $navItem4 = new NavItem;
        $navItem4->title = 'Startseite';
        $navItem4->position = 0;
        $navItem4->link = '/';
        $navItem4->language = 'de';
        $navItem4->save();

        
        $navItem5 = new NavItem;
        $navItem5->title = 'Über';
        $navItem5->position = 1;
        $navItem5->link = '/about';
        $navItem5->language = 'de';
        $navItem5->save();

        $navItem6 = new NavItem;
        $navItem6->title = 'Blog';
        $navItem6->position = 2;
        $navItem6->link = '/blog';
        $navItem6->language = 'de';
        $navItem6->save();
    }
}
