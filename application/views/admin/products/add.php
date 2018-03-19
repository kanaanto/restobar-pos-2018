<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box box-solid box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Product</h3>
                                </div>
                                <div class="box-body">
                                    <form class = "form-horizontal">
                                        <div class = "form-group">
                                            <label class = "control-label col-sm-2" for = "category">Category</label>
                                            <div class = "col-sm-10">
                                                <select class = "form-control" id = "category">
                                                    <option value = "bar">Bar</option>
                                                    <option value = "kitchen">Kitchen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label col-sm-2" for = "name">Name</label>
                                            <div class = "col-sm-10">
                                                <input type = "text" class = "form-control" id = "name" placeholder = "Product Name">
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label col-sm-2" for = "menu-group">Menu Group</label>
                                            <div class = "col-sm-10">
                                                <select class = "form-control" id = "menu-group">
                                                    <<?php foreach ($prod_types->result() as $row): ?>
                                                        <option value = '<?=$row->prod_type_id?>'><?=$row->prod_type_name?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label col-sm-2" for = "status">Status</label>
                                            <div class = "col-sm-10">
                                                <select class = "form-control" id = "status">
                                                    <option value = "first-option">Available</option>
                                                    <option value = "second-option">Unavailable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label col-sm-2" for = "unit">Unit</label>
                                            <div class = "col-sm-10">
                                                <select class = "form-control" id = "unit">
                                                    <<?php foreach ($prod_unit->result() as $row): ?>
                                                        <option value = '<?=$row->unit?>'><?=$row->unit?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <label class = "control-label col-sm-2" for = "inventory_item">Affected Inventory</label>
                                            <div class = "col-sm-4">
                                                <input type = "text" class = "form-control autocomplete" id = "inventory_item" placeholder = "Product Name">
                                                
                                            </div>
                                            <label class = "control-label col-sm-2" for = "quantity">Quantity</label>
                                            <div class = "col-sm-4">
                                                <input type = "number" class = "form-control" id = "quantity" placeholder = "Quantity">
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <div class = "col-sm-offset-2 col-sm-10">
                                                <div class = "btn-group">
                                                    <?php echo anchor('admin/products', lang('actions_cancel'), array('class' => 'btn btn-primary')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
