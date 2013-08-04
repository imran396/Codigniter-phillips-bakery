<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('flavours');?></li>
        </ul>

    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('flavours');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/flavours" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Flavour</a>
        </div>
        <div class="clearfix"></div>
    </div>

<!-- End Content -->
<div class="separator"></div>
<br/>
<div class="innerLR">
        <div class="widget widget-gray widget-body-white">

            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary js-table-sortable flavour-sortable">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('flavours');?></th>
                        <th style="width: 1%;" class="center"><?php echo $this->lang->line('drag');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                        <tr class="selectable" id="listItem_<?php echo $rows->flavour_id; ?>" >
                            <td class="center"><?php echo $i; ?></td>
                            <td><?php echo $rows->title; ?></td>
                            <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                            <td>
                                <a href="/admin/flavours/status/<?php echo $rows->flavour_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                                <a class="btn-action glyphicons pencil btn-success" href="/admin/flavours/edit/<?php echo $rows->flavour_id; ?>"><i></i></a>
                                <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/flavours/remove/<?php echo $rows->flavour_id; ?>"><i></i></a>


                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

</div>
</div>
<style type="text/css">
    .row-fluid {
        display: none;
    }
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/assets/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">

    $(document).ready(function() {

        $('.flavour-sortable').dataTable( {
            "aaSorting": [[1,'asc']],
            "aoColumnDefs": [
                { "bSortable":false, "aTargets": [2,3 ] }

            ],
            "iDisplayLength": 50,
            "bPaginate": false
        } );

    } );

</script>
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
                    url:"<?php echo site_url('admin/flavours/sorting')?>",
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