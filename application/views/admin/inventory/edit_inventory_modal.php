<!-- Modal -->
<div class="modal fade" id="edit_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Item Info</h4>
            </div>
            <?php
                $attributes = array("class" => "form-horizontal");
                echo form_open("admin/inventory/update_inventory_item", $attributes);
            ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="item-name" class = "col-sm-3 control-label">Item Name: </label>
                        <div class = "col-sm-9">
                            <?php
                                //Inventory ID
                                $data = array(
                                        "type" => "hidden",
                                        "id" => "item-id",
                                        "name" => "item_id"
                                );
                                echo form_input($data);

                                $data = array(
                                        "type" => "text",
                                        "class" => "form-control",
                                        "id" => "item-name",
                                        "name" => "item_name"
                                    );
                                echo form_input($data);
                            ?>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="item-beg" class = "col-sm-3 control-label">Beg Quantity: </label>
                        <div class = "col-sm-9">
                            <?php
                                $data = array(
                                        "type" => "number",
                                        "class" => "form-control",
                                        "id" => "item-beg",
                                        "name" => "item_beg"
                                    );
                                echo form_input($data);
                            ?>
                           
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="item-in" class = "col-sm-3 control-label">In Quantity: </label>
                        <div class = "col-sm-9">
                            <?php
                                $data = array(
                                        "type" => "number",
                                        "class" => "form-control",
                                        "id" => "item-in",
                                        "name" => "item_in"
                                    );
                                echo form_input($data);
                            ?>
                           
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="item-out" class = "col-sm-3 control-label">Out Quantity: </label>
                        <div class = "col-sm-9">
                            <?php
                                $data = array(
                                        "type" => "number",
                                        "class" => "form-control",
                                        "id" => "item-out",
                                        "name" => "item_out"
                                    );
                                echo form_input($data);
                            ?>
                                
                        </div>
                      </div>
                
                </div>
                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <?=form_submit("edit_item_submit", "Save Changes", "class = 'btn btn-primary'");?>
                </div>
            <?=form_close();?>
        </div>
    </div>
</div>