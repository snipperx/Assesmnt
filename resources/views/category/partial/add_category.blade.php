<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" name="add-category-form">
                @csrf
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div id="invalid-input-alert"></div>
                    <div id="success-alert"></div>

                    <div class="modal-body p-4">
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Enter  name" required>
                        </div>

                        <div class="form-group">
                            <label for="meta_title"> Meta Title </label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                   placeholder="Enter meta title"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="meta_description"> Meta Description</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description"
                                   placeholder="Enter meta description" required>
                        </div>

                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="4"></textarea>
                        </div>


                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-dark waves-effect waves-light"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" id="add-category-btn" class="btn btn-success waves-effect waves-light">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


