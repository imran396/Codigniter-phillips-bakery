<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('price_matrix');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/price_matrix"><?php echo $this->lang->line('manage_price_matrix'); ?></a></li>

        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="innerLR">
    <table class="table table-bordered table-striped" >
        <tr><td>

                <form action="" method="get" onsubmit="access" >
                <select onclick="" style="width: 100%;"  name="control_id" onchange="window.location=this.value">
                     <option value="<?php echo site_url('admin/access_control/access/0')?>" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    foreach($groupresult as $group):
                        ?>
                        <option value="<?php echo site_url('admin/access_control/access/'.$group->id)?>" <?php if($group_id == $group->id ){ echo "selected='selected'"; } ?> ><?php echo $group->name; ?></option>
                    <?php endforeach; ?>

                </select>
                </form>

            </td></tr>

    </table>
        </div>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/access_control/save/<?php echo $this->uri->segment(4,0)?>" name="form1" id="form1">
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
                                 <td>Create</td><td>Update</td><td>Delete</td><td>Status</td><td>Others</td>

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

                                                    <input type="checkbox" class="input-mini" name="create_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->create) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="update_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->update) ==1) ? "checked='checked'" :''; ?>  value="1"/>
                                                    </td>
                                                <td>
                                                    <input type="checkbox" class="input-mini" name="delete_<?php echo $control->control_id;?>" <?php echo (!empty($getvalue[0]->delete) ==1) ? "checked='checked'" :''; ?>  value="1"/>
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
