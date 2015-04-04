@extends('layouts.front')
@section('head')
	@parent
	<title>MyAPC | Account</title>
@stop

@section('content')

@include('flash::message')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">

		<div class="panel-body posts">
		 	<div class="panel panel-default">
		        <div class="panel-body profile">
		            <div class="profile-image">
		            <img src="{{ asset('/images/users/' . Auth::user()->image) }}"/>
		            </div>

					<div class="profile-data" align="center">
					    <div class="profile-data-name">Name: {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->mi }}</div>
					    <div class="profile-data-name">Course: {{ Auth::user()->course }}</div>     
			    	</div> 
		    	</div>

				<div class="panel-body" align="center">                                    
                    <div class="contact-info">
                        <p><small>Mobile</small><br/>{{ Auth::user()->contact }}</p>
                        <p><small>Email</small><br/>{{ Auth::user()->email }}</p>     
                        <p><small>Member Since</small><br/>{{ Auth::user()->created_at->format('M-d-Y') }}</p>                            
                    </div>

					<div>
						<a class="btn btn-primary pull-right" href="/account/update"><i class="fa fa-edit"> Update</i></a>
	                </div> 
                </div>
            </div>
		</div>
	</div>
</div>

<!-- END PAGE CONTENT WRAPPER -->

@stop
@stop