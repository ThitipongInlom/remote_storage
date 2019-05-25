$(document).ready(function () {
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
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
});

var Add_item_data_form_view = function Add_item_data_form_view(e) {
    // รีเซ็ต ข้อมูลจาก Input 
    $("#Modal_add_item_input").val('');
    // ปิดการแสดง ในการเพิ่มข้อมูล
    $("#Modal_add_input").hide();
    $("#Modal_add_select").hide();
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
        case 'select':
            $("#Modal_add_select").show();
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
    }else if ($(e).attr('datashow') == 'select') {
        var Value_add = $("#Modal_add_item_select").val();
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
                    }, 3000);
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
    $("#Modal_edit_select").hide();
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_edit_item').modal('show');
    $("body").css("padding-right", "0");
    // แสดงข้อมูล ส่วนหัว ในหัวข้อ
    $(".Modal_edit_item_name").html($(e).attr('newname'));
    // แสดง ตามข้อมูลแต่ล่ะ ประเภท
    switch ($(e).attr('datashow')) {
        case 'input':
            $("#Modal_edit_input").show();
            $("#Modal_edit_item_input").val($(e).attr('old_value'));
            break;
        case 'select':
            $("#Modal_edit_select").show();
            $("#Modal_edit_item_select").val($(e).attr('old_value'));
            break;
    }
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
    } else if ($(e).attr('datashow') == 'select') {
        var Value_add = $("#Modal_edit_item_select").val();
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
                    }, 3000);
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

