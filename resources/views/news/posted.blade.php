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
            @include('flash::message')
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
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($npost->created_at)) }} at {{ date("g:ha",strtotime($npost->created_at)) }} | <span class="fa fa-user"></span> by {{$npost->author}}</div>
                            <p>{!!html_entity_decode($npost->read_more)!!}</p>
                            <a href="/news/{{$npost->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer">
                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($npost->created_at))->diffForHumans()}} 
                            &nbsp; <span class="fa fa-comment-o"></span> {{$npost->comments->count()}}
                            || &nbsp;&nbsp;
                            <a href="/news/update/{{$npost->id}}" class="info"><span class="fa fa-edit "></span></a>
                            &nbsp;&nbsp;<a class="mb-control danger" data-box="#mb-delete"><span class="glyphicon glyphicon-remove-circle "></span></a>
                        </div>
                    </div>
                </div>
                <div class="message-box message-box-warning animated fadeIn" id="mb-delete">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span>Are you sure you want to <strong>delete</strong> ?</div>
                            <div class="mb-content">
                                <p>Are you sure you want to delete?</p>                    
                                <p>Press No if you want to cancel. Press Yes to delete.</p>
                            </div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <form class="form-horizontal" role="form" method="POST" action="/news/posted" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{$npost->id}}" />
                                        <button class="btn btn-success btn-lg">Yes</button>
                                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach   
        </div>                                                
    </div>
@stop