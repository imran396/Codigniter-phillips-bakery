<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('auditlog');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('auditlog');?></h3>
        <div class="clearfix"></div>
    </div>

<!-- End Content -->
<div class="separator"></div>
<br/>
<div class="innerLR hidden-paging" id="filterResult">
        <div class="widget">
            <div class="widget-body">
                <table class="table table-bordered table-primary table-striped">
                    <thead>
                    <tr>
                        <th width="70">log #</th>
                        <th width="166">Employee Id</th>
                        <th width="93">Log Name</th>
                        <th width="93">Description</th>
                        <th width="93">Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $var = ($paging[3] != '0')  ? ($paging[3]+1) : 1;
                    $i=$var;
                    foreach($paging[0]->result() as $rows):

                        ?>
                        <tr>
                            <td> <?php echo $rows->id; ?></td>
                            <td> <?php echo $rows->employee_id; ?></td>
                            <td> <?php echo $rows->audit_name; ?></td>
                            <td> <?php echo $rows->description; ?></td>
                            <td> <?php echo $rows->created_time; ?></td>
                        </tr>
                        <?php $i++; endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php if($paging[1]){ ?>
        <div class="row-fluid row-fluid-custom"><div class="left-custom-paging">Showing <?php echo ($paging[3]+1); ?> to <?php echo ($i-1); ?> of <?php echo $paging[2]; ?> Entries.</div><div class="paging_bootstrap pagination custom-pagination"><?php echo $paging[1]; ?></div></div>
    <?php } ?>
    </div><!-- End Wrapper -->
</div>

<script type="text/javascript">

</script>
