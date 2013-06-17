<div class="navbar main">
<?php
    $users = $this->ion_auth->get_users_array();
?>
    <a href="http://www.bakery.local" class="appbrand"><span><?php echo $this->lang->line('site_name');?><span><?php echo $this->lang->line('admin_panel');?></span></span></a>

    <button type="button" class="btn btn-navbar">
        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
    </button>

    <ul class="topnav pull-right">

        <li class="account">
            <a data-toggle="dropdown" href="form_demo.html?lang=en" class="glyphicons logout lock"><span class="hidden-phone text"><?php echo $this->session->userdata('username'); ?></span><i></i></a>
            <ul class="dropdown-menu pull-right">
                <li class="highlight profile">
							<span>
								<span class="heading">Profile <a href="/admin/users/profile" class="pull-right">edit</a></span>
								<span class="img"></span>
								<span class="details">
									<a href="/admin/users/profile">
                                    <?php
                                        $user = $this->ion_auth->get_user($this->session->userdata('user_id'));
                                       echo $user->first_name.' '.$user->last_name; ?></a>
								</span>
								<span class="clearfix"></span>
							</span>
                </li>
                <li>
							<span>
								<a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="/auth/logout">Sign Out</a>
							</span>
                </li>
            </ul>
        </li>
    </ul>
</div>