<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use App\Post;
use App\Page;
use App\Message;
use App\NavItem;
use App\Theme;
use App\ThemeHeaderOptions;
use App\HeaderImage;
use App\GeneralOptions;
use App\ThemeColor;
use App\Fonts;
use App\Footer;


class AdminController extends Controller
{
    private $breadcrumbActive;
    private $breadcrumbInactive;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->breadcrumbActive = [
            'dashboard' => (object)array('name' => 'Dashboard', 'class' => 'active', 'url' => '/admin'),
            'posts' => (object)array('name' => 'Posts', 'class' => 'active', 'url' => '/admin/posts'),   
            'post-create' => (object)array('name' => 'Create Post', 'class' => 'active', 'url' => '/admin/posts/create'),   
            'post-edit' => (object)array('name' => 'Edit Post', 'class' => 'active', 'url' => '/admin/posts/'),
            'customize' => (object)array('name' => 'Customize', 'class' => 'active', 'url' => '/admin/customize'),
            'customize-header' => (object)array('name' => 'Customize Header', 'class' => 'active', 'url' => '/admin/customize/header'),               
            'customize-navbar' => (object)array('name' => 'Customize Navbar', 'class' => 'active', 'url' => '/admin/customize/navbar'),
            'customize-general' => (object)array('name' => 'General Customization', 'class' => 'active', 'url' => '/admin/customize/general'),               
            'customize-footer' => (object)array('name' => 'Customize Footer', 'class' => 'active', 'url' => '/admin/customize/footer'),
            'customize-themes' => (object)array('name' => 'Select Theme', 'class' => 'active', 'url' => '/admin/customize/themes'),
            'messages' => (object)array('name' => 'Messages', 'class' => 'active', 'url' => '/admin/messages')   
            
            
        ];
    
        $this->breadcrumbInactive = [
            'dashboard' => (object)array('name' => 'Dashboard', 'class' => '', 'url' => '/admin'),
            'posts' => (object)array('name' => 'Posts', 'class' => '', 'url' => '/admin/posts'),   
            'post-create' => (object)array('name' => 'Create Post', 'class' => '', 'url' => '/admin/posts/create'),   
            'post-edit' => (object)array('name' => 'Edit Post', 'class' => '', 'url' => '/admin/posts/'),
            'customize' => (object)array('name' => 'Customize', 'class' => '', 'url' => '/admin/customize'),            
            'customize-header' => (object)array('name' => 'Customize Header', 'class' => '', 'url' => '/admin/customize/header'),   
            'customize-navbar' => (object)array('name' => 'Customize Navbar', 'class' => '', 'url' => '/admin/customize/navbar'),
            'customize-general' => (object)array('name' => 'General Customization', 'class' => '', 'url' => '/admin/customize/general'),               
            'customize-footer' => (object)array('name' => 'Customize Footer', 'class' => '', 'url' => '/admin/customize/footer'),
            'customize-themes' => (object)array('name' => 'Select Theme', 'class' => '', 'url' => '/admin/customize/themes'), 
            'messages' => (object)array('name' => 'Messages', 'class' => '', 'url' => '/admin/messages')   
            
        ];
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get up to N latest activites from the database
        $activities = Activity::orderBy('created_at', 'desc')->take(20)->get();

        // Data to pass into the template
        $data = array(
            'title' => 'Dashboard',
            'icon' => 'pagelines',
            'breadcrumbs' => [
                $this->breadcrumbActive['dashboard']
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'dashboard',

            'numPosts' => Post::count(),
            'numUsers' => User::count(),
            'numPages' => Page::count(),
            'numMessages' => Message::count(),
            'activities' => $activities
        );

        return view('admin.index')->with($data);
    }

    //check for authorization
    //$request->user()->authorizeRoles(['User', 'Website Manager', 'Super Saiyajin]);

    public function posts()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $posts = $user->posts;
        if(auth()->user()->hasRole('Super Saiyajin'))
            $posts = Post::all();

        // Data to pass into the template
        $data = array(
            'title' => 'Posts',
            'icon' => 'pencil-square-o',
            'breadcrumbs' => [
                $this->breadcrumbActive['posts']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'posts',
            'numMessages' => Message::count(),
            'posts' => $posts
        );

        return view('admin.posts')->with($data);
    }

    public function createPost()
    {
        // Data to pass into the template
        $data = array(
            'title' => 'Create Post',
            'icon' => 'pencil-square-o',
            'breadcrumbs' => [
                $this->breadcrumbInactive['posts'],
                $this->breadcrumbActive['post-create']                
            ],
            'customizeIsCollapsed' => true,
            'numMessages' => Message::count(),
            'activeListGroupItem' => 'posts'
        );

        return view('admin.post-create')->with($data);
    }

    public function editPost($id)
    {
        $post = Post::find($id);

        // Data to pass into the template
        $data = array(
            'title' => 'Edit Post',
            'icon' => 'pencil-square-o',
            'breadcrumbs' => [
                $this->breadcrumbInactive['posts'],
                $this->breadcrumbActive['post-edit']                                
            ],
            'customizeIsCollapsed' => true,
            'numMessages' => Message::count(),
            'activeListGroupItem' => 'posts',

            'post' => $post
        );

        return view('admin.post-edit')->with($data);
    }

