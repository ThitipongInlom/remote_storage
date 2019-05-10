$(document).ready(function () {
    $('[data-toggle="datepicker"]').datepicker({
        language: 'th',
        dateFormat: 'dd/mm/yyyy',
        autoClose: true,
    });
    // ถ้ามีการ Enter ใน Input นี้ให้ส่งค่า
    $("#email").keyup(function (event) {
        if (event.keyCode === 13) {
            fun_Save_register();
        }
    });
    // ถ้ามีการ คลิ้ก ปุ่มนี้ให้ส่งค่า
    $("#fun_Save_register").click(function () {
        fun_Save_register();
    });
});

var fun_Save_register = function fun_Save_register() {
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
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    // Laading  Options
    var loading = Ladda.create(document.querySelector('.btn-loading'));
    loading.start();
    loading.setProgress(5);
    var Check_rows = Check_null_input();
    // ถ้า Check_rows == true ให้ส่งค่าได้
    if (Check_rows == true) {
    loading.setProgress(50);
    var Data = new FormData();
    Data.append('username', $("#username").val());
    Data.append('password', $("#password").val());
    Data.append('email', $("#email").val());
        $.ajax({
            url: 'register_save',
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
                    // Turn Login
                    Toastr["success"](res.error_text);
                    setTimeout(function () {
                        window.location.href = res.path + '/';
                    }, 5000);
                }else{
                    // Text Error 
                    Toastr["error"](res.error_text);
                }
            }
        }).always(
            function () {
                loading.setProgress(100);
                setTimeout(function () {
                    loading.remove();
                },500);
            }
        );
    }else{
    Toastr["error"]("กรุณากรอกข้อมูลให้ครบ ทุกช่อง");
    loading.remove();
    }
}

var Check_null_input = function Check_null_input() {
    function Check_null_username() {
        if ($("#username").val() == '') {
            $("#username").removeClass('is-valid');
            $("#username").addClass('is-invalid');
            return false;
        } else {
            $("#username").removeClass('is-invalid');
            $("#username").addClass('is-valid');
            return true;
        }
    }
    function Check_null_password() {
        if ($("#password").val() == '') {
            $("#password").removeClass('is-valid');
            $("#password").addClass('is-invalid');
            return false;
        } else {
            $("#password").removeClass('is-invalid');
            $("#password").addClass('is-valid');
            return true;
        }
    }
    function Check_null_email() {
        if ($("#email").val() == '') {
            $("#email").removeClass('is-valid');
            $("#email").addClass('is-invalid');
            return false;
        } else {
            $("#email").removeClass('is-invalid');
            $("#email").addClass('is-valid');
            return true;
        }
    }
    var success_rows = 0;
    var error_rows   = 0;
    var Check_null_username = Check_null_username() == true ? success_rows++ : error_rows++;
    var Check_null_password = Check_null_password() == true ? success_rows++ : error_rows++;
    var Check_null_email = Check_null_email() == true ? success_rows++ : error_rows++;
    var result = success_rows == 3 ? true:false;
    return result;
}