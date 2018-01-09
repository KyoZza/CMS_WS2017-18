<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //for file storage
use App\Post;
use App\Theme;
use App\NavItem;
use App\Activity;
use App\GeneralOptions;
use App\Fonts;
use App\ThemeColor;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Only accessable when authenticated
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$posts = Post::all();
        //$posts = Post::where('title', 'Post Two')->get();

        //$posts = Post::orderBy('created_at', 'desc')->take(1)->get();
        //$posts = Post::orderBy('created_at', 'desc')->get();

        $theme = Theme::where('is_active', true)->get()->first();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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
        if($themeName == 'theme1') 
            $themeName = $themeName.'-main';
    
        $data = [
            'posts' => $posts,
            'navItems' => $navItems,
            'theme' => $themeName,
            'header' => $theme->themeHeaderOptions[$themeoption],   
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor
        ];

        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $theme = Theme::where('is_active', true)->get()->first();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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
        if($themeName == 'theme1') 
            $themeName = $themeName.'-main';
        
        $data = [
            'navItems' => $navItems,
            'theme' => $themeName,
            'header' => $theme->themeHeaderOptions[$themeoption],   
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor
        ];
        
        return view('posts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_img' => 'image|nullable|max:1999'    //for most apache servers default upload size = 2mb
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_img')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('cover_img')->getClientOriginalName();

            // Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('cover_img')->getClientOriginalExtension();

            // Create file name to store 
            // Add timestamp to avoid clash of identical file names
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_img')->storeAs('public/cover_images', $fileNameToStore);
            
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        

        // create new Post to store
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_img = $fileNameToStore;
        $post->save();

        // create new Activity for the newly stored Post        
        $activity = new Activity;
        $activity->description = 'New post created';
        $activity->user_id = $post->user_id;
        $activity->url_title = $post->title;
        $activity->url_address = '/blog/'.$post->id;
        $activity->save();

        return redirect('/blog')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $post = Post::find($id);
       
        $theme = Theme::where('is_active', true)->get()->first();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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
        if($themeName == 'theme1') 
            $themeName = $themeName.'-main';
        
        $data = [
            'post' => $post,
            'navItems' => $navItems,
            'theme' => $themeName,
            'header' => $theme->themeHeaderOptions[$themeOptions],   
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor
        ];
        
        return view('posts/show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        //check for correct user
        if (!auth()->user()->hasRole('Super Saiyajin')) {
            if(auth()->user()->id !== $post->user_id)
                return redirect('/blog')->with('error', 'Unauthorized Page');
        }

       
        $theme = Theme::where('is_active', true)->get()->first();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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

        $navItems = NavItem::orderBy('position', 'asc')->get();
        $themeOptions = GeneralOptions::where('theme', 'custom')->get()->first();
        $font = Fonts::find($themeOptions->fonts_id);
        $themeColor = ThemeColor::find($themeOptions->theme_colors_id);

        $themeName = $theme->name;
        if($themeName == 'theme1') 
            $themeName = $themeName.'-main';
        
        $data = [
            'post' => $post,
            'navItems' => $navItems,
            'theme' => $themeName,
            'header' => $theme->themeHeaderOptions[$themeoption],   
            'themeOptions' => $themeOptions,   
            'font' => $font,
            'themeColor' => $themeColor
        ];

        return view('posts/edit')->with($data);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_img' => 'image|nullable|max:1999'    //for most apache servers default upload size = 2mb
        ]);
    
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        // Handle File Upload
        if ($request->hasFile('cover_img')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('cover_img')->getClientOriginalName();

            // Get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('cover_img')->getClientOriginalExtension();

            // Create file name to store 
            // Add timestamp to avoid clash of identical file names
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_img')->storeAs('public/cover_images', $fileNameToStore);
            
            Storage::delete('public/cover_images/'.$post->cover_img);
            $post->cover_img = $fileNameToStore;
        }
       
        $post->save();

        // create new Activity for the newly updated Post        
        $activity = new Activity;
        $activity->description = 'Post updated';
        $activity->user_id = $post->user_id;
        $activity->url_title = $post->title;
        $activity->url_address = '/blog/'.$post->id;
        $activity->save();

        return redirect('/blog')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //check for correct user
        if (!auth()->user()->hasRole('Super Saiyajin')) {
            if(auth()->user()->id !== $post->user_id)
                return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_img != 'noimage.jpg') {
            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_img);
        }
        
        $post->delete();

        // create new Activity for the newly deleted Post        
        $activity = new Activity;
        $activity->description = 'Post deleted';
        $activity->user_id = $post->user_id;
        $activity->url_title = $post->title;
        $activity->url_address = '#';
        $activity->save();

        return redirect('/blog')->with('success', 'Post deleted');
    }
}
