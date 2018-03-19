<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>
                <br>
                <section class="content">
                    <div class = "box box-danger">
                        <div class = "box-header with-border">
                            <div class = "col-sm-6">
                                <h4>From:</h4><input type="date" id = "date-from" class = "form-control" name="date-from">
                            </div>
                            <div class = "col-sm-6">
                                <h4>To:</h4><input type="date" id = "date-to" class = "form-control" name="date-to">
                            </div>
                        </div>
                            <div class = "box-body">
                                <div class = "col-sm-6">
                                    <div class = "box box-solid box-success">
                                        <div class = "box-header with-border">
                                            <h3 class = "box-title">Sales</h3>
                                        </div>
                                        <div class = "box-body">
                                            <table class = "display"> 
                                                <thead>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Table #</th>
                                                        <th>Items</th>
                                                        <th>Amount</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Table #</th>
                                                        <th>Items</th>
                                                        <th>Amount</th>
                                                        <th>View</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td>6:30pm | 10:30pm</td>
                                                        <td>#6</td>
                                                        <td>10</td>
                                                        <td>500 pesos</td>
                                                        <td>
                                                            <a href = "#" data-toggle="collapse" data-target = "#preview-content">
                                                                <span class = "fa fa-eye"></span>
                                                            </a>   |    
                                                            <a href = "#">
                                                                <span class = "fa fa-edit"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-sm-6" id = "preview">
                                    <div class = "box box-solid box-warning">
                                        <div class = "box-header with-border">
                                            <h3 class = "box-title">Preview</h3>
                                        </div>
                                        <div class = "box-solid collapse" id = "preview-content">
                                            <h4><b>Table Details</b></h4>
                                            <p><span class = "label label-primary">Date:</span> 03/26/2017</p>
                                            <p><span class = "label label-info">Time:</span> 6:30pm-10:30pm</p>
                                            <hr>
                                            <table class = "table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Qty</th>
                                                        <th>Order</th>
                                                        <th class = "pull-right">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Sisig</td>
                                                        <td class = "pull-right">100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>SML</td>
                                                        <td class = "pull-right">500</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>RH</td>
                                                        <td class = "pull-right">400</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class = "pull-right">
                                                            <span class = "label label-danger">Total:</span><b> 1000</b>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

