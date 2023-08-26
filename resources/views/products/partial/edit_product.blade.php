<div class="modal fade" id="edit-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="edit-product-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Edit New Product</h4>
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
                            <label for="category_id"> Category</label>
                            <select class="js-example-multiple" id="category_id" name="category_id[]"
                                    multiple="multiple" style="width:100%">
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="slug" name="slug" value="{{ $slug }}">
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-dark btn-icon-text" data-dismiss="modal">Close
                        </button>

                        <button type="button" id="edit-product-btn" class="btn btn-primary btn-icon-text">
                            <i class="icon-doc btn-icon-prepend"></i> Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



