(function($) {
    'use strict';
    $(function() {
        $('#order-listing').DataTable({
            language: {
                search: "",
                paginate: {
                    previous: "<i class='icon-arrow-left'>",
                    next: "<i class='icon-arrow-right'>"
                }
            }, drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        },
            "aLengthMenu": [
                [5, 10, -1],
                [5, 10, "All"]
            ],
            "iDisplayLength": 10
        });
        $('#order-listing').each(function() {
            const datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            const search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search');
            search_input.removeClass('form-control-md');
            // LENGTH - Inline-Form control
            const length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-md');
        });
    });
})(jQuery);
