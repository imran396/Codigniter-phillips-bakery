<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('access_control');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="innerLR">
    <table class="table table-bordered table-striped" >
        <tr><td><?php echo $this->lang->line('role_group'); ?></td></tr>
        <tr><td>

                <form action="" method="get" onsubmit="access" >
                <select onclick="" style="width: 100%;"  name="control_id" onchange="window.location=this.value">
                     <option value="<?php echo site_url('admin/access_controls/access/0')?>" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    foreach($groupresult as $group):
                        ?>
                        <option value="<?php echo site_url('admin/access_controls/access/'.$group->id)?>" <?php if($group_id == $group->id ){ echo "selected='selected'"; } ?> ><?php echo $group->description; ?></option>
                    <?php endforeach; ?>

                </select>
                </form>

            </td></tr>

    </table>
        </div>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/access_controls/save/<?php echo $this->uri->segment(4,0)?>" name="form1" id="form1">
         <div class="innerLR">

     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('access_control');?></h4>
                    </div>
                    <div class="widget-body" style="padding: 10px 0;">

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th colspan="2"><?php echo $this->lang->line('controller_name');?></th>
                                 <td><?php echo $this->lang->line('listing');?></td><td><?php echo $this->lang->line('save');?></td><td><?php echo $this->lang->line('edit');?></td><td><?php echo $this->lang->line('delete');?></td><td><?php echo $this->lang->line('view');?></td><td><?php echo $this->lang->line('status');?></td><td><?php echo $this->lang->line('others');?></td>

                            </tr>
                            <tr>

                                        <?php  foreach($conresult as $control): ?>
                                            <input type="hidden" name="control_id[]" value="<?php echo $control->control_id;  ?>" />
                                            <tr>
                                                <th>
                                                    <?php echo $control->controller_name; ?>
                                                </th>
                                                <td>
                                                    <?php
                                                    $getvalue=$this->access_control_model->getCheck($group_id,$control->control_id);
                                                    ?>

                                                    <input type="checkbox" class="input-mini" name="controller_<?php echo $control->control_id;?>"  <?php echo (!empty($getvalue[0]->controller) ==1) ? "checked='checked'" :''; ?> value="1"/>
                                                </td>
                                                <td>

                                                    <input type="checkbox" class="input-mini" name="listing_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->listing) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="save_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->save) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="edit_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->edit) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="delete_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->delete) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                    </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="view_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->view) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="status_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->status) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                    </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="others_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->others) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                    </td>

                                            </tr>
                                        <?php endforeach; ?>

                            </tr>

                        </table>

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
