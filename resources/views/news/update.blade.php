@extends('layouts.admin')
@section('head')
    @parent
    <title>MyAPC | Admin-News</title>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote();
        });
    </script>
@stop

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a>News</a></li>
        <li><a href="/news/{{$update->id}}">{{$update->title}}</a></li>
        <li class="active">Update</li>
    </ul>
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2>News - Update</h2>
    </div>               
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        
        <div class="row">              

            <div class="col-md-12">                            
                <div class="panel panel-default">
                    <div class="panel-body posts">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @include('flash::message')
                        <form role="form" action="/news/update/{{$update->id}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Update News</strong></h3>
                            </div>
                            <div class="panel-body"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Title</label>
                                            <div class="col-md-9">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" name="title" class="form-control" value="{{$update->title}}"/>
                                                </div>    
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">                                        
                                            <label class="col-md-3 control-label">Author</label>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="input-group">
                                                   <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                    <input type="text" name="author" class="form-control" value="{{$update->author}}"/>
                                                </div>   
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Body</label>
                                            <div class="col-md-9 col-xs-12">                                            
                                                <textarea name="body" class="summernote" rows="5">{{{$update->body}}}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Image</label>
                                            <div class="col-md-9">                               
                                                <input type="file" name="image1" id="filename" title="Browse file"/>
                                            </div>
                                        </div>                                
                                    </div>

                                    @if(Auth::user()->user_type_id == '1')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Post Status</label>
                                                <div class="col-md-9">                                                                     
                                                    <select class="form-control" name="status">
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">For Revision</option>
                                                        <option value="3">Rejected</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Notes</label>
                                                <div class="col-md-9">
                                                    <textarea name="notes" class="form-control" style="resize: none;" rows="5">{{{$update->notes}}}</textarea>
                                                </div>
                                            </div>                               
                                        </div>
                                    @endif                            
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>                             
                    </div>
                </div>                
            </div>               
        </div>                                                
    </div>
@stop