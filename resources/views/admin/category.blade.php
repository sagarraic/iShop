@extends('layouts.dashboard')
@section('categories','active')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Category table</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('admin.categories.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add category</a>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th>image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-shadow">
                                    @foreach ($categories as $category)
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td class="desc">{{ $category->category_description }}</td>
                                    <td>{{ date('d M Y - H:i:s', $category->created_at->timestamp) }}</td>
                                    <td>
                                        <span class="status--process">Processed</span>
                                    </td>
                                    <td><img style="height: 50px;" src="{{ $category->image_url }}" alt=""></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="/admin/categories/{{ $category->id }}/edit" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <button type="button" class="item btn-del" data-toggle="modal"data-id="{{ $category->id }}" data-placement="top" title="Delete" data-target="#staticModal">
                                            <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <br>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                            <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            <tr class="spacer"></tr>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
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
<!-- modal static -->
<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
data-backdrop="static">
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticModalLabel">Warning Message !!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>
                Are you sure? You want to delete the user?
            </p>
        </div>
        <div class="modal-footer">
            <form class="frm-del" action="#" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Yes</button>
            </form>
            <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
    </div>
</div>
</div>
<!-- end modal static -->
</div>
<script>
    $(".btn-del").on('click',function(e){
        e.preventDefault();
        var id=$(this).attr('data-id');
        $(".frm-del").attr('action','/admin/categories/'+id)
    });
</script>
<!-- END PAGE CONTAINER-->
@endsection