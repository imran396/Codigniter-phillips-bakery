<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('zones');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('zones');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/zones" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Delivery Zone</a>
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
                        <th><?php echo $this->lang->line('zone_name');?></th>
                        <th style="width: 1%;" class="center"><?php echo $this->lang->line('drag');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                        <tr class="selectable" id="listItem_<?php echo $rows->zone_id; ?>" >
                            <td class="center"><?php echo $i; ?></td>
                            <td><?php echo $rows->title; ?></td>
                            <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                            <td>

                                <a href="/admin/zones/status/<?php echo $rows->zone_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                                <a class="btn-action glyphicons pencil btn-success" href="/admin/zones/edit/<?php echo $rows->zone_id; ?>"><i></i></a>
                                <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/zones/remove/<?php echo $rows->zone_id; ?>"><i></i></a>

                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
</div>
<script type="text/javascript">

    $(document).ready(function() {

        $(".js-table-sortable").sortable({
            opacity: '0.5',
            axis:'vertically',
            handle : '.js-sortable-handle',
            update : function () {
                var order = $(this).sortable('serialize');
                console.log(order);
                $.ajax({
                    type: "POST",
                    url:"<?php echo site_url('admin/zones/sorting')?>",
                    data:order,
                    cache: false,
                    success: function(html){
                        $('#loader').html(html);
                    }
                });
            }
        });
    });

</script>