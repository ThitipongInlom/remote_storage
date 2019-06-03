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
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
});

var Open_modal_add_windows = function Open_modal_add_windows() {
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_add_windows').modal('show');
    $("body").css("padding-right", "0");
}

var Open_modal_add_department = function Open_modal_add_department() {
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_add_department').modal('show');
    $("body").css("padding-right", "0");
}

var Open_modal_add_hotel = function Open_modal_add_hotel() {
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_add_hotel').modal('show');
    $("body").css("padding-right", "0");
}

var Open_modal_edit_windows = function Open_modal_edit_windows(e) {
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_edit_windows').modal('show');
    $("body").css("padding-right", "0");
    $("#Modal_edit_item_windows").val($(e).attr('old_value'));
}

var Open_modal_edit_department = function Open_modal_edit_department(e) {
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_edit_department').modal('show');
    $("body").css("padding-right", "0");
    $("#Modal_edit_item_department").val($(e).attr('old_value'));
}

var Open_modal_edit_hotel = function Open_modal_edit_hotel(e) {
    // แสดง Modal ในการเพิ่มข้อมูล
    $('#Modal_edit_hotel').modal('show');
    $("body").css("padding-right", "0");
    $("#Modal_edit_item_hotel").val($(e).attr('old_value'));
}

var Open_modal_delete = function Open_modal_delete(e) {
    // แสดง Modal ในการลบข้อมูล
    $("#Modal_delete").modal('show');
    $("body").css("padding-right", "0");
    $("#modal_delete_text").html($(e).attr('old_value'));
    $("#Modal_delete_confrime").click(function(s) {
        // Laading  Options
        var loading = Ladda.create(this);
        loading.start();
        loading.setProgress(40);
        var Data = new FormData();
        Data.append('old_id', $(e).attr('old_id'));
        Data.append('type', $(e).attr('type'));
        $.ajax({
            url: 'save_delete_item',
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
                loading.setProgress(100);
                if (res.status == 'success') {
                    Toastr["success"](res.error_text);
                    loading.remove();
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    // Text Error 
                    Toastr["error"](res.error_text);
                    loading.remove();
                }
            }
        });
    })
}

var Add_item_windows = function Add_item_windows() {
    // Laading  Options
    var loading = Ladda.create(document.querySelector('.btn-loading'));
    loading.start();
    loading.setProgress(40);
    var Data = new FormData();
    Data.append('Modal_add_item_windows', $("#Modal_add_item_windows").val());
    $.ajax({
        url: 'save_add_item_windows',
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
            loading.setProgress(100);
            console.log(callback);
            if (res.status == 'success') {
                Toastr["success"](res.error_text);
                loading.remove();
                $('#Modal_add_windows').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                // Text Error 
                Toastr["error"](res.error_text);
                loading.remove();
            }
        }
    });
}

var Add_item_department = function Add_item_department() {
    // Laading  Options
    var loading = Ladda.create(document.querySelector('.btn-loading'));
    loading.start();
    loading.setProgress(40);
    var Data = new FormData();
    Data.append('Modal_add_item_department', $("#Modal_add_item_department").val());
    $.ajax({
        url: 'save_add_item_department',
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
            loading.setProgress(100);
            console.log(callback);
            if (res.status == 'success') {
                Toastr["success"](res.error_text);
                loading.remove();
                $('#Modal_add_department').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                // Text Error 
                Toastr["error"](res.error_text);
                loading.remove();
            }
        }
    });
}