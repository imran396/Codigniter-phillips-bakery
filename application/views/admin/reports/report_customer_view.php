<div id="content">

    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
        <li class="divider"></li>
        <li><?php echo $this->lang->line('customer_reports');?></li>
    </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('category_reports');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/reports/customer_report_csvfile/?start_date=<?php echo isset($_REQUEST['start_date'])?$_REQUEST['start_date']:''; ?>&end_date=<?php echo isset($_REQUEST['end_date'])?$_REQUEST['end_date']:''; ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Export CSV</a>
        </div>
        <div class="buttons pull-right">

            <form action="/admin/reports/customer_reports" method="get">
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
                        <th width="166">Name</th>
                        <th width="93">Phone</th>
                        <th width="93">Address</th>
                        <th width="93">City</th>
                        <th width="93">Postal code</th>
                        <th width="93">Province</th>
                        <th width="93"># of orders</th>
                        <th width="93">Total sales of orders</th>
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
                                <td> <?php echo $rows->customer_name; ?></td>
                                <td> <?php echo $rows->phone_number; ?></td>
                                <td> <?php echo $rows->address_1; ?></td>
                                <td> <?php echo $rows->city; ?></td>
                                <td> <?php echo $rows->postal_code; ?></td>
                                <td> <?php echo $rows->province; ?></td>
                                <td> <?php echo $rows->ordered; ?></td>
                                <td> <?php echo $rows->totalPrice; ?></td>
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

</script>
