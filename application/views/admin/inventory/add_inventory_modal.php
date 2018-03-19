<!-- Modal -->
<div class="modal fade" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Item Info</h4>
            </div>
            <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('admin/inventory/add_inventory_item', $attributes);
            ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new-item-name" class = "col-sm-3 control-label">Item Name: </label>
                        <div class = "col-sm-9">
                            <?php
                                $data = array(
                                        "type"          => "text",
                                        "class"         => "form-control",
                                        "id"            => "new-item-name",
                                        "name"          => "new_item_name",
                                        "placeholder"   => "Item Name"
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-item-qty" class = "col-sm-3 control-label">Quantity: </label>
                        <div class = "col-sm-9">
                            <?php
                                $data = array(
                                        "type"          => "number",
                                        "class"         => "form-control",
                                        "id"            => "new-item-qty",
                                        "name"          => "new_item_qty",
                                        "placeholder"   => "Item Quantity"
                                );
                                echo form_input($data);
                            ?>
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="new-item-min-value" class = "col-sm-3 control-label">Minimum Value :</label>
                        <div class = "col-sm-9">
                            <?php
                                $data = array(
                                        "type"          => "number",
                                        "class"         => "form-control",
                                        "id"            => "new-item-min-value",
                                        "name"          => "new_item_min_value",
                                        "placeholder"   => "Item Quantity"
                                );
                                echo form_input($data);
                            ?>
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="new-item-in-kitchen" class = "col-sm-3 control-label">In Kitchen: </label>
                            <div class = "col-sm-9">
                                <?php
                                    $attr = array(
                                            "id"    => "new-item-in-kitchen",
                                            "name"  => "new_item_in_kitchen",
                                            "class" => "form-control"
                                    );
                                    $options = array(
                                            "1" => "Yes",
                                            "0" => "No"
                                    );
                                    echo form_dropdown($attr,$options);
                                ?>
                            </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <?php echo form_submit('add_item_submit', 'Add Item', 'class="btn btn-primary"'); ?>
                </div>
            <?=form_close();?>
        </div>
    </div>
</div>