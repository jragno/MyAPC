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
        <li class="active">Approved</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>Approved Applicants</h2>
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
                @include('flash::message')                                                                     
                @foreach($approved as $app)            
              <div class="col-md-3">
                    <!-- CONTACT ITEM -->

                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <img src="{{ asset('/images/users/' . $app->member->image) }}" alt="Nadia Ali"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{$app->member->first_name}} {{$app->member->mi}} {{$app->member->last_name}}</div>
                                <div class="profile-data-title">{{$app->member->course}}</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-phone"></span></a>
                            </div>
                        </div>                                
                        <div class="panel-body">                                    
                            <div class="contact-info">
                                <p><small>Mobile</small><br/>{{$app->member->contact}}</p>
                                <p><small>Email</small><br/>{{$app->member->email}}</p>
                                <p><small>Address</small><br/>123 45 Street San Francisco, CA, USA</p>                                   
                            </div>
                        </div>                                
                    </div>
                    <!-- END CONTACT ITEM -->
                </div>
                 @endforeach           
            <div class="col-md-1"></div>                

            <div class="col-md-10">                
                <div class="panel panel-default">
                    <div class="panel-body posts"> 
                        <div class="gallery" id="links"> 
                            @include('flash::message')                                                                     
                            @foreach($approved as $app)
                            <a class="gallery-item" data-gallery>
                                <div class="image">                              
                                    <img src="{{ asset('/images/users/' . $app->member->image) }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <form class="form-horizontal" role="form" method="POST" action="/org/approved" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$app->id}}" />
                                            <input type="hidden" name="user_type_id" value="3" />
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