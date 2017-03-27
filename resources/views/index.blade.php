@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Welcome
				</div>
                <div class="pages">
                    <p><a href="/member">Member</a></p>
                    <p><a href="/service">Service</a></p>
                    <p><a href="/member_use_service">Member Use Service</a></p>
                </div>
				<div class="panel-body">
					You can store tasks here! Please register or login.
				</div>
			</div>
		</div>
	</div>
@endsection
