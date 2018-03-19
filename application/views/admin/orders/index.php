<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                <?php
                if (isset($_GET['message'])) {
                	$msg = $_GET['message'];
                	$m_type = (substr($msg, 0, 1) == "S") ? "success" : "error";
	        	?>
		        	<div class="alert alert-<?=$m_type?>">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <h4><?php echo ucfirst($m_type) ?></h4>
					  <?=$msg?>
					</div>
			    
			    <?php } ?>
                    <div class="row">
				        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon "><i class="fa fa-dot-circle-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">All Tables</span>
                                    <span class="info-box-number"><?=$table_stats[0]?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Vacant</span>
                                    <span class="info-box-number"><?=$table_stats[1]?></span>
									
                                </div>
                            </div>
                        </div>
						<div class="clearfix visible-sm-block"></div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-times"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Occupied and Unpaid</span>
                                    <span class="info-box-number"><?=$table_stats[2]?></span>
                                </div>
                            </div>
                        </div>
						
                        
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Occupied and Paid</span>
                                    <span class="info-box-number"><?=$table_stats[3]?></span>
                                </div>
                            </div>
                        </div>
						<div class="col-xs-12">
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-success btn-xl" data-toggle="modal" data-target="#add_table_modal"><i class="fa fa-plus"></i>&nbsp;Add New Table</button>
							</div>
						</div>
                    </div>

						<br/>
					
                    <div class="row"><!-- Table List -->
                        <div class="col-md-6">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Table 1A  &nbsp;
									<button type="button" class="btn btn-warning btn-xs" data-dismiss="modal">Vacate</button> <!-- Should only be visible when all orders are paid-->
									</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
											<table class="table table_borderless table-hover order_list_table">
											  <thead>
												  <tr>
													<th>Qty</th>
													<th>Item</th>
													<th>Unit Price</th>
													<th>Amt</th>
													<th>Status</th>
													<th>Action</th>
													<th>Emp No.</th>
												  </tr>
											  </thead>
											  <tbody>
												  <tr>
													
													<td>1</td>
													<td>SMG-LGHT</td>
													<td>50</td>
													<td>50</td>
													<td><span class="label label-warning">OTH</span></td>
													<td>
														<a href="#"><span class = "fa fa-edit"></span></a>&nbsp;&nbsp;
														<a href="#delete_order_modal" data-toggle="modal"><span class = "fa fa-trash"></span></a>
													</td>
													<td><a href="#" title="Kana Antonio">E001</a></td>
												  </tr>
												  <tr>
													<td>2</td>
													<td>SISIG-MEAL</td>
													<td>89</td>
													<td>158</td>
													<td><span class="label label-success">Paid</span></td>
													<td><a href="#"><span class = "fa fa-edit"></span></a><a href="#">&nbsp;&nbsp;<span class = "fa fa-trash"></span></a></td>
													<td>E001</td>
												  </tr>
												  <tr>
													<td>2</td>
													<td>BKT (SMG-LGHT, RD-HRSE, SMG-APL)</td>
													<td>320</td>
													<td>640</td>
													<td><span class="label label-success">Paid</span></td>
													<td><a href="#"><span class = "fa fa-edit"></span></a><a href="#">&nbsp;&nbsp;<span class = "fa fa-trash"></span></a></td>
													<td>E003</td>
												  </tr>
												  <tr>
													
													<td>5</td>
													<td>RD-HRSE</td>
													<td>50</td>
													<td>250</td>
													<td><span class="label label-warning">SD</span></td>
													<td>
														<a href="#"><span class = "fa fa-edit"></span></a>&nbsp;&nbsp;
														<a href="#delete_order_modal" data-toggle="modal"><span class = "fa fa-trash"></span></a>
													</td>
													<td>E002</td>
												  </tr>

											  </tbody>
											</table>

											<hr/>

											<div class="total_amt_div">  
												<span class="total_amt_lbl">Total Amount:</span>
												<!-- 
												RED: Some orders are unpaid
												GREEN: All orders are paid
												-->
												<span class="total_amt_paid" id="ta_t1"> 1,098.00</span>
											</div>
												
											<div class="clearfix"></div>
											<div class="box-tools pull-left">
												<button type="button" class="btn btn-info add_order_modal_btn" data-toggle="modal" data-target="#add_order_modal"><i class="fa fa-plus"></i>&nbsp;Add Order</button>
											</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
 
						<div class="col-md-6">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Table 3A &nbsp;
									<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#move_table_modal">Move</button> <!-- Should only be visible when some orders are still unpaid-->
									
									</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
									<div class="row">
                                        <div class="col-md-12">
											<table class="table table_borderless table-hover order_list_table">
											  <thead>
												  <tr>
													<th>Qty</th>
													<th>Item</th>
													<th>Unit Price</th>
													<th>Amt</th>
													<th>Status</th>
													<th>Action</th>
													<th>Emp No.</th>
												  </tr>
											  </thead>
											  <tbody>
												  <tr>
													
													<td>1</td>
													<td>SMG-LGHT</td>
													<td>50</td>
													<td>50</td>
													<td><span class="label label-danger">Unpaid</span></td>
													<td>
														<a href="#"><span class = "fa fa-edit"></span></a>&nbsp;&nbsp;
														<a href="#delete_order_modal" data-toggle="modal"><span class = "fa fa-trash"></span></a>
													</td>
													<td>E003</td>
												  </tr>
												  <tr>
													<td>2</td>
													<td>TOFU-MUSH-MEAL</td>
													<td>89</td>
													<td>158</td>
													<td><span class="label label-danger">Unpaid</span></td>
													<td><a href="#"><span class = "fa fa-edit"></span></a><a href="#">&nbsp;&nbsp;<span class = "fa fa-trash"></span></a></td>
													<td>E003</td>
												  </tr>
												  <tr>
													<td>1</td>
													<td>MILK-SHK</td>
													<td>50</td>
													<td>50</td>
													<td><span class="label label-success">Paid</span></td>
													<td>
														<a href="#"><span class = "fa fa-edit"></span></a>&nbsp;&nbsp;
														<a href="#delete_order_modal" data-toggle="modal"><span class = "fa fa-trash"></span></a>
													</td>
													<td>E004</td>
												  </tr>
											  </tbody>
											</table>

											<hr/>
											<div class="total_amt_div">  
												<span class="total_amt_paid_lbl">Paid:</span>
												<span class="total_amt_paid" id="ta_t1"> 50.00</span>
											</div>
											<div class="total_amt_div">  
												<span class="total_amt_lbl">Balance:</span>
												<span class="total_amt_unpaid" id="ta_t1"> 208.00</span>
											</div>
												
											<div class="clearfix"></div>
											<div class="box-tools pull-left">
												<button type="button" class="btn btn-info add_order_modal_btn" data-toggle="modal" data-target="#add_order_modal"><i class="fa fa-plus"></i>&nbsp;Add Order</button>
											</div>
											<!-- Hide when all orders are paid already -->
											<div class="box-tools pull-right">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target="#bill_out_modal"><i class="fa fa-credit-card"></i>&nbsp;Bill-Out</button>
											</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php foreach ($table_list as $row) { ?>
						<div class="col-md-6">
					<?php 
						$is_paid = $row->is_paid;
						$is_occupied = $row->is_occupied;
						if($is_paid == 1 && $is_occupied == 1){
							$can_leave = true;
							$status = "warning";
						} else if($is_paid == 0 && $is_occupied == 1){
							$can_leave = false;
							$status = "danger";
						} else {
							$can_leave = true;
							$status = "success";
						}
					?>
						<div class="box box-<?=$status;?>">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?=$row->table_id;?></h3> &nbsp;
                                    <button type="button" class="btn btn-default btn-xs move_table_modal_btn" data-toggle="modal" data-target="#move_table_modal" id="<?=$row->table_id;?>_move_tbl">Move</button> <!-- Should only be visible when some orders are still unpaid-->
									
                                    <div class="box-tools pull-right">
                                    	<span class="curr_order_slip" id="<?=$row->current_order_slip;?>">ORDER SLIP: <?=$row->current_order_slip;?></span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
									<div class="row">
                                        <div class="col-md-12">
											<table class="table table_borderless table-hover order_list_table" id="<?=$row->table_id;?>">
											  <thead>
												  <tr>
													<th>Qty</th>
													<th>Item</th>
													<!--th>Unit Price</th-->
													<th>Amt</th>
													<th>Status</th>
													<th>Emp</th>
													<th></th>
												  </tr>
											  </thead>
											  <tbody>
											  <?php 
											  $total_paid=0;
											  $total_unpaid=0;
											  foreach (${$row->table_id} as $order) { ?>
												  <tr id="<?=$order->order_id?>">
													<td class="ord_qty"><?=$order->qty?></td>
													<td class="ord_prod_name"><?=$order->prod_name?>
														<span style="display:none;"><?=$order->product_id?></span>
													</td>
													<!--td><?=$order->unit_price?></td-->
													<td class="ord_total_price"><?=$order->total_price?></td>
													<?php 
													//"up" for Unpaid Cash, "p" for Paid Cash, "sd" for Salary Deduction; "oth" for On the House

													switch($order->payment_type){
														case "p":
															$payment_status = "success";
															$payment_type = "Paid";
															$total_paid += $order->total_price;
															break;
														case "sd":
														case "oth":
															$payment_status = "warning";
															$payment_type = strtoupper($order->payment_type);
															$total_paid += $order->total_price;
															break;
														case "up":
															$payment_status = "danger";
															$payment_type = "Unpaid";
															$total_unpaid += $order->total_price;
															break;
													}
													?>
													
													<td class="ord_status"><span class="label label-<?=$payment_status;?>"><?=$payment_type?></span></td>
													<td class="ord_user_id"><?=$order->first_name?></td>
													<td>
														<a href="#edit_order_modal" class="edit_order_modal_btn" data-toggle="modal"><span class = "fa fa-edit"></span></a>&nbsp;&nbsp;
														<a href="#delete_order_modal" class="delete_order_modal_btn" data-toggle="modal"><span id="del_<?=$order->order_id?>" class = "fa fa-trash"></span></a>
													</td>
													
												  </tr>
												<?php } ?>
												<?php if($is_occupied){ 
												 echo 
												 	'<tr>
														<td colspan=2 style="color:green; text-align:right;"><b>Total paid:</b></td>
														<td style="color:green; text-align:left;"><b>' . $total_paid . '</b></td>
														<td></td>
														<td></td>
														<td></td>
														
													  </tr>';
												} ?>
											<?php if(!$can_leave){ 
												echo 
													'<tr>
														<td colspan=2 style="color:red; text-align:right;"><b>Total unpaid:</b></td>
														<td style="color:red; text-align:left;"><b>'. $total_unpaid .'</b></td>
												  	</tr>
													  <td></td>
													  <td></td>
													  <td></td>';
											 } ?>

											  </tbody>
											</table>

											<hr/>
	
											<div class="clearfix"></div>
											<div class="box-tools pull-left">
												<button type="button" class="btn btn-info add_order_modal_btn" data-toggle="modal" data-target="#add_order_modal" id="<?=$row->table_id;?>_add"><i class="fa fa-plus"></i>&nbsp;Add Order</button>
											</div>
											<!-- Hide when all orders are paid already -->
											
											<div class="box-tools pull-right" >
												<button type="button" class="btn bill_out_modal_btn btn-success" data-toggle="modal" id="<?=$row->table_id;?>_bill" data-target="#bill_out_modal"><i class="fa fa-credit-card"></i>&nbsp;Bill-Out</button>
											</div>
											
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>
						
						<!--div class="col-md-6">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Table 3B</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-center"><strong>Occupied and paid</strong></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div-->
                    </div>
                </section>
				<!-- Add order modal --><?=$add_order_modal?>
				<!-- Bill out modal --><?=$bill_out_modal?>
				<!-- Move to another table modal --><?=$add_move_table_modal?>
				<!-- Move to another table modal --><?=$delete_order_modal?>
            </div>
