<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
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
                    <div class="control-group">
                        <label class="control-label" for="lastname"><?php echo $this->lang->line('passcode');?></label>
                        <div class="controls"><input type="text" placeholder="<?php echo $this->lang->line('passcode').' '.$this->lang->line('passcode');?>" value="<?php echo(isset($queryup[0]->employee_id))? $queryup[0]->employee_id:set_value('employee_id'); ?>"  class="span4" name="employee_id" id="employee_id"  /></div>
                    </div>
               </div>
                <div class="span6">

                    <div class="control-group">
                        <label class="control-label" for="username">Revel User</label>
                        <div class="controls">
                            <select style="width: 100%;" id="revel_user_id"  name="revel_user_id" >
                                <?php $revel_user_id = (isset($queryup[0]->revel_user_id))? $queryup[0]->revel_user_id:set_value('revel_user_id');
                                      foreach($revel_users as $rows): ?>
                                <option value="<?php echo $rows->id ?>" <?php if($revel_user_id ==  $rows->id ){ echo "selected='selected'"; } ?> ><?php echo $rows->first_name.' '.$rows->last_name; ?></option>
                                <?php endforeach;?>

                            </select>
                           </div>
                    </div

                    <div class="control-group">

                        <label class="control-label">Access Role</label>
                        <div class="controls">
                            <select onclick="" style="width: 100%;"  name="group_id" >
                                <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                                <?php
                                echo $group_id = (isset($queryup[0]->group_id))? $queryup[0]->group_id:set_value('group_id');
                                foreach($groupresult as $group):
                                    ?>
                                    <option value="<?php echo $group->id; ?>" <?php if($group_id == $group->id){ echo "selected='selected'"; } ?> ><?php echo $group->description; ?></option>
                                <?php endforeach; ?>

                            </select>

                        </div>
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