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
        <h2>Current Users</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">
            <div class="col-md-1"></div>                

            <div class="col-md-10">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @foreach($current as $cur)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $cur->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <li><label class="check"><input type="checkbox" class="icheckbox"/></label></li>
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$cur->first_name}} {{$cur->mi}} {{$cur->last_name}}</strong>
                                    <span>{{$cur->course}}</span>
                                    <span>{{$cur->contact}}</span>
                                    <span>{{$cur->email}}</span>
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