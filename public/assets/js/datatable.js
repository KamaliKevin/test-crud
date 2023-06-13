$(document).ready(function () {
    /* Initial settings for the DataTable objects */
    $('#usersTable').DataTable({
        responsive: true,
        lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
        columnDefs: [
            {
                targets: -1, // The last column index
                orderable: false, // Disable ordering
                searchable: false // Disable searching
            }
        ],
        order: [[0, "desc"]],
        language: {
            paginate: {
                previous: "<i class='fa-solid fa-angles-left'></i>",
                next: "<i class='fa-solid fa-angles-right'></i>"
            }
        },
        fnDrawCallback: function(oSettings) {
            if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()
            || oSettings._iDisplayLength === -1) {
                $(oSettings.nTableWrapper).find('.dataTables_paginate').hide(); // Hides table pagination if only one page
            } else {
                $(oSettings.nTableWrapper).find('.dataTables_paginate').show(); // Show table pagination if more than one page
            }
        }
    });

    /* Prevents the user from using a disabled DataTable pagination button */
    $('.paginate_button').click(function(event) {
        if ($(this).hasClass('disabled')) {
            event.preventDefault();
            return false;
        }
    });

    /* Puts a dark theme for select tags inside the "Show X entries" area */
    $('#usersTable_length').find("select").attr("data-bs-theme", "dark");
});