    public function customize() {
        $theme = Theme::where('is_active', true)->get()->first();   
        // Data to pass into the template
        $data = array(
            'title' => 'Customization',
            'icon' => 'paint-brush',
            'breadcrumbs' => [
                $this->breadcrumbActive['customize']                                
            ],
            'customizeIsCollapsed' => false,
            'numMessages' => Message::count(),
            'activeListGroupItem' => 'customization',

            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1]
        );

        return view('admin.customize')->with($data);
    }

    public function customizeGeneral() {
        $theme = Theme::where('is_active', true)->get()->first();  
        $themeColors = ThemeColor::all();   
        $fonts = Fonts::all();
        $themeOptions = GeneralOptions::where('theme', 'custom')->get()->first();
        // Data to pass into the template
        $data = array(
            'title' => 'General Customization',
            'icon' => 'paint-brush',
            'breadcrumbs' => [
                $this->breadcrumbInactive['customize'],
                $this->breadcrumbActive['customize-general']                                
            ],
            'customizeIsCollapsed' => false,
            'activeListGroupItem' => 'general',
            'numMessages' => Message::count(),
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1],
            'themeColors' => $themeColors,
            'fonts' => $fonts,
            'themeOptions' => $themeOptions
        );

        return view('admin.customize-general')->with($data);
    }

    public function customizeGeneralUpdate(Request $request) {
        $this->validate($request, [
            'theme_color' => 'required',
            'font_family' => 'required',
            'font_size' => 'required',
        ]);
        
        $themeOptions = GeneralOptions::where('theme', 'custom')->get()->first();
        $themeOptions->theme_colors_id = $request->input('theme_color');
        $themeOptions->fonts_id = $request->input('font_family');
        $themeOptions->font_size = $request->input('font_size');
        $themeOptions->save();
       
        $activity = new Activity;
        $activity->description = 'General options updated';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = 'General Customization';
        $activity->url_address = '/admin/customize/general';
        $activity->save();

        return redirect('/admin/customize/general')->with('success', 'General options updated');
    }

    public function customizeNavbar(Request $request) {

        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

        $theme = Theme::where('is_active', true)->get()->first();
        
        if($locale == 'de'){
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'de')->get();
        }
        else{
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'en')->get();
        }
        
        $pages = Page::all(); 
        $pageOptions = array();
        foreach ($pages as $page) {
            //$array = array(''.$role->id => $role->name);     
            //array_push($roleOptions, $array);
            $pageOptions[''.$page->id] = $page->name;
        }

        // Data to pass into the template
        $data = array(
            'title' => 'Customize Navbar',
            'icon' => 'paint-brush',
            'breadcrumbs' => [
                $this->breadcrumbInactive['customize'],
                $this->breadcrumbActive['customize-navbar']                                
            ],
            'customizeIsCollapsed' => false,
            'activeListGroupItem' => 'navbar',
            'numMessages' => Message::count(),
            'navItems' => $navItems,
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1],
            'pages' => $pages,
            'pageOptions' => $pageOptions
        );

        return view('admin.customize-navbar')->with($data);
    }

    public function customizeNavbarUpdate(Request $request, $id) {
        $this->validate($request, [
            'navitem-title' => 'required',
            'navitem-link' => 'required',
            'navitem-position' => 'required'  
        ]);
        
        $navItem = NavItem::find($id);
        
        $newPosition = $request->input('navitem-position');
        if ($newPosition > $navItem->position) {
            $navItems = NavItem::where('position', '<=', $newPosition)->where('title', '!=', $navItem->title)->get();

            // reorder the navItems
            foreach ($navItems as $key => $updateItem) {
                $updateItem->position = $key;
                $updateItem->save();
            }

            $navItem->position = $newPosition;
        }
        else if ($newPosition < $navItem->position) {
            $navItems = NavItem::where('position', '>=', $newPosition)->where('title', '!=', $navItem->title)->get();

            // reorder the navItems
            foreach ($navItems as $key => $updateItem) {
                $updateItem->position = $updateItem->position + 1;
                $updateItem->save();
            }

            $navItem->position = $newPosition;
        }

        $navItem->title = $request->input('navitem-title');
        $navItem->link = $request->input('navitem-link');
        $navItem->save();
       
        $activity = new Activity;
        $activity->description = 'Navbar updated';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = 'Customize Navbar';
        $activity->url_address = '/admin/customize/navbar';
        $activity->save();

        return redirect('/admin/customize/navbar')->with('success', 'Navbar updated');
    }

    public function customizeHeader(Request $request) {
        $theme = Theme::where('is_active', true)->get()->first();        
        $headerImages = HeaderImage::all();     
        $themeOptions = GeneralOptions::where('theme', 'custom')->get()->first();
        $font = Fonts::find($themeOptions->fonts_id);
        $themeColor = ThemeColor::find($themeOptions->theme_colors_id);

        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        if($locale == 'de') {
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'de')->get();
        }
        else {
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'en')->get();
        }

        // Data to pass into the template
        $data = array(
            'title' => 'Customize Header',
            'icon' => 'paint-brush',
            'breadcrumbs' => [
                $this->breadcrumbInactive['customize'],
                $this->breadcrumbActive['customize-header']                                
            ],
            'customizeIsCollapsed' => false,
            'activeListGroupItem' => 'header',
            'language' => $locale,
            'numMessages' => Message::count(),
            'navItems' => $navItems,
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1],
            'headerImages' => $headerImages,
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor
        );

        return view('admin.customize-header')->with($data);
    }

    public function customizeHeaderUpdate(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'nullable',
            'header_img' => 'nullable'  
        ]);
        
        $theme = Theme::where('is_active', true)->get()->first();  
        $themeOptions1 = $theme->themeHeaderOptions[1];       
        $themeOptions2 = $theme->themeHeaderOptions[3];       

        $themeOptions1->title = $request->input('title');
        $themeOptions1->subtitle = $request->input('subtitle');
        $themeOptions1->background_image = $request->input('header_img');
        $themeOptions1->save();

        $themeOptions2->title = $request->input('title');
        $themeOptions2->subtitle = $request->input('subtitle');
        $themeOptions2->background_image = $request->input('header_img');
        $themeOptions2->save();

        // create new Activity for the newly updated Header        
        $activity = new Activity;
        $activity->description = $theme->name.'Header updated';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = 'Customize Header';
        $activity->url_address = '/admin/customize/header';
        $activity->save();

        return redirect('/admin/customize/header')->with('success', 'Theme Header updated');
    }

    public function customizeFooter() {
        $theme = Theme::where('is_active', true)->get()->first(); 
        $footer = Footer::where('theme', 'custom')->get()->first();


        // Data to pass into the template
        $data = array(
            'title' => 'Customize Footer',
            'icon' => 'paint-brush',
            'breadcrumbs' => [
                $this->breadcrumbInactive['customize'],
                $this->breadcrumbActive['customize-footer']                                
            ],
            'customizeIsCollapsed' => false,
            'activeListGroupItem' => 'footer',
            'numMessages' => Message::count(),
            'theme' => $theme->name,
            'footer' => $footer
        );

        return view('admin.customize-footer')->with($data);
    }

    public function customizeFooterUpdate(Request $request) {
        $this->validate($request, [
            'about' => 'required',
            'aboutde' => 'required',
            'address' => 'required',
            'addressde' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
            'linkedin' => 'required',      
        ]);
        
        $footer = Footer::where('theme', 'custom')->get()->first();
        $footer->about_en = $request->input('about');
        $footer->about_de = nl2br($request->input('aboutde'));
        $footer->address_en = nl2br($request->input('address'));
        $footer->address_de = nl2br($request->input('addressde'));
        $footer->facebook = nl2br($request->input('facebook'));
        $footer->twitter = $request->input('twitter');
        $footer->youtube = $request->input('youtube');
        $footer->linkedin = $request->input('linkedin');
        $footer->save();
       
        $activity = new Activity;
        $activity->description = 'Footer updated';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = 'Footer Customization';
        $activity->url_address = '/admin/customize/footer';
        $activity->save();

        return redirect('/admin/customize/footer')->with('success', 'Footer updated');    
    }

    public function customizeThemes() {
        $theme = Theme::where('is_active', true)->get()->first(); 

        // Data to pass into the template
        $data = array(
            'title' => 'Select Theme',
            'icon' => 'paint-brush',
            'breadcrumbs' => [
                $this->breadcrumbInactive['customize'],
                $this->breadcrumbActive['customize-themes']                                
            ],
            'customizeIsCollapsed' => false,
            'activeListGroupItem' => 'themes',
            'numMessages' => Message::count(),
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1]
        );

        return view('admin.customize-themes')->with($data);
    }

    public function getMessages() {
        $messages = Message::all();

        $data = array(
            'title' => 'Messages',
            'icon' => 'comments-o',
            'breadcrumbs' => [
                $this->breadcrumbActive['messages']                                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'messages',
            'numMessages' => Message::count(),
            'messages' => $messages
        );

        return view('admin.messages')->with($data);
    }

    public function showMessage(Request $request, $id) {
        $message = Message::find($id);

        $data = array(
            'title' => 'Messages',
            'icon' => 'comments-o',
            'breadcrumbs' => [
                $this->breadcrumbActive['messages']                                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'messages',
            'numMessages' => Message::count(),
            'message' => $message
        );

        return view('admin.show-message')->with($data);
    }

    public function replyMessage(Request $request) {
        
        return 'ToDo';
    }

    public function setPageColor(Request $request, $url) 
    {
        $this->validate($request, [
            'color' => 'required',
        ]);     
        
        $user = auth()->user();
        $user->theme_color = $request->input('color');
        $user->save();

        $redirectUrl = '/'.str_replace('.', '/', $url);
        return redirect($redirectUrl)->with('success', 'Set new page color');
    }
}
