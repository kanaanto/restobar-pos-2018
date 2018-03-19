<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><?php echo lang('footer_version'); ?></b> 1.0.0
                </div>
               </footer>
        </div>

        <script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
<?php if ($mobile == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
<?php if ($this->router->fetch_class() == 'inventory'):?>
        <script src="<?php echo base_url($plugins_dir . '/datatable/data-table.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/datatable/data-table-bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url($user_defined . '/inventory/inventory.js'); ?>"></script>
<?php endif;?>
<?php if ($this->router->fetch_class() == 'products' && $this->router->fetch_method() == 'index'):?>
        <script src="<?php echo base_url($plugins_dir . '/datatable/data-table.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/datatable/data-table-bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url($user_defined . '/products/products.js'); ?>"></script>
<?php endif;?>
<?php if ($this->router->fetch_class() == 'products' && ($this->router->fetch_method() == 'add_product' || $this->router->fetch_method() == 'edit_product')):?>
        <script src="<?php echo base_url($plugins_dir . '/jqueryautocomplete/jquery.autocomplete.min.js'); ?>"></script>
        <script src="<?php echo base_url($user_defined . '/products/add_product.js'); ?>"></script>
<?php endif;?>
<?php if ($this->router->fetch_class() == 'sales'):?>
        <script src="<?php echo base_url($plugins_dir . '/datatable/data-table.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/datatable/data-table-bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url($user_defined . '/sales/sales.js'); ?>"></script>
<?php endif;?>
<?php if ($this->router->fetch_class() == 'orders'):?>
        <script src="<?php echo base_url($user_defined . '/orders/orders.js'); ?>"></script>
<?php endif;?>
    </body>
</html>