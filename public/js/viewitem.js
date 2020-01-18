$(document).ready(function () {
    var id_computer = $("#id_computer").val();
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
            [1, 'desc']
        ],
        "aLengthMenu": [
            [5, 10, 20, -1],
            ["5", "10", "20", "ทั้งหมด"]
        ],
        "ajax": {
            "url": "../api/v1/ajax_load_item_view_history/" + id_computer,
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
        },
        search: {
            "regex": true
        },
    });
    // Toastr Options
    Toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
});

$(document).ajaxComplete(function () {
    $('[data-toggle="tooltip"]').tooltip({
        "html": true,
    });
});

var Add_item_data_form_view = function Add_item_data_form_view(e) {
    // รีเซ็ต ข้อมูลจาก Input 
    $("#Modal_add_item_input").val('');
    // ปิดการแสดง ในการเพิ่มข้อมูล
    $("#Modal_add_input").hide();
    $("#Modal_add_select_dep").hide();
    $("#Modal_add_select_hotel").hide();
    $("#Modal_add_select_windows").hide();
    $("#Modal_add_radio_internet").hide();
    $("#Modal_add_radio_windows_license").hide();
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_add_item').modal('show');
    $("body").css("padding-right", "0");
    // แสดงข้อมูล ส่วนหัว ในหัวข้อ
    $(".Modal_add_item_name").html($(e).attr('newname'));
    // แสดง ตามข้อมูลแต่ล่ะ ประเภท
    switch ($(e).attr('datashow')) {
        case 'input':
            $("#Modal_add_input").show();
            break;
        case 'select_dep':
            $("#Modal_add_select_dep").show();
            break;
        case 'select_hotel':
            $("#Modal_add_select_hotel").show();
            break;
        case 'select_windows':
            $("#Modal_add_select_windows").show();
            break;
        case 'radio_internet':
            $("#Modal_add_radio_internet").show();
        break;
        case 'windows_license':
            $("#Modal_add_radio_windows_license").show();
        break;
    }
    // ถ้ามีการ Save ข้อมูล 
    $("#Add_item_data_form_view_save").attr('datashow', $(e).attr('datashow'));
    $("#Add_item_data_form_view_save").attr('newname', $(e).attr('newname'));
}

var Add_item_data_form_view_save = function Add_item_data_form_view_save(e) {
    var loading = Ladda.create(document.querySelector('.btn-loading'));
    loading.start();
    loading.setProgress(5);
    // แยกประเภท การส่งข้อมูล
    if ($(e).attr('datashow') == 'input') {
        var Value_add = $("#Modal_add_item_input").val();
    } else if ($(e).attr('datashow') == 'select_dep') {
        var Value_add = $("#Modal_add_item_select_dep").val();
    } else if ($(e).attr('datashow') == 'select_hotel') {
        var Value_add = $("#Modal_add_item_select_hotel").val();
    } else if ($(e).attr('datashow') == 'select_windows') {
        var Value_add = $("#Modal_add_item_select_windows").val();
    } else if ($(e).attr('datashow') == 'radio_internet') {
        var Value_add = $('input:radio[name="internet_add"]:checked').val();
    } else if ($(e).attr('datashow') == 'windows_license') {
        var Value_add = $('input:radio[name="windows_license_add"]:checked').val();
    }
    if (Value_add == '') {
        Toastr["error"]("กรุณากรอก ข้อมูลก่อนบันทึก");
        loading.remove();
    }else{
        Toastr["success"]("กรุณารอซักครู่ กำลังบันทึก");
        var Data = new FormData();
        Data.append('Value_add', Value_add);
        Data.append('Type_add', $(e).attr('newname'));
        Data.append('ID_computer', $("#id_computer").val());
        Data.append('Item_ststus', 'เพิ่มข้อมูลใหม่');
        $.ajax({
            url: '../update_item_view_save',
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
                var res = jQuery.parseJSON(callback);
                if (res.status == 'success') {
                    Toastr["success"](res.error_text);
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            }
        }).always(
            function () {
                loading.setProgress(100);
                setTimeout(function () {
                    loading.remove();
                }, 500);
            }
        );
    }
}

