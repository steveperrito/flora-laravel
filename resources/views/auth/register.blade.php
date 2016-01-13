@extends('layout')

@section('content')
	<section class="page-header">
		<h1><span class="glyphicon glyphicon-user text-success"></span> Account Registration</h1>
	</section>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 bordered-right">
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

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="f_name" value="{{ old('f_name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="l_name" value="{{ old('l_name') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{ action('oAuthController@gitLogin') }}">Or register with GitHub<br>
                                <img src="/img/GitHub-Mark-120px-plus.png" alt="Login With GitHub">
                            </a>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
