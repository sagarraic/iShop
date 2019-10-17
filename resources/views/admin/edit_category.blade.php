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
                            Edit a existing <strong>category</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">Category Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="category_name" value="{{ $category->category_name }}" placeholder="Enter category name" class="form-control">
                                        <small class="form-text text-muted">Enter category name</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class="form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="category_description" id="textarea-input" rows="9" placeholder="Description..." class="form-control">{{ $category->category_description }}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class="form-control-label">Select Image</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" name="image" class="form-control-file">
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
                        <p>Copyright © 2019 This website is made by <a href="https://alpastechnology.com">Alpas Technology Pvt. Lmd.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection