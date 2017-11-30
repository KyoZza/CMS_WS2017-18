<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\NavItem;
use App\Theme;
use App\Page;

class MessagesController extends Controller
{
    public function contact() {
        $theme = Theme::where('is_active', true)->get()->first();
        $page = Page::where('url', '/')->get()->first();
        $navItems = Navitem::orderBy('position', 'asc')->get();

        $data = [
            'page' => $page,
            'navItems' => $navItems,
            'header' => $theme->themeHeaderOptions[1]
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