var Edit_item_data_form_view = function Edit_item_data_form_view(e) {
    // รีเซ็ต ข้อมูลจาก Input 
    $("#Modal_edit_item_input").val('');
    // ปิดการแสดง ในการเพิ่มข้อมูล
    $("#Modal_edit_input").hide();
    $("#Modal_edit_select_dep").hide();
    $("#Modal_edit_select_hotel").hide();
    $("#Modal_edit_select_windows").hide();
    $("#Modal_edit_radio_internet").hide();
    $("#Modal_edit_radio_windows_license").hide();
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_edit_item').modal('show');
    $("body").css("padding-right", "0");
    // แสดงข้อมูล ส่วนหัว ในหัวข้อ
    $(".Modal_edit_item_name").html($(e).attr('newname'));
    // แสดง ตามข้อมูลแต่ล่ะ ประเภท
    switch ($(e).attr('datashow')) {
        case 'input':
            $("#Modal_edit_input").show();
            //$("#Modal_edit_item_input").val($(e).attr('old_value'));
            break;
        case 'select_dep':
            $("#Modal_edit_select_dep").show();
            $("#Modal_edit_item_select_dep").val($(e).attr('old_value'));
            break;
        case 'select_hotel':
            $("#Modal_edit_select_hotel").show();
            $("#Modal_edit_item_select_hotel").val($(e).attr('old_value'));
            break;
        case 'select_windows':
            $("#Modal_edit_select_windows").show();
            $("#Modal_edit_item_select_windows").val($(e).attr('old_value'));
            break;
        case 'radio_internet':
            $("#Modal_edit_radio_internet").show();
            if ($(e).attr('old_value') == 'Enable') {
                $('#internet_edit_1').attr('checked', 'checked');
            }else{
                $('#internet_edit_2').attr('checked', 'checked');
            }
            break;
        case 'windows_license':
            $("#Modal_edit_radio_windows_license").show();
            if ($(e).attr('old_value') == 'Active') {
                $('#windows_license_edit_1').attr('checked', 'checked');
            } else {
                $('#windows_license_edit_2').attr('checked', 'checked');
            }
        break;
    }
    console.log(e);
    // ถ้ามีการ Save ข้อมูล 
    $("#Edit_item_data_form_view_save").attr('datashow', $(e).attr('datashow'));
    $("#Edit_item_data_form_view_save").attr('newname', $(e).attr('newname'));
}

var Edit_item_data_form_view_save = function Edit_item_data_form_view_save(e) {
    var loading = Ladda.create(document.querySelector('.btn-loading'));
    loading.start();
    loading.setProgress(5);
    // แยกประเภท การส่งข้อมูล
    if ($(e).attr('datashow') == 'input') {
        var Value_add = $("#Modal_edit_item_input").val();
    } else if ($(e).attr('datashow') == 'select_dep') {
        var Value_add = $("#Modal_edit_item_select_dep").val();
    } else if ($(e).attr('datashow') == 'select_hotel') {
        var Value_add = $("#Modal_edit_item_select_hotel").val();
    } else if ($(e).attr('datashow') == 'select_windows') {
        var Value_add = $("#Modal_edit_item_select_windows").val();
    } else if ($(e).attr('datashow') == 'radio_internet') {
        var Value_add = $('input:radio[name="internet_edit"]:checked').val();
    } else if ($(e).attr('datashow') == 'windows_license') {
        var Value_add = $('input:radio[name="windows_license_edit"]:checked').val();
    }
    if (Value_add == '') {
        Toastr["error"]("กรุณากรอก ข้อมูลก่อนบันทึก");
        loading.remove();
    } else {
        Toastr["success"]("กรุณารอซักครู่ กำลังบันทึก");
        var Data = new FormData();
        Data.append('Value_add', Value_add);
        Data.append('Type_add', $(e).attr('newname'));
        Data.append('ID_computer', $("#id_computer").val());
        Data.append('Remark', $("#Modal_edit_item_remark").val());
        Data.append('Item_ststus', 'เปลี่ยนข้อมูล');
        $.ajax({
            url: '../update_item_view_save',
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
                var res = jQuery.parseJSON(callback);
                if (res.status == 'success') {
                    Toastr["success"](res.error_text);
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
            }
        }).always(
            function () {
                loading.setProgress(100);
                setTimeout(function () {
                    loading.remove();
                }, 500);
            }
        );
    }
}

var Update_status_com = function Update_status_com(e) {
    var Data = new FormData();
    Data.append('status', $(e).attr('update'));
    Data.append('ID_computer', $("#id_computer").val());
    $.ajax({
        url: '../save_update_status_com',
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
            var res = jQuery.parseJSON(callback);
            if (res.status == 'success') {
                Toastr["success"](res.error_text);
                setTimeout(function () {
                    location.reload();
                }, 1000);
            }
        }
    });
}

