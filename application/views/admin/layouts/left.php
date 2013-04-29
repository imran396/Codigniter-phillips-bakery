<div id="menu" class="hidden-phone">
    <div id="menuInner">
        <div id="search">
            <input type="text" placeholder="Quick search ..." />
            <button class="glyphicons search"><i></i></button>
        </div>
        <ul>
            <li class="heading"><span><?php echo $this->lang->line('menu_level');?></span></li>
            <li class="glyphicons home <?php echo (!empty($active) && $active == 'dashboard') ? 'active' : ''; ?>"><a href="/admin/dashboard"><i></i><span><?php echo $this->lang->line('dashboard'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'categories') ? 'active' : ''; ?>"><a href="/admin/categories"><i></i><span><?php echo $this->lang->line('categories'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="/admin/cakes"><i></i><span><?php echo $this->lang->line('cakes'); ?></span></a></li>
            <li class="glyphicons cogwheels <?php echo (!empty($active) && $active == 'locations') ? 'active' : ''; ?>"><a href="/admin/locations"><i></i><span><?php echo $this->lang->line('locations'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="/admin/blackouts"><i></i><span><?php echo $this->lang->line('blackouts'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="/admin/gallery"><i></i><span><?php echo $this->lang->line('gallery'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="/admin/zone"><i></i><span><?php echo $this->lang->line('zone'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="/admin/employee"><i></i><span><?php echo $this->lang->line('employee'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="/admin/order"><i></i><span><?php echo $this->lang->line('orders'); ?></span></a></li>
            <li class="glyphicons cogwheels"><a href="ui.html?lang=en"><i></i><span>UI Elements</span></a></li>
            <li class="glyphicons charts"><a href="charts.html?lang=en"><i></i><span>Charts</span></a></li>
            <li class="hasSubmenu">
                <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_forms"><i></i><span><?php echo $this->lang->line('manage_flavors'); ?></span></a>
                <ul class="collapse" id="menu_forms">

                    <li class=""><a href="/admin/manage_flavors/sheps"><span><?php echo $this->lang->line('sheps'); ?></span></a></li>
                    <li class=""><a href="/admin/manage_flavors/flavors"><span><?php echo $this->lang->line('flavors'); ?></span></a></li>
                    <li class=""><a href="/admin/manage_flavors/fondants"><span><?php echo $this->lang->line('fondants'); ?></span></a></li>
                    <li class=""><a href="/admin/manage_flavors/servings"><span><?php echo $this->lang->line('servings'); ?></span></a></li>
                    <li class=""><a href="/admin/manage_flavors/sizes"><span><?php echo $this->lang->line('sizes'); ?></span></a></li>
                    <li class=""><a href="/admin/manage_flavors/tires"><span><?php echo $this->lang->line('tires'); ?></span></a></li>

                </ul>
            </li>
            <li class="hasSubmenu">
                <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_access"><i></i><span><?php echo $this->lang->line('manage_users'); ?></span></a>
                <ul class="collapse" id="menu_access">

                    <li class=""><a href="/admin/manage_flavors/sheps"><span><?php echo $this->lang->line('users'); ?></span></a></li>
                    <li class=""><a href="/admin/roles"><span><?php echo $this->lang->line('roles'); ?></span></a></li>
                    <li class=""><a href="/admin/access"><span><?php echo $this->lang->line('access'); ?></span></a></li>
                    <li class=""><a href="/admin/access_control"><span><?php echo $this->lang->line('access_control'); ?></span></a></li>


                </ul>
            </li>
            <li class="">
                <a class="glyphicons table" href="tables.html?lang=en"><i></i><span>Tables</span></a>
            </li>
            <li class="glyphicons calendar"><a href="calendar.html?lang=en"><i></i><span>Calendar</span></a></li>
            <li class="glyphicons user"><a href="login.html?lang=en"><i></i><span>Login</span></a></li>
        </ul>

        <ul>
            <li class="heading"><span>Sections</span></li>
            <li class="glyphicons coins"><a href="finances.html?lang=en"><i></i><span>Finances</span></a></li>
            <li class="hasSubmenu">
                <a data-toggle="collapse" class="glyphicons shopping_cart" href="#menu_ecommerce"><i></i><span>Online Shop</span></a>
                <ul class="collapse" id="menu_ecommerce">
                    <li class=""><a href="products.html?lang=en"><span>Products</span></a></li>
                    <li class=""><a href="product_edit.html?lang=en"><span>Add product</span></a></li>
                </ul>
            </li>
            <li class="glyphicons sort"><a href="pages.html?lang=en"><i></i><span>Site Pages</span></a></li>
            <li class="glyphicons picture"><a href="gallery.html?lang=en"><i></i><span>Photo Gallery</span></a></li>
            <li class="glyphicons adress_book"><a href="bookings.html?lang=en"><i></i><span>Bookings</span></a></li>
        </ul>
    </div>
</div>