$(document).ready(function () {
    $('[data-toggle="datepicker"]').datepicker({
        language: 'th',
        autoClose: true,
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
            }
        ],
        "columnDefs": [{
                "className": 'text-left',
                "targets": []
            },
            {
                "className": 'text-center',
                "targets": []
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
        search: {
            "regex": true
        },
    });
});