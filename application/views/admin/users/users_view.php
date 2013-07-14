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
                <label class="control-label" for="password"><?php echo $this->lang->line('password');?></label>
                <div class="controls"><input type="password" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('password');?>" value="<?php echo(isset($queryup[0]->password))? $queryup[0]->password:set_value('password'); ?>"  class="validate[required] span10" name="password" id="password"  /></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="confirm_password"><?php echo $this->lang->line('con_password');?></label>
                <div class="controls"><input type="password" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('con_password');?>" value=""  class="validate[required,equals[password]] span10" name="password_confirm" id="password_confirm"  /></div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email"><?php echo $this->lang->line('email');?></label>
                <div class="controls"><input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('email');?>" value="<?php echo(isset($queryup[0]->email))? $queryup[0]->email:set_value('email'); ?>"  class="validate[custom[email]] span12" name="email" id="email"  /></div>
            </div>
            <div class="control-group">

                <label class="control-label"><?php echo $this->lang->line('location');?></label>
                <div class="controls">
                    <select style="width: 100%;"  name="location_id" >
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                        <?php
                        foreach($locresult as $location):
                            ?>
                            <option value="<?php echo $location->location_id; ?>" ><?php echo $location->title; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>

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