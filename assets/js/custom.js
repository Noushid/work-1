/**
 * Created by noushid on 11/10/17.
 */
$(document).ready(function () {
    $('.dataTables-user-list').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        //dom: '<"html5buttons"B>lTfgitp',
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
        buttons: [
                { extend: 'copy'},
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

    });

     /********Data table for agency**/

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



    /********Data table for user agency**/
    $('.dataTables-single-agency-user').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
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
        ],
        "fnInitComplete": function (oSettings, json) {
            $('#addBtn').append('<div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new user</button></div>');
        }
    });


    /********Data table for group**/
    $('.dataTables-group').DataTable({
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
            $('#addBtn').append('<div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">Add New Group</button></div>');
        }
    });


    /********Data table for x-profile**/
    $('.dataTables-x-profile').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        //dom: '<"html5buttons"B>lTfgitp',lfrtip //old one
        //dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',//remove list entries
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtip',
        buttons: [
            {extend: 'copy'},
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'X-Profile'},
            {extend: 'pdf', title: 'X-Profile'},

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
            $('#addBtn').append('<div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProfileModel">Add a new profile</button></div>');
        }
    });

    /********Data table for Menu**/
    $('.dataTables-menu').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
        buttons: [
            {extend: 'copy'},
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Menu'},
            {extend: 'pdf', title: 'Menu'},

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
            $('#addBtn').append('<div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">Add a new Menu</button></div>');
        }
    });

    /********Data table for sub Menu**/
    $('.dataTables-sub-menu').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
        buttons: [
            {extend: 'copy'},
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'SubMenu'},
            {extend: 'pdf', title: 'SubMenu'},

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
            $('#addBtn').append('<div class="col-md-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">Add a new sub Menu</button></div>');
        }
    });

    /********Data table for x_application**/
    $('.dataTables-x-application').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
        buttons: [
            {extend: 'copy'},
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'SubMenu'},
            {extend: 'pdf', title: 'SubMenu'},

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
            $('#addBtn').append('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applicationModal">Add a new application</button>');
        }
    });


    /********Data table for x-profile-group**/
    $('.dataTables-x-profile-group').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',
        buttons: [
            {extend: 'copy'},
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'SubMenu'},
            {extend: 'pdf', title: 'SubMenu'},

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
            $('#addBtn').append('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileGroupModal">Add a new Group</button>');
        }
    });

});

function alertConfirm(e) {
    $("#delConfirmBtn").attr("href", $(e).attr("href"));
    $("#delConfirm").modal('toggle');
    return false;
}