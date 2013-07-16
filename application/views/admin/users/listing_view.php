<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('users');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('users');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/users" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add page</a>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>

<br/>


<div class="innerLR">
        <div class="widget widget-gray widget-body-white">
            <div class="widget-body" style="padding: 10px 0;">
<!--                <select class="validate[required] " style="width: 100%;"  name="group_id">-->
<!--                    <option value="" >-----><?php //echo $this->lang->line('select_one');?><!-----</option>-->
<!--                    --><?php
//
//                    foreach($groupresult as $group):
//                        ?>
<!--                        <option value="--><?php //echo $group->id;  ?><!--" --><?php //if($group_id == $group->id){ echo "selected='selected'"; } ?><!-- >--><?php //echo $group->description; ?><!--</option>-->
<!--                    --><?php //endforeach; ?>
<!---->
<!--                </select>-->
                <table class="table table-bordered table-primary">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('customer_id');?></th>
                        <th><?php echo $this->lang->line('username');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('role');?></th>
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
                        <td><?php echo $rows->employee_id; ?></td>
                        <td><?php echo $rows->username; ?></td>
                        <td><?php echo $rows->first_name.' '.$rows->last_name; ?></td>
                        <td><?php echo $rows->description; ?></td>
                        <td>
                            <a href="/admin/users/status/<?php echo $rows->username; ?>" class="btn-action glyphicons btn <?php if($rows->active ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                            <a class="btn-action glyphicons pencil btn-success" href="/admin/users/edit/<?php echo $rows->username; ?>"><i></i></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/users/remove/<?php echo $rows->username; ?>"><i></i></a>
                            <a class="btn-action glyphicons qrcode" href="/admin/users/qrcode/<?php echo  $rows->employee_id; ?>"><i></i></a>



                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    <?php if($paging[1]){ ?>
        <div class="row-fluid row-fluid-custom"><div class="left-custom-paging">Showing <?php echo ($paging[3]+1); ?> to <?php echo ($i-1); ?> of <?php echo $paging[2]; ?> Entries.</div><div class="paging_bootstrap pagination custom-pagination"><?php echo $paging[1]; ?></div></div>
    <?php } ?>

</div>
</div>