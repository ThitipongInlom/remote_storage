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

var Save_Add_Item = function Save_Add_Item() {
    var Data = new FormData();
    Data.append('sticker_number', $("#sticker_number").val());
    Data.append('computer_name', $("#computer_name").val());
    Data.append('ip_main', $("#ip_main").val());
    Data.append('ip_sub', $("#ip_sub").val());
    Data.append('windows', $("#windows").val());
    Data.append('internet', $('input:radio[name="internet"]:checked').val());
    Data.append('guest_name', $("#guest_name").val());
    Data.append('guest_dep', $("#guest_dep").val());
    Data.append('guest_phone', $("#guest_phone").val());
    Data.append('guest_hotel', $("#guest_hotel").val());
    Data.append('teamviwer', $("#teamviwer").val());
    Data.append('anydesk', $("#anydesk").val());
    Data.append('cpu', $("#cpu").val());
    Data.append('ram', $("#ram").val());
    Data.append('case', $("#case").val());
    Data.append('monitor', $("#monitor").val());
    Data.append('mouse', $("#mouse").val());
    Data.append('keyboard', $("#keyboard").val());
    Data.append('mainboard', $("#mainboard").val());
    Data.append('powersupply', $("#powersupply").val());
    Data.append('hdd', $("#hdd").val());
    Data.append('ssd', $("#ssd").val());
    Data.append('ups', $("#ups").val());
        // Laading  Options
        var loading = Ladda.create(document.querySelector('.btn-loading'));
        loading.start();
        loading.setProgress(5);
        if ($("#sticker_number").val() != '') {
        loading.setProgress(40);
        $.ajax({
            url: 'additem_save',
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
                console.log(callback);
                if (res.status == 'success') {
                    Toastr["success"](res.error_text);
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }else {
                    // Text Error 
                    Toastr["error"](res.error_text);
                }
            }
        }).always(
            function () {
                loading.setProgress(60);
                setTimeout(function () {
                    loading.remove();
                }, 500);
            }
        );
        }else {
            Toastr["error"]("กรุณากรอก Sticker Number");
            loading.remove();
            $("#sticker_number").focus();
        }

}