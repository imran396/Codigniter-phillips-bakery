<div id="content">

    <ul class="breadcrumb">
        <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
        <li class="divider"></li>
        <li><?php echo $this->lang->line('users');?></li>
    </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('users');?></h3>
        <div class="clearfix"></div>
    </div>
    <br/>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/users/update_profile" name="form2" id="form2">
        <div class="widget widget-2">
            <div class="widget-head">
                <h4 class="heading glyphicons settings"><i></i><?php echo $this->lang->line('account_settings');?></h4>
            </div>
            <div class="widget-body" style="padding-bottom: 0;">
                <div class="row-fluid">
                    <div class="span3">
                        <strong>Change password</strong>
                        <p class="muted"><?php echo $this->lang->line('account_settings_info');?></p>
                    </div>
                    <div class="span9">

                        <label for="inputUsername"><?php echo $this->lang->line('username');?></label>
                        <input type="hidden" name="username" value="<?php echo $queryup[0]->username;?>">
                        <input type="text" id="inputUsername" class="span10" value="<?php echo  $queryup[0]->username;?>" disabled="disabled" />
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>

                        <div class="separator"></div>

                        <label for="inputPasswordOld">Old password</label>
                        <input type="password" id="old" name="old" class="span10" value="" placeholder="Leave empty for no change" />
                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
                        <div class="separator"></div>
                        <label for="inputPasswordNew">New password</label>
                        <input type="password" id="new" name="new" class="span12" value="" placeholder="Leave empty for no change" />
                        <div class="separator"></div>

                        <label for="inputPasswordNew2">Repeat new password</label>
                        <input type="password" id="new_confirm" name="new_confirm" class="span12" value="" placeholder="Leave empty for no change" />
                        <div class="separator"></div>
                    </div>
                </div>


                <div class="form-actions" style="margin: 0; padding-right: 0;">
                    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save changes</button>
                </div>
            </div>
        </div>
    </form>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/users/update" name="form1" id="form1">
        <div class="well" style="padding-bottom: 20px; margin: 0;">
            <div class="widget-head">
                <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('account_details');?></h4>
            </div>
            <hr class="separator" />
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="firstname"><?php echo $this->lang->line('first_name');?></label>
                        <div class="controls"><input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('first_name');?>" value="<?php echo(isset($queryup[0]->first_name))? $queryup[0]->first_name:set_value('first_name'); ?>"  class="span12" name="first_name" id="first_name"  /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname"><?php echo $this->lang->line('last_name');?></label>
                        <div class="controls"><input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('last_name');?>" value="<?php echo(isset($queryup[0]->last_name))? $queryup[0]->last_name:set_value('last_name'); ?>"  class="span12" name="last_name" id="last_name"  /></div>
                    </div>



                </div>
                <div class="span6">

                    <div class="control-group">
                        <label class="control-label" for="email"><?php echo $this->lang->line('email');?></label>
                        <div class="controls"><input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('email');?>" value="<?php echo(isset($queryup[0]->email))? $queryup[0]->email:set_value('email'); ?>"  class="validate[custom[email]] span12" name="email" id="email"  /></div>
                    </div>


                </div>
            </div>


            <div class="form-actions">
                <input type="hidden" name="username" value="<?php echo(isset($queryup[0]->username))? $queryup[0]->username:set_value('username'); ?>">
                <input type="hidden" name="id" value="<?php echo(isset($queryup[0]->id))? $queryup[0]->id:set_value('id'); ?>">
                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
                <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
            </div>
            <div class="separator line"></div>


        </div>
    </form>

    <br/>

    <!-- End Content -->

</div>