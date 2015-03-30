@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Account</title>
@stop

@section('content')
<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2>Account - Update</h2>
</div>  
<!-- END PAGE TITLE -->

<!-- START PAGE CONTAINER -->
<div class="page-container">

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
          
		    <form class="form-horizontal">
		                                                      
	            <div class="panel panel-default tabs"> 
					<div class="col-md-12">     
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

	                <ul class="nav nav-tabs" role="tablist">
	                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Personal Details</a></li>
	                    <li><a href="#tab-second" role="tab" data-toggle="tab">Account Details</a></li>
	                </ul>

					<div class="panel-body tab-content">
						<div class="tab-pane active" id="tab-first">

							<form role="form" action="/account/update" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="panel-body profile" align="center">
								<div class="profile-image">
					            <img src="{{ asset('/images/users/' . Auth::user()->image) }}"/>
					            <input type="file" name="image1" id="filename" title="Browse file"/>
					            </div>
				            </div>

							<div class="panel-body">                                                                        
								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">First Name: </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="text" name="firstname" class="form-control" value="{{ Auth::user()->first_name }}"/>
								        </div>                                           
								    </div>
								</div>

								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Last Name: </label>
									<div class="col-md-6 col-xs-12">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											<input type="text" name="lastname" class="form-control" value="{{ Auth::user()->last_name }}"/>
										</div>                                            
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Middle Initial: </label>
									<div class="col-md-6 col-xs-12">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											<input type="text" name="middle" class="form-control" value="{{ Auth::user()->mi }}"/>
										</div>                                            
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Course: </label>
									<div class="col-md-6 col-xs-12">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											<input type="text" name="crs" class="form-control" value="{{ Auth::user()->course }}"/>
										</div>                                            
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 col-xs-12 control-label">Contact Number: </label>
									<div class="col-md-6 col-xs-12">                                            
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
											<input type="text" name="cntc" class="form-control" value="{{ Auth::user()->contact }}"/>
										</div>                                            
									</div>
								</div>

							    <div align="center">                                                             
	                                <button class="btn btn-primary"><i class="fa fa-edit">Update</i></button>
	                        	</div>

							</div>

						</div>
						</form>

						<div class="tab-pane" id="tab-second">

							<div class="panel-body">                                                                        
								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">Email (Old): </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="text" class="form-control" value="{{ Auth::user()->email }}"/>
								        </div>                                           
								    </div>
								</div>
 
								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">Email (New): </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="text" class="form-control"/>
								        </div>                                           
								    </div>
								</div>

								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">Email (Confirm New): </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="text" class="form-control"/>
								        </div>                                           
								    </div>
								</div>

							    <div align="center">                                                             
	                                <button class="btn btn-primary"><i class="fa fa-edit">Update</i></button>
	                        	</div>								

							</div>

							<div class="panel-body">  
								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">Password (Old): </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="password" class="form-control" value="{{ Auth::user()->password }}"/>
								        </div>                                           
								    </div>
								</div>

								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">Password (New): </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="text" class="form-control"/>
								        </div>                                           
								    </div>
								</div>

								<div class="form-group">
								    <label class="col-md-3 col-xs-12 control-label">Password (Confirm New): </label>
								    <div class="col-md-6 col-xs-12">                                            
								        <div class="input-group">
								            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								            <input type="text" class="form-control"/>
								        </div>                                           
								    </div>
								</div>


							    <div align="center">                                                             
	                                <button class="btn btn-primary"><i class="fa fa-edit">Update</i></button>
	                        	</div>
	                        	
                        	</div>

						</div>

					</div>

				</div>	
			</form>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
@stop