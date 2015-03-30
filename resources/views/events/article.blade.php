@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Events</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>Events</a></li>
        @if($article->status == '1')
            <li><a href="/events/posted">Posted</a></li>
        @else
            <li><a href="/events/pending">Pending</a></li>
        @endif
        <li class="active">{{$article->title}}</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title"> 
        @if($article->status == '1')
            <h2>Events | Posted</h2>
        @else
            <h2>Events | Pending</h2>
        @endif                   
        <h2><a href="/events/update/{{$article->id}}">Edit</a></h2>                
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
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($article->created_at)) }} / 
                                @if($article->status == '1')
                                    {{$count}} Comments /
                                @endif 
                                by {{$article->author->first_name}}</div>
                            <div class="post-text"> 
                                @if($article->image != null)
                                    <img src="/images/events/{{$article->image}}" class="img-text"/>
                                @endif
                                {!! html_entity_decode($article->body) !!}
                            </div>
                        </div>                                            
                           
                        <div id="comments">
                            @if($article->status == '1')
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
                            @else
                                <h3 class="push-down-20">Admin Notes</h3>
                                <p>{{$article->notes}}</p>
                                @if($article->for_revision == '0' || $article->for_revision == '1')
                                    <p><b>Status:</b>
                                    @if($article->for_revision == '1')
                                        For revision
                                    @else
                                        Rejected
                                    @endif
                                 </p>
                                @endif
                            @endif
                        </div>                                  
                    </div>
                </div>                
            </div> 
            <div class="col-md-1"></div>                
        </div>                                                
    </div>
@stop