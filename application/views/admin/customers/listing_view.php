<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('customers');?></li>
        </ul>
    <br/>

    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('customers');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/customers" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Customer</a>
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
            <form action="/admin/customers/search" method="get"><input type="text" value="<?php if(!empty($search)){echo $search;} ?>"  name="search" placeholder="Search Customers" id="search"><button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok mbutton"><i></i><?php echo $this->lang->line('search');?></button></form>
        </div>

        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>

<br/>


<div class="innerLR">
        <div class="widget widget-gray widget-body-white">

            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary customers-sortable">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('phone_number');?></th>
                        <th><?php echo $this->lang->line('orders');?></th>
                        <th><?php echo $this->lang->line('estimates');?></th>
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
                        <td><?php echo $rows->first_name.' '.$rows->last_name; ?></td>
                        <td> <?php $from = $rows->phone_number;
                            echo $to = sprintf("%s-%s-%s",
                                substr($from, 0, 3),
                                substr($from, 3, 3),
                                substr($from, 6, 8));?></td>
                        <td><?php if($this->customers_model->orderCount($rows->customer_id,301) > 0){ ?><a class="orderStatus" rel="301" id="<?php echo $rows->customer_id; ?>" href="javascript:void(0)"><?php echo $this->customers_model->orderCount($rows->customer_id,301); ?></a><?php }else{ echo 0; } ?></td>
                        <td><?php if($this->customers_model->orderCount($rows->customer_id,300) > 0){ ?><a class="orderStatus" rel="300" id="<?php echo $rows->customer_id; ?>" href="javascript:void(0)"><?php echo $this->customers_model->orderCount($rows->customer_id,300); ?></a><?php }else{ echo 0; } ?></td>
                        <td>
                            <a href="/admin/customers/status/<?php echo $rows->customer_id; ?>" class="btn-action glyphicons btn <?php if($rows->status ==1 ){ echo 'btn-success'; }else{ echo 'btn-danger';}?> " type="button" name="includeicon"><i class="icon-ok icon-ok-custom"></i></a>
                            <a class="btn-action glyphicons pencil btn-success" href="/admin/customers/edit/<?php echo $rows->customer_id; ?>"><i></i></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/customers/remove/<?php echo $rows->customer_id; ?>"><i></i></a>

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
    <!-- Button to trigger modal -->
    <script type="text/javascript" language="javascript">
        jQuery(document).ready(function(){

            $('.orderStatus').click(function(){

                var customer_id = $(this).attr('id');
                var order_status = $(this).attr('rel');
                $.ajax({
                    url:"<?php echo site_url('admin/customers/order_list')?>",
                    data:"customer_id="+customer_id+"&order_status="+order_status,
                    type:"post",
                    success: function(val){
                        $('.modal-body').html(val);
                        $('#myModal').modal('toggle');
                        //console.log(val);
                    }
                })

            })



        })
    </script>

    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Customer Order Lists</h3>
        </div>
        <div class="modal-body">
            <p>One fine body…</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
</div>
</div>
