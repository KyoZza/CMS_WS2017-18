<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\NavItem;
use App\Theme;
use App\Footer;
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
        if($locale == 'de'){
            $themeoption = 3;
        }
        else
            $themeoption = 1;
  
        $themeOptions = GeneralOptions::where('theme', 'custom')->get()->first();
        $font = Fonts::find($themeOptions->fonts_id);
        $themeColor = ThemeColor::find($themeOptions->theme_colors_id);
        $footer = Footer::where('theme', 'custom')->get()->first();

        $themeName = $theme->name;
        
        $data = [
            'navItems' => $navItems,
            'theme' => $themeName,
            'header' => $theme->themeHeaderOptions[$themeoption],   
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor,
            'footer' => $footer,
            'language' => $locale 
        ];
        
        
        return view('theme1.contact')->with($data);
    }

    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
    
        // Create new Message 
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');

        // Save Message
        $message->save();

        // Redirect
        return redirect('/')->with('status', 'Message Sent');
    }

}
