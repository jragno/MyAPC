@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Org-Organization</title>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>Organization</a></li>
        <li class="active">Applicants</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Applicants</h2>
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
                            @foreach($applicants as $app)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $app->member->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <form class="form-horizontal" role="form" method="POST" action="/org/applicants" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$app->id}}" />
                                            <button type="submit" class="fa fa-check"></button>                                            
                                        </form>
                                        <li><span><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>{{$app->member->first_name}} {{$app->member->mi}} {{$app->member->last_name}}</strong>
                                    <span>{{$app->member->course}}</span>
                                    <span>{{$app->member->contact}}</span>
                                    <span>{{$app->member->email}}</span>
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