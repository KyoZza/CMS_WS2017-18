@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{$breadcrumbs[1]->name}}</h3>
        </div>
        <div class="panel-body">
            

            
                
                <!-- Nav tabs -->
                <ul id="navbar-tabs" class="nav nav-tabs" role="tablist">
                    @foreach($navItems as $navItem)
                        @if($navItem->position == 0)
                            <li role="presentation" class="active">
                        @else
                            <li role="presentation">
                        @endif
                                <a href="#{{$navItem->title}}" aria-controls="{{$navItem->title}}" role="tab" data-toggle="tab">{{$navItem->title}}</a>
                            </li>
                    @endforeach
                </ul>
                
                <br>
                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($navItems as $navItem)
                        @if($navItem->position == 0)
                            <div role="tabpanel" class="tab-pane active" id="{{$navItem->title}}">
                        @else
                            <div role="tabpanel" class="tab-pane" id="{{$navItem->title}}">
                        @endif
                                {!! Form::open(['action' => ['AdminController@customizeNavbarUpdate', $navItem->id], 'method' => 'POST']) !!}

                                    <div class="form-group">
                                        {{Form::label('navitem-title', 'Title')}}
                                        {{Form::text('navitem-title', $navItem->title, ['class' => 'form-control'/*, 'onkeyup'=> 'onNavbarTitleChange(event);'*/])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('navitem-link', 'Link')}}
                                        @if($navItem->link == '/blog')
                                            {{Form::text('navitem-link', $navItem->link, ['class' => 'form-control', 'deactivated'])}}
                                        @else
                                            {{Form::text('navitem-link', $navItem->link, ['class' => 'form-control'])}}
                                        @endif
                                        
                                        <br>
                                        <select class="form-control" onchange="onNavbarPageChange(event);">
                                            @foreach($pages as $page)
                                                @if($page->url == $navItem->link)
                                                    <option value="{{$page->url}}" selected>
                                                @else
                                                    <option value="{{$page->url}}">
                                                @endif
                                                        {{$page->title}}</option>
                                            @endforeach


                                            @if($navItem->link == '/blog')
                                                    <option value="/blog" selected>
                                            @else
                                                    <option value="/blog">
                                            @endif
                                                        Blog</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('navitem-position', 'Position')}}
                                        {{Form::text('navitem-position', $navItem->position, ['class' => 'form-control', 'onkeyup'=> 'onNavbarPositionChange(event);'])}}
                                    </div>

                                    {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                {!! Form::close() !!}

                            </div>
                    @endforeach
                </div>
            
                
                
        </div>
    </div>
@endsection