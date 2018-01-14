@extends('layouts.backend')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Website Overview</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-user-circle" aria-hidden="true"></i>{{$numUsers}}</h2>
                <h4>Users</h4>
            </div>       
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{$numPosts}}</h2>
                <h4>Posts</h4>
            </div>      
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-leanpub" aria-hidden="true"></i>{{$numPages}}</h2>
                <h4>Pages</h4>
            </div>      
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-comments-o" aria-hidden="true"></i>{{$numMessages}}</h2>
                <h4>Messages</h4>
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
            @if(count($activities) > 0)
                @foreach($activities as $activity)
                    <tr>
                        <td>
                            {{$activity->description}}: <a href="{{$activity->url_address}}">{{$activity->url_title}}</a>
                            @if(isset($activity->user->name))
                                , by <a href="/admin/users/{{$activity->user->id}}">{{$activity->user->name}}</a> 
                            @else
                                , by 'user deleted'                               
                            @endif
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
@endsection