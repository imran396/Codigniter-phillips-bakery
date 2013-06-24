<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('gallery');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('gallery');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/gallery" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add page</a>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>
<br/>
<div class="innerLR">
        <div class="widget widget-gray widget-body-white">
            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary js-table-sortable">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('gallery_image');?></th>
                        <th><?php echo $this->lang->line('cake_title');?></th>
                        <th style="width: 1%;" class="center"><?php echo $this->lang->line('drag');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                    <tr class="selectable" id="listItem_<?php echo $rows->gallery_id; ?>" >
                        <td class="center"><?php echo $i; ?></td>
                        <td><img src="<?php echo base_url(); ?>/<?php echo $rows->image; ?>" height="50" width="50" ></td>
                        <td><?php echo $rows->title; ?></td>
                        <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                        <td>
                            <a class="glyphicons no-js glyphicons-ok <?php if($rows->status ==1 ){ echo 'ok'; }else{ echo 'ban';}?>" href="/admin/gallery/status/<?php echo $rows->gallery_id; ?>"><i></i></a>
                            <a class="glyphicons no-js remove_2 glyphicons-delete" href="/admin/gallery/remove/<?php echo $rows->gallery_id; ?>"><i></i></a>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
</div>