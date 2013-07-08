

<?php

//var_dump($query) ;
//exit;
?>

<div class="widget">
    <div class="widget-body">
        <table class="dynamicTable table table-striped table-bordered">
            <thead>
            <tr>
                <th width="70">Order #</th>
                <th width="166">Customer Name</th>
                <th width="170">Cake Name</th>
                <th width="122">Pickup/Delivery</th>
                <th width="93">Date</th>
                <th width="48">Time</th>
                <th width="65">Fondant</th>
                <th width="84">Flavor</th>
                <th width="110">Magic Cake ID</th>
                <th width="75">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($query as $rows):
                ?>
                <tr>
                    <td class="center"><a href="/admin/productions/details/<?php echo $rows->order_code; ?>" ><?php echo $rows->order_code; ?></a></td>
                    <td class="center"><?php echo $rows->first_name.' '.$rows->last_name; ?></td>
                    <td><?php echo $rows->cake_name; ?></td>
                    <td class="center"><?php echo $rows->delivery_type; ?></td>
                    <td class="center"><?php echo $this->productions_model->dateFormate($rows->delivery_date); ?></td>
                    <td class="center"><?php echo $rows->delivery_time; ?></td>
                    <td><?php echo $rows->fondant; ?></td>
                    <td><?php echo $rows->flavour_name; ?></td>
                    <td><?php echo $rows->magic_cake_id; ?></td>
                    <td class="green"><?php echo $rows->production_status;?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<div class="buttons">
    <a href="" class="button button-green"><span class="icon icon-scan"></span>Scan Bar Code</a>
</div>
<div class="pagination pagination-small pagination-right" style="margin-top: 0; margin-bottom: 12px;">
    <?php //echo $paging[1]; ?>

</div>