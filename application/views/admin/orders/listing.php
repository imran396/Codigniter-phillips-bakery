<div class="innerLR" id="filterResult">
    <div class="widget">
        <div class="widget-body">
            <table class="table table-bordered table-primary js-table-sortable">
                <thead>
                <tr>
                    <th width="70">Order #</th>
                    <th width="166">Customer Name</th>
                    <th width="170">Cake Name</th>
                    <th width="93">Date</th>
                    <th width="84">Flavor</th>
                    <th width="110">Order Status</th>
                    <th width="150">Production Status</th>
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
                        <td><?php echo $rows->first_name.' '.$rows->last_name; ?></td>
                        <td><?php echo $rows->cake_name; ?></td>
                        <td class="center"><?php echo $this->productions_model->dateFormate($rows->delivery_date); ?></td>
                        <td><?php echo $rows->flavour_name; ?></td>
                        <td class="center"><?php echo $rows->order_status; ?></td>
                        <td class="green"><?php echo $rows->production_status;?></td>
                    </tr>
                    <?php $i++; endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php if($paging[1]){ ?>
        <div class="row-fluid"><div class="span6" style="width: 300px"><div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to <?php echo ($i-1); ?> of <?php echo $paging[2]; ?> entries</div></div><div class="span6" style="width: 65%; float: right"><div class="dataTables_paginate paging_bootstrap pagination"><?php echo $paging[1]; ?></div></div></div>
    <?php } ?>
</div><!-- End Wrapper -->