<!-- Add order modal -->
	<div class="modal fade" id="add_order_modal" tabindex="-1" role="dialog" aria-labelledby="add_order_modal">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<!--button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button-->
			<h4 class="modal-title" id="add_order_modal_title">Add Order for <span></span></h4>
		  </div>
		  <div class="modal-body">
				<table class="table table-hover table-bordered add_order_table">
				  <thead>
					  <tr>
						<th class="order_tab_col">Qty</th>
						<th class="order_tab_col">Item</th>
						<th class="order_tab_col">Unit Price</th>
						<th class="order_tab_col">Amount</th>
						<th class="order_tab_col">Status</th>
						<th class="order_tab_col">Action</th>
					  </tr>
				  </thead>
				  <tbody>
				  <!--tr>
					<td>1</td>
					<td>SMG-LGHT</td>
					<td>50</td>
					<td>50</td>
					<td>
						<a href="#"><span class="fa fa-edit"></span></a>
						<a href="#">&nbsp;&nbsp;<span class="fa fa-trash"></span></a>
					</td>
				  </tr-->
				  
				  </tbody>

				</table><hr/>
			 <form class="form-horizontal">
			  <div class="box-body col-md-8">
				<div class="form-group">
				  <label for="add_order_category" class="col-sm-2 control-label">Category:</label>
				  <div class="col-sm-10">
					<select name="add_order_prod_type" id="add_order_prod_type" class="form-control select2 add_edit_order_prod_type">
						<option value="-1">ALL</option>
						<?php foreach ($prod_type_list->result() as $row) { ?>
					  	<option value="<?=$row->prod_type_id; ?>"><?=$row->prod_type_name;?></option>
					 	<?php } ?>
					</select>
				  </div>
				</div>
				<div class="form-group">
				  <label for="add_order_product" class="col-sm-2 control-label">Product:</label>
				  <div class="col-sm-10">
					<select name="add_order_product" id="add_order_product" class="form-control select2 add_edit_order_product">
						<option value="-1">Choose product</option>
						<?php foreach ($prod_inv_list->result() as $row) { ?>
					  	<option class="prod_type_<?=$row->prod_type_id; ?>" 
					  			value="<?=$row->product_id; ?>">
					  		<?php echo $row->prod_name . " (". $row->unit .") @" ?>
					  		<span><?php echo $row->price ?></span>
						</option>
					 	<?php } ?>
					</select>
					<div class="error_msg" id="add_error_msg"><span style="color:red;font-style:italic;">*Choose a product</span></div>
				  </div>
				</div>

				<div class="form-group">
				  <label for="add_order_qty" class="col-sm-2 control-label">Quantity:</label>
				  <div class="col-sm-10">
					<input type="number" class="form-control add_edit_order_qty" name="add_order_qty" id="add_order_qty" min="1" value="1">
				  </div>
				</div>
				<div class="form-group">
				  <label for="add_order_amt" class="col-sm-2 control-label">Amount:</label>
				  <div class="col-sm-10">
					<input type="number" class="form-control add_edit_order_amt" name="add_order_amt" id="add_order_amt" disabled="disabled" value="0.00">
				  </div>
				</div>
			  </div>
			  </form>   
			  <!-- /.box-body -->
			  <div class="add_order_button box-footer col-md-3">
				
				<div class="clearfix"></div>
				<label for="add_order_stat" class="col-sm-2 control-label">Status:</label>
				<div class="clearfix"></div>
				<div class="form-group" id="add_order_stat" class="add_edit_order_stat">
				  <div class="radio">
                    <label>
                      <input type="radio" name="add_pmt_status" id="add_pmt_status_unpaid" value="unpaid" checked>
                      Unpaid
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="add_pmt_status" id="add_pmt_status_paid" value="paid" >
                      Paid
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="add_pmt_status" id="add_pmt_status_oth" value="oth">
                      On The House
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="add_pmt_status" id="add_pmt_status_sd" value="sd">
                      Salary Deduction
                    </label>
                  </div>
                </div>
                <button class="btn btn-info" onclick="validateOrderValues();">Add Order</button>
			  </div>
			  
			  <!-- /.box-footer -->
			
		  </div>
		  <div class="clearfix"></div>
		  <div class="modal-footer">
		  	
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="emptyOrderList();">Cancel</button>
			<button type="button" class="btn btn-danger" id="submit_order_to_db">Save Orders</button>

		  </div>
		</div>
	  </div>
	</div>
