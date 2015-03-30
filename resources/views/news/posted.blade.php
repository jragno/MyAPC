@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-News</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>News</a></li>
        <li class="active">Posted</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>News | Posted</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- NEWS WIDGET -->
            @foreach($nposted as $npost)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($npost->image1 != null)
                                <a href="/news/{{$npost->id}}"><img src="/images/news/{{$npost->image1}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/news/{{$npost->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/news/{{$npost->id}}">{{$npost->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($npost->created_at)) }} at {{ date("g:ha",strtotime($npost->created_at)) }} / {{$npost->comments->count()}} Comments / by {{$npost->author}}</div>
                            <p>{!!html_entity_decode($npost->read_more)!!}</p>
                            <a href="/news/{{$npost->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer text-muted">
                            <span class="fa fa-clock-o"></span> 3d ago &nbsp;&nbsp;&nbsp;
                            <span class="fa fa-comment-o"></span> {{$npost->comments->count()}}
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>                                                
    </div>
@stop