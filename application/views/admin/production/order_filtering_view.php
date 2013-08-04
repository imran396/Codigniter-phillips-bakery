<div class="widget">
    <div class="widget-body">
        <table class="table table-striped table-bordered order-sorting">
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
                    <td class="center"><?php echo sentence_case($rows->delivery_type); ?></td>
                    <td class="center"><?php echo $this->productions_model->dateFormate($rows->delivery_date); ?></td>
                    <td class="center"><?php echo $rows->delivery_time; ?></td>
                    <td><?php if($rows->fondant >0){echo "Yes"; }else{ echo "No"; }; ?></td>
                    <td><?php echo $rows->flavour_name; ?></td>
                    <td><?php echo $rows->magic_cake_id; ?></td>
                    <td class="<?php if($rows->order_status ==303){ echo 'red'; }else{ echo 'green'; } ?>"><?php echo $this->productions_model->currentProductionStatus($rows->order_status);?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<div class="buttons">
    <a href="/admin/productions/badge" class="button button-green"><span class="icon icon-scan"></span>Scan Bar Code</a>
</div>
<div class="pagination pagination-small pagination-right" style="margin-top: 0; margin-bottom: 12px;">
    <?php //echo $paging[1]; ?>

</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/assets/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        jQuery.fn.dataTableExt.oSort['date-dd-mmm-yyyy-asc'] = function (a, b) {
            "use strict"; //let's avoid tom-foolery in this function
            var ordA = customDateDDMMMYYYYToOrd(a),
                ordB = customDateDDMMMYYYYToOrd(b);
            return (ordA < ordB) ? -1 : ((ordA > ordB) ? 1 : 0);
        };

        jQuery.fn.dataTableExt.oSort['date-dd-mmm-yyyy-desc'] = function (a, b) {
            "use strict"; //let's avoid tom-foolery in this function
            var ordA = customDateDDMMMYYYYToOrd(a),
                ordB = customDateDDMMMYYYYToOrd(b);
            return (ordA < ordB) ? -1 : ((ordA > ordB) ? 1 : 0);
        };

    } );
    $(document).ready(function() {

        $('.order-sorting').dataTable( {
            "aaSorting": [[4,'asc']],
            "aoColumns": [
                null,
                null,
                null,
                null,
                {"sTYpe": "date-dd-mmm-yyyy" },
                null,
                null,
                null,
                null,
                null
            ]
            /*"aoColumnDefs": [
             { "bSortable":false, "aTargets": [2,3] }

             ]*/
        } );

    } );

</script>

