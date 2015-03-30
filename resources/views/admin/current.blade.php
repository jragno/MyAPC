@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-Users</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>Users</a></li>
        <li class="active">Current</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Approved Users</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Search for a member. Make specific searches using the filters.</p>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span class="fa fa-search"></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Who are you looking for?"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info btn-block">Search</button>
                                    </div>
                                </div>
                            </form>                                    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>                
        <div class="row">
            @foreach($current as $cur)
            <div class="col-md-3">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <img src="{{ asset('/images/users/' . $cur->image) }}" alt="Nadia Ali"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{$cur->first_name}} {{$cur->mi}} {{$cur->last_name}}</div>
                                <div class="profile-data-title">{{$cur->course}}</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-phone"></span></a>
                            </div>
                        </div>                                
                        <div class="panel-body">                                    
                            <div class="contact-info">
                                <p><small>Mobile</small><br/>{{$cur->contact}}</p>
                                <p><small>Email</small><br/>{{$cur->email}}</p>
                                <p><small>Address</small><br/>123 45 Street San Francisco, CA, USA</p>                                   
                            </div>
                        </div>                                
                    </div>
                    <!-- END CONTACT ITEM -->
            </div>
            @endforeach                           
        </div>                                                
    </div>
@stop