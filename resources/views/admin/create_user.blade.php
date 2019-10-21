@extends('layouts.dashboard')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            Register a <strong>new</strong> User
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group ">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">First Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="fname" placeholder="First Name" class="form-control @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                                        @error('fname')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Last Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="lname" placeholder="Last Name" class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
                                        @error('lname')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email-input" name="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Role ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="role_id" placeholder="Role ID" class="form-control @error('role_id') is-invalid @enderror" value="{{ old('role_id') }}">
                                        @error('role_id')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>	
                                <div class="row form-group @error('password') has-error @enderror">
                                    <div class="col col-md-3">
                                        <label for="password-input" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password-input" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                        @error('password')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
		                            <button type="submit" class="btn btn-primary btn-sm">
		                                <i class="fa fa-dot-circle-o"></i> Submit
		                            </button>
		                            <button type="reset" class="btn btn-danger btn-sm">
		                                <i class="fa fa-ban"></i> Reset
		                            </button>
		                        </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2019 This website is made by <a href="https://alpas.com.np">Alpas Technology Pvt. Lmd.</a></p>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection