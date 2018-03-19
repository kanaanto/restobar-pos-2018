<!-- Only list orders that are still unpaid -->
	<div class="modal fade" id="bill_out_modal" tabindex="-1" role="dialog" aria-labelledby="bill_out_modal">
	  <div class="modal-dialog  modal-sm" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="bill_out_modal_title">Bill for <span></span></h4>
		  </div>
		  <div class="modal-body">
			<!--table class="table table_borderless table-hover order_list_table">
			  <thead>
				  <tr>
					<th>Qty</th>
					<th>Item</th>
					<th>Unit Price</th>
					<th>Amt</th>
					<th>Status</th>
				  </tr>
			  </thead>
			  <tbody>
				  <tr>
					
					<td>1</td>
					<td>SMG-LGHT</td>
					<td>50</td>
					<td>50</td>
					<td><span class="label label-danger">Unpaid</span></td>
				  </tr>
				  <tr>
					<td>2</td>
					<td>TOFU-MUSH-MEAL</td>
					<td>89</td>
					<td>158</td>
					<td><span class="label label-danger">Unpaid</span></td>
				  </tr>
				  <tr>
					<td></td>
					<td></td>
					<td style="color:red; text-align:right;"><b>Total:</b></td>
					<td style="color:red;"><b>158</b></td>
					<td></td>
				  </tr>
			  </tbody>
			</table-->
			<div class="row">
				<div class="col-md-12">
					<label for="example-text-input" class="col-2 col-form-label">Total Amount:</label>
					<div class="col-10">
						<input class="form-control" type="text" value="" id="example-text-input" disabled>
					</div>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-md-12">
					<label for="example-text-input" class="col-2 col-form-label">Amount Received:</label>
					<div class="input-group">
						<input type="number" class="form-control" placeholder="0.00">
						<span class="input-group-btn">
							<button class="btn btn-secondary" type="button"><i class="fa fa-angle-double-right"></i></button>
						</span>
		    		</div>
				
		
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-12">
					<div class="input-group">
					  <span class="input-group-addon">Php</span>
					  <input type="text" class="form-control" placeholder="Change..." disabled>
					  <span class="input-group-addon">.00</span>
					</div>

				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>