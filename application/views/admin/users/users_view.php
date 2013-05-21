<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('users');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/users"><?php echo $this->lang->line('create_users'); ?></a></li>
            <li class="divider"></li>
            <li><a href="/admin/users/listing"><?php echo $this->lang->line('list'); ?></a></li>
        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/users/save" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="id" id="id" value="<?php echo(isset($queryup[0]->id))? $queryup[0]->id : set_value('id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('users');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('username');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('username');?>" value="<?php echo(isset($queryup[0]->username))? $queryup[0]->username:set_value('username'); ?>"  class="span10" name="username" id="username"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('first_name');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('first_name');?>" value="<?php echo(isset($queryup[0]->first_name))? $queryup[0]->first_name:set_value('first_name'); ?>"  class="span10" name="first_name" id="first_name"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('last_name');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('last_name');?>" value="<?php echo(isset($queryup[0]->last_name))? $queryup[0]->last_name:set_value('last_name'); ?>"  class=" span10" name="last_name" id="last_name"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('password');?></label>
                                    <div class="controls">
                                        <input type="password" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('password');?>" value="<?php echo(isset($queryup[0]->password))? $queryup[0]->password:set_value('password'); ?>"  class="validate[required] span10" name="password" id="password"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('con_password');?></label>
                                    <div class="controls">
                                        <input type="password" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('con_password');?>" value=""  class="validate[required,equals[password]] span10" name="password_confirm" id="password_confirm"  />
                                    </div>
                                </div>


                                <div class="control-group">

                                    <label class="control-label"><?php echo $this->lang->line('role');?></label>
                                    <div class="controls">
                                        <select class="validate[required] " style="width: 100%;"  name="group_id">
                                            <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                                            <?php
                                            $group_id = (isset($queryup[0]->group_id))? $queryup[0]->group_id:set_value('group_id');
                                            foreach($groupresult as $group):
                                                ?>
                                                <option value="<?php echo $group->id;  ?>" <?php if($group_id == $group->id){ echo "selected='selected'"; } ?> ><?php echo $group->description; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group uniformjs">
                                    <label class="control-label"><?php echo $this->lang->line('status');?></label>
                                    <div class="separator"></div>
                                    <?php $status = (isset($queryup[0]->status))? $queryup[0]->status:1; ?>
                                    <label class="radio">
                                        <input type="radio" class="radio" name="status" value="1" <?php if($status ==1){?> checked="checked" <?php } ?> />
                                        <?php echo $this->lang->line('active');?>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" class="radio" name="status" value="0" <?php if($status !=1 ){?> checked="checked" <?php } ?>  />
                                        <?php echo $this->lang->line('inactive');?>
                                    </label><br/>

                                </div>

                            </div>

                        </div>


                        <div class="form-actions" style="margin: 0;">
                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
                            <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
                        </div>
                    </div>
                </div>
            </div

        </div>

    </div>
    </form>
<br/>

<!-- End Content -->

</div>