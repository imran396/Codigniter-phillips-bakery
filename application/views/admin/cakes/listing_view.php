<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('cakes');?></li>
        </ul>
    <br/>

    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('cakes');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/cakes" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add page</a>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>

<br/>


<div class="innerLR">
        <div class="widget widget-body-white">

            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary js-table-sortable">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('cake_title');?></th>
                        <th><?php echo $this->lang->line('category_id');?></th>
                        <th><?php echo $this->lang->line('flavour_id');?></th>
                        <th style="width: 1%;" class="center"><?php echo $this->lang->line('drag');?></th>
                        <th style="width: 90px"><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $var = ($paging[3] != '0')  ? ($paging[3]+1) : 1;
                    $i=$var;
                    foreach($paging[0]->result() as  $rows ) :?>
                        <tr class="selectable" id="listItem_<?php echo $rows->cake_id; ?>" >
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->title; ?></td>
                        <td><?php echo $rows->categories_name; ?></td>
                        <td><?php echo $rows->flavours_name; ?></td>
                        <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                        <td>
                            <a href="/admin/cakes/status/<?php echo $rows->cake_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                            <a class="btn-action glyphicons pencil btn-success" href="/admin/cakes/edit/<?php echo $rows->cake_id; ?>"><i></i></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/cakes/remove/<?php echo $rows->cake_id; ?>"><i></i></a>

                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>

            </div>
            <?php if($paging[1]){ ?>
                <div class="row-fluid"><div class="span6" style="width: 300px"><div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to <?php echo ($i-1); ?> of <?php echo $paging[2]; ?> entries</div></div><div class="span6" style="width: 65%; float: right"><div class="dataTables_paginate paging_bootstrap pagination"><?php echo $paging[1]; ?></div></div></div>
            <?php } ?>
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
                    url:"<?php echo site_url('admin/cakes/sorting')?>",
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