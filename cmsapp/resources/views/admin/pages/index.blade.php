@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Pages</div>

        <div class="panel-body">
            @if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin']))
                <a href="/admin/pages/create" class="btn btn-default">Create Page</a>
                <br><br>
            @endif
            
            
            @if(count($pages) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Is Published</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                    @foreach($pages as $page)
                        <tr>
                            <td>
                                <a href="/admin/pages/{{$page->id}}">{{$page->title}}</a>
                            </td>
                            <td>
                                <strong><i class="fa fa-{{$page->is_published ? 'check' : 'times'}}" aria-hidden="true"></i></strong>
                            </td>
                            <td>
                                {{$page->created_at}}
                            </td>
                            <td>
                                @if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin']))
                                    <div class="pull-right">
                                    <a href="/admin/pages/{{$page->id}}/edit" class="btn btn-xs btn-default">Edit</a> 
                                    @if($page->url != '/')
                                        {!! Form::open(['action' => ['PagesController@destroy', $page->id], 'method' => 'POST', 'style' => 'display: inline-block']) !!}
                                            {{Form::hidden('_method', 'DELETE')}} <!-- To spoof a DELETE request instead of POST -->
                                            {{Form::submit('Delete', ['class' => 'btn btn-xs btn-danger'])}}
                                        {!! Form::close() !!} 
                                    @endif     
                                </div>
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>There are no pages yet.</p>
            @endif
            
        </div>
    </div>
@endsection