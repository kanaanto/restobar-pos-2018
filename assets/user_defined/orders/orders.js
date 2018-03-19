//$(document).ready(function() {
    $(".move_table_modal_btn").on("click", function(e){
        var table_id = $(this).prev().text();
        $(".move_table_hdr").text(table_id);
        //console.log(table_id);
    });

    $(".add_order_modal_btn").on("click", function(e){
        var table_id = $(this).parent().siblings().attr("id");
        $("#add_order_modal_title span").text(table_id);
    });

    //$("#add_order_prod_type").change(function(){
    $(".add_edit_order_prod_type").change(function(){
        $("#add_order_product").val($("#add_order_product option:first").val());
        $("#add_order_product > option").not(':first').hide();
        var prod_type_id = $("#add_order_prod_type").val();
        if(prod_type_id == '-1'){
            $("#add_order_product > option").show();
            clearOrderValues();
        } else {
            $("#add_order_product > option").not(':first').each(function (index, item) {
                var class_name = $(item).attr('class');
                var class_name_length = class_name.length; 
                if(class_name.substring(10, class_name_length) == prod_type_id) {
                    $(item).show();
                }
                
            });    
        } 
        updateOrderAmount();
    });

    //$("#add_order_product").change(function(){
    $(".add_edit_order_product").change(function(){
        updateOrderAmount();        
    });

    //$("#add_order_qty").change(function(){
    $(".add_edit_order_qty").change(function(){
        updateOrderAmount();
    });


    function updateOrderAmount(){
        //add
        if($("#add_order_product").val() != -1){ 
            var prod_name = $("#add_order_product option:selected").text().split("@")[1].trim();
            var qty = $("#add_order_qty").val();
            var price = (parseFloat(prod_name) * qty).toFixed(2);
            $("#add_order_amt").val(price);
            $("#add_error_msg").hide();
        } else {
            $("#add_error_msg").show();
        }
        //edit
        if($("#edit_order_product").val() != -1){ 
            var prod_name = $("#edit_order_product option:selected").text().split("@")[1].trim();
            var qty = $("#edit_order_qty").val();
            var price = (parseFloat(prod_name) * qty).toFixed(2);
            $("#edit_order_amt").val(price);
            $("#edit_error_msg").hide();
        } else {
            $("#edit_error_msg").show();
        }

    }
    function clearOrderValues(){ 
        $(".add_edit_order_product > option").show();
        $(".add_edit_order_prod_type").val($(".add_edit_order_prod_type option:first").val());
        $(".add_edit_order_product").val($(".add_edit_order_product option:first").val());
        $(".add_edit_order_qty").val(1);
        $(".add_edit_order_amt").val(parseFloat(0.00));
        updateOrderAmount();
    }

    function emptyOrderList(){
        $(".add_order_table > tbody").empty();
        clearOrderValues();
    }

    function validateOrderValues(){
//        var order_type_id = $("#add_order_prod_type").val();
        if($("#add_error_msg").is(':hidden')){
            var order_product_id = $("#add_order_product").val();
            var order_product_name_price = $("#add_order_product option:selected").text();
            var order_product_name = order_product_name_price.split("@")[0].trim();
            var unit_price = order_product_name_price.split("@")[1].trim(); 
            var order_qty = $("#add_order_qty").val();
            var order_amt = $("#add_order_amt").val();
            var order_status = $("input[name='add_pmt_status']:checked").val();
            var to_save = (order_product_id != '-1') ? true : false;
            
            if(to_save){
                // save
                addOrderToTable(order_qty, order_product_id, order_product_name, unit_price, order_amt, order_status);
            } else {
                $("#add_error_msg").show();
            }
        }
    }

    function addOrderToTable(qty, item_id, item, unit_price, amt, status){
        var pay_opt = "";
        if(status == "oth" || status == "sd"){
            pay_opt = "warning";
            status = status.toUpperCase();
        } else if(status == "paid"){
            pay_opt = "success";
            status = status.charAt(0).toUpperCase() + status.slice(1);
        } else if(status == "unpaid"){
            pay_opt = "danger";
            status = status.charAt(0).toUpperCase() + status.slice(1);
        }
        var markup = "<tr><td>" + qty + "</td>" +
                    "<td id='" + item_id + "''>" + item + "</td>" +
                    "<td>" + unit_price + "</td>" + 
                    "<td>" + amt +"</td>" + 
                    "<td><span class='label label-" + pay_opt + "'>" + status + "</span></td>" + 
                    "<td>" +
                        "<a href='#' class='delete_row delete_order_row'>&nbsp;&nbsp;<span class='fa fa-trash'></span></a>" +
                    "</td></tr>";
        $(".add_order_table tbody").append(markup);
        clearOrderValues();
    };

    $('.add_order_table').on('click','tr a.delete_row',function(e){       
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    $('#submit_order_to_db').on('click',function(e) {
        e.preventDefault();

        var myRows = [];
        var $headers = $(".order_tab_col");
        var $rows = $(".add_order_table tbody tr").each(function(index) {
            $cells = $(this).find("td");
            myRows[index] = {};

            $cells.each(function(cellIndex) {
                var headerName = $($headers[cellIndex]).html().toLowerCase();
                if(headerName == 'unit price'){
                    headerName = 'unit_price';
                }
                if(headerName != 'action'){
                    
                    if(headerName == 'status'){
                        myRows[index][headerName] = $(this).find("span").html().toLowerCase();
                    } else if(headerName == 'item'){
                        myRows[index][headerName] = $(this).attr("id");
                    } else {
                        myRows[index][headerName] = $(this).html();
                    }
                }
                
            });    
        });
        if(myRows.length > 0){

            var myObj = {};
            myObj.orders = myRows;
            //console.log(JSON.stringify(myObj));
            var table_name = $("#add_order_modal_title span").html();

            $.ajax({
                url         : '/pepperstrings/admin/orders/add_orders_to_db/',
                type        : 'post',
                data        :{ orders     : JSON.stringify(myObj),
                               table_id   : table_name
                    },
                success: function(response){
                    //console.log("yes1 " + JSON.stringify(response));
                },
                error: function(err,j,k){
                    //alert(err.responseText);
                    console.log(err.responseText);
                }
            });
        } 

        $('#add_order_modal').modal('toggle');
        clearOrderValues();
        location.reload(); 
        //return false;

    });
    $(".delete_order_modal_btn").on("click", function(e){
        var bid = this.id; // button ID 
        var trid = $(this).closest('tr').attr('id'); // table row ID
 
        $(".del_order_id").text(trid);
        $("#del_order_id").text(trid);
    });

    $("#delete_order_from_db").on('click',function(e) {
        var order_id = $("#del_order_id").html();

        $.ajax({
            url         : '/pepperstrings/admin/orders/delete_order_from_db/',
            type        : 'post',
            data        :{ order_id   : order_id
                },
            success: function(response){
                //console.log("yes1 " + JSON.stringify(response));
            },
            error: function(err){
                console.log("Error: " + JSON.stringify(err));
            }
        });
        location.reload(); 
        //return false;
    });

    $(".edit_order_modal_btn").on("click", function(e){
        clearOrderValues();
        $("#edit_error_msg").hide();
        var bid = this.id; // button ID 
        var trid = $(this).closest('tr').attr('id');

        var qty = $("#" + trid + " .ord_qty").html();
        var prod_id = $("#" + trid + " .ord_prod_name").find("span").html();
        var total_price = $("#" + trid + " .ord_total_price").html();
        var status = $("#" + trid + " .ord_status span").html().toLowerCase();
        
        $("#edit_order_qty").val(qty);
        $("#edit_order_product").val(prod_id);
        $("#edit_order_amt").val(total_price);
        $("input[name=edit_pmt_status][value='"+ status + "']").prop("checked",true);
        $("#edit_order_id").text(trid);
    });

    $("#submit_edit_order_to_db").on('click',function(e) {
        if($("#edit_error_msg").is(':hidden')){
            var order_product_id = $("#edit_order_product").val();
            var order_product_name_price = $("#edit_order_product option:selected").text();
            //var order_product_name = order_product_name_price.split(",")[0].trim();
            //var unit_price = order_product_name_price.split(",")[1].trim(); 
            var order_qty = $("#edit_order_qty").val();
            var order_amt = $("#edit_order_amt").val();
            var order_status = $("input[name='edit_pmt_status']:checked").val();
            var to_save = true;//(order_product_id != '-1') ? true : false;
            var order_id = $("#edit_order_id").html();

            if(to_save){
                // console.log("order_id " + order_id);
                // console.log("product_id " + order_product_id);
                // console.log("qty " + order_qty);
                // console.log("status " + order_status);
                $.ajax({
                    url         : '/pepperstrings/admin/orders/edit_order_in_db/',
                    type        : 'post',
                    data        :{ 
                        order_id   : order_id,
                        product_id : order_product_id,
                        qty : order_qty,
                        status : order_status
                        },
                    success: function(response){
                        console.log("yes1 " + JSON.stringify(response));
                    },
                    error: function(err){
                        console.log("Error: " + JSON.stringify(err));
                    }
                });
                
            } else {
                $("#edit_error_msg").show();
            }
        }
        
        location.reload(); 
    });

    $(".bill_out_modal_btn").on('click',function(e) {
        var table = $(this).parent().siblings();
        $("#bill_out_modal_title span").text(table.attr("id"));

        var row = jQuery(table).closest('tr');
        var columns = $row.find('td');
        $.each($columns, function(i, item) {
            //values = values + 'td' + (i + 1) + ':' + item.innerHTML + '<br/>';

        });
    });

    
