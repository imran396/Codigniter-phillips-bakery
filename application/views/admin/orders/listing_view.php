<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('orders');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('orders');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/orders" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Order</a>
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
                    $search=$searchseg;
            }
            ?>
            <form action="/admin/orders/search" method="get"><input type="text" value="<?php if(!empty($search)){echo $search;} ?>"  name="search" placeholder="Search Orders" id="search"><button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok mbutton"><i></i><?php echo $this->lang->line('search');?></button></form>
        </div>
        <div class="clearfix"></div>
    </div>

<!-- End Content -->
<div class="separator"></div>
<br/>
<div class="innerLR hidden-paging" id="filterResult">
        <div class="widget">
            <div class="widget-body">
                <table class="table table-bordered table-primary table-striped order-sortable">
                    <thead>
                    <tr>
                        <th width="70">Order #</th>
                        <th width="110">Delivery Date</th>
                        <th width="166">Customer Name</th>
                        <th width="160">Order Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $var = ($paging[3] != '0')  ? ($paging[3]+1) : 1;
                    $i=$var;
                      foreach($paging[0] as $rows):
                        ?>
                        <tr>
                            <td class="center"><a href="/admin/productions/details/<?php echo $rows->order_code; ?>" ><?php echo $rows->order_code; ?></a></td>
                            <td class="center"><?php echo $this->productions_model->dateFormate($rows->delivery_date); ?></td>

                            <td><?php if($rows->first_name) echo $rows->first_name.' '.$rows->last_name; else echo "---"; ?></td>
                            <td class="center"><?php echo $rows->orderstatus; ?></td>
                            <td> <?php if($rows->order_status =='cancelled'){ ?><a class="btn-action glyphicons remove_2 btn-danger" href="/admin/orders/remove/<?php echo $rows->order_code; ?>"><i></i></a><?php } ?>

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
    </div><!-- End Wrapper -->
</div>

<script type="text/javascript">

</script>
