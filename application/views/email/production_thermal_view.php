<script>
    window.print();
    CheckWindowState();

    function CheckWindowState()    {
        if(document.readyState=="complete") {
            window.close();
        } else {
            setTimeout("CheckWindowState()", 2000)
        }
    }
</script>
<style type="text/css">
    *
    {
        margin:0;
        padding:0;
        line-height:22px;
        font-size:15px;
        font-family:Tahoma, Verdana, Arial, Helvetica;
    }
    .clr
    {
        clear:both;
    }
    .cen
    {
        text-align:center;
        display: block;
    }
    #wrapper
    {
        width:275px;
        overflow: hidden;
        margin-top: 10px;

    }
    hr
    {
        margin:2px 0;
    }
    ul{
        list-style-type:none;
    }
    h1
    {
        font-size:34px;
        line-height:32px;

    }
    h2
    {
        font-size:20px;
        line-height:30px;

    }

    h3{

        font-size:16px;
        line-height:20px;
        text-align: center;


    }
    h4
    {
        font-size:14px;
        line-height:18px;
        font-weight: normal;

    }
    .col_1
    {
        float:left;
        width:45%;
    }



    .col_1 strong{
        font-size: 18px;
        font-weight: bold;

    }

    .col_2
    {
        float:right;
        width:55%;
        text-align: right;
    }

    .col_price_1
    {
        float:left;
        width:75%;
        font-size: 16px;
    }
    .col_delivery
    {
        float:left;
        width:100%;
        font-size: 16px;
    }

    .col_price_2
    {
        float:left;
        width:25%;
        text-align: right;
        font-size: 16px;
    }

    .col_2 strong{
        font-size: 18px;
        font-weight: bold;
        text-align: right;
    }
    p span{
        float: right;
        display: inline-block;
    }

