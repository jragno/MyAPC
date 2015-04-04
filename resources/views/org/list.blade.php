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
            <!-- ORG WIDGET -->
            @include('flash::message')
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
                            <div class="post-date"><span class="fa fa-calendar"></span> {{ date("F d, Y", strtotime($org->created_at)) }} at {{ date("g:ha",strtotime($org->created_at)) }} | <span class="fa fa-user"></span> by {{$org->org->first_name}}</div>
                            <p>{!!html_entity_decode($org->read_more)!!}</p>
                            <a href="/org/{{$org->id}}" class="btn btn-default btn-rounded pull-right">Read more &RightArrow;</a>
                        </div>
                        <div class="panel-footer">
                            <span class="fa fa-clock-o"></span> {{\Carbon\Carbon::createFromTimeStamp(strtotime($org->created_at))->diffForHumans()}} 
                            &nbsp; <span class="fa fa-group"></span> {{DB::table('registrations')->where('post_id', $org->id)->where('status', '=', '1')->count()}} members
                            || &nbsp;&nbsp;
                            <a href="/org/update/{{$org->id}}" class="info"><span class="fa fa-edit "></span></a>
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
                                    <form class="form-horizontal" role="form" method="POST" action="/org/list" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{$org->id}}" />
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