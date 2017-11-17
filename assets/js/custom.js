/**
 * Created by noushid on 11/10/17.
 */
$(document).ready(function () {
    $('.dataTables-user-list').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
//                { extend: 'copy'},
            {extend: 'csv'},
//                {extend: 'excel', title: 'ExampleFile'},
//                {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });


    $('.dataTables-agency').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        //dom: '<"html5buttons"B>lTfgitp',lfrtip
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
        buttons: [
            {extend: 'copy'},
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ],
        "fnInitComplete": function(oSettings, json) {
            $('#addBtn').append('<div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add a new Agency</button></div>');
        }
    });

    $('.dataTables-single-agency-user').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    })

});