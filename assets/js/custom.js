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
        "order": [[ 1, 'asc' ]],
        //dom: '<"html5buttons"B>lTfgitp',lfrtip //normal
        //dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',//add button left
        dom: '<"html5buttons"B>g<"col-sm-3"f><"#addBtn.col-md-6">rtipl',//add btn right and search left
        buttons: [
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
            $('#addBtn').append('<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add Agency</button>');
        }
    });



    /********Data table for user agency**/
    $('.dataTables-single-agency-user').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        "order": [[ 2, 'asc' ]],
        //dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtipl',//add button left
        dom: '<"html5buttons"B>g<"col-sm-3"f><"#addBtn.col-md-7">rtipl',//add btn right and search left
        buttons: [
            {extend: 'excel', title: 'agencyUsers'},
            {extend: 'pdf', title: 'agencyUsers'},

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
            $('#addBtn').append('<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add User</button>');
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
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtip',
        buttons: [
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
            $('#addBtn').append('<div class="col-md-5"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applicationModal">Add New Application</button></div><div class="col-md-5"><a onclick="window.history.back();" class="btn btn-default">Back</a></div>');
        }
    });


    /********Data table for x_application**/
    $('.dataTables-x-application').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B><"#addBtn.col-md-6">gfrtip',
        buttons: [
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
            $('#addBtn').append('<div class="col-md-5"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applicationModal">Add New Application</button></div><div class="col-md-5"><a onclick="window.history.back();" class="btn btn-default">Back</a></div>');
        }
    });

    /********Data table for Agency contractor**/
    $('.dataTables-agency-contractor').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        //"pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B>gfrtip',
        buttons: [
            {extend: 'excel', title: 'AgencyContractor'},
            {extend: 'pdf', title: 'AgencyContractor'},

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


    /********Data table for Agency contractor**/
    $('.dataTables-agency-doctor').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        //"pageLength": 300,
        responsive: true,
        dom: '<"html5buttons"B>gfrtip',
        buttons: [
            {extend: 'excel', title: 'AgencyDoctor'},
            {extend: 'pdf', title: 'AgencyDoctor'},

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
    ////////////Edit  profile/////////////
    $('#change-user-email-check').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

    $('#change-user-email-check').on('ifChecked', function(event){
        $('#user_email').prop('disabled', false);
    });

    $('#change-user-email-check').on('ifUnchecked', function(event){
        $('#user_email').prop('disabled', true);
    });

    $('#phone_home').inputmask({
        mask: '?(999) 999-9999',
        autoclear: true
    });
    $('#phone_home').change(function () {
        if($(this).val().length < 14) {
            $('#data_home_phone').addClass('has-error');
        }else{
            $('#data_home_phone').removeClass('has-error');
        }
    });

    $('#phone_cell').inputmask({
        mask: '?(999) 999-9999',
        autoclear: true
    });

    $('#phone_cell').change(function () {
        if($(this).val().length < 14) {
            $('#data_phone_cell').addClass('has-error');
        }else{
            $('#data_phone_cell').removeClass('has-error');
        }
    });

    ////////////Edit  profile/////////////



});

function alertConfirm(e) {
    $("#delConfirmBtn").attr("href", $(e).attr("href"));
    $("#delConfirm").modal('toggle');
    return false;
}