@extends('layouts.dashboard')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header" style="text-align: center;">
							<h2 class="display-5 my-3" style="margin-left: 2rem; text-align: center;" >User Details</h2>
						</div>
						<div class="card-body">
							
							<div class="vue-misc">
								
								<div class="row">
									<div class="col-md-4">
										<address class="mt-3" style="margin-left: 2rem">
											<strong> First Name:- </strong>{{ $user->fname }} <br><br>
											<strong> Last Name:- </strong>{{ $user->lname }} <br><br>
											<strong> Email:- </strong>{{ $user->email }} <br><br>
											@if($user->role_id == 1)
											<strong>Role:  </strong><td class="desc"><span class="role admin">admin</span></td>
											@else
											<td class="desc"><span class="role user">user</span></td>
											@endif
												
										</address>
									</div>
									<div class="col-md-8">
										<div class="jumbotron">
											<img src="{{ $user->image_url }}" alt="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection