$(document).ready(function () {
    $('[data-toggle="datepicker"]').datepicker({
        language: 'th',
        autoClose: true,
        onSelect: function (formattedDate, date, inst) {
            $("#table_tital").html(formattedDate);
            TableDisplay.ajax.reload(null, false);
        }
    });

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
            [0, 'desc'],
            [2, 'asc']
        ],
        "aLengthMenu": [
            [10, 50, 100, -1],
            ["10", "50", "100", "ทั้งหมด"]
        ],
        "ajax": {
            "url": 'api/v1/ajax_table_main_store',
            "type": 'POST',
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, 
            "data": function (d) {
                d.select_month = $("#select_month").val();
            },
            "error": function () {
                //TableDisplay.ajax.reload(null, false);
            },
        },
        "columns": [{
                "data": 'storemanu_name',
                "name": 'storemanu_name',
            },
            {
                "data": 'buy_to_date',
                "name": 'buy_to_date'
            },
            {
                "data": 'totalmax',
                "name": 'totalmax'
            },
            {
                "data": 'use_item',
                "name": 'use_item'
            },
            {
                "data": 'lend_item',
                "name": 'lend_item'
            },
            {
                "data": 'totalsum',
                "name": 'totalsum'
            },
            {
                "data": 'action',
                "name": 'action'
            }
        ],
        "columnDefs": [{
                "className": 'text-left',
                "targets": []
            },
            {
                "className": 'text-center',
                "targets": [1, 6]
            },
            {
                "className": 'text-right',
                "targets": [2, 3, 4, 5]
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
});

var Add_store = function Add_store() {
    // Modal Show
    $('#Add_store').modal('show');
    $("body").css("padding-right", "0");
}

var Use_select_item = function Use_select_item(e) {
    // Modal Show
    $('#Use_select_item').modal('show');
    $("body").css("padding-right", "0");
    var Data = new FormData();
    Data.append('item_type', $(e).attr('itemtype'));
    $.ajax({
        url: 'api/v1/ajax_get_item_notuse',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: Data,
        success: function (callback) {
            console.log(callback);
        }
    })
}