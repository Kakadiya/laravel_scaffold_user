@extends('../layouts.admin')
@section('page-header')
  Users
@stop

@section('page-sub-header')
  &nbsp;
/
&nbsp;Create User
@stop

@section('content')
<div class="row">
    <div class="col-lg-8">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            <i class="fa fa-user fa-fw"></i>Create New User
	  		</div>
        <div class="panel-body">
	  		<form method="POST" action="{{ route('post:admin:create:user') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                               <span style="color:red">{{$errors->first('name')}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            <span style="color:red">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span style="color:red">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
	  	            </div> 
        </div>
  </div>
</div>
@stop