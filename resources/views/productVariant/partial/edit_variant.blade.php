<div class="modal fade" id="edit-variant-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="edit-variant-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Edit Variant</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter name" required>
                        </div>

                        <div class="form-group">
                            <label for="sap_product_code"> Sap Product Code</label>
                            <input type="text" class="form-control" id="sap_product_code" name="sap_product_code"
                                   placeholder="Enter sap Product Code" required>
                        </div>

                        <div class="form-group">
                            <label for="web_product_code"> Web Product Code</label>
                            <input type="text" class="form-control" id="web_product_code" name="web_product_code"
                                   placeholder="Enter web product code" required>
                        </div>

                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select class="form-control js-example-basic-single" id="product_id" name="product_id"
                                    style="width:100%">
                                @foreach($products as $product)
                                    <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                @endforeach
                            </select>
                        </div>


                        <input type="hidden" id="slug_id" name="slug_id" value="{{ $id }}">
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-dark btn-icon-text" data-dismiss="modal">Close
                        </button>

                        <button type="button" id="edit-variant-btn" class="btn btn-primary btn-icon-text">
                            <i class="icon-doc btn-icon-prepend"></i> Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



