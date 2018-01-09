<?php

use Illuminate\Database\Seeder;
use App\ThemeHeaderOptions;

class ThemeHeaderOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option1 = new ThemeHeaderOptions();
        $option1->theme_id = 1;
        $option1->theme = 'default';
        $option1->background_image = 'pexels-photo-589840.jpeg';
        $option1->title = 'Welcome to CMSAPP!';
        $option1->subtitle = 'A content management system project created at OTHAW';
        $option1->language ='en';
        $option1->save();

        $option2 = new ThemeHeaderOptions();
        $option2->theme_id = 1;
        $option2->theme = 'custom';
        $option2->background_image = 'pexels-photo-589840.jpeg';
        $option2->title = 'Welcome to CMSAPP!';
        $option2->subtitle = 'A content management system project created at OTHAW';
        $option2->language='en';
        $option2->save();
        
        $option3 = new ThemeHeaderOptions();
        $option3->theme_id = 1;
        $option3->theme = 'defaultde';
        $option3->background_image = 'pexels-photo-589840.jpeg';
        $option3->title = 'Hallo bei CMSAPP';
        $option3->subtitle = 'Einem Conten Management System erstellt von der OTHAW';
        $option3->language='de';
        $option3->save();
        
        $option4 = new ThemeHeaderOptions();
        $option4->theme_id = 1;
        $option4->theme = 'customde';
        $option4->background_image = 'pexels-photo-589840.jpeg';
        $option4->title = 'Hallo bei CMSAPP';
        $option4->subtitle = 'Einem Conten Management System erstellt von der OTHAW';
        $option4->language='de';
        $option4->save();
    }
}
