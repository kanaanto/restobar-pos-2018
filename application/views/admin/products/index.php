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
                <!--Box-->
                <div class = "box box-danger">
                    <div class = "box-header with-border">
                        <a href = "products/add_product" class = "btn btn-large btn-success">
                            <i class = "fa fa-plus"></i> Add Product
                        </a>
                    </div>
                    <div class = "box-body">
                        <!--Nav tabs-->
                        <ul class = "nav nav-tabs" role = "tablist">
                            <li role = "presentation" class = "active">
                                <a href = "#bar-table" aria-controls = "bar-table" role = "tab" data-toggle = "tab">Bar</a>
                            </li>
                            <li role = "presentation">
                                <a href = "#kitchen-table" aria-controls = "kitchen-table" role = "tab" data-toggle = "tab">Kitchen</a>
                            </li>
                        </ul>
                        <!--Tab panes-->
                        <div class = "tab-content">
                            <!--Bar table-->
                            <div role = "tabpanel" class = "tab-pane fade in active" id = "bar-table">
                                <br>
                                <div class ="container">
                                    <div class = "row">
                                        <div class = "col-sm-11">   
                                            <table class = "display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Menu Group</th>
                                                        <th>Unit</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th>Inventory Items</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($products_list_bar->result() as $row) { ?>
                                                        <tr>
                                                            <td><?=$row->prod_name?></td>
                                                            <td><?=$row->prod_type_name?></td>
                                                            <td><?=$row->unit?></td>
                                                            <td><?=$row->price?></td>
                                                            <?php if($row->is_available == 1): ?>
                                                                <td><span class = "label label-success">Available</span></td>
                                                            <?php else: ?>
                                                                <td><span class = "label label-danger">Unavailable</span></td>
                                                            <?php endif; ?>
                                                            <td><?=$row->inv_name_qty?></td>
                                                            <td>
                                                                <a href = "products/edit_product?prod_id=<?=$row->product_id?>">
                                                                    <span class = "fa fa-edit"></span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Menu Group</th>
                                                        <th>Unit</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th>Inventory Items</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Kitchen table-->
                            <div role = "tabpanel" class = "tab-pane fade" id = "kitchen-table">
                                <br>
                                <div class ="container">
                                    <div class = "row">
                                        <div class = "col-sm-11">   
                                            <table class = "display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Menu Group</th>
                                                        <th>Unit</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th>Inventory Items</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php foreach ($products_list_kitchen->result() as $row) { ?>
                                                        <tr>
                                                            <td id = "#name-<?=$row->product_id?>"><?=$row->prod_name?></td>
                                                            <td id = "#type_name-<?=$row->product_id?>"><?=$row->prod_type_name?></td>
                                                            <td id = "#unit-<?=$row->product_id?>"><?=$row->unit?></td>
                                                            <td id = "#price-<?=$row->product_id?>"><?=$row->price?></td>
                                                            <?php if($row->is_available == 1): ?>
                                                                <td id = "#is_available-<?=$row->product_id?>"><span class = "label label-success">Available</span></td>
                                                            <?php else: ?>
                                                                <td id = "#is_available-<?=$row->product_id?>"><span class = "label label-danger">Unavailable</span></td>
                                                            <?php endif; ?>
                                                            <td id = "#inv_name_qty-<?=$row->product_id?>"><?=$row->inv_name_qty?></td>
                                                            <td>
                                                                <a href = "#" data-toggle="modal" data-target="#edit_product_modal" id = "edit-<?=$row->product_id?>" class = "edit-clickable">
                                                                    <span class = "fa fa-edit"></span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Menu Group</th>
                                                        <th>Unit</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th>Inventory Items</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
