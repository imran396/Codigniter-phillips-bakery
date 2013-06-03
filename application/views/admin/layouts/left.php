<?php
$array = array('users','roles','controls','access_control');
?>
<div id="menu" class="hidden-phone">
    <div id="menuInner">
        <div id="search">
            <input type="text" placeholder="Quick search ..." />
            <button class="glyphicons search"><i></i></button>
        </div>
        <ul>
            <li class="heading"><span><?php echo $this->lang->line('menu_level');?></span></li>
            <li class="glyphicons home <?php echo (!empty($active) && $active == 'dashboard') ? 'active' : ''; ?>"><a href="/admin/dashboard"><i></i><span><?php echo $this->lang->line('dashboard'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'categories') ? 'active' : ''; ?>"><a href="/admin/categories/listing"><i></i><span><?php echo $this->lang->line('categories'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'flavours') ? 'active' : ''; ?>"><a href="/admin/flavours/listing"><i></i><span><?php echo $this->lang->line('flavours'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'servings') ? 'active' : ''; ?>"><a href="/admin/servings/listing"><i></i><span><?php echo $this->lang->line('servings'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'shapes') ? 'active' : ''; ?>"><a href="/admin/shapes/listing"><i></i><span><?php echo $this->lang->line('shapes'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'price_matrix') ? 'active' : ''; ?>"><a href="/admin/price_matrix"><i></i><span><?php echo $this->lang->line('price_matrix'); ?></span></a></li>
            <li class="hasSubmenu <?php echo (!empty($active) && ($active == 'cakes' || $active == 'gallery' )) ? 'active' : ''; ?>">
                <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#cake_menu"><i></i><span onclick="window.location='/admin/cakes/listing'"><?php echo $this->lang->line('cakes'); ?></span></a>
                <ul class="collapse <?php echo (!empty($active) && ($active == 'cakes' || $active == 'gallery' )) ? 'in' : ''; ?>" id="cake_menu">
                    <li class="<?php echo (!empty($active) && $active == 'cakes') ? 'active' : ''; ?>"><a href="/admin/cakes/listing"><span><?php echo $this->lang->line('cakes'); ?></span></a></li>
                    <li class="<?php echo (!empty($active) && $active == 'gallery') ? 'active' : ''; ?>"><a href="/admin/gallery"><span><?php echo $this->lang->line('gallery'); ?></span></a></li>
                </ul>
            </li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'locations') ? 'active' : ''; ?>"><a href="/admin/locations/listing"><i></i><span><?php echo $this->lang->line('locations'); ?></span></a></li>
<!--            <li class="glyphicons cogwheels --><?php //echo (!empty($active) && $active == 'blackouts') ? 'active' : ''; ?><!--" ><a href="/admin/blackouts/listing"><i></i><span>--><?php //echo $this->lang->line('blackouts'); ?><!--</span></a></li>-->
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'zones') ? 'active' : ''; ?>"><a href="/admin/zones/listing"><i></i><span><?php echo $this->lang->line('zone'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'orders') ? 'active' : ''; ?>"><a href="/admin/orders"><i></i><span><?php echo $this->lang->line('orders'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'customers') ? 'active' : ''; ?>"><a href="/admin/customers/listing"><i></i><span><?php echo $this->lang->line('customers'); ?></span></a></li>
            <li class="hasSubmenu <?php echo (!empty($active) && ($active == 'users' || $active == 'roles' )) ? 'active' : ''; ?>">
                <a data-toggle="collapse " class="glyphicons show_thumbnails_with_lines " href="#menu_access"><i></i><span onclick="window.location='/admin/users/listing'" ><?php echo $this->lang->line('manage_users'); ?></span></a>
                <ul class="collapse <?php echo (!empty($active) && in_array($active,$array )) ? 'in' : ''; ?>" id="menu_access">

                    <li class=""><a href="/admin/users"><span><?php echo $this->lang->line('users'); ?></span></a></li>
                    <li class=""><a href="/admin/roles"><span><?php echo $this->lang->line('roles'); ?></span></a></li>
                    <li class=""><a href="/admin/controls"><span><?php echo $this->lang->line('access'); ?></span></a></li>
                    <li class=""><a href="/admin/access_control"><span><?php echo $this->lang->line('access_control'); ?></span></a></li>


                </ul>
            </li>


        </ul>

    </div>
</div>