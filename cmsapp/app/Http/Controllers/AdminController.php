<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use App\Post;
use App\Page;


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
            'post-edit' => (object)array('name' => 'Edit Post', 'class' => 'active', 'url' => '/admin/posts/') 
        ];
    
        $this->breadcrumbInactive = [
            'dashboard' => (object)array('name' => 'Dashboard', 'class' => '', 'url' => '/admin'),
            'posts' => (object)array('name' => 'Posts', 'class' => '', 'url' => '/admin/posts'),   
            'post-create' => (object)array('name' => 'Create Post', 'class' => '', 'url' => '/admin/posts/create'),   
            'post-edit' => (object)array('name' => 'Edit Post', 'class' => '', 'url' => '/admin/posts/')           
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

    public function customizeNavbar() {
        // Data to pass into the template
        $data = array(
            'title' => 'Customize Navbar',
            'icon' => 'pencil-square-o',
            'breadcrumbs' => [
                $this->breadcrumbInactive['posts'],
                $this->breadcrumbActive['post-edit']                                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'posts',

            'post' => $post
        );

        return view('admin.customize-navbar')->with($data);
    }
}
