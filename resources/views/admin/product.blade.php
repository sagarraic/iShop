@extends('layouts.dashboard')
@section('products','active')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Products table</h3>
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
                            <a href="{{ route('admin.products.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add product</a>
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
                                    <th>Product name</th>
                                    <th>Product description</th>
                                    <th>Product category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>User</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr-shadow">
                                    @foreach ($products as $product)
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <span class="status--process">{{ $product->product_name }}</span>
                                        <td>
                                            <span class="block-email">{{ $product->product_description }}</span>
                                        </td>
                                        <td class="desc">{{ $product->product_category }}</td>
                                        <td>Rs. {{ $product->price }}</td>
                                        <td>
                                            <img style="height: 50px;" src="{{ $product->image_url }}" alt="">
                                        </td>
                                        <td>admin</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="/admin/products/{{ $product->id }}" class="item" data-toggle="modal" data-placement="top" id="btnView" data-target="#staticModal">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <a href="/admin/products/{{ $product->id }}/edit" class="item" data-toggle="modal" data-placement="top" id="btnEdit" data-target="#staticModal">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                
                                                <button type="button" class="item btn-delete" data-toggle="modal" data-id="{{ $product->id }}" data-placement="top" id="btnDelete" data-target="#staticModal">
                                                <i class="zmdi zmdi-delete"></i>
                                                </button></br>
                                            </form>
                                            
                                            
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
                    <p>Copyright © 2019 This website is made by <a href="https://alpas.com.np">Alpas Tech Pvt. Lmd.</a>.</p>
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
                Are you sure? You want to delete the Product?
            </p>
        </div>
        <div class="modal-footer">
            <form class="frm-delete" action="#" method="POST">
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
<div id="infoProduct" class="invisible">
    <div class="modalHeader">
        <h5 class="modal-title" id="staticModalLabel">Warning Message !!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
</div>
<script>
$(".btn-delete").on('click',function(e){
    e.preventDefault();
    var id=$(this).attr('data-id');
    $(".frm-delete").attr('action','/admin/products/'+id)
});
// $(function(e){
//     e.preventDefault();
//     var $header = $("#staticModal .modal-header"),
//         $body = $("#staticModal .modal-body"),
//         $footer = $("#staticModal .modal-footer"),
    
//     var headerContent = $("#infoProduct .modalHeader").html();
//     $header.html(headerContent);

//     });
</script>
<!-- END PAGE CONTAINER-->
@endsection