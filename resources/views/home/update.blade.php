@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Account</title>
@stop

@section('content')
<ul class="breadcrumb">
    <li><a>Account</a></li>
    <li><a href="/account/update/{{$update->id}}"></a></li>
    <li class="active">Update</li>
</ul>

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

	<form action="/account/update" class="form-horizontal" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
		    <div class="col-md-12">
		        <input type="text" class="form-control" value="{{Auth::user()->first_name}}" name="firstname" />
		    </div>
		</div>

		<div class="form-group">
		    <div class="col-md-12">
		        <input type="text" class="form-control" value="{{Auth::user()->last_name}}" name="lastname" />
		    </div>
		</div>

		<div class="form-group">
		    <div class="col-md-12">
		        <input type="text" class="form-control" value="{{Auth::user()->mi}}" name="middle" />
		    </div>
		</div>

		<div class="form-group">
		    <div class="col-md-12">
		        <input type="text" class="form-control" value="{{Auth::user()->course}}" name="crs" />
		    </div>
		</div>

		<div class="form-group">
		    <div class="col-md-12">
		        <input type="text" class="form-control" value="{{Auth::user()->contact}}" name="cntc" />
		    </div>
		</div>

		<div class="form-group">
			<div class="col-md-12">                               
				<input type="file" name="image" id="filename" title="Browse file"/>
			</div>
		</div> 

		<div align="center">                                                             
            <button class="btn btn-primary"><i class="fa fa-edit">Update</i></button>
    	</div>

	</form>

</div>
@stop