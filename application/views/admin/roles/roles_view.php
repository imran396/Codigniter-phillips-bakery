<div id="content">
<ul class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('roles');?></li>
</ul>

<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $this->lang->line('roles');?></h3>
<div class="separator"></div>

<form class="form-horizontal"  action="<?php echo site_url('admin/role/save')?>" id="form1" method="post" autocomplete="off">

<div class="well" style="padding-bottom: 20px; margin: 0;">
<input type="hidden" name="group_id" id="group_id" value="<?php echo isset($queryup[0]->id) ? $queryup[0]->id :set_value('group_id')?>">
<input type="hidden" name="old_name" id="old_name" value="<?php echo isset($queryup[0]->name) ? $queryup[0]->name :set_value('old_name')?>">
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
            <div class="controls"><input placeholder="<?php echo $this->lang->line('enter');?> <?php echo $this->lang->line('description');?>"  class="span12" id="description" name="description" type="text" value="<?php echo isset($queryup[0]->description) ? $queryup[0]->description :set_value('description')?>" /></div>
        </div>
        <div class="control-group">
            <label class="control-label" for="status"><?php echo $this->lang->line('status');?></label>
            <?php $status = isset($queryup[0]->name) ? $queryup[0]->name :1 ?>
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
                    <th>Column Heading</th>
                    <th>Column Heading</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
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