$(document).ready(function () {
    $.fn.dataTable.ext.errMode = 'throw';
    $('#Table_Main').DataTable({
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
        "initComplete": function (settings, json) {
            setTimeout(function () {
                $(".overlay").fadeOut('3000', function () {});
            }, 1000);
        }
    });

    var Table_historys_com = $('#Table_historys_com').DataTable({
        "dom": "<'row'<'col-sm-1'l><'col-sm-7'><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-1'i><'col-sm-7'><'col-sm-4'p>>",
        "processing": true,
        "serverSide": true,
        "bPaginate": true,
        "responsive": true,
        "order": [
            [1, 'desc']
        ],
        "aLengthMenu": [
            [5, 10, 20, -1],
            ["5", "10", "20", "ทั้งหมด"]
        ],
        "ajax": {
            "url": "api/v1/ajax_load_item_view_history/COM001",
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
                "data": 'created_at',
                "name": 'created_at'
            },
            {
                "data": 'item_type',
                "name": 'item_type'
            },
            {
                "data": 'item_old',
                "name": 'item_old'
            },
            {
                "data": 'item_change',
                "name": 'item_change'
            },
            {
                "data": 'remark',
                "name": 'remark'
            },
            {
                "data": 'item_status',
                "name": 'item_status'
            },
            {
                "data": 'users_change',
                "name": 'users_change'
            }
        ],
        "columnDefs": [{
                "className": 'text-left',
                "targets": [2, 3, 4, 5]
            },
            {
                "className": 'text-center',
                "targets": [0, 1, 6, 7]
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
        }
    });

    $('.pill_edit').on('shown.bs.tab', function (e) {
        if (e.target.id == 'custom-tabs-edit-com-tab') {
            $("#edit_modal_setting").removeClass('modal-xl')
            $("#edit_modal_setting").addClass('modal-lg')
        }else {
            $("#edit_modal_setting").removeClass('modal-lg')
            $("#edit_modal_setting").addClass('modal-xl')
        }
    })

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
    $(".overlay").show();
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
            $("#guest_name_edit").val(result.data.name)
            $("#guest_dep_edit").val(result.data.dep)
            $("#guest_phone_edit").val(result.data.phone)
            $("#guest_hotel_edit").val(result.data.hotel)
            $("#sticker_number_edit").val(result.data.sticker_number)
            $("#computer_name_edit").val(result.data.computer_name)
            $("#ip_main_edit").val(result.data.ip_main)
            $("#ip_sub_edit").val(result.data.ip_sub)
            $("#windows_edit").val(result.data.windows)
            // เช็คถ้าไม่มีข้อมูลให้ติ้ก ปิดใช้งาน Internet
            if (result.data.internet == null) {
                $("input[name=internet_edit][value='Disable']").prop("checked", true);
            }else {
                $("input[name=internet_edit][value='" + result.data.internet + "']").prop("checked", true);
            }
            // เช็คถ้าไม่มีข้อมูลให้ติ้ก ไม่แท้
            if (result.data.license == null) {
                $("input[name=windows_license_edit][value='Not Active']").prop("checked", true);
            }else {
                $("input[name=windows_license_edit][value='" + result.data.license + "']").prop("checked", true);
            }
            $("#teamviwer_edit").val(result.data.teamviewer)
            $("#anydesk_edit").val(result.data.anydesk)
            $("#username_admin_edit").val(result.data.username_admin)
            $("#password_admin_edit").val(result.data.password_admin)
            $("#cpu_edit").val(result.data.cpu)
            $("#ram_edit").val(result.data.ram)
            $("#case_edit").val(result.data.case)
            $("#monitor_edit").val(result.data.monitor)
            $("#mouse_edit").val(result.data.mouse)
            $("#keyboard_edit").val(result.data.keyboard)
            $("#mainboard_edit").val(result.data.mainboard)
            $("#powersupply_edit").val(result.data.powersupply)
            $("#hdd_edit").val(result.data.hdd)
            $("#ssd_edit").val(result.data.ssd)

            var url_api = "api/v1/ajax_load_item_view_history/" + result.data.sticker_number;
            $('#Table_historys_com').DataTable().ajax.url(url_api).load();
            $(".overlay").fadeOut('3000', function () {});
            $('#modal_edit_computer').modal('show');
        }
    });
}
