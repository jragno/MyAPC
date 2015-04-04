@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Announcement</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/announcements/list">Announcements</a></li>
        <li class="active">{{$article->title}}</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title"> 
        <h2>Announcements</h2>    
        <span class="pull-right">
            <a href="/announcements/update/{{$article->id}}"><button class="btn btn-info"><span class="fa fa-pencil-square-o"></span>Edit</button></a>
        </span> 
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <div class="col-md-1"></div>                

            <div class="col-md-10">                            
                <div class="panel panel-default">
                    <div class="panel-body posts">
                                
                        <div class="post-item">
                            <div class="post-title">
                                {{$article->title}}
                            </div>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($article->created_at)) }}/ <a href="/announcements/{{$article->id}}#comments">{{$count}} Comments</a> / by {{$article->author}}</div>
                            <div class="post-text"> 
                                @if($article->image1 != null)
                                    <img src="/images/announcements/{{$article->image1}}" class="img-text"/>
                                @endif
                                {!! html_entity_decode($article->body) !!}
                            </div>
                        </div>                                            
                           
                        <div id="comments">
                            <h3 class="push-down-20">Comments</h3>
                            <ul class="media-list">
                                @foreach($comments as $comment)
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-text" src="/images/users/{{$comment->commenter->image}}" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$comment->commenter->first_name}} {{$comment->commenter->last_name}}</h4>
                                        <p>{{$comment->body}}</p>
                                        <p class="text-muted">{{ date("F d, Y l", strtotime($comment->created_at)) }}</p>                                                               
                                    </div>                                            
                                </li>
                                @endforeach
                            </ul>  
                        </div>                                  
                    </div>
                </div>                
            </div> 
            <div class="col-md-1"></div>                
        </div>                                                
    </div>
@stop