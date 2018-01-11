<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\NavItem;
use App\Theme;

use App\GeneralOptions;
use App\Fonts;
use App\ThemeColor;

class MessagesController extends Controller
{
    public function contact(Request $request) {
        $navItems = Navitem::orderBy('position', 'asc')->get();
        $theme = Theme::where('is_active', true)->get()->first();

        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        //return $locale;

        $theme = Theme::where('is_active', true)->get()->first();
        
        if($locale == 'de'){           
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'de')->get();
        }
        else{
            
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'en')->get();
        }
       
        $themeoption = 0;
        if($locale == 'en'){
            $themeoption = 1;
        }
        else
            $themeoption = 3;
  
        $themeOptions = GeneralOptions::where('theme', 'custom')->get()->first();
        $font = Fonts::find($themeOptions->fonts_id);
        $themeColor = ThemeColor::find($themeOptions->theme_colors_id);

        $themeName = $theme->name;
        
        $data = [
            'navItems' => $navItems,
            'theme' => $themeName,
            'header' => $theme->themeHeaderOptions[$themeoption],   
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor
        ];
        
        
        return view('theme1.contact')->with($data);
    }

    public function submit(Request $request){
        $this->validate($request, ['name' => 'required', 'email' => 'required']);
    
        // Create new Message 
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');

        // Save Message
        $message->save();

        // Redirect
        return redirect('/')->with('status', 'Message Sent');
    }


}
