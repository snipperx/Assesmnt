@extends('layouts.main-layout')
@section('page_dependencies')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
@endsection
{{-- Page content --}}
@section('content')

    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product</h4>
                        <div class="row">

                            <button type="button" class="btn btn-primary btn-icon-text btn-sm ml-auto mb-3 mb-sm-0"
                                    data-toggle="modal" data-target="#add-product-modal">
                                <i class="icon-doc btn-icon-prepend"></i> Add Product
                            </button>

                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Name</th>
                                            <th>Meta Title</th>
                                            <th width="20%">Meta Description</th>
                                            <th width="5%">Meta Keywords</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ $product->id ?? '' }}</td>
                                                <td>{{ $product->name ?? '' }}</td>
                                                <td>{{ substr($product->meta_title ?? '', 0,  30) }}</td>
                                                <td>{{ substr($product->meta_description ?? '', 0,  40)}}</td>
                                                <td>{{ substr($product->meta_keywords ?? '', 0,  60) }}</td>
                                                <td>
                                                    <label class="badge badge-info">On hold</label>
                                                </td>
                                                <td>

                                                    <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">

                                                        <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="profile-text font-weight-normal"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                                                            <button type="button" class="btn btn-primary btn-icon-text">
                                                                <i class="icon-doc btn-icon-prepend"></i> View Products </button>

                                                            <button type="button" class="btn btn-warning btn-icon-text"
                                                                    data-toggle="modal"
                                                                    data-target="#edit-product-modal"
                                                                    data-id="{{ $product->id }}"
                                                                    data-name="{{ $product->name }}"
                                                                    data-meta_title="{{ $product->meta_title }}"
                                                                    data-meta_description="{{ $product->meta_description }}"
                                                                    data-meta_keywords="{{ $product->meta_keywords }}">
                                                                <i class="icon-doc btn-icon-prepend"></i> Edit </button>

                                                            <form action="{{ route('product.destroy', $product->id ) }}" method="POST"
                                                                  style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <button type="submit"
                                                                        class="btn btn-danger btn-icon-text delete_confirm"
                                                                        data-toggle="tooltip" title='Delete'>
                                                                    <i class="icon-doc btn-icon-prepend delete_confirm"
                                                                       data-toggle="tooltip" title='Delete'></i>Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('products.partial.add_product')
    @include('products.partial.edit_product')
@endsection

@section('page_script')
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <!-- Custom js for this page -->
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/deleteAlert.js') }}"></script>
    <script src="{{ asset('js/deleteModal.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endsection

