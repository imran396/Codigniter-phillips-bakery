<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('category_reports');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('category_reports');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/reports/category_report_csvfile/?start_date=<?php echo isset($_REQUEST['start_date'])?$_REQUEST['start_date']:''; ?>&end_date=<?php echo isset($_REQUEST['end_date'])?$_REQUEST['end_date']:''; ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Export CSV</a>
        </div>
        <div class="buttons pull-right">

            <form action="/admin/reports/category_reports" method="get">
                From&nbsp;<input type="text" value="<?php echo isset($_REQUEST['start_date'])?$_REQUEST['start_date']:''; ?>"  name="start_date" placeholder="<?php echo $this->lang->line('enter_start_date'); ?>" id="start_date">
                &nbsp;To&nbsp;<input type="text" value="<?php echo isset($_REQUEST['end_date'])?$_REQUEST['end_date']:''; ?>"  name="end_date" placeholder="<?php echo $this->lang->line('enter_end_date'); ?>" id="end_date"><button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok mbutton"><i></i><?php echo $this->lang->line('search');?></button></form>

        </div>
        <div class="clearfix"></div>
    </div>

<!-- End Content -->
<!-- Check git access -->
<div class="separator"></div>
<br/>
<div class="innerLR hidden-paging" id="filterResult">
        <div class="widget">
            <div class="widget-body">
                <table class="table table-bordered table-primary table-striped">
                    <thead>
                    <tr>
                        <th width="70">No #</th>
                        <th width="166">Cake Name</th>
                        <th width="93">Category Name</th>
                        <th width="93">Ordered</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($result)){
                        $i=1;
                        foreach($result as $rows):

                        ?>
                            <tr>
                                <td> <?php echo $i; ?></td>
                                <td> <?php echo $rows->cake_name; ?></td>
                                <td> <?php echo $rows->cake_category_name; ?></td>
                                <td> <?php echo $rows->ordered; ?></td>
                            </tr>
                        <?php $i++; endforeach; }else{ ?>
                            <tr><td colspan="4">No Records found</td></tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div><!-- End Wrapper -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#start_date").datepicker();
        $("#end_date").datepicker();
    });
</script>

