<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>
    <section class = "content">
        <div class = "row">
            <div class = "col-sm-12">
                <div class = "box box-danger">
                    <div class = "box-header with-border">
                        <h4 class = "box-title">Add Product</h4>
                    </div>
                    <div class = "box-body">
                        <?php
                            $attributes = array("class" => "form-horizontal");
                            echo form_open("admin/products/insert_product", $attributes);
                        ?>
                            <div class="modal-body" id = "form-inputs">
                                <!-- <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "category">Category</label>
                                    <div class = "col-sm-10">
                                        <select class = "form-control" id = "category" name = "prod_is_kitchen">
                                            <option value = "0">Bar</option>
                                            <option value = "1">Kitchen</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "name">Name</label>
                                    <div class = "col-sm-10">
                                        <input type = "text" class = "form-control" id = "name" name = "prod_name" placeholder = "Product Name">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "menu-group">Menu Group</label>
                                    <div class = "col-sm-10">
                                        <select class = "form-control" id = "menu-group"  name = "prod_menu_group">
                                            <?php foreach ($prod_types->result() as $row): ?>
                                                <option value = '<?=$row->prod_type_id?>'><?=$row->prod_type_name?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "status">Status</label>
                                    <div class = "col-sm-10">
                                        <select class = "form-control" id = "status" name = "prod_is_available">
                                            <option value = "1">Available</option>
                                            <option value = "0">Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "unit">Unit</label>
                                    <div class = "col-sm-10">
                                        <select class = "form-control" id = "unit" name = "prod_unit">
                                            <?php foreach ($prod_units->result() as $row): ?>
                                                <option value = '<?=$row->unit?>'><?=$row->unit?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "Price">Price</label>
                                    <div class = "col-sm-10">
                                        <input type = "number" class = "form-control" id = "price"  name = "prod_price" placeholder = "Price">
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class = "control-label col-sm-2" for = "inventory_item">Affected Inventory</label>
                                    <div class = "col-sm-4">
                                        <input type = "hidden" name = "prod_affected_inv_id[]" id = "invId-0">
                                        <input type = "text" class = "form-control autocomplete" name = "prod_affected_inv[]" 
                                        id = "inventoryItem-0" placeholder = "Inventory Name">
                                    </div>
                                    <label class = "control-label col-sm-2" for = "quantity">Quantity</label>
                                    <div class = "col-sm-2">
                                        <input type = "number" class = "form-control" id = "quantity" name = "prod_affected_qty[]">
                                    </div>
                                    <div class = "col-sm-2">
                                        <button type = "button" class = "btn btn-danger" id = "add-affected-inv">Add Field</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer pull-right">
                                <a href = "<?= base_url()?>/admin/products" class = "btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        <?=form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
