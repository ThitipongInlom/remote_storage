$(document).ready(function () {
    $.fn.dataTable.ext.errMode = 'throw';
    var TableDisplay = $('#Table_Main').DataTable({
        "dom": "<'row'<'col-sm-1'l><'col-sm-7'><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-1'i><'col-sm-7'><'col-sm-4'p>>",
        "processing": true,
        "serverSide": true,
        "bPaginate": true,
        "responsive": true,
        "order": [
            [1, 'asc'],
        ],
        "aLengthMenu": [
            [10, 50, 100, -1],
            ["10", "50", "100", "ทั้งหมด"]
        ],
        "ajax": {
            "url": 'api/v1/ajax_table_main',
            "type": 'POST',
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "data": function (d) {
                d.type_select_table = $("#type_select_table").val();
                d.hotel_select_table = $("#hotel_select_table").val();
            }
        },
        "columns": [{
                "data": 'status',
                "name": 'status'
            }, {
                "data": 'sticker_number',
                "name": 'sticker_number'
            },
            {
                "data": 'name',
                "name": 'name',
                "className": "text-truncate",
            },
            {
                "data": 'dep',
                "name": 'dep'
            },
            {
                "data": 'computer_name',
                "name": 'computer_name',
                "className": "text-truncate"
            },
            {
                "data": 'ip_main',
                "name": 'ip_main'
            },
            {
                "data": 'teamviewer',
                "name": 'teamviewer'
            },
            {
                "data": 'anydesk',
                "name": 'anydesk'
            },
            {
                "data": 'phone',
                "name": 'phone'
            },
            {
                "data": 'action',
                "name": 'action',
                "orderable": false,
                "searchable": false
            },
        ],
        "columnDefs": [{
                "className": 'text-left',
                "targets": [6, 7]
            },
            {
                "className": 'text-center',
                "targets": [0, 3, 8]
            },
            {
                "className": 'text-right',
                "targets": []
            },
        ],
        "language": {
            "lengthMenu": "แสดง _MENU_ แถว",
            "search": "ค้นหา:",
            "info": "แสดง _START_ ถึง _END_ ทั้งหมด _TOTAL_ แถว",
            "infoEmpty": "แสดง 0 ถึง 0 ทั้งหมด 0 แถว",
            "infoFiltered": "(จาก ทั้งหมด _MAX_ ทั้งหมด แถว)",
            "processing": "กำลังโหลดข้อมูล...",
            "zeroRecords": "ไม่มีข้อมูล",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": "ต่อไป",
                "previous": "ย้อนกลับ"
            },
        },
        "search": {
            "regex": true
        },
    });

    List_btn_computer_number();
});

$(document).ajaxComplete(function () {
    $('[data-toggle="tooltip"]').tooltip({
        "html": true,
    });
});

var load_table_on_select = function load_table_on_select() {
    var table = $('#Table_Main').DataTable();
    table.draw();
}

var List_btn_computer_number = function List_btn_computer_number() {
    $.ajax({
        url: 'api/v1/ajax_list_btn_computer_number',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
            $(".btn_list_thezign").text(res.thezign);
            $(".btn_list_tsix5").text(res.tsix5);
            $(".btn_list_way").text(res.way);
            $(".btn_list_z2").text(res.z2);
            $(".btn_list_garden").text(res.garden);
        }
    })
}

var Open_add_computer = function Open_add_computer() {
    $('#modal_add_computer').modal('show');
}

var Open_edit_computer = function Open_edit_computer(e) {
    var Data = new FormData();
    Data.append("com_id", $(e).attr('com_id'));
    $.ajax({
        url: 'api/v1/Get_ComId',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: Data,
        success: function (result) {
            $('#modal_edit_computer').modal('show');
        }
    });
}