<!-- Edit Order Modal -->
	<div class="modal fade" id="edit_order_modal" tabindex="-1" role="dialog" aria-labelledby="edit_order_modal">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<!--button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button-->
			<h4 class="modal-title" id="edit_order_modal_title">Edit Order #<span id="edit_order_id"></span></h4>
		  </div>
		  <div class="modal-body">
			 <form class="form-horizontal">
			  <div class="box-body col-md-8">
				<div class="form-group">
				  <label for="edit_order_category" class="col-sm-2 control-label">Category:</label>
				  <div class="col-sm-10">
					<select name="edit_order_prod_type" id="edit_order_prod_type" class="add_edit_order_prod_type form-control select2">
						<option value="-1">ALL</option>
						<?php foreach ($prod_type_list->result() as $row) { ?>
					  	<option value="<?=$row->prod_type_id; ?>"><?=$row->prod_type_name;?></option>
					 	<?php } ?>
					</select>
				  </div>
				</div>
				<div class="form-group">
				  <label for="edit_order_product" class="col-sm-2 control-label">Product:</label>
				  <div class="col-sm-10">
					<select name="edit_order_product" id="edit_order_product" class="add_edit_order_product form-control select2">
						<option value="-1">Choose product</option>
						<?php foreach ($prod_inv_list->result() as $row) { ?>
					  	<option class="prod_type_<?=$row->prod_type_id; ?>" 
					  			value="<?=$row->product_id; ?>">
					  		<?php echo $row->prod_name . " (". $row->unit .") @" ?>
					  		<span><?php echo $row->price ?></span>
						</option>
					 	<?php } ?>
					</select>
					<div class="error_msg" id="edit_error_msg"><span style="color:red;font-style:italic;">*Choose a product</span></div>
				  </div>
				</div>

				<div class="form-group">
				  <label for="edit_order_qty" class="col-sm-2 control-label">Quantity:</label>
				  <div class="col-sm-10">
					<input type="number" class="add_edit_order_qty form-control" name="edit_order_qty" id="edit_order_qty" value="1">
				  </div>
				</div>
				<div class="form-group">
				  <label for="edit_order_amt" class="col-sm-2 control-label">Amount:</label>
				  <div class="col-sm-10">
					<input type="number" class="add_edit_order_amt form-control" name="edit_order_amt" id="edit_order_amt" disabled="disabled" value="0.00">
				  </div>
				</div>
			  </div>
			  </form>   
			  <!-- /.box-body -->
			  <div class="edit_order_button box-footer col-md-3">
				
				<div class="clearfix"></div>
				<label for="edit_order_stat" class="add_edit_order_stat
				col-sm-2 control-label">Status:</label>
				<div class="clearfix"></div>
				<div class="form-group" id="edit_order_stat">
				  <div class="radio">
                    <label>
                      <input type="radio" name="edit_pmt_status" id="edit_pmt_status_unpaid" value="unpaid" checked>
                      Unpaid
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="edit_pmt_status" id="edit_pmt_status_paid" value="paid" >
                      Paid
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="edit_pmt_status" id="edit_pmt_status_oth" value="oth">
                      On The House
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="edit_pmt_status" id="edit_pmt_status_sd" value="sd">
                      Salary Deduction
                    </label>
                  </div>
                </div>
                <!--button class="btn btn-info" onclick="validateOrderValues();">Edit Order</button-->
			  </div>
			  
			  <!-- /.box-footer -->
			
		  </div>
		  <div class="clearfix"></div>
		  <div class="modal-footer">
		  	
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="emptyOrderList();">Cancel</button>
			<button type="button" class="btn btn-danger" id="submit_edit_order_to_db">Save Orders</button>

		  </div>
		</div>
	  </div>
	</div>
	</div>