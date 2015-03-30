@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Announcements</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Announcements</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Announcements</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- NEWS WIDGET -->
            @foreach($announcements as $announcement)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($announcement->image1 != null)
                                <a href="/announcements/{{$announcement->id}}"><img src="/images/announcements/{{$announcement->image1}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/announcements/{{$announcement->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/announcements/{{$announcement->id}}">{{$announcement->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($announcement->created_at)) }} / {{$announcement->comments->count()}} Comments / by {{$announcement->author}}</div>
                            <p>{!!html_entity_decode($announcement->read_more)!!}</p>
                            <a href="/announcements/{{$announcement->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer text-muted">
                            <span class="fa fa-clock-o"></span> 3d ago &nbsp;&nbsp;&nbsp;
                            <span class="fa fa-comment-o"></span> {{$announcement->comments->count()}}
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="col-md-1"></div>               
        </div>                                                
    </div>
@stop