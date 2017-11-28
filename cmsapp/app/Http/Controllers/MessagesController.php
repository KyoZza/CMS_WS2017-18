<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\NavItem;

class MessagesController extends Controller
{
    public function contact() {
        // get NavBar Items
        $navItems = Navitem::orderBy('position', 'asc')->get();
        
        return view('theme1.contact')->with('navItems', $navItems);
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
