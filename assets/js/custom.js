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

    /*For user list in admin dashboard*/

    $('.dataTables-users').DataTable({
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
            $('#addBtn').append('<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal4">Add a new user</button>');
        }
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
            $('#addBtn').append('<a href="agency/add" class="btn btn-primary pull-right">Add new Agency</a>');
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

    var currentUrl = location.protocol + '//' + location.hostname + (location.port ? ":" + location.port : "") + location.pathname + (location.search ? location.search : "");

    /********Data table for Agency comment**/
    $('.dataTables-agency-comment').DataTable({
        "lengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
        "pageLength": 300,
        responsive: true,
        "order": [[ 0, 'asc' ]],
        dom: '<"html5buttons"B><"#showCommentFrm.col-lg-8">gfrtipl',//add button left
        //dom: '<"html5buttons"B>g<"col-sm-3"f><"#showCommentFrm.col-md-7">rtipl',//add btn right and search left
        buttons: [
            {extend: 'excel', title: 'agencyUsers'},
            {extend: 'pdf', title: 'agencyUsers'},
        ],
        "fnInitComplete": function (oSettings, json) {
            var html =
                '<div class="col-lg-2">' +
                '<button class="btn btn-primary" type="button" id="showBtn" onclick="showForm()">Add</button>' +
                '<button class="btn btn-danger hide" id="closeBtn" type="button" onclick="hideForm()">Close</button>' +
                '</div>' +
                '<form action="' + currentUrl + '" method="POST" class="form-inline hide" id="commentForm" data-type="add">' +
                '<div class="form-group m-r-sm" id="commentArea">' +
                '<label for="comment" class="sr-only">Email address</label>' +
                '<input placeholder="Enter Comment" name="comment" class="form-control" type="text" id="comment">' +
                '</div>' +
                '<div class="form-group m-r-sm">' +
                '<label for="reviewDate" class="sr-only">Review Date</label>' +
                '<div class="input-group date" id="reviewDate">' +
                '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>' +
                '<input type="text" class="form-control" name="reviewDate" placeholder="Review Date" id="reviewDate">' +
                '</div>' +
                '</div>' +
                '<div class="form-group"><button class="btn btn-white" type="submit">Submit</button></div>';
            $('#showCommentFrm').append(html);
        }
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


    ////////// Agency Single //////////

    /* Agency comment*/
    $('#reviewDate').datepicker(
        {
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: "dd-mm-yyyy"
        });

    $('#commentForm').submit(function (e) {
        e.preventDefault();

        var data = $(this).serialize();

        var type = '';
        var type = $(this).data("type");

        console.log(type);

        if(type == 'add') {
            var url = $(this).attr('action') + '/add-comment';
            $.post(url, data)
                .done(function (response) {
                    $('#commentForm').addClass('hide');
                    $('#showBtn').removeClass('hide');
                    $('#closeBtn').addClass('hide');

                    $('#commentForm').closest('form').find("input[type=text], textarea").val("");
                    var t = $('.dataTables-agency-comment').DataTable();
                    t.row.add([
                        response.comment,
                        response.created_at,
                        response.review_date
                    ]).draw(false);

                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('Added Successfully');
                    }, 330);
                })
                .fail(function (response) {
                    if(response.statusText == 'Validation Error') {
                        $('#commentForm #commentArea').addClass('has-error');
                    }else{
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.error('Try again later');
                        }, 330);
                    }
                });
        }else if(type == 'edit'){
            var id = $(this).data("id");
            var url = $(this).attr('action') + '/edit-comment/' + id;
            $.post(url, data)
                .done(function (response) {
                    console.log(response);
                    console.log(response.comment);
                    $('#commentForm').addClass('hide');
                    $('#showBtn').removeClass('hide');
                    $('#closeBtn').addClass('hide');

                    $('#commentForm').closest('form').find("input[type=text], textarea").val("");

                    var $targetTable = $('.dataTables-agency-comment').dataTable();

                    $targetTable.fnUpdate(response.comment, '#comment-' + id, 0);
                    $targetTable.fnUpdate(response.created_at, '#comment-' + id, 1);
                    $targetTable.fnUpdate(response.review_date, '#comment-' + id, 2);

                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success('Updated');
                    }, 330);
                })
                .fail(function (response) {
                    if (response.statusText == 'Validation Error') {
                        $('#commentForm #commentArea').addClass('has-error');
                    } else {
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                            toastr.error('Try again later');
                        }, 330);
                    }
                });
        }

    });


    $('#data_3 .input-group.date').datepicker({
        startView: 2,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    $('#phone').inputmask({
        mask: '?(999) 999-9999',
        autoclear: true
    });
    $('#phone').change(function () {
        if($(this).val().length < 14) {
            $('#data_phone').addClass('has-error');
        }else{
            $('#data_phone').removeClass('has-error');
        }
    });

    $('#contractorForm').submit(function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        if ($('#contractorField').val() == '') {
            return false;
        }

        $.post(url, data)
            .done(function (response) {
                $('#contractorField option:selected').remove();

                var t = $('.dataTables-agency-contractor').DataTable();
                t.row.add([
                    response.contractor_id,
                    response.agency.agency_name
                ]).draw(false);

                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Added Successfully');
                }, 330);
            })
            .fail(function (response) {
                $('#contractorForm .form-group').addClass('has-error');
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Try again later');
                }, 330);
            });
    });

});



function showForm(){
    $('#commentForm').removeClass('hide');
    $('#showBtn').addClass('hide');
    $('#closeBtn').removeClass('hide');
    $('#commentForm').attr('data-type', 'add');
}

function hideForm(){
    $('#commentForm').addClass('hide');
    $('#showBtn').removeClass('hide');
    $('#closeBtn').addClass('hide');
}

function editComment(e,id) {
    e.preventDefault();


    $.get('get-comment/'+id)
        .done(function (response) {
            var data = response;
            $('#comment').val(data.comment);
            $('#reviewDate').datepicker('setDate', new Date(data.review_date));

            $('#commentForm').removeClass('hide');
            $('#commentForm').data('type', 'edit');

            $('#showBtn').addClass('hide');
            $('#closeBtn').removeClass('hide');

            $('#commentForm').attr('data-type', 'edit');
            $('#commentForm').attr('data-id', id);
        })
        .fail(function (response) {
            console.log(response);
        });

}


function alertConfirm(e) {
    $("#delConfirmBtn").attr("href", $(e).attr("href"));
    $("#delConfirm").modal('toggle');
    return false;
}