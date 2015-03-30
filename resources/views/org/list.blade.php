@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Organizations</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="active">Organizations</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Organizations</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <!-- NEWS WIDGET -->
            @foreach($orgs as $org)
                <div class="col-md-4">
                    <div class="panel panel-default">                            
                        <div class="panel-body panel-body-image">
                            @if($org->image1 != null)
                                <a href="/org/{{$org->id}}"><img src="/images/org/{{$org->image1}}" class="img-responsive img-text"/></a>
                            @endif
                            <a href="/org/{{$org->id}}" class="panel-body-inform">
                                <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h3><a href="/org/{{$org->id}}">{{$org->title}}</a></h3>
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y l", strtotime($org->created_at)) }}  / by {{$org->org->first_name}}</div>
                            <p>{!!html_entity_decode($org->read_more)!!}</p>
                            <a href="/org/{{$org->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer text-muted">
                            <span class="fa fa-clock-o"></span> 3d ago &nbsp;&nbsp;&nbsp;
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="col-md-1"></div>               
        </div>                                                
    </div>
@stop