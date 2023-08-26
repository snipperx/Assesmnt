
//Category
    $('#add-category-btn').on('click', function () {
        let strUrl = 'category'
        let modalID = 'add-category-modal';
        let formName = 'add-category-form';
        let submitBtnID = 'add-category-btn';
        let redirectUrl = 'category';
        let successMsgTitle = 'Record Added!';
        let successMsg = 'Record has been updated successfully.';
        modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
    });

    let categoryId;
    $('#edit-category-modal').on('show.bs.modal', function (e) {
        let btnEdit = $(e.relatedTarget);
        categoryId = btnEdit.data('id');
        let name = btnEdit.data('name');
        let meta_title = btnEdit.data('meta_title');
        let meta_description = btnEdit.data('meta_description');
        let meta_keywords = btnEdit.data('meta_keywords');
        let modal = $(this);
        modal.find('#name').val(name);
        modal.find('#meta_title').val(meta_title);
        modal.find('#meta_description').val(meta_description);
        modal.find('#meta_keywords').val(meta_keywords);
    });

    $('#edit-category-btn').on('click', function () {
        let strUrl = 'category/' + categoryId;
        let modalID = 'edit-category-modal';
        let formName = 'edit-category-form';
        let submitBtnID = 'edit-category-btn';
        let redirectUrl = 'category';
        let successMsgTitle = 'Record Updated!';
        let successMsg = 'Record has been updated successfully.';
        modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
    });

    //*********************************************************//
// Product
const slug = $("#slug").val();

$('#add-product-btn').on('click', function () {
    let strUrl = '/product';
    let modalID = 'add-product-modal';
    let formName = 'add-product-form';
    let submitBtnID = 'add-product-btn';
    let redirectUrl = '/product/' + slug;
    let successMsgTitle = 'Record Added!';
    let successMsg = 'Record has been updated successfully.';
    modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
});

let productId;
$('#edit-product-modal').on('show.bs.modal', function (e) {
    let btnEdit = $(e.relatedTarget);
    productId = btnEdit.data('id');
    let name = btnEdit.data('name');
    let meta_title = btnEdit.data('meta_title');
    let modal = $(this);
    modal.find('#name').val(name);
    modal.find('#meta_title').val(meta_title);
});


$('#edit-product-btn').on('click', function () {
    let strUrl = '/product/' + productId;
    let modalID = 'edit-product-modal';
    let formName = 'edit-product-form';
    let submitBtnID = 'edit-product-btn';
    let redirectUrl = '/product/' + slug;
    let successMsgTitle = 'Record Updated!';
    let successMsg = 'Record has been updated successfully.';
    modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
});

// variant
// *********************************************************


let sludID  = $("#slug_id").val();
$('#add-variant-btn').on('click', function () {
    let strUrl = '/variant';
    let modalID = 'add-variant-modal';
    let formName = 'add-variant-form';
    let submitBtnID = 'add-variant-btn';
    let redirectUrl = '/variant/' + sludID;
    let successMsgTitle = 'Record Added!';
    let successMsg = 'Record has been updated successfully.';
    modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
});

let variantId;
$('#edit-variant-modal').on('show.bs.modal', function (e) {
    let btnEdit = $(e.relatedTarget);
    variantId = btnEdit.data('id');
    let name = btnEdit.data('name');
    let sap_product_code = btnEdit.data('sap_product_code');
    let web_product_code = btnEdit.data('web_product_code');
    let modal = $(this);
    modal.find('#name').val(name);
    modal.find('#sap_product_code').val(sap_product_code);
    modal.find('#web_product_code').val(web_product_code);
});

$('#edit-variant-btn').on('click', function () {
    let strUrl = '/variant/' + variantId;
    let modalID = 'edit-variant-modal';
    let formName = 'edit-variant-form';
    let submitBtnID = 'edit-variant-btn';
    let redirectUrl = '/variant/' + sludID;
    let successMsgTitle = 'Record Updated!';
    let successMsg = 'Record has been updated successfully.';
    modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg);
});
