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
        /*color = usercolorpickinhex;
        //Light and Dark accent color 25% MAYBE 20

        $color = new ThemeColor();

        $color->standart = color;
        $color->light = color_luminance(color,0.2);
        $color->dark = color_luminance(color,-0.2);

        $color->is_active = true;
        $color->save();*/

        /*$color = new ThemeColor();
        $color->standart = '#e53935';
        $color->light = '#ff6f60';
        $color->dark = '#ab000d';
        $color->is_active = true;
        $color->save();

        $color = new ThemeColor();
        $color->standart = '#d81b60';
        $color->light = '#ff5c8d';
        $color->dark = '#a00037';
        $color->save();

        $color = new ThemeColor();
        $color->standart = '#8e24aa';
        $color->light = '#c158dc';
        $color->dark = '#5c007a';
        $color->save();

        $color = new ThemeColor();
        $color->standart = '#5e35b1';
        $color->light = '#9162e4';
        $color->dark = '#280680';
        $color->save();

        $color = new ThemeColor();
        $color->standart = '#3949ab';
        $color->light = '#6f74dd';
        $color->dark = '#00227b';
        $color->save();

        $color = new ThemeColor();
        $color->standart = '#1e88e5';
        $color->light = '#6ab7ff';
        $color->dark = '#005cb2';
        $color->save();

        $color = new ThemeColor();
        $color->standart = '#039be5';
        $color->light = '#63ccff';
        $color->dark = '#006db3';
        $color->save();*/
        
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
