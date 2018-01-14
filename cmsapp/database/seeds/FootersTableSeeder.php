<?php

use Illuminate\Database\Seeder;
use App\Footer;

class FootersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footer = new Footer;
        $footer->theme = "default";
        $footer->about_en = "Dragon Ball (Japanese: ドラゴンボール Hepburn: Doragon Bōru) is a Japanese media franchise created by Akira Toriyama. The initial manga, written and illustrated by Toriyama, was serialized in Weekly Shōnen Jump from 1984 to 1995, with the 519 individual chapters collected into 42 tankōbon volumes by its publisher Shueisha. Dragon Ball was initially inspired by the classical Chinese novel Journey to the West. The series follows the adventures of the protagonist, Son Goku, from his childhood through adulthood as he trains in martial arts and explores the world in search of the seven orbs known as the Dragon Balls, which summon a wish-granting dragon when gathered. Along his journey, Goku makes several friends and battles a wide variety of villains, many of whom also seek the Dragon Balls.";
        $footer->about_de = "Dragon Ball (jap. ドラゴンボール, Doragonbōru) ist eine Manga-Serie des japanischen Zeichners Akira Toriyama und basiert lose auf dem Roman Die Reise nach Westen von Wu Cheng’en. Dragon Ball erschien ursprünglich von 1984 bis 1995 im Manga-Magazin Weekly Shōnen Jump und wurde später in 42 Bänden veröffentlicht. Die insgesamt 519 Kapitel umfassen über 8.000 Seiten. Der Manga Dragon Ball beschreibt die Abenteuer des Protagonisten Son-Goku und seiner Freunde, die sich immer wieder auf die Suche nach den sieben Dragon Balls begeben und zahlreiche Abenteuer zu bestehen haben. Die Geschichte beginnt mit Son-Gokus Kindheit ab einem Alter von zwölf Jahren und seiner Zeit als Jugendlichem und endet mit seinem Leben als Erwachsenem. Die einzelnen Handlungsstränge sind in Sagas unterteilbar und werden mit fortschreitender Handlung komplexer.";
        $footer->address_en = "SHUEISHA<br/>\n2-5-10 Hitotsubashi<br/>\nChiyoda-ku 千代田区<br/>\nTokyo Prefecture, 101-8050<br/>\nJapan<br/>\n<br/>\nPhone: 81-3-3230-7755<br/>\nFax: 81-3-3264-0409<br/>\n<a href='www.shueisha.co.jp'/>www.shueisha.co.jp</a>";
        $footer->address_de = "SHUEISHA<br/>\n2-5-10 Hitotsubashi<br/>\nChiyoda-ku 千代田区<br/>\nPräfektur Tokio, 101-8050<br/>\nJapan<br/>\n<br/>\nTelefon: 81-3-3230-7755<br/>\nFax: 81-3-3264-0409<br/>\n<a href='www.shueisha.co.jp'/>www.shueisha.co.jp</a>";
        $footer->facebook = "https://www.facebook.com/dbsuperger/";
        $footer->twitter = "https://twitter.com/hashtag/dragonballsuper";
        $footer->youtube = "https://www.youtube.com/watch?v=XKm7b0_6kF8";
        $footer->linkedin = "https://www.linkedin.com/company/shueisha-inc-";
        $footer->save();
        
        $footer = new Footer;
        $footer->theme = "custom";
        $footer->about_en = "Dragon Ball (Japanese: ドラゴンボール Hepburn: Doragon Bōru) is a Japanese media franchise created by Akira Toriyama. The initial manga, written and illustrated by Toriyama, was serialized in Weekly Shōnen Jump from 1984 to 1995, with the 519 individual chapters collected into 42 tankōbon volumes by its publisher Shueisha. Dragon Ball was initially inspired by the classical Chinese novel Journey to the West. The series follows the adventures of the protagonist, Son Goku, from his childhood through adulthood as he trains in martial arts and explores the world in search of the seven orbs known as the Dragon Balls, which summon a wish-granting dragon when gathered. Along his journey, Goku makes several friends and battles a wide variety of villains, many of whom also seek the Dragon Balls.";
        $footer->about_de = "Dragon Ball (jap. ドラゴンボール, Doragonbōru) ist eine Manga-Serie des japanischen Zeichners Akira Toriyama und basiert lose auf dem Roman Die Reise nach Westen von Wu Cheng’en. Dragon Ball erschien ursprünglich von 1984 bis 1995 im Manga-Magazin Weekly Shōnen Jump und wurde später in 42 Bänden veröffentlicht. Die insgesamt 519 Kapitel umfassen über 8.000 Seiten. Der Manga Dragon Ball beschreibt die Abenteuer des Protagonisten Son-Goku und seiner Freunde, die sich immer wieder auf die Suche nach den sieben Dragon Balls begeben und zahlreiche Abenteuer zu bestehen haben. Die Geschichte beginnt mit Son-Gokus Kindheit ab einem Alter von zwölf Jahren und seiner Zeit als Jugendlichem (Bände 1 bis 16) und endet mit seinem Leben als Erwachsenem. Die einzelnen Handlungsstränge sind in Sagas unterteilbar und werden mit fortschreitender Handlung komplexer.";
        $footer->address_en = "SHUEISHA<br/>\n2-5-10 Hitotsubashi<br/>\nChiyoda-ku 千代田区<br/>\nTokyo Prefecture, 101-8050<br/>\nJapan<br/>\n<br/>\nPhone: 81-3-3230-7755<br/>\nFax: 81-3-3264-0409<br/>\n<a href='www.shueisha.co.jp'>www.shueisha.co.jp</a>";
        $footer->address_de = "SHUEISHA<br/>\n2-5-10 Hitotsubashi<br/>\nChiyoda-ku 千代田区<br/>\nPräfektur Tokio, 101-8050<br/>\nJapan<br/>\n<br/>\nTelefon: 81-3-3230-7755<br/>\nFax: 81-3-3264-0409<br/>\n<a href='www.shueisha.co.jp'>www.shueisha.co.jp</a>";
        $footer->facebook = "https://www.facebook.com/dbsuperger/";
        $footer->twitter = "https://twitter.com/hashtag/dragonballsuper";
        $footer->youtube = "https://www.youtube.com/watch?v=XKm7b0_6kF8";
        $footer->linkedin = "https://www.linkedin.com/company/shueisha-inc-";
        $footer->save();
    }
}
