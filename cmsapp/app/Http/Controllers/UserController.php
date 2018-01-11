<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use App\Role;
use Auth;


class UserController extends Controller
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
            'users' => (object)array('name' => 'Users', 'class' => 'active', 'url' => '/admin/users'),
            'user' => (object)array('name' => 'User', 'class' => 'active', 'url' => '/admin/users/'),
            'user-create' => (object)array('name' => 'Create User', 'class' => 'active', 'url' => '/admin/users/create'),   
            'user-edit' => (object)array('name' => 'Edit User', 'class' => 'active', 'url' => '/admin/users/')      
        ];
    
        $this->breadcrumbInactive = [
            'users' => (object)array('name' => 'Users', 'class' => '', 'url' => '/admin/users'),
            'user' => (object)array('name' => 'User', 'class' => '', 'url' => '/admin/users/'),            
            'user-create' => (object)array('name' => 'Create User', 'class' => '', 'url' => '/admin/users/create'),   
            'user-edit' => (object)array('name' => 'Edit User', 'class' => '', 'url' => '/admin/users/')             
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        // Data to pass into the template
        $data = array(
            'title' => 'Users',
            'icon' => 'user-circle',
            'breadcrumbs' => [
                $this->breadcrumbActive['users']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'users',

            'users' => $users
        );

        return view('admin.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check for correct user
        if (!auth()->user()->hasRole('Super Saiyajin')) 
            return redirect('/admin/users')->with('error', 'Unauthorized Page');

        $roles = Role::all();
        $roleOptions = array();
        foreach ($roles as $role) {
            //$array = array(''.$role->id => $role->name);     
            //array_push($roleOptions, $array);
            $roleOptions[''.$role->id] =$role->name;
        }
        
        // Data to pass into the template
        $data = array(
            'title' => 'Create User',
            'icon' => 'user-circle',
            'breadcrumbs' => [
                $this->breadcrumbInactive['users'],                
                $this->breadcrumbActive['user-create']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'users',

            'roles' => $roleOptions
        );

        return view('admin.users.create')->with($data);
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
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $user->roles()->attach(Role::where('id', $request->input('role'))->first());        

        // create new Activity for the newly stored Post        
        $activity = new Activity;
        $activity->description = 'New user created';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = $user->name;
        $activity->url_address = '/admin/users/'.$user->id;
        $activity->save();

        return redirect('/admin/users')->with('success', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        // Data to pass into the template
        $data = array(
            'title' => $user->name,
            'icon' => 'user-circle',
            'breadcrumbs' => [
                $this->breadcrumbInactive['users'],
                $this->breadcrumbActive['user']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'users',

            'user' => $user
        );

        return view('admin.users.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        //check for correct user
        if (!auth()->user()->hasRole('Super Saiyajin')) {
            if(auth()->user()->id !== $user->id)
                return redirect('/admin/users')->with('error', 'Unauthorized Page');
        }
        
        // Data to pass into the template
        $data = array(
            'title' => 'Edit User Profile',
            'icon' => 'user-circle',
            'breadcrumbs' => [
                $this->breadcrumbInactive['users'],                
                $this->breadcrumbActive['user-create']                
            ],
            'customizeIsCollapsed' => true,
            'activeListGroupItem' => 'users',

            'user' => $user
        );

        return view('admin.users.edit')->with($data);
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
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed|nullable'
            //'role' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password') !== null)
            $user->password = bcrypt($request->input('password'));
        $user->theme_color = '#f008';

        $user->save();
        //$user->roles()->attach(Role::where('id', $request->input('role'))->first());        

        // create new Activity for the newly stored Post        
        $activity = new Activity;
        $activity->description = 'User profile updated';
        $activity->user_id = auth()->user()->id;
        $activity->url_title = $user->name;
        $activity->url_address = '/admin/users/'.$user->id;
        $activity->save();

        return redirect('/admin/users')->with('success', 'User profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        //check for correct user
        if (!auth()->user()->hasRole('Super Saiyajin')) {
            if(auth()->user()->id !== $user->id)
                return redirect('/admin/users')->with('error', 'Unauthorized Page');

            Auth::logout();   

            $user->delete();
            
            return redirect('/');      
        }
        else {
            // create new Activity for the newly deleted User        
            $activity = new Activity;
            $activity->description = 'User deleted';
            $activity->user_id = auth()->user()->id;
            $activity->url_title = $user->name;
            $activity->url_address = '#';

            $user->roles()->detach();
            $user->delete();
            $activity->save();
        
            return redirect('/admin/users')->with('success', 'User deleted');           
        }         
    }
}
