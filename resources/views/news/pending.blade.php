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
    
    <!-- PAGE TITLE -->            
    



    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">        

        <!-- START RESPONSIVE TABLES -->
        <div class="row">
            <div class="col-md-12">
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

                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">Date</th>
                                        <th width="100">Title</th>
                                        <th width="100">Author</th>
                                        <th width="100">Details</th>
                                        <th width="50">Status</th>
                                        <th width="100">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($npending as $npen)                                            
                                    <tr id="trow_1">
                                        <td class="text-center">{{ date("D \n M j G:i:s T Y", strtotime($npen->created_at)) }}</td>
                                        <td><strong>{{$npen->title}}</strong></td>
                                        <td>{{$npen->author}}</td>
                                        <td>{!!html_entity_decode($npen->read_more)!!}</td>
                                        <td>@if($npen->status == '0') <span class="label label-primary label-form">Pending</span>
                                            @elseif($npen->status == '2')<span class="label label-warning label-form">For Revision</span>
                                            @elseif($npen->status == '3')<span class="label label-danger label-form">Rejected</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="/news/update/{{$npen->id}}"><button class="btn btn-info"><span class="fa fa-pencil-square-o"></span></button></a>
                                            <a href=""><button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>                                

                    </div>
                </div>                                                

            </div>
        </div>
                    <!-- END RESPONSIVE TABLES -->                                               
    </div>
@stop