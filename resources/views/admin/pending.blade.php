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
        <li class="active">Pending</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Pending Users</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <div class="col-md-1"></div>                

            <div class="col-md-10">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @include('flash::message')                                                                     
                            @foreach($pending as $pen)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $pen->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <form class="form-horizontal" role="form" method="POST" action="/users/pending" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$pen->id}}" />
                                            <input type="hidden" name="user_type_id" value="3" />
                                            <button type="submit">Student</button>                                            
                                        </form>
                                        <form class="form-horizontal" role="form" method="POST" action="/users/pending" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$pen->id}}" />
                                            <input type="hidden" name="user_type_id" value="2" />
                                            <button type="submit">Org</button>                                            
                                        </form>
                                        <li><span><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$pen->first_name}} {{$pen->mi}} {{$pen->last_name}}</strong>
                                    <span>{{$pen->course}}</span>
                                    <span>{{$pen->contact}}</span>
                                    <span>{{$pen->email}}</span>
                                </div>                                
                            </a>
                            @endforeach  
                        </div>  
                        <ul class="pagination pagination-sm pull-right push-down-20">
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>                                    
                            <li><a href="#">»</a></li>
                        </ul>                          
                    </div>                    
                </div>
            </div>   
            <div class="col-md-1"></div>                
        </div>                                                
    </div>
@stop