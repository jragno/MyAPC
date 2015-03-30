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
        <li class="active">Posted</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Events | Posted</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- NEWS WIDGET -->
            @foreach($eposted as $epost)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($epost->image != null)
                                <a href="/events/{{$epost->id}}"><img src="/images/events/{{$epost->image}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/events/{{$epost->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/events/{{$epost->id}}">{{$epost->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($epost->created_at)) }} / {{$epost->comments->count()}} Comments / by {{$epost->author->first_name}}</div>
                            <p>{!!html_entity_decode($epost->read_more)!!}</p>
                            <a href="/events/{{$epost->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer text-muted">
                            <span class="fa fa-clock-o"></span> 3d ago &nbsp;&nbsp;&nbsp;
                            <span class="fa fa-comment-o"></span> 
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>                                                
    </div>
@stop