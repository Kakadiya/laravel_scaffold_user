@extends('../layouts.admin')
@section('page-header')
  Users
@stop

@section('content')
@if(\Session::has('success'))
            <div class="alert alert-success">
             <center>
            {{\Session::get('success')}}
            </center>
            </div>
 @endif
<div class="row">
    <div class="col-lg-8">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <i class="fa fa-users fa-fw"></i> List
	  		</div>
	  		<table class="table table-bordered">
    		<thead>
      			<tr>
       				<th>#SrNo</th>
        			<th>Name</th>
        			<th>Email</th>
        			<th>Actions</th>
      			</tr>
    		</thead>
    		
    		<tbody>
    			<?php $n = 1; ?>
				@foreach($users as $user)
				@if($user->is_disabled == 0)
					@if($user->name == 'admin')
						<tr style="color: green;">
					@else
						<tr>
					@endif
					<td>{{$n++}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
						<a onclick="return confirm('Are you sure?');" href="{{route('get:admin:delete:user',['id' => $user->id])}}">
	          			<span class="glyphicon glyphicon-trash" style="color: red"></span>
	        			</a>
	        			&nbsp;|&nbsp;
	        			<a href="{{route('get:admin:edit:user',['id' => $user->id])}}">
	          			<span class="glyphicon glyphicon-pencil"></span>
	        			</a>
					</td>
					</tr>
					@else
					<tr style="color: grey">
						<td>{{$n++}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<span class="glyphicon glyphicon-trash"></span>
	        				&nbsp;|&nbsp;
	        				<span class="glyphicon glyphicon-pencil"></span>
						</td>
					</tr>
					@endif
				@endforeach      		
      		</tbody>
      		</table>
	  	</div> 
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<a href="{{route('get:admin:create:user')}}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-plus"></span> Add New User 
        </a>
	</div>
</div>
@stop