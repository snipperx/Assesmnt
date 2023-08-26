$(document).ready(function () {
    $("#tickets-table").DataTable({
        language: {
            paginate: {
                previous: "<i class='icon-arrow-left'>",
                next: "<i class='icon-arrow-right'>"
            }
        }, drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    })
});


// <div class="d-flex mt-4 flex-wrap">
//     <p class="text-muted">Showing 1 to 10 of 57 entries</p>
//     <nav class="ml-auto">
//         <ul class="pagination separated pagination-info">
//             <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
//             <li class="page-item active"><a href="#" class="page-link">1</a></li>
//             <li class="page-item"><a href="#" class="page-link">2</a></li>
//             <li class="page-item"><a href="#" class="page-link">3</a></li>
//             <li class="page-item"><a href="#" class="page-link">4</a></li>
//             <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
//         </ul>
//     </nav>
// </div>
