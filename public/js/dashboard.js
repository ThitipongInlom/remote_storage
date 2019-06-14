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
            [0, 'desc'],
            [2, 'asc']
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
        },
        "columns": [{
                "data": 'sticker_number',
                "name": 'sticker_number',
            },
            {
                "data": 'guest_name',
                "name": 'guest_name'
            },
            {
                "data": 'guest_dep',
                "name": 'guest_dep'
            },
            {
                "data": 'guest_hotel',
                "name": 'guest_hotel'
            },
            {
                "data": 'computer_name',
                "name": 'computer_name'
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
                "data": 'guest_phone',
                "name": 'guest_phone'
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
                "targets": [5, 6]
            },
            {
                "className": 'text-center',
                "targets": [0, 2, 7]
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

$(document).ajaxComplete(function () {
    $('[data-toggle="tooltip"]').tooltip({
        "html": true,
    });
});