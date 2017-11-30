<?php

use Illuminate\Database\Seeder;
use App\ThemeColor;

class ThemeColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = new ThemeColor();
        $color->standart = '';
        $color->light = '';
        $color->dark = '';
        $color->is_active = true;
        $color->save();

        $color = new ThemeColor();
        $color->standart = '';
        $color->light = '';
        $color->dark = '';
        $color->save();
    }
}
