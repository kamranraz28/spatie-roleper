<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

    
    <style>
        .dashboard-container {
            display: flex;
            /* Use flexbox for side-by-side layout */
        }

        .dashboard-sidebar {
            width: 250px;
            /* Fixed width for sidebar */
            background-color: #2c3e50;
            /* Sidebar background color */
            height: 100vh;
            /* Full height */
            padding-top: 20px;
            /* Padding from top */
        }

        .dashboard-content {
            flex-grow: 1;
            /* Allow main content to take remaining space */
            padding: 20px;
            /* Add some padding */
        }

        .dashboard-sidebar nav ul {
            list-style-type: none;
            /* Remove bullets */
            padding: 0;
            /* Remove padding */
            margin: 0;
            /* Remove margin */
        }

        .dashboard-sidebar nav ul li {
            position: relative;
            /* Position relative for submenu */
            padding: 5px;
            /* Space around links */
        }

        .dashboard-sidebar nav ul li a {
            color: white;
            /* Link color */
            text-decoration: none;
            /* Remove underline */
            display: block;
            /* Full width clickable area */
        }

        .dashboard-sidebar nav ul li a:hover {
            background-color: #34495e;
            /* Change color on hover */
        }

        /* Style for the submenu */
        .submenu {
            display: none;
            /* Initially hide the submenu */
            background-color: #34495e;
            /* Submenu background color */
            padding-left: 20px;
            /* Indentation for submenu */
        }

        .dashboard-sidebar nav ul li:hover .submenu {
            display: block;
            /* Show submenu on hover */
        }
    </style>
</head>

<body>
    <header>
        @include('header') <!-- Include your header here -->
    </header>

    <div class="dashboard-container">
        @include('sidebar') <!-- Include your sidebar here -->

        <main class="dashboard-content">
            @yield('content') <!-- Main content will go here -->
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-5C54B6361fUM6LJ2OA6a6C/87OwHJ6N8+rF2dTfvd5nOa7V2zHw5xQ5gFi51MkFJ" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {

        var table = $('#example').DataTable( {
   
  /*     preDrawCallback: function() {
       $("#loader").show();
    },*/
 fixedHeader: true,
 scrollX:true,


       dom: 'Bfrtip',
                   buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
             {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ],
            //"order": [[ 0, "desc" ]],

        

   initComplete: function(){
  $("#example").show();
  $("#loader").hide();

}

        } );

        
   
    
    } );
  </script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example3').DataTable({
      "lengthMenu": [[100, 250, 500, -1], [100, 250, 500, "All"]],
    })
  })


</script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
</body>

</html>