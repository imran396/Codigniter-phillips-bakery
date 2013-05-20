<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('cakes');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/cakes"><?php echo $this->lang->line('create_location'); ?></a></li>
            <li class="divider"></li>
            <li><a href="/admin/cakes/listing"><?php echo $this->lang->line('list'); ?></a></li>
        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>

<!-- End Content -->
<div class="separator"></div>

<br/>


<div class="innerLR">
        <div class="widget widget-body-white">
            <div class="widget-head">
                <h4 class="heading"><?php echo $this->lang->line('list_of').' '.$this->lang->line('cakes'); ?></h4>
            </div>
            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('cake_title');?></th>
                        <th><?php echo $this->lang->line('category_id');?></th>
                        <th><?php echo $this->lang->line('flavour_id');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $var = ($paging[3] != '0')  ? ($paging[3]+1) : 1;
                    $i=$var;
                    foreach($paging[0]->result() as  $rows ) :?>
                    <tr>
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->title; ?></td>
                        <td><?php echo $rows->categories_name; ?></td>
                        <td><?php echo $rows->flavours_name; ?></td>
                        <td>
                            <a class="glyphicons no-js glyphicons-ok <?php if($rows->status ==1 ){ echo 'ok'; }else{ echo 'ban';}?>" href="/admin/cakes/status/<?php echo $rows->cake_id; ?>"><i></i></a>
                            <a class="glyphicons no-js edit glyphicons-edit" href="/admin/cakes/edit/<?php echo $rows->cake_id; ?>"><i></i></a>
                            <a class="glyphicons no-js remove_2 glyphicons-delete" href="/admin/cakes/remove/<?php echo $rows->cake_id; ?>"><i></i></a>
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