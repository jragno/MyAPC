@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Organizations</title>
@stop

@section('content')
	<div class="page-content">
        <div class="page-content-wrap bg-light">
            <div class="page-content-holder no-padding">
                <div class="page-title">   
                    <h1><a href="/organizations">ORGANIZATIONS</a></h1>
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Organizations</a></li>
                    </ul>               
                </div>
            </div>
        </div>        
                       
        <div class="page-content-wrap">    
            <div class="page-content-holder">     
                
                <div class="row mix-grid thumbnails">
                    @foreach($orgs as $org)
                        <div class="col-md-4 col-xs-4 mix cat_nature cat_all">
                            <a href="/organizations/details/{{$org->id}}" class="thumbnail-item">
                                <img src="/images/org/{{$org->image1}}"/>
                                <div class="thumbnail-info">
                                    <p>{{$org->title}}</p>
                                </div>
                            </a>
                            <div class="thumbnail-data">
                                <a href="/organizations/details/{{$org->id}}" class="thumbnail-item">
                                    <h5>{{$org->title}}</h5>
                                </a>
                                {!! html_entity_decode($org->read_more) !!}
                            </div>                                
                        </div>
                    @endforeach
                </div>
                
                <ul class="pagination pagination-sm pull-right">
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
@stop