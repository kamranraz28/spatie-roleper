<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- DataTables Bootstrap5 JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>

<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- PDFMake for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Buttons for export functionality -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<!-- Column visibility control -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

<script>
$(document).ready(function () {
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 
            'excel', 
            'pdf', 
            {
                extend: 'print',    // Print button with custom settings
                exportOptions: {
                    columns: ':visible'  // Ensure only visible columns are printed
                },
                customize: function (win) {
                    $(win.document.body)
                        .css('background-color', '#fff')  // Optional: remove background color
                        .find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');    // Adjust table styling for print
                    
                    // Remove everything except the table
                    $(win.document.body).find('h1').remove();  // Optional: removes the title from print
                    $(win.document.body).find('div').not('table').remove();  // Removes other content
                }
            },
            'colvis'
        ],
        responsive: true,
        scrollX: true
    });
});
</script>