<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('cakes');?></li>
        </ul>
    <br/>

    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('cakes');?></h3>

        <div class="buttons pull-right">
            <a href="/admin/cakes" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Cake</a>
        </div>
        <div class="buttons pull-right">
            <?php
            $searchval =  isset($_REQUEST['search']) ? $_REQUEST['search']:'';
            $consearchseg =  $this->uri->segment(3,NULL);
            $searchseg =  $this->uri->segment(4,NULL);
            if($searchval){
                $search=$searchval;
            }else{
                if($consearchseg =='search')
                $search=urldecode($searchseg);
            }
            ?>
           <form action="/admin/cakes/search" method="get"><input type="text" value="<?php if(!empty($search)){echo $search;} ?>"  name="search" placeholder="serach by name,tag" id="search"><button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok mbutton"><i></i><?php echo $this->lang->line('search');?></button></form>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>

<br/>


<div class="innerLR">
        <div class="widget widget-body-white">

            <div class="widget-body" style="padding: 10px 0;">
                <table class="cake-sorting table table-bordered table-primary js-table-sortable">
                    <thead>
                    <tr>
                 <!--       <th class="center">No.</th>-->
                        <th><?php echo $this->lang->line('cake_title');?></th>
                        <th><?php echo $this->lang->line('category_id');?></th>
                        <th><?php echo $this->lang->line('flavour_id');?></th>
                        <th style="width: 90px"><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $var = ($paging[3] != '0')  ? ($paging[3]+1) : 1;
                    $i=$var;
                    foreach($paging[0]->result() as  $rows ) :
                    ?>
                        <tr class="selectable" id="listItem_<?php echo $rows->cake_id; ?>" >
                       <!-- <td class="center"><?php /*echo $i; */?></td>-->
                        <td><?php echo $rows->title; ?></td>
                        <td><?php echo $rows->categories_name; ?></td>
                        <td><?php if($rows->flavour_id){ echo $this->cakes_model->getSerializeFlavour($rows->cake_id); } ?></td>
                        <td>

                            <a data-original-title="<?php echo $this->lang->line('status'); ?>" data-placement="top" data-toggle="tooltip" href="/admin/cakes/status/<?php echo $rows->cake_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                            <a data-original-title="<?php echo $this->lang->line('edit'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons pencil btn-success" href="/admin/cakes/edit/<?php echo $rows->cake_id; ?>"><i></i></a>
                            <a data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger" href="/admin/cakes/remove/<?php echo $rows->cake_id; ?>"><i></i></a>

                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>

            </div>

            <?php if($paging[1]){ ?>
                <div class="row-fluid-custom"><div class="left-custom-paging">Showing <?php echo ($paging[3]+1); ?> to <?php echo ($i-1); ?> of <?php echo $paging[2]; ?> Entries.</div><div class="paging_bootstrap pagination custom-pagination"><?php echo $paging[1]; ?></div></div>
            <?php } ?>

        </div>
</div>
<style type="text/css">
    .mbutton{ margin-top:-10px }
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/assets/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">

        $(document).ready(function() {

            $('.cake-sorting').dataTable( {
                "aaSorting": [[0,'asc']],
                "aoColumnDefs": [
                    { "bSortable":false, "aTargets": [3 ] }

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