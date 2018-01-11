@extends('layouts.backend')

@section('content')
    @include('inc.general.messages')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Users</div>

        <div class="panel-body">
            
            @if(Auth::user()->hasRole('Super Saiyajin'))
                <a href="/admin/users/create" class="btn btn-default">Create User</a>
                <br><br>
            @endif
            
            
            @if(count($users) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="/admin/users/{{$user->id}}">{{$user->name}}</a>
                            </td>
                            <td>
                                <span data-toggle="tooltip" data-placement="bottom" title="{{$user->roles->first()->description}}">
                                    {{$user->roles->first()->name}}
                                </span>
                            </td>
                            <td>
                                @if($user->id == Auth::user()->id)
                                    <div class="pull-right">
                                        <a href="/admin/users/{{$user->id}}/edit" class="btn btn-xs btn-default">Edit</a> 
                                    </div>
                                @else
                                    @if(Auth::user()->hasRole('Super Saiyajin'))
                                        <div class="pull-right">
                                        <a href="/admin/users/{{$user->id}}/edit" class="btn btn-xs btn-default">Edit</a> 
                                        @if($user->id != Auth::user()->id)
                                            {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST', 'style' => 'display: inline-block']) !!}
                                                {{Form::hidden('_method', 'DELETE')}} <!-- To spoof a DELETE request instead of POST -->
                                                {{Form::submit('Delete', ['class' => 'btn btn-xs btn-danger'])}}
                                            {!! Form::close() !!} 
                                        @endif
                                    </div>
                                    @endif
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>There are no users yet.</p>
            @endif
            
        </div>
    </div>
@endsection