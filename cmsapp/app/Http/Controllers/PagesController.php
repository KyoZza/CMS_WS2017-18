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
use App;
use Session;
use Config;

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



    public function home(Request $request) {

        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        //return $locale;

        $theme = Theme::where('is_active', true)->get()->first();
        
        if($locale == 'de'){
            $page = Page::where('language', 'de')->get()->first();
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'de')->get();
        }
        else{
            $page = Page::where('language', 'en')->get()->first();
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'en')->get();
        }
       
        $themeoption = 0;
        if($locale == 'en'){
            $themeoption = 1;
        }
        else
            $themeoption =3;

        $data = [
            'page' => $page,
            'navItems' => $navItems,
            'header' => $theme->themeHeaderOptions[$themeoption]
        ];


        //HILFE mit den Themes :)
        $themeName = $theme->name;
        if($locale ==  'en') {
            if($themeName == 'theme1') 
                return view($themeName.'.home')->with($data);     
            else  
                return view($themeName.'.page')->with($data);    
            }
            else{
                if($themeName == 'theme1') 
                return view($themeName.'.home')->with($data);     
            else  
                return view($themeName.'.page')->with($data);    
            
        } 
    }

    // for custom pages
    public function custom(Request $request, $url) {
        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        //return $locale;
        if($locale == 'de'){
            $page = Page::where('url', '/'.$url)->where('language', 'de')->get()->first();
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'de')->get();
        }
        else{
            $page = Page::where('url', '/'.$url)->where('language', 'en')->get()->first();
            $navItems = Navitem::orderBy('position', 'asc')->where('language', 'en')->get();
        }

        if(isset($page)) {
            if(!$page->is_published)
                abort(404);
            else {
                
        
                $theme = Theme::where('is_active', true)->get()->first();
                
                
               
                $themeoption = 0;
                if($locale == 'en'){
                    $themeoption = 1;
                }
                else
                    $themeoption =3;
        
                $data = [
                    'page' => $page,
                    'navItems' => $navItems,
                    'header' => $theme->themeHeaderOptions[$themeoption]
                ];
        ;

                $themeName = $theme->name;
                
                return view($themeName.'.page')->with($data);           
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
    public function index(Request $request)
    {

        $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        if($locale == 'de'){
            $pages = Page::where('language', 'de')->get();
        }
        else
            $pages = Page::where('language', 'en')->get();
        
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
            'url' => 'required',
            'bodyde' => 'required'

        ]);

        // create new Page to store
        $page = new Page;
        $page->title = $request->input('title');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->url = $request->input('url');
        $page->is_published = $request->input('is_published') !== null;
        $page->language = 'en';
        $page->save();

        $pagede = new Page;
        $pagede->title = $request->input('titlede');
        $pagede->body = $request->input('bodyde');
        $pagede->user_id = auth()->user()->id;
        $pagede->url = $request->input('url');
        $pagede->is_published = $request->input('is_published') !== null;
        $pagede->language = 'de';
        $pagede->save();

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
