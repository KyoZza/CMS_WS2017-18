<?php

use Illuminate\Database\Seeder;
use App\GeneralOptions;

class GeneralOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = new GeneralOptions;
        $options->theme = "default";
        $options->theme_colors_id = 17;
        $options->fonts_id = 1;
        $options->font_size = 14;
        $options->save();

        $options = new GeneralOptions;
        $options->theme = "custom";
        $options->theme_colors_id = 17;
        $options->fonts_id = 1;
        $options->font_size = 14;
        $options->save();
    }
}
