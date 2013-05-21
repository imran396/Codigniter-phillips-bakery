<div id="content">
<ul class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('controls');?></li>
</ul>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $this->lang->line('controls');?></h3>
<div class="separator"></div>

<form class="form-horizontal"  action="<?php echo site_url('admin/controls/save')?>" id="form1" method="post" autocomplete="off">

<div class="well" style="padding-bottom: 20px; margin: 0;">
<input type="hidden" name="control_id" id="control_id" value="<?php echo isset($queryup[0]->control_id) ? $queryup[0]->control_id :set_value('control_id')?>">

<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="controller_name"><?php echo $this->lang->line('controller_name');?></label>
            <div class="controls"><input placeholder="<?php echo $this->lang->line('enter');?> <?php echo $this->lang->line('controller_name');?>" class="validate[required] span12" id="controller_name" name="controller_name" type="text" value="<?php echo isset($queryup[0]->controller_name) ? $queryup[0]->controller_name :set_value('controller_name')?>" /></div>
        </div>
    </div>
    <div class="span6">

        <div class="control-group">
            <label class="control-label" for="status"><?php echo $this->lang->line('status');?></label>
            <?php $status = isset($queryup[0]->status) ? $queryup[0]->status :1 ?>
            <div class="controls">    <label class="radio" style="margin-right:20px; margin-left:10px ">
                    <input type="radio" class="radio" controller_name="status" <?php if($status == 1 ){ ?> checked="checked" <?php } ?> value="1" />
                    <?php echo $this->lang->line('publish');?>
                </label>
                <label class="radio" >
                    <input type="radio" class="radio" controller_name="status" value="1" <?php if($status == 0 ){ ?> checked="checked" <?php } ?> />
                    <?php echo $this->lang->line('unpublish');?>
                </label></div>

        </div>

    </div>
</div>

<hr class="separator" />
<div class="form-actions">
    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
    <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
</div>
<div class="separator line"></div>

</div>

</form>
<!-- End Content -->
<div class="separator"></div>
<div class="innerLR">
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Primary Table</h4>
        </div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-bordered table-primary">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th><?php echo $this->lang->line('role');?></th>
                    <th><?php echo $this->lang->line('action');?></th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i=1;
                foreach($result as  $rows ) :?>
                    <tr>
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->controller_name; ?></td>
                        <td>
                            <a class="glyphicons no-js glyphicons-ok <?php if($rows->status ==1 ){ echo 'ok'; }else{ echo 'ban';}?>" href="/admin/controls/status/<?php echo $rows->control_id; ?>"><i></i></a>
                            <a class="glyphicons no-js edit glyphicons-edit" href="/admin/controls/edit/<?php echo $rows->control_id; ?>"><i></i></a>
                            <a class="glyphicons no-js remove_2 glyphicons-delete" href="/admin/controls/remove/<?php echo $rows->control_id; ?>"><i></i></a>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="separator"></div>


</div>
</div>
<br/>
</div>