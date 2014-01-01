<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('establishments');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('establishments');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/establishments" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New <?php echo $this->lang->line('establishments');?></a>
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
                        <th><?php echo $this->lang->line('establishment_id');?></th>
                        <th><?php echo $this->lang->line('cake_id');?></th>
                        <th><?php echo $this->lang->line('is_custom_product');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                        <tr class="selectable" id="listItem_<?php echo $rows->establishment_id; ?>" >
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->revel_establishment_id; ?></td>
                        <td><?php echo $rows->revel_product_id; ?></td>
                        <td><?php if($rows->is_custom_product == 1){ echo "Yes"; }else{ echo "No"; } ?></td>
                        <td>

                            <a href="/admin/establishments/status/<?php echo $rows->establishment_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                            <a class="btn-action glyphicons pencil btn-success" href="/admin/establishments/edit/<?php echo $rows->establishment_id; ?>"><i></i></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/establishments/remove/<?php echo $rows->establishment_id; ?>"><i></i></a>

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
                    url:"<?php echo site_url('admin/establishments/sorting')?>",
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