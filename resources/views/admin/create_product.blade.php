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
	                        <strong>Add </strong> a new Product
	                    </div>
	                    <div class="card-body card-block">
	                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
	                            <div class="row form-group">
	                                <div class="col col-md-3">
	                                    <label for="text-input" class=" form-control-label">Product Name</label>
	                                </div>
	                                <div class="col-12 col-md-9">
	                                    <input type="text" id="text-input" name="text-input" placeholder="Product Name" class="form-control">
	                                    {{-- <small class="form-text text-muted">This is a help text</small> --}}
	                                </div>
	                            </div>
	                            <div class="row form-group">
	                                <div class="col col-md-3">
	                                    <label for="email-input" class=" form-control-label">Username</label>
	                                </div>
	                                <div class="col-12 col-md-9">
	                                    <input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control">
	                                    {{-- <small class="help-block form-text">Please enter your email</small> --}}
	                                </div>
	                            </div>
	                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Product Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Description..." class="form-control"></textarea>
                                    </div>
                                </div>
	                            <div class="row form-group">
	                                <div class="col col-md-3">
	                                    <label for="file-input" class=" form-control-label">Select image</label>
	                                </div>
	                                <div class="col-12 col-md-9">
	                                    <input type="file" id="file-input" name="file-input" class="form-control-file">
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                    <div class="card-footer">
	                        <button type="submit" class="btn btn-primary btn-sm">
	                            <i class="fa fa-dot-circle-o"></i> Submit
	                        </button>
	                        <button type="reset" class="btn btn-danger btn-sm">
	                            <i class="fa fa-ban"></i> Reset
	                        </button>
	                    </div>
	                </div>
	            </div>
	        </div>

        	<div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection