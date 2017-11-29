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

        // Data to pass into the template
        $data = array(
            'title' => 'Posts',
            'icon' => 'pencil-square-o',
            'breadcrumbs' => [
                $this->breadcrumbActive['posts']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'posts',

            'posts' => $user->posts
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
            'activeListGroupItem' => 'customization',

            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1]
        );

        return view('admin.customize')->with($data);
    }

    public function customizeGeneral() {
        $theme = Theme::where('is_active', true)->get()->first();     

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
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1]
        );

        return view('admin.customize-general')->with($data);
    }

    public function customizeNavbar() {
        $theme = Theme::where('is_active', true)->get()->first();        
        $navItems = Navitem::orderBy('position', 'asc')->get();   

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
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1]
        );

        return view('admin.customize-navbar')->with($data);
    }

    public function customizeHeader() {
        $theme = Theme::where('is_active', true)->get()->first();        
        $navItems = Navitem::orderBy('position', 'asc')->get();   
        $headerImages = HeaderImage::all();     

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

            'navItems' => $navItems,
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1],
            'headerImages' => $headerImages
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
        $themeOptions = $theme->themeHeaderOptions[1];       
/*         
        // Handle File Upload
        if ($request->hasFile('header_img')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('header_img')->getClientOriginalName();

            // Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('header_img')->getClientOriginalExtension();

            // Create file name to store 
            // Add timestamp to avoid clash of identical file names
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('header_img')->storeAs('public/header_images', $fileNameToStore);
            
            // eventually add again
            //Storage::delete('public/cover_images/'.$post->cover_img);
            $themeOptions->background_image = $fileNameToStore;
        }
  */
        $themeOptions->title = $request->input('title');
        $themeOptions->subtitle = $request->input('subtitle');
        $themeOptions->background_image = $request->input('header_img');
        $themeOptions->save();

        // create new Activity for the newly updated Header        
        $activity = new Activity;
        $activity->description = 'Header updated';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = $theme->name;
        $activity->url_address = '/admin/customize/header';
        $activity->save();

        return redirect('/admin/customize')->with('success', 'Theme Header updated');
    }

    public function customizeFooter() {
        $theme = Theme::where('is_active', true)->get()->first(); 

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
            'theme' => $theme->name,
            'header' => $theme->themeHeaderOptions[1]
        );

        return view('admin.customize-footer')->with($data);
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
            'messages' => $messages
        );

        return view('admin.messages')->with($data);
    }

    public function setPageColor(Request $request)
    {
        $this->validate($request, [
            'color' => 'required',
        ]);     
        
        $user = auth()->user();
        $user->theme_color = $request->input('color');
        $user->save();

        return redirect('/admin')->with('success', 'Set new page color');
    }
}
