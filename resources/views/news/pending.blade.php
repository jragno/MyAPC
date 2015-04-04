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
        <li class="active">Pending</li>
    </ul>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        

        <!-- START RESPONSIVE TABLES -->
        <div class="row">
            <div class="col-md-12">
                 <!-- START TABLE HOVER ROWS -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h3>
                                @if(Auth::user()->user_type_id == '1')
                                Pending News
                                @else
                                My Pending News
                                @endif
                            </h3>
                        </div>
                        <div class="panel-body">
                            @include('flash::message')
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="100" class="text-center">Date</th>
                                        <th width="100" class="text-center">Title</th>
                                        <th width="100" class="text-center">Author</th>
                                        <th width="100" class="text-center">Details</th>
                                        <th width="100" class="text-center">Status</th>
                                        <th width="100" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($npending as $npen)                                            
                                        <tr id="trow_1">
                                            <td class="text-center">{{ date("D \n M j G:i:s T Y", strtotime($npen->created_at)) }}</td>
                                            <td><strong>{{$npen->title}}</strong></td>
                                            <td>{{$npen->author}}</td>
                                            <td>{!!html_entity_decode($npen->read_more)!!}</td>
                                            <td class="text-center">
                                                @if($npen->status == '0') <span class="label label-primary label-form">Pending</span>
                                                @elseif($npen->status == '2')<span class="label label-warning label-form">For Revision</span>
                                                @elseif($npen->status == '3')<span class="label label-danger label-form">Rejected</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="/news/update/{{$npen->id}}"><button class="btn btn-info"><span class="fa fa-edit"></span></button></a>
                                                <a class="mb-control" data-box="#mb-delete"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a>
                                            </td>
                                        </tr>
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
                                                            <form class="form-horizontal" role="form" method="POST" action="/news/pending" enctype="multipart/form-data">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="id" value="{{$npen->id}}" />
                                                                <button class="btn btn-success btn-lg">Yes</button>
                                                                <button class="btn btn-default btn-lg mb-control-close">No</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>                                
                        </div>
                    </div>
                </div>                                                
            </div>
        </div>                                            
    </div>
@stop