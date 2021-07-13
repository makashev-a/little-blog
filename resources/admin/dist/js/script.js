$(document).ready(function () {
    $("#example1").DataTable({
        'language': {
            'paginate': {
                'next': 'Следующая',
                'previous': 'Предыдущая'
            },
            'search': 'Поиск:',
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Показано с _START_ по _END_ записи из _TOTAL_ записей",
            "infoEmpty": "Показано с 0 по 0 записи из 0 записей",
            "emptyTable": "Нет доступных данных в таблице",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "zeroRecords": "Не найдено совпадающих записей",
        }
    });
    //Initialize Select2 Elements
    $(".select2").select2();
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
});
