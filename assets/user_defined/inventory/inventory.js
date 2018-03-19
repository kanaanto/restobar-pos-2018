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

    /*Bind static element to on click function and not on an element added dynamically*/
    $("#inventory_table").on('click', ".edit_clickable", function(){
        //Get Inventory ID
        var id = $(this).attr("id").split("-");
        //Set Inventory details in modal
        $('#item-id').val(id);
        $('#item-name').val($("#name-"+id).text());
        $('#item-beg').val($("#beg-"+id).text());
        $('#item-in').val($("#in-"+id).text());
        $('#item-out').val($("#out-"+id).text());
    });
} );