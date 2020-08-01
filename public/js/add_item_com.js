var Save_Add_item = function Save_Add_item() {
    var Array_id = [
        'guest_name_add',
        'guest_dep_add',
        'guest_phone_add',
        'guest_hotel_add',
        'sticker_number_add',
        'computer_name_add',
        'ip_main_add',
        'ip_sub_add',
        'windows_add',
        'teamviwer_add',
        'anydesk_add',
        'username_admin_add',
        'password_admin_add',
        'cpu_add',
        'ram_add',
        'case_add',
        'monitor_add',
        'mouse_add',
        'keyboard_add',
        'mainboard_add',
        'powersupply_add',
        'hdd_add',
        'ssd_add'
    ];
    var Data = new FormData();
    $(Array_id).each(function (index, value) {
        Data.append(value, $("#" + value).val());
    });
    Data.append("internet_add", $('input:radio[name="internet_add"]:checked').val());
    Data.append("windows_license_add", $('input:radio[name="windows_license_add"]:checked').val());
    if ($("#sticker_number_add").val() == '') {
        console.log('ใส่ข้อมูล COM')
    }else {
       $.ajax({
           url: 'api/v1/Add_ItemCom',
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
                   $('#modal_add_computer').modal('hide');
                   console.log(result.msg)
               }else {
                   console.log(result.msg)
               }
           }
       });
    }
}

var Save_edit_item = function Save_edit_item () {
    var Array_id = [
        'guest_name_edit',
        'guest_dep_edit',
        'guest_phone_edit',
        'guest_hotel_edit',
        'sticker_number_edit',
        'computer_name_edit',
        'ip_main_edit',
        'ip_sub_edit',
        'windows_edit',
        'teamviwer_edit',
        'anydesk_edit',
        'username_admin_edit',
        'password_admin_edit',
        'cpu_edit',
        'ram_edit',
        'case_edit',
        'monitor_edit',
        'mouse_edit',
        'keyboard_edit',
        'mainboard_edit',
        'powersupply_edit',
        'hdd_edit',
        'ssd_edit'
    ];
    var Data = new FormData();
    $(Array_id).each(function (index, value) {
        Data.append(value, $("#" + value).val());
    });
    Data.append("internet_edit", $('input:radio[name="internet_edit"]:checked').val());
    Data.append("windows_license_edit", $('input:radio[name="windows_license_edit"]:checked').val());
    $.ajax({
        url: 'api/v1/Update_ItemCom',
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
            $('#modal_edit_computer').modal('hide');
            $('#Table_Main').DataTable().draw();
        }
    });
}