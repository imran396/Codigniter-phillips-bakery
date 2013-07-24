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
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/users/save" name="form1" id="form1">
        <div class="well" style="padding-bottom: 20px; margin: 0;">
            <div class="widget-head">
                <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('users');?></h4>
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
                        <label class="control-label" for="username"><?php echo $this->lang->line('username');?></label>
                        <div class="controls">

                            <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('username');?>" value="<?php echo(isset($queryup[0]->username))? $queryup[0]->username:set_value('username'); ?>"  class="validate[required] span12" name="username" id="username"  />
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


                </div>
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="password"><?php echo $this->lang->line('password');?></label>
                        <div class="controls"><input type="password" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('password');?>" value=""  class="validate[required] span10" name="password" id="password"  /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="confirm_password"><?php echo $this->lang->line('con_password');?></label>
                        <div class="controls"><input type="password" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('con_password');?>" value=""  class="validate[required,equals[password]] span10" name="password_confirm" id="password_confirm"  /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email"><?php echo $this->lang->line('email');?></label>
                        <div class="controls"><input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('email');?>" value="<?php echo(isset($queryup[0]->email))? $queryup[0]->email:set_value('email'); ?>"  class="validate[custom[email]] span12" name="email" id="email"  /></div>
                    </div>
           <!--         <div class="control-group">

                        <label class="control-label"><?php /*echo $this->lang->line('location');*/?></label>
                        <div class="controls">
                            <select style="width: 100%;"  name="location_id" >
                                <option value="" >---<?php /*echo $this->lang->line('select_one');*/?>---</option>
                                <?php
/*                                foreach($locresult as $location):
                                    */?>
                                    <option value="<?php /*echo $location->location_id; */?>" ><?php /*echo $location->title; */?></option>
                                <?php /*endforeach; */?>

                            </select>
                        </div>
                    </div>-->

                </div>
            </div>

            <hr class="separator" />

            <div class="form-actions">
                <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
                <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
            </div>
            <div class="separator line"></div>


        </div>

    </form>
    <br/>

    <!-- End Content -->

</div>