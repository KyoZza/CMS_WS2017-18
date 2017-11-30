<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use App\Role;
use App\Page;
use App\NavItem;
use App\Theme;
use App\ThemeHeaderOptions;

class PagesController extends Controller
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
        $this->middleware('auth', ['except' => ['home', 'custom']]);

        $this->breadcrumbActive = [
            'pages' => (object)array('name' => 'Pages', 'class' => 'active', 'url' => '/admin/pages'),
            'page' => (object)array('name' => 'Page', 'class' => 'active', 'url' => '/admin/pages/'),
            'page-create' => (object)array('name' => 'Create Page', 'class' => 'active', 'url' => '/admin/pages/create'),   
            'page-edit' => (object)array('name' => 'Edit Page', 'class' => 'active', 'url' => '/admin/pages/')      
        ];
    
        $this->breadcrumbInactive = [
            'pages' => (object)array('name' => 'Pages', 'class' => '', 'url' => '/admin/pages'),
            'page' => (object)array('name' => 'Page', 'class' => '', 'url' => '/admin/pages/'),            
            'page-create' => (object)array('name' => 'Create Page', 'class' => '', 'url' => '/admin/pages/create'),   
            'page-edit' => (object)array('name' => 'Edit Page', 'class' => '', 'url' => '/admin/pages/')             
        ];
    }



    public function home() {
        $theme = Theme::where('is_active', true)->get()->first();
        $page = Page::where('url', '/')->get()->first();
        $navItems = Navitem::orderBy('position', 'asc')->get();

        $data = [
            'page' => $page,
            'navItems' => $navItems,
            'header' => $theme->themeHeaderOptions[1]
        ];
<<<<<<< HEAD
        
        return view('theme2.home')->with($data);
=======

        $themeName = $theme->name;
        if($themeName == 'theme1') 
            return view($themeName.'.home')->with($data);     
        else  
            return view($themeName)->with($data);     
>>>>>>> f36ea2c930e8c4f0005a2a7d009096310754cdfc
    }

    // for custom pages
    public function custom($url) {
        $page = Page::where('url', '/'.$url)->get()->first();

        if(isset($page)) {
            if(!$page->is_published)
                abort(404);
            else {
                $theme = Theme::where('is_active', true)->get()->first();
                $navItems = Navitem::orderBy('position', 'asc')->get();
                
                $data = [
                    'page' => $page,
                    'navItems' => $navItems,
                    'header' => $theme->themeHeaderOptions[1]
                ];

<<<<<<< HEAD
                return view('theme2.page')->with($data);                
=======
                $themeName = $theme->name;
                if($themeName == 'theme1') 
                    return view($themeName.'.page')->with($data);     
                else  
                    return view($themeName)->with($data);     
                
>>>>>>> f36ea2c930e8c4f0005a2a7d009096310754cdfc
            }
        }
        else
           abort(404);     
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        
        // Data to pass into the template
        $data = array(
            'title' => 'Pages',
            'icon' => 'leanpub',
            'breadcrumbs' => [
                $this->breadcrumbActive['pages']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'pages',

            'pages' => $pages
        );

        return view('admin.pages.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check for correct user
        if (!auth()->user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])) 
            return redirect('/admin/pages')->with('error', 'Unauthorized Page');

        // Data to pass into the template
        $data = array(
            'title' => 'Create Page',
            'icon' => 'leanpub',
            'breadcrumbs' => [
                $this->breadcrumbInactive['pages'],           
                $this->breadcrumbActive['page-create']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'pages',
        );

        return view('admin.pages.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check for correct user
        if (!auth()->user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])) 
            return redirect('/admin/pages')->with('error', 'Unauthorized Page');
        
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'url' => 'required'
        ]);

        // create new Page to store
        $page = new Page;
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->url = $request->input('url');
        $page->is_published = $request->input('is_published') !== null;
        $page->save();

        // create new Activity for the newly stored Page        
        $activity = new Activity;
        $activity->description = 'New page created';
        $activity->user_id = $page->user_id;
        $activity->url_title = $page->title;
        $activity->url_address = $page->url;
        $activity->save();

        return redirect('/admin/pages')->with('success', 'Page created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        
        // Data to pass into the template
        $data = array(
            'title' => 'Pages',
            'icon' => 'leanpub',
            'breadcrumbs' => [
                $this->breadcrumbInactive['pages'],                
                $this->breadcrumbActive['page']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'pages',

            'page' => $page
        );

        return view('admin.pages.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //check for correct user
        if (!auth()->user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])) 
            return redirect('/admin/pages')->with('error', 'Unauthorized Page');

        $page = Page::find($id);
        
        // Data to pass into the template
        $data = array(
            'title' => 'Edit Page',
            'icon' => 'leanpub',
            'breadcrumbs' => [
                $this->breadcrumbInactive['pages'],                
                $this->breadcrumbActive['page-edit']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'pages',

            'page' => $page
        );

        return view('admin.pages.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //check for correct user
        if (!auth()->user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])) 
            return redirect('/admin/pages')->with('error', 'Unauthorized Page');

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'url' => 'required'
        ]);

        // update Page
        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->url = $request->input('url');
        $page->is_published = $request->input('is_published') !== null;
        $page->save();

        // create new Activity for the newly stored Page        
        $activity = new Activity;
        $activity->description = 'Page updated';
        $activity->user_id = $page->user_id;
        $activity->url_title = $page->title;
        $activity->url_address = $page->url;
        $activity->save();

        return redirect('/admin/pages')->with('success', 'Page updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check for correct user
        if (!auth()->user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])) 
            return redirect('/admin/pages')->with('error', 'Unauthorized Page');

        
        // delete Page
        $page = Page::find($id);
        $page->delete();

        // create new Activity for the newly stored Page        
        $activity = new Activity;
        $activity->description = 'Page deleted';
        $activity->user_id = $page->user_id;
        $activity->url_title = $page->title;
        $activity->url_address = '#';
        $activity->save();

        return redirect('/admin/pages')->with('success', 'Page deleted');
    }
}
