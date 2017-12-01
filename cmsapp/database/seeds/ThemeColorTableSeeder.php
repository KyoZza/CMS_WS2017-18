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
        //color = usercolorpickinhex;
        //Light and Dark accent color 25% MAYBE 20

        $color = new ThemeColor();
        $color->standard = '#e53935'; 
        $color->light = '#ff6f60'; 
        $color->dark = '#ab000d';
        $color->is_active = true;
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#d81b60'; 
        $color->light = '#ff5c8d'; 
        $color->dark = '#a00037';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#8e24aa';
        $color->light = '#c158dc';
        $color->dark = '#5c007a';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#5e35b1';
        $color->light = '#9162e4';
        $color->dark = '#280680';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#3949ab';
        $color->light = '#6f74dd';
        $color->dark = '#00227b';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#1e88e5';
        $color->light = '#6ab7ff';
        $color->dark = '#005cb2';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#039be5';
        $color->light = '#63ccff';
        $color->dark = '#006db3';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#00acc1';
        $color->light = '#5ddef4';
        $color->dark = '#007c91';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#00897b';
        $color->light = '#4ebaaa';
        $color->dark = '#005b4f';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#43a047';
        $color->light = '#76d275';
        $color->dark = '#00701a';
        $color->save();
        
        $color = new ThemeColor();
        $color->standard = '#7cb342';
        $color->light = '#aee571';
        $color->dark = '#4b830d';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#c0ca33';
        $color->light = '#f5fd67';
        $color->dark = '#8c9900';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#fdd835';
        $color->light = '#ffff6b';
        $color->dark = '#c6a700';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#ffb300';
        $color->light = '#ffe54c';
        $color->dark = '#c68400';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#fb8c00';
        $color->light = '#ffbd45';
        $color->dark = '#c25e00';
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#f4511e';
        $color->light = '#ff844c';
        $color->dark = '#b91400';
        $color->save();
        
        $color = new ThemeColor();
        $color->standard = '#bdbdbd';
        $color->light = '#efefef';
        $color->dark = '#8d8d8d';
        $color->is_active = true;
        $color->save();

        $color = new ThemeColor();
        $color->standard = '#78909c';
        $color->light = '#a7c0cd';
        $color->dark = '#4b636e';
        $color->is_active = false;
        $color->save();
    }

    /*function color_luminance( $hex, $percent ) {
        
        // validate hex string
        
        $hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
        $new_hex = '#';
        
        if ( strlen( $hex ) < 6 ) {
            $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
        }
        
        // convert to decimal and change luminosity
        for ($i = 0; $i < 3; $i++) {
            $dec = hexdec( substr( $hex, $i*2, 2 ) );
            $dec = min( max( 0, $dec + $dec * $percent ), 255 ); 
            $new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
        }		
        
        return $new_hex;
    }*/

}
