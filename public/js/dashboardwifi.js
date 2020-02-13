$(document).ready(function () {
    // Set Datepicker
    $('#datepicker_data_wifi').daterangepicker();

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
            [1, 'asc'],
        ],
        "aLengthMenu": [
            [10, 50, 100, -1],
            ["10", "50", "100", "ทั้งหมด"]
        ],
        "ajax": {
            "url": 'api/v1/ajax_table_main_wifi',
            "type": 'POST',
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        "columns": [{
            "data": 'wifi_group',
            "name": 'wifi_group'
        },{
            "data": 'wifi_username',
            "name": 'wifi_username'
        },{
            "data": 'wifi_password',
            "name": 'wifi_password'
        },{
            "data": 'wifi_date_start',
            "name": 'wifi_date_start'
        },{
            "data": 'wifi_date_end',
            "name": 'wifi_date_end'
        },{
            "data": 'wifi_status',
            "name": 'wifi_status'
        }
        ],
        "columnDefs": [{
                "className": 'text-left',
                "targets": []
            },
            {
                "className": 'text-center',
                "targets": [5]
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

var Open_add_data_modal = function Open_add_data_modal () {
    $("#Add_data_modal").modal('show');

    $('#Add_data_modal').on('hidden.bs.modal', function (e) {
        $("#group_name").val('').removeClass('is-valid').removeClass('is-invalid');
        $("#username").val('').removeClass('is-valid').removeClass('is-invalid');
        $("#password").val('').removeClass('is-valid').removeClass('is-invalid');
    });
}

var Save_add_data_modal = function Save_add_data_modal () {
    var Toastr = Set_Toastr();
    var Array_id = ['group_name',
                    'datepicker_data_wifi',
                    'username',
                    'password'
        ];
    const data = {
        group_name: $("#group_name").val(),
        datepicker_start: $("#datepicker_data_wifi").data('daterangepicker').startDate.format('YYYY-MM-DD'),
        datepicker_end: $("#datepicker_data_wifi").data('daterangepicker').endDate.format('YYYY-MM-DD'),
        username: $("#username").val(),
        password: $("#password").val()
    }
    var Check_rows = Check_null_input(Array_id);
    if (Check_rows == true) {
        axios({
            method: 'post',
            url: 'api/v1/Save_add_data_modal',
            data: data
        })
        .then(function (response) {
            // modal hide
            $("#Add_data_modal").modal('hide');
            // Table Refresh
            $('#Table_Main').DataTable().draw();
            // Alert Status
            this.Toastr[response.data.tag](response.data.text);
        })
        .catch(function (error) {
            console.log(error);
        });
    }else {

    }
}

var Check_null_input = function Check_null_input(Array_id) {
    var success_rows = 0;
    var error_rows = 0;

    $(Array_id).each(function (index, value) {
        function Check_null_Input() {
            if ($("#" + value).val() == '') {
                $("#" + value).removeClass('is-valid');
                $("#" + value).addClass('is-invalid');
                $("#" + value).focus();
                return false;
            } else {
                $("#" + value).removeClass('is-invalid');
                $("#" + value).addClass('is-valid');
                return true;
            }
        }
        var Check_null_Input = Check_null_Input() == true ? success_rows++ : error_rows++;
    });
    var result = success_rows == Array_id.length ? true : false;
    return result;
}


var Set_Toastr = function Set_Toastr () {
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
}