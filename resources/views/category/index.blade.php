@extends('layouts.main-layout')
@section('page_dependencies')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection
{{-- Page content --}}
@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <div class="row">

                            <button type="button" class="btn btn-primary btn-icon-text btn-sm ml-auto mb-3 mb-sm-0"
                                    data-toggle="modal" data-target="#add-category-modal">
                                <i class="icon-doc btn-icon-prepend"></i> Add Category
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
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td>{{ $category['id'] ?? '' }}</td>
                                                <td>{{ $category['name'] ?? '' }}</td>
                                                <td>{{ substr($category['meta_title'] ?? '', 0,  30) }}</td>
                                                <td>{{ substr($category['meta_description'] ?? '', 0,  40)}}</td>
                                                <td>{{ substr($category['meta_keywords'] ?? '', 0,  60) }}</td>
                                                <td>
                                                    <label class="badge badge-info">On hold</label>
                                                </td>
                                                <td>

                                                    <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">

                                                        <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="profile-text font-weight-normal"></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">

                                                            <a class="btn btn-primary btn-icon-text" data-toggle="tooltip" title="Click to View Licence Details"
                                                               href="{{ route('product.show',['product' => $category['slug']]) }}">View Products</a>

                                                            <button type="button" class="btn btn-warning btn-icon-text"
                                                                    data-toggle="modal"
                                                                    data-target="#edit-category-modal"
                                                                    data-id="{{ $category['id'] }}"
                                                                    data-name="{{ $category['name'] }}"
                                                                    data-meta_title="{{ $category['meta_title'] }}"
                                                                    data-meta_description="{{ $category['meta_description'] }}"
                                                                    data-meta_keywords="{{ $category['meta_keywords'] }}">
                                                                <i class="icon-doc btn-icon-prepend"></i> Edit </button>

                                                            <form action="{{ route('category.destroy', $category['id']  ) }}" method="POST"
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
    @include('category.partial.add_category')
    @include('category.partial.edit_category')
@endsection

@section('page_script')
    <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js')}}"></script>
    <script src="{{ asset('js/misc.js')}}"></script>
    <!-- Custom js for this page -->
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/deleteAlert.js') }}"></script>
    <script src="{{ asset('js/deleteModal.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
@endsection