</style>
<div id="wrapper">
    <?php if( $queryup->order_status == 300 ){ ?>
    <h1 class="cen" ><?php if( $queryup->order_status =300 ){ echo "ESTIMATE"; } ?></h1>
    <h2 class="cen" >Valid for 30 Days</h2>
    <?php } ?>
    <p class="cen"><img src="/assets/css/print-logo.png" height="120" width="120px"></p>
    <?php
    $locations=$this->locations_model->getLocations($queryup->locationid);
    if(!empty($locations)){
        ?>
        <?php if($locations[0]->title){ ?><p class="cen"><?php //echo $locations[0]->title; ?></p><?php } ?>
        <?php if($locations[0]->address1){ ?><p class="cen"><?php echo $locations[0]->address1; ?></p><?php } ?>
        <?php if($locations[0]->address2){ ?><p class="cen"><?php echo $locations[0]->address2; ?></p><?php } ?>
        <?php if($locations[0]->city || $locations[0]->province || $locations[0]->postal_code){ ?><p class="cen"><?php echo $locations[0]->city; ?> , <?php echo $locations[0]->province; ?> <?php echo $locations[0]->postal_code; ?></p><?php } ?>
        <?php if($locations[0]->country){ ?><p class="cen"><?php //secho $locations[0]->country; ?></p><?php } ?>
        <?php if($locations[0]->email){ ?><p class="cen"><?php //echo $locations[0]->email; ?></p><?php } ?>
        <?php if($locations[0]->phone){ ?><p class="cen"><?php echo $this->orders_model->phoneNoFormat($locations[0]->phone); ?></p><?php } ?>
    <?php } ?>
    **********************************************************
    <p><?php  echo getOrderPrintDateFormat($queryup->order_date); ?><span><?php echo strtoupper($queryup->employee_first_name.' '.$queryup->employee_last_name); ?></span></p>
    **********************************************************

    <div class="clr"></div>

    <p><h1><?php if($queryup->title){ echo strtoupper($queryup->title); }else{ echo "CUSTOME CAKE"; } ?></h1></p>
    <?php if($queryup->flavour_name){ ?>
        <p><h2><?php echo strtoupper($queryup->flavour_name);  ?></h2></p>
    <?php } ?>
    <br />

    <ul class="col_1">
        <?php if($queryup->serving_title){ ?>
            <li><p><strong>SERVING:</strong></p></li>
        <?php } ?>

        <?php if($queryup->serving_size){ ?>
            <li><p><strong>SHAPE:</strong></p></li>
        <?php } ?>
        <?php if($queryup->fondant > 0){ ?>
            <li><p><strong>FONDANT:</strong></p></li>
        <?php } ?>

        <?php if($queryup->orderTiers){ ?>
            <li><p><strong>TIERS:</strong></p></li>
        <?php } ?>
        <?php if($queryup->magic_cake_id){ ?>
            <li><p><strong>MAGIC CAKE:</strong></p></li>
        <?php } ?>
    </ul>


    <ul class="col_2">

        <?php if($queryup->serving_title){ ?>
            <li><p><strong><?php echo $queryup->serving_title; ?></strong></p></li>
        <?php } ?>
        <?php if($queryup->serving_size){ ?>
            <li><p><strong><?php echo $queryup->serving_size; ?></strong></p></li>
        <?php } ?>
        <?php if($queryup->fondant > 0){ ?>
            <li><p><strong>Yes</strong></p></li>
        <?php } ?>
        <?php if($queryup->orderTiers > 0){ ?>
            <li><p><strong><?php echo $queryup->orderTiers; ?></strong></p></li>
        <?php } ?>
        <?php if($queryup->magic_cake_id){ ?>
            <li><p><strong><?php echo $queryup->magic_cake_id; ?></strong></p></li>
        <?php } ?>
    </ul>

    <br />
    <div class="clr"></div>
    <br />
    <?php if($queryup->inscription){ ?>
        <p><h4>INSCRIPTION</h4></p>
        <p><h4><strong><?php echo $queryup->inscription; ?></strong></h4></p>
    <?php } ?>
    <br />
    <?php if($queryup->special_instruction){ ?>
        <p><h4>SPECIAL INSTRUCTIONS</h4></p>
        <p><h4><strong><?php echo$queryup->special_instruction; ?></strong></h4></p>
    <?php } ?>
    <?php
    if($this->productions_model->deliveryInfo($queryup->order_id) && $queryup->delivery_type == 'delivery'){
        $deliveryInfo = $this->productions_model->deliveryInfo($queryup->order_id);
        ?>
        <br />
        <p><h2>DELIVERY DETAILS</h2></p>
        <ul class="col_delivery">
            <?php if( $deliveryInfo->name){ ?>
                <li><?php echo $deliveryInfo->name; ?></li>
            <?php } ?>
            <?php if( $deliveryInfo->address_1){ ?>
                <li><?php echo $deliveryInfo->address_1; ?></li>
            <?php } ?>
            <?php if( $deliveryInfo->address_2){ ?>
                <li><?php echo $deliveryInfo->address_2; ?></li>
            <?php } ?>
            <?php if( $deliveryInfo->city || $deliveryInfo->postal ){ ?>
                <li><?php if($deliveryInfo->city){  echo $deliveryInfo->city; } ?>  <?php if($deliveryInfo->province){  echo ", ".$deliveryInfo->province; } ?>  <?php if( $deliveryInfo->postal){ ?> <?php echo $deliveryInfo->postal; } ?></li>
            <?php } ?>
            <li><?php echo $this->orders_model->phoneNoFormat($deliveryInfo->phone); ?></li>
            <?php if( $deliveryInfo->email){ ?>
                <li><?php echo $deliveryInfo->email; ?></li>
            <?php } ?>

            <?php if( $deliveryInfo->delivery_instruction){ ?>
                <li><br /><?php echo $deliveryInfo->delivery_instruction; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
    <?php if($queryup->on_cake_image ==1 || $queryup->instructional_email_photo == 1 ){ ?>
        <br />
        **********************************************************
        <?php if($queryup->on_cake_image ==1){ ?><p><h2>**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDIBLE IMAGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**</h2></p><?php } ?>
        <?php if($queryup->instructional_email_photo == 1){ ?><p><h2>**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REF PHOTOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**</h2></p><?php } ?>
        <div class="clr"></div>
    <?php } ?>
    **********************************************************
    <div class="clr"></div>
    <table style="width: 100%">
        <tr><td class="col_price_1"><?php if($queryup->title){ echo strtoupper($queryup->title); }else{ echo 'Custom Cake'; } ?></td><td class="col_price_2"><?php if($queryup->matrix_price >0 ){ echo "$".$queryup->matrix_price; } ?></td></tr>
        <?php if($queryup->printed_image_surcharge > 0){ ?>
            <tr><td class="col_price_1">EDITABLE IMAGE</td><td class="col_price_2"><?php  echo "$".$queryup->printed_image_surcharge;  ?></td></tr>
        <?php } ?>

        <?php if($queryup->magic_surcharge > 0){ ?>
            <tr><td class="col_price_1">MAGIC CAKE</td><td class="col_price_2"><?php  echo "$".$queryup->magic_surcharge;  ?></td></tr>
        <?php } ?>

        <tr><td class="col_price_1"><?php if($queryup->delivery_type == 'pickup' ){ ?>PICKUP<?php }else{?>DELIVERY<?php } ?><br/><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
                    echo ($queryup->delivery_type == 'pickup' ) ? $queryup->pickup_location_name : $queryup->location_name;
                    $delivery_date = strtotime($queryup->delivery_date); echo "</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".getOrderPrintKitchenDateFormat($delivery_date).","; ?> <?php echo timeFormatAmPm($queryup->delivery_time); ?></p>
            </td>
            <td class="col_price_2" valign="top"><?php  echo "$".$queryup->delivery_zone_surcharge;  ?></td>
        </tr>
        <?php if($queryup->discount_price > 0){ ?>
            <tr><td class="col_price_1">DISCOUNT</td><td class="col_price_2">(<?php  echo "$".$queryup->discount_price;  ?>)</td></tr>
        <?php } ?>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td class="col_price_1">TOTAL</td><td class="col_price_2"><?php if($queryup->override_price > 0){ echo "$".$queryup->override_price;}else{ echo "$".$queryup->total_price;} ?></td></tr>
    </table>

    <div class="clr"></div>
    **********************************************************
    </br>
    <p class="cen">
        <img src="<?php echo base_url()?>assets/uploads/orders/barcode<?php echo  $queryup->order_code ?>.png" />
    </p>
    <h2 class="cen">ORDER: #<?php echo $queryup->order_code; ?></h2>
    <p class="cen">stphillipsbakery.com</p>
    <br/>
    <br/>
    <br/>
</div>