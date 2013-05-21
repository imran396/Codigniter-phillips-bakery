<div id="content">
<ul class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('roles');?></li>
</ul>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $this->lang->line('roles');?></h3>
<div class="separator"></div>

<form class="form-horizontal"  action="<?php echo site_url('admin/roles/save')?>" id="form1" method="post" autocomplete="off">

<div class="well" style="padding-bottom: 20px; margin: 0;">
<input type="hidden" name="id" id="id" value="<?php echo isset($queryup[0]->id) ? $queryup[0]->id :set_value('group_id')?>">

<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="name"><?php echo $this->lang->line('role_group');?></label>
            <div class="controls"><input placeholder="<?php echo $this->lang->line('enter');?> <?php echo $this->lang->line('role_group');?>" class="validate[required] span12" id="name" name="name" type="text" value="<?php echo isset($queryup[0]->name) ? $queryup[0]->name :set_value('name')?>" /></div>
        </div>
    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="description"><?php echo $this->lang->line('description');?></label>
            <div class="controls"><input placeholder="<?php echo $this->lang->line('enter');?> <?php echo $this->lang->line('description');?>"  class="validate[required] span12" id="description" name="description" type="text" value="<?php echo isset($queryup[0]->description) ? $queryup[0]->description :set_value('description')?>" /></div>
        </div>
        <div class="control-group">
            <label class="control-label" for="status"><?php echo $this->lang->line('status');?></label>
            <?php $status = isset($queryup[0]->status) ? $queryup[0]->status :1 ?>
            <div class="controls">    <label class="radio" style="margin-right:20px; margin-left:10px ">
                    <input type="radio" class="radio" name="status" <?php if($status == 1 ){ ?> checked="checked" <?php } ?> value="1" />
                    <?php echo $this->lang->line('publish');?>
                </label>
                <label class="radio" >
                    <input type="radio" class="radio" name="status" value="1" <?php if($status == 0 ){ ?> checked="checked" <?php } ?> />
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
                    <th><?php echo $this->lang->line('description');?></th>
                    <th><?php echo $this->lang->line('action');?></th>
                </tr>
                </thead>
                <tbody>

                <?php
                $i=1;
                foreach($result as  $rows ) :?>
                    <tr>
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->description; ?></td>
                        <td>
                            <a class="glyphicons no-js glyphicons-ok <?php if($rows->status ==1 ){ echo 'ok'; }else{ echo 'ban';}?>" href="/admin/roles/status/<?php echo $rows->id; ?>"><i></i></a>
                            <a class="glyphicons no-js edit glyphicons-edit" href="/admin/roles/edit/<?php echo $rows->id; ?>"><i></i></a>
                            <a class="glyphicons no-js remove_2 glyphicons-delete" href="/admin/roles/remove/<?php echo $rows->id; ?>"><i></i></a>
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