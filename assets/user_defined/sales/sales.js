$(document).ready(function() {
    $('table.display').DataTable();
    $('table.display').addClass("table");
    $('table.display').addClass("table-bordered");
    $('table.display').addClass("table-hover");
    $('table.display').addClass("table-responsive");
    $('table.display').addClass("table-striped");
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
        (month<10 ? '0' : '') + month + '-' +
        (day<10 ? '0' : '') + day;

    $('#date-from').val(output);
    $('#date-to').val(output);
} );