<div id="content">

    <ul class="breadcrumb">
        <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
        <li class="divider"></li>
        <li><?php echo $this->lang->line('categories');?></li>
    </ul>
    <br/>

    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('categories');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/categories" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add page</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="separator"></div>
<style>
    .btn-danger:hover, .btn-danger:active, .btn-danger.active, .btn-danger.disabled, .btn-danger[disabled] {
        background-color: #BD362F;
        color: #FFFFFF;
    }
    .icon-ok-custom {
        background-position: -289px 4px;
        height: 18px;
    }
</style>

<div class="innerLR">

        <div class="widget widget-gray widget-body-white">

            <div class="widget-body" style="padding: 10px 0;">

                <div data-toggle="buttons-radio" class="btn-group">

                </div>
                <table class="table table-bordered table-primary js-table-sortable">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('categories');?></th>
                        <th style="width: 1%;" class="center">Drag</th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                    <tr class="selectable" id="listItem_<?php echo $rows->category_id; ?>" >
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->title; ?></td>
                        <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                        <td>
                            <a href="/admin/categories/status/<?php echo $rows->category_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                            <a class="btn-action glyphicons pencil btn-success" href="/admin/categories/edit/<?php echo $rows->category_id; ?>"><i></i></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/categories/remove/<?php echo $rows->category_id; ?>"><i></i></a>


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
                    url:"<?php echo site_url('admin/categories/sorting')?>",
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