@extends('layouts.backend')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Page Details</h3>
    </div>
    <div class="panel-body">
        @if($page->is_published)
            <a href="{{$page->url}}" class="btn btn-default">View on Website</a>
            <br><br>
        @endif
        
        <div class="row">
            <div class="col-md-8 col-sm-8"><label>Title</label></div>
            <div class="col-md-4 col-sm-4"><label>Is Published</label></div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8">{{$page->title}}</div>
            <div class="col-md-4 col-sm-4"><strong>
                <i class="fa fa-{{$page->is_published ? 'check' : 'times'}}" aria-hidden="true"></i>
            </strong></div>        
        </div>
        <div class="row">
        	<br>
            <div class="col-md-12 col-sm-12"><label>Body</label></div>          
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"><p>{!!$page->body!!}</p></div>        
        </div>
        
    </div>
</div>


@if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin']))
    <a href="/admin/pages/{{$page->id}}/edit" class="btn btn-default">Edit</a>
    @if($page->url != '/')
        {!! Form::open(['action' => ['PagesController@destroy', $page->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}} <!-- To spoof a DELETE request instead of POST -->
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!} 
    @endif
@endif 

@endsection