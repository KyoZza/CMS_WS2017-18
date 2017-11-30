<?php

use Illuminate\Database\Seeder;
use App\Theme;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $theme1 = new Theme();
        $theme1->name = 'theme1';
        $theme1->is_active = true;
        $theme1->save();

        $theme2 = new Theme();
        $theme2->name = 'theme2';
        $theme2->is_active = false;
        $theme2->save();
    
        $theme2 = new Theme();
        $theme2->name = 'theme1';
        $theme2->is_active = false;
        $theme2->save();
    }
}
