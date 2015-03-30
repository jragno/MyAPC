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
        <li class="active">Pending</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Events | Pending</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- NEWS WIDGET -->
            @foreach($epending as $epen)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($epen->image != null)
                                <a href="/events/{{$epen->id}}"><img src="/images/events/{{$epen->image}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/events/{{$epen->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/events/{{$epen->id}}">{{$epen->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($epen->created_at)) }} / by {{$epen->author->first_name}}</div>
                            <p>{!!html_entity_decode($epen->read_more)!!}</p>
                            <a href="/events/{{$epen->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
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