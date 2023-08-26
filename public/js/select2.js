(function($) {
  'use strict';

  if ($(".js-example-basic-single").length) {
    $(".js-example-basic-single").select2();
  }
  if ($(".js-example-basic-multiple").length) {
    $(".js-example-basic-multiple").select2();
  }
    if ($(".js-example-multiple").length) {
        $(".js-example-multiple").select2();
    }

    $("#category_id").select2();
    $("#category").select2();
})(jQuery);
