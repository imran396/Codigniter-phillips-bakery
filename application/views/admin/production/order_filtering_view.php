<div class="widget">
    <div class="widget-body">
        <table class="table table-striped table-bordered order-sorting">
            <thead>
            <tr>
                <th width="70">Order #</th>
                <th width="166">Location</th>
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
                    <td><?php if($rows->delivery_type =='pickup'){ echo $this->productions_model->getLocations($rows->pickup_location_id); }else{ echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---"; } ?></td>
                    <td><?php echo $rows->cake_name; ?></td>
                    <td class="center"><?php echo sentence_case($rows->delivery_type); ?></td>
                    <td class="center"><?php echo $this->productions_model->dateFormate($rows->delivery_date); ?></td>
                    <td class="center"><?php echo $rows->delivery_time; ?></td>
                    <td><?php if($rows->fondant >0){echo "Yes"; }else{ echo "No"; }; ?></td>
                    <td><?php echo $rows->flavour_name; ?></td>
                    <td><?php echo $rows->magic_cake_id; ?></td>
                    <td class="<?php if($rows->order_status ==304){ echo 'red'; }else{ echo 'green'; } ?>"><?php echo $this->productions_model->currentProductionStatus($rows->order_status);?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<div class="buttons">
    <a href="javascript:void(0)" class="button button-green scan_button"><span class="icon icon-scan"></span>Scan Bar Code</a>
</div>
<div class="pagination pagination-small pagination-right" style="margin-top: 0; margin-bottom: 12px;">
    <?php //echo $paging[1]; ?>

</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/assets/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {

        $('.scan_button').on('click',function(){
            $("input[name = search]").focus();
            $("input[name = search]").attr('placeholder','');
        })

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
            "bPaginate": true,
            "iDisplayLength":10,
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "oPaginate": {
                    "sNext": ">",
                    "sPrevious": "<"
                }
            },
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

        } );



    } );

</script>

<style type="text/css">
    .container-new div.dataTables_info, .container-new div.dataTables_filter, .container-new div.dataTables_length, .container-new div.dataTables_paginate, .container-new .dataTables_wrapper .row-fluid:first-child, .container-new .dataTables_wrapper .row-fluid {
        display: block!important;
    }
    .container-new div.dataTables_length ,.container-new div.dataTables_info, .container-new div.dataTables_filter {
        display: none!important;
    }


    #DataTables_Table_0_paginate{
        background: none !important;
        font-family: Helvetica, Ariel, sans-serif;
        font-weight: bold;
    }
    .paging_full_numbers label{ display: none!important;}
    .paging_full_numbers a.first ,.paging_full_numbers a.last { display: none!important}
    .paging_full_numbers .previous , .paging_full_numbers .next{
        margin: 0 0 0 5px;
        color: #717171;
        text-shadow: #fff 0 1px 1px;
        box-shadow: #b6b6b7 0 2px 1px;
        -mox-box-shadow: #b6b6b7 0 2px 1px;
        -webkit-box-shadow: #b6b6b7 0 2px 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 0;
        text-align: center;
        color: #717171;
        line-height: 22px;
        width: 22px;
        height: 22px;
        display: inline-block;
        background: #fff;
        float: left;

    }

    .paging_full_numberse .previous:hover , .paging_full_numbers .next:hover{

        background: none;
        background-color: #72a139;
        box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
        -moz-box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
        -webkit-box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
        text-shadow: #679234 0 1px 0;
        border-color: #72a139;
        color: #fff;
        cursor: pointer;
    }

    .paging_full_numbers span{
        float: left;
    }
    .paging_full_numbers span a {
        margin: 0 0 0 5px;
        color: #717171;
        text-shadow: #fff 0 1px 1px;
        box-shadow: #b6b6b7 0 2px 1px;
        -mox-box-shadow: #b6b6b7 0 2px 1px;
        -webkit-box-shadow: #b6b6b7 0 2px 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 0;
        text-align: center;
        color: #717171;
        line-height: 22px;
        width: 22px;
        height: 22px;
        float: none;
        display: inline-block;
        background: #fff;
    }


    .buttons {
        position: absolute;
        margin-top: 5px;
        right: 9px;
    }

    .paging_full_numbers span a:hover{

        background: none;
        background-color: #72a139;
        box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
        -moz-box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
        -webkit-box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
        text-shadow: #679234 0 1px 0;
        border-color: #72a139;
        color: #fff;
        cursor: pointer;
    }
    .paging_full_numbers span a.paginate_active{
    background: none;
    background-color: #72a139;
    box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
    -moz-box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
    -webkit-box-shadow: #f0f0f1 0 2px 0, #5c812e 0 0 2px inset;
    text-shadow: #679234 0 1px 0;
    border-color: #72a139;
    color: #fff;
    }
    .paging_full_numbers{
        position: relative;
        top: 60px;
        display: block;
    }

</style>

