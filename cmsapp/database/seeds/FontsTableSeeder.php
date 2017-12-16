<?php

use Illuminate\Database\Seeder;
use App\Fonts;

class FontsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $font1 = new Fonts;
        $font1->name = 'Raleway';
        $font1->url = 'https://fonts.googleapis.com/css?family=Raleway:300,400,600';
        $font1->css = "'Raleway', sans-serif";
        $font1->save();

        $font2 = new Fonts;
        $font2->name = 'Roboto';
        $font2->url = 'http://fonts.googleapis.com/css?family=Roboto';
        $font2->css = "'Roboto', sans-serif";
        $font2->save();

        $font3 = new Fonts;
        $font3->name = 'Vollkorn';
        $font3->url = 'https://fonts.googleapis.com/css?family=Vollkorn';
        $font3->css = "'Vollkorn', serif";
        $font3->save();

        $font4 = new Fonts;
        $font4->name = 'Ubuntu';
        $font4->url = 'https://fonts.googleapis.com/css?family=Ubuntu';
        $font4->css = "'Ubuntu', sans-serif";
        $font4->save();

        $font5 = new Fonts;
        $font5->name = 'Open+Sans';
        $font5->url = 'https://fonts.googleapis.com/css?family=Open+Sans';
        $font5->css = "'Open Sans', sans-serif";
        $font5->save();

        $font6 = new Fonts;
        $font6->name = 'Lato';
        $font6->url = 'https://fonts.googleapis.com/css?family=Lato';
        $font6->css = "'Lato', sans-serif";
        $font6->save();

        $font7 = new Fonts;
        $font7->name = 'Josefin+Slab';
        $font7->url = 'https://fonts.googleapis.com/css?family=Josefin+Slab';
        $font7->css = "'Josefin Slab', serif";
        $font7->save();
    }
}
