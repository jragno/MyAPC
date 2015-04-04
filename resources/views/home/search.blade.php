@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Search Results</title>
@stop

@section('content')
	<div class="page-content">
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">
                <div class="page-title">   
                    <h1><a href="/organizations"></a></h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a class="active">Search Results</a></li>
                    </ul>               
                </div>
            </div>
        </div>       
                       
        <div class="page-content-wrap">    
            <div class="page-content-holder">     
                
                <div class="row mix-grid thumbnails">
                    <h2>{{$posts->count() + $events->count()}} results for "<b>{{$input}}</b>"</h2>
                    @foreach($posts as $post)
                        @if($post->module_id == 1)
                            <div class="col-md-4 col-xs-4 mix cat_nature cat_all">
                                <a href="/news/details/{{$post->id}}" class="thumbnail-item">
                                    <img src="/images/news/{{$post->image1}}"/>
                                    <div class="thumbnail-info">
                                        <p>{{$post->title}}</p>
                                    </div>
                                </a>
                                <div class="thumbnail-data">
                                    <a href="/news/details/{{$post->id}}" class="thumbnail-item">
                                        <h5>{{$post->title}}</h5>
                                    </a>
                                    {!! html_entity_decode($post->read_more) !!}
                                </div>                                
                            </div>
                        @endif
                        @if($post->module_id == 2 && !Auth::guest())
                            <div class="col-md-4 col-xs-4 mix cat_nature cat_all">
                                <a href="/announcements/details/{{$post->id}}" class="thumbnail-item">
                                    <img src="/images/announcements/{{$post->image1}}"/>
                                    <div class="thumbnail-info">
                                        <p>{{$post->title}}</p>
                                    </div>
                                </a>
                                <div class="thumbnail-data">
                                    <a href="/announcements/details/{{$post->id}}" class="thumbnail-item">
                                        <h5>{{$post->title}}</h5>
                                    </a>
                                    {!! html_entity_decode($post->read_more) !!}
                                </div>                                
                            </div>
                        @endif
                        @if($post->module_id == 3)
                            <div class="col-md-4 col-xs-4 mix cat_nature cat_all">
                                <a href="/organizations/details/{{$post->id}}" class="thumbnail-item">
                                    <img src="/images/org/{{$post->image1}}"/>
                                    <div class="thumbnail-info">
                                        <p>{{$post->title}}</p>
                                    </div>
                                </a>
                                <div class="thumbnail-data">
                                    <a href="/organizations/details/{{$post->id}}" class="thumbnail-item">
                                        <h5>{{$post->title}}</h5>
                                    </a>
                                    {!! html_entity_decode($post->read_more) !!}
                                </div>                                
                            </div>
                        @endif
                    @endforeach
                    @foreach($events as $event)
                        <div class="col-md-4 col-xs-4 mix cat_nature cat_all">
                                <a href="/events/details/{{$event->id}}" class="thumbnail-item">
                                    <img src="/images/events/{{$event->image}}"/>
                                    <div class="thumbnail-info">
                                        <p>{{$event->title}}</p>
                                    </div>
                                </a>
                                <div class="thumbnail-data">
                                    <a href="/events/details/{{$event->id}}" class="thumbnail-item">
                                        <h5>{{$event->title}}</h5>
                                    </a>
                                    {!! html_entity_decode($event->read_more) !!}
                                </div>                                
                            </div>
                    @endforeach

                </div>
                
                <ul class="pagination pagination-sm pull-right">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>                                    
                    <li><a href="#">»</a></li>
                </ul>                        
                
            </div>
        </div>                        
    </div>
@stop