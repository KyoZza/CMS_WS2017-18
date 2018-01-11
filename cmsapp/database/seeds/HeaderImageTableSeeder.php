<?php

use Illuminate\Database\Seeder;
use App\HeaderImage;

class HeaderImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image1 = new HeaderImage();
        $image1->name = 'pexels-photo-220067.jpeg';
        $image1->save();

        $image2 = new HeaderImage();
        $image2->name = 'pexels-photo-235721.jpeg';
        $image2->save();

        $image3 = new HeaderImage();
        $image3->name = 'pexels-photo-253905.jpeg';
        $image3->save();

        $image4 = new HeaderImage();
        $image4->name = 'pexels-photo-318238.jpeg';
        $image4->save();

        $image5 = new HeaderImage();
        $image5->name = 'pexels-photo-589840.jpeg';
        $image5->save();

        $image6 = new HeaderImage();
        $image6->name = 'cms.jpg';
        $image6->save();

        $image6 = new HeaderImage();
        $image6->name = 'cms2.jpg';
        $image6->save();

        $image6 = new HeaderImage();
        $image6->name = 'cms3.jpg';
        $image6->save();

        $image6 = new HeaderImage();
        $image6->name = 'cms4.jpg';
        $image6->save();
    }
}
