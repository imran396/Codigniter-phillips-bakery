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
        <div class="widget widget-gray widget-body-white">
            <div class="widget-head">
                <h4 class="heading"><?php echo $this->lang->line('list_of').' '.$this->lang->line('list'); ?></h4>
            </div>
            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('cake_title');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                    <tr>
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->title; ?></td>
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
        </div>

</div>
</div>