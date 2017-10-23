$(document).ready(function () {

    $('#periodsTable').DataTable({
        "fnDrawCallback": function (oSettings) {
            $('.dataTables_info').addClass('btn btn-primary');
            $('.dataTables_paginate').addClass('pull-right ');
            $('.dt-buttons a').addClass('btn btn-primary');
            $('.dt-buttons ').addClass('col-md-4 text-center');
            $('.dataTables_filter label').addClass('pull-right');
            $('.dataTables_length ').addClass('pull-left');
        },
        serverSide: true,
        processing: true,
        bStateSave: true,
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        oLanguage: {
            sUrl: "data/EnglishExamPeriods.json"
        },
        ajax: {
            url: 'examsDatatables.php',
            headers: {
                'Access-Control-Allow-Origin': '*'
            },
            method: 'POST'
        },
        order: [
            [0, 'asc']
        ],
        columns: [
            {
                data: "date_from"
            }, {
                data: "date_to"
            }, {
                data: "name"
            }
        ]
    });

});