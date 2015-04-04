@extends('layouts.front')
@section('head')
    @parent
    <title>MyAPC | Events</title>
@stop

@section('content')
    <div class="page-content">                
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">
                <!-- page title -->
                <div class="page-title">                            
                    <h1><a href="/events">EVENTS</a></h1>
                    <!-- breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="/events">Events</a></li>
                        <li class="active">{{$article->title}}</li>
                    </ul>               
                </div>
            </div>
        </div>                
                       
        <div class="page-content-wrap">   
            <div class="page-content-holder padding-v-30">

                <div class="row">                        
                    <div class="col-md-9">
                        <div class="blog-content">
                            @include('flash::message')
                            @if($article->image != null)                            
                                <img src="/images/events/{{$article->image}}" class="img-responsive"/>
                            @endif
                            <h2>{{$article->title}}</h2>
                            <span class="blog-date">{{ date("F d, Y l", strtotime($article->created_at)) }} / {{$count}} Comments / By {{$article->author->first_name}}  / {{$article->attendee->count()}} Attendees</span>
                            {!! html_entity_decode($article->body) !!}                                        
                        </div>
                        
                        <div class="text-column">
                            <h3>Comments</h3>
                        </div>
                        <div class="block">
                            <ul class="media-list">
                                @foreach ($comments as $comment)
                                    <li class="media">
                                        <a class="pull-left">
                                            <img class="media-object img-text" src="/images/users/{{$comment->commenter->image}}" width="64">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="media-heading">{{$comment->commenter->first_name}} {{$comment->commenter->last_name}}</h6>
                                            <p>{{$comment->body}}</p>
                                            <p class="text-muted">{{ date("F d, Y l", strtotime($comment->created_at)) }}</p>
                                        </div>                                            
                                    </li>
                                @endforeach
                            </ul>                                    
                        </div>
                        <div class="text-column">
                            <h3>New Comment</h3>
                            @if(Auth::guest())
                                <div class="text-column-info">You must be <a href="/auth/login">logged in</a> to post a comment.</div>
                            @else
                                <form role="form" action="/events/details/{{$article->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Comment <span class="text-hightlight">*</span></label>
                                        <textarea class="form-control" rows="5" name="body"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-lg pull-right">Submit</button>
                                </form>
                            @endif         
                        </div>
                    </div>
                    <div class="col-md-3">                                
                        <div class="text-column this-animate" data-animate="fadeInRight">                                    
                            @include('layouts.sidebar')
                            @if(!Auth::guest() && Auth::user()->id != $attendee)
                                <div class="col-md-1">
                                    <form class="form-horizontal" role="form" method="POST" action="/events/details/{{$article->id}}/attend" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="event_id" value="{{$article->id}}" />
                                        <button type="submit" class="btn btn-primary pull-right">Going</button>
                                    </form>
                                </div>
                            @endif                             
                        </div>                 
                    </div>
                </div>                        
            </div>
        </div>
    </div>
@stop          