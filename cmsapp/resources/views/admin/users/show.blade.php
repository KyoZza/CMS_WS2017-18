@extends('layouts.backend')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">User Details</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <!-- Avatar -->
            <div class="col-md-3">
                <div class="thumbnail" style="position: relative">
                    <img src="{{$user->avatar === null ? '/storage/general_images/transparent.png' : '/storage/user_images/'.$user->avatar}}" 
                        alt="User Avatar">
                    
                    @if(Auth::user()->id == $user->id || Auth::user()->hasRole('Super Saiyajin'))
                    {!! Form::open(['action' => ['UserController@selectUserAvater', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::file('user-avatar-file', ['onchange' => 'onSelectUserAvatar(event)', 
                            'style' => 'opacity: 0; filter:alpha(opacity=0); width: 100%; height: 100%; position: absolute; top: 0; cursor: pointer'
                            ,'id' => 'user-avatar-file']) }}
                        {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                        {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'display: none', 'id' => 'user-avatar-submit'])}}
                    {!! Form::close() !!}
                    @endif 
                    
                </div>
                
            </div>
            
            <!-- User description -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Username:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$user->name}}</div>            
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Email:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$user->email}}</div>            
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Role:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$user->roles->first()->name}}</div>            
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>User since:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$user->created_at}}</div>            
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading  main-color-bg">
        <h3 class="panel-title">Latest Activities</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th>Activity</th>
                <th>Date</th>
            </tr>
            @if(count($user->activities) > 0)
                @foreach($user->activities as $activity)
                    <tr>
                        <td>
                            {{$activity->description}}: <a href="{{$activity->url_address}}">{{$activity->url_title}}</a>
                        </td>
                        <td>
                            {{$activity->created_at}}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            @endif
        </table>
    </div>
</div>

@if(Auth::user()->id == $user->id || Auth::user()->hasRole('Super Saiyajin'))
    <a href="/admin/users/{{$user->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}} <!-- To spoof a DELETE request instead of POST -->
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!} 
@endif 

@endsection