@extends('layouts.app-layout')
@section('page_dependencies')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{--    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">--}}
@endsection
{{-- Page content --}}
@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product for [{{$slug}}]</h4>
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
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ $product['id'] ?? '' }}</td>
                                                <td>{{ $product['name'] ?? '' }}</td>
                                                <td>

                                                    <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">

                                                        <a class="nav-link d-flex align-items-center dropdown-toggle"
                                                           id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="profile-text font-weight-normal"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">

                                                            <a class="btn btn-primary btn-icon-text" data-toggle="tooltip" title="Click to View product variant"
                                                               href="{{ route('variant.show',['variant' => $product['slug']]) }}">View Product Variant</a>

                                                            <button type="button" class="btn btn-warning btn-icon-text  btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#edit-product-modal"
                                                                    data-id="{{ $product['id']  }}"
                                                                    data-name="{{ $product['name'] }}"
                                                                    data-slug="{{ $product['slug']  }}">

                                                                <i class="icon-doc btn-icon-prepend"></i> Edit </button>

                                                            <form action="{{ route('product.destroy', $product['id'] ) }}" method="POST"
                                                                  style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                <button type="submit"
                                                                        class="btn btn-danger btn-icon-text delete_confirm  btn-sm"
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
                            <div class="d-flex mt-4 flex-wrap">
                                <nav class="ml-auto">
                                    <ul class="pagination separated pagination-info">
                                        <button type="button" id="back_button"
                                                class="btn btn-primary btn-icon-text btn-sm ml-auto mb-3 mb-sm-0">
                                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                                        </button>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('products.partial.add_product');
    @include('products.partial.edit_product');
@endsection

@section('page_script')
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>

    <!-- Custom js for this page -->
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/deleteAlert.js') }}"></script>
    <script src="{{ asset('js/deleteModal.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script>
        $('#back_button').click(function () {
            location.href = '{{route('category.index')}}';
        });

    </script>

@endsection

