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
            "url": 'api/v1/ajax_table_main_battery',
            "type": 'POST',
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "data": function (d) {
                d.type_select_table = $("#type_select_table").val();
                d.hotel_select_table = $("#hotel_select_table").val();
            },
            "error": function (xhr, error, code) {
                $('#Table_Main').DataTable().draw();
            }
        },
        "columns": [
            {
                "data": 'status',
                "name": 'status'
            },
            {
                "data": 'battery_sticker_number',
                "name": 'battery_sticker_number'
            },
            {
                "data": 'battery_type',
                "name": 'battery_type'
            },
            {
                "data": 'battery_location',
                "name": 'battery_location'
            },
            {
                "data": 'battery_start',
                "name": 'battery_start'
            },
            {
                "data": 'battery_end',
                "name": 'battery_end'
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
                "targets": []
            },
            {
                "className": 'text-center',
                "targets": [0, 1, 2, 4 ,5, 6]
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
        },
    });
});

var load_table_on_select = function load_table_on_select () {
    var table = $('#Table_Main').DataTable().draw();
}

var change_Type = function change_Type (e) {
    if ($(e).val() == 'COM') {
        $("#location_add").attr('disabled', 'disabled')
    }else {
        $("#location_add").removeAttr('disabled')
    }
}

var change_Type_edit = function change_Type_edit(e) {
    if ($(e).val() == 'COM') {
        $("#location_edit").attr('disabled', 'disabled')
    } else {
        $("#location_edit").removeAttr('disabled')
    }
}

var Save_Add_item = function Save_Add_item() {
    var Array_id = [
        'sticker_number_add',
        'type_add',
        'location_add',
        'hotel_add',
        'start_add',
    ];
    var Data = new FormData();
    $(Array_id).each(function (index, value) {
        Data.append(value, $("#" + value).val());
    });
    if ($("#sticker_number_add").val() == '') {
        console.log('ใส่ข้อมูล COM')
    } else {
        $.ajax({
            url: 'api/v1/Add_ItemBattery',
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
                if (result.ststus == 200) {
                    $('#modal_add_battery').modal('hide');
                    $('#Table_Main').DataTable().draw();
                    console.log(result.msg)
                } else {
                    console.log(result.msg)
                }
            }
        });
    }
}

var Open_add_battery = function Open_add_battery () {
    $("#modal_add_battery").modal('show');
    $("#start_add").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD/MM/YYYY',
            applyLabel: "ยืนยัน",
            cancelLabel: "ยกเลิก",
            fromLabel: "จาก",
            toLabel: "ไปยัง",
            customRangeLabel: "กำหนดเอง",
            daysOfWeek: [
                "อา.",
                "จ.",
                "อ.",
                "พ.",
                "พฤ.",
                "ศ.",
                "ส."
            ],
            monthNames: [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม"
            ],
        },
    }, function (start, end, label) {
        console.log(start, end)
    });
}

var Open_edit_battery = function Open_edit_battery(e) {
    $("#modal_edit_battery").modal('show');
    var Data = new FormData();
    Data.append("battery_id", $(e).attr('battery_id'));
    $.ajax({
        url: 'api/v1/Get_BatteryId',
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
            $("#btn_save_edit_battery").attr('battery_id', result.data.battery_id)
            $("#sticker_number_edit").val(result.data.battery_sticker_number)
            $("#type_edit").val(result.data.battery_type)
            $("#location_edit").val(result.data.battery_location)
            $("#hotel_edit").val(result.data.battery_hotel)
            if (result.data.battery_type == 'COM') {
                $("#location_edit").attr('disabled', 'disabled');
            }else {
                $("#location_edit").removeAttr('disabled')
            }
        }
    });
}

var Save_edit_battery = function Save_edit_battery(e) {
    var Array_id = [
        'sticker_number_edit',
        'type_edit',
        'location_edit',
        'hotel_edit',
    ];
    var Data = new FormData();
    $(Array_id).each(function (index, value) {
        Data.append(value, $("#" + value).val());
    });
    Data.append("battery_id", $(e).attr('battery_id'));
    $.ajax({
        url: 'api/v1/Update_Battery',
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
            $('#modal_edit_battery').modal('hide');
            $('#Table_Main').DataTable().draw();
        }
    });
}

var Open_change_battery = function Open_change_battery (e) {
    $("#modal_change_battery").modal('show');
    $("#btn_save_change_battery").attr('battery_id', $(e).attr('battery_id'))
    $("#date_start_change").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD/MM/YYYY',
            applyLabel: "ยืนยัน",
            cancelLabel: "ยกเลิก",
            fromLabel: "จาก",
            toLabel: "ไปยัง",
            customRangeLabel: "กำหนดเอง",
            daysOfWeek: [
                "อา.",
                "จ.",
                "อ.",
                "พ.",
                "พฤ.",
                "ศ.",
                "ส."
            ],
            monthNames: [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม"
            ],
        },
    }, function (start, end, label) {
        console.log(start, end)
    });
}

var Save_change_battery = function Save_change_battery (e) {
    var Array_id = [
        'date_start_change',
    ];
    var Data = new FormData();
    $(Array_id).each(function (index, value) {
        Data.append(value, $("#" + value).val());
    });
    Data.append("battery_id", $(e).attr('battery_id'));
    $.ajax({
        url: 'api/v1/Save_change_battery',
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
            $('#modal_change_battery').modal('hide');
            $('#Table_Main').DataTable().draw();
        }
    });
}