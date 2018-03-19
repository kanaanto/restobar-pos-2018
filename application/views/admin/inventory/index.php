<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <!--Box-->
                    <div class = "box box-danger">
                        <div class = "box-header with-border">
                            <div class = "row">
                                <div class = "col-sm-12">
                                    <a class = "btn btn-info" data-toggle = "modal" data-target = "#add_item_modal">
                                    <i class = "fa fa-plus"></i> Add Inventory</a>
                                </div>
                            </div>
                            <div class = "col-sm-6">
                                <h4>From:</h4><input type="date" id = "date-from" class = "form-control" name="date-from">
                            </div>
                            <div class = "col-sm-6">
                                <h4>To:</h4><input type="date" id = "date-to" class = "form-control" name="date-to">
                            </div>
                        </div>
                        <div class = "box-body">
                            <div class = "row">
                                <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="box box-solid box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Bar</h3>
                                        </div>
                                        <div class="box-body">
                                            <table id="inventory_table" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>BEG</th>
                                                        <th class = "input-column">IN</th>
                                                        <th class = "input-column">OUT</th>
                                                        <th>END</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>BEG</th>
                                                        <th>IN</th>
                                                        <th>OUT</th>
                                                        <th>END</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach($bar_list->result() as $row) { ?>
                                                    <tr>
                                                        <td id = "name-<?=$row->inventory_id?>"><?=$row->inv_name?></td>
                                                        <td id = "beg-<?=$row->inventory_id?>"><?=$row->qty?></td>
                                                        <td id = "in-<?=$row->inventory_id?>"><?=$row->inv_in?></td>
                                                        <td id = "out-<?=$row->inventory_id?>"><?=$row->inv_out?></td>
                                                        <td id = "end-<?=$row->inventory_id?>"><?=$row->inv_end?></td>
                                                        <td>
                                                            <a href = "#" id = "<?=$row->inventory_id?>" class = "edit_clickable" data-toggle="modal" data-target="#edit_item_modal">
                                                                <span  class = "fa fa-edit">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class = "box box-solid box-danger">
                                        <div class = "box-header with-border">
                                            <h3 class = "box-title">Kitchen</h3>
                                            <div class = "box-tools pull-right">
                                            </div>
                                        </div>
                                        <div class = "box-body">
                                            <table id="" class="display" cellspacing="0" width="100%" >
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>BEG</th>
                                                        <th>IN</th>
                                                        <th>OUT</th>
                                                        <th>END</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>BEG</th>
                                                        <th>IN</th>
                                                        <th>OUT</th>
                                                        <th>END</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach($kitchen_list->result() as $row) { ?>
                                                    <tr>
                                                        <td id = "name-<?=$row->inventory_id?>"><?=$row->inv_name?></td>
                                                        <td id = "beg-<?=$row->inventory_id?>"><?=$row->qty?></td>
                                                        <td id = "in-<?=$row->inventory_id?>"><?=$row->inv_in?></td>
                                                        <td id = "out-<?=$row->inventory_id?>"><?=$row->inv_out?></td>
                                                        <td id = "end-<?=$row->inventory_id?>"><?=$row->inv_end?></td>
                                                        <td>
                                                            <a href = "#" id = "<?=$row->inventory_id?>" class = "edit_clickable" data-toggle="modal" data-target="#edit_item_modal">
                                                                <span  class = "fa fa-edit">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>      
                                </div>
                            </div>
                        </div>    
                    </div>
                </section>
                <?=$add_inventory_modal?>
                <?=$edit_inventory_modal?>
            </div>

