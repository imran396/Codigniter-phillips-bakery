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
        width:320px;
        overflow: hidden;

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
        font-size:19px;
        line-height:30px;

    }

    h3{

        font-size:16px;
        line-height:20px;

    }

    h4
    {
        font-size:14px;
        line-height:18px;
        font-weight: normal;

    }

    h5{

        font-size: 13px;
        font-weight: bold;
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

    .col_delivery li{
        font-size: 18px;
    }

    .col_price_2
    {
        float:left;
        width:25%;
        text-align: right;
        font-size: 18px;
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
<h1 class="cen"><?php
if($queryup->delivery_type == 'pickup' ){
 echo strtoupper($queryup->pickup_location_name);
}else{
 //echo strtoupper($queryup->location_name);
  echo "DELIVERY";
}


?>
</h1>
<h2 class="cen" ><?php if( $queryup->order_status !=301 ){ echo strtoupper($queryup ->orderstatus); }else{ echo "ORDER"; } ?></h2>

**********************************************************
<p><span><?php echo strtoupper($queryup->employee_first_name.' '.$queryup->employee_last_name[0]); ?></span></p>
**********************************************************

<div class="clr"></div>

<p><h1><?php if($queryup->title){ echo strtoupper($queryup->title); }else{ echo "CUSTOM CAKE"; } ?></h1></p>
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
<p><h5>INSCRIPTIONS</h5></p>
<p><h2><?php echo $queryup->inscription; ?></h2></p>
 <?php } ?>
 <br />
 <?php if($queryup->special_instruction){ ?>
<p><h5>SPECIAL INSTRUCTIONS</h5></p>
    <p><h2><?php echo $queryup->special_instruction; ?></h2></p>
<?php } ?>
<?php
if($this->productions_model->deliveryInfo($queryup->order_id) && $queryup->delivery_type == 'delivery'){
$deliveryInfo = $this->productions_model->deliveryInfo($queryup->order_id);
?>
<br />
<p><h5><strong>DELIVERY DETAILS</strong></h5></p>
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
<?php if($queryup->on_cake_image_needed == 1 ){
    $instructionals = $this->productions_model->photoGallery($queryup->order_id);

    ?>
<br />
**********************************************************
<?php if($queryup->on_cake_image != "" ){ ?><p><h2>**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EDIBLE IMAGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**</h2></p><?php } ?>
<?php if( count($instructionals) > 0 ){ ?><p><h2>**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REF PHOTOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**</h2></p><?php } ?>
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

            <tr><td class="col_price_1"><?php if($queryup->delivery_type == 'pickup' ){ ?>PICKUP<?php }else{?>DELIVERY<?php } ?><br/><h3>&nbsp;&nbsp;&nbsp;<?php
                        echo ($queryup->delivery_type == 'pickup' ) ? $queryup->pickup_location_name : $queryup->location_name.'</h3>';
                        $delivery_date = strtotime($queryup->delivery_date); echo "<h3>&nbsp;&nbsp;&nbsp;".getOrderPrintKitchenDateFormat($delivery_date).","; ?> <?php echo timeFormatAmPm($queryup->delivery_time); ?></h3>
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
    <p class="cen" >ORDER #<?php echo $queryup->order_code; ?></p>
    <p class="cen" ><?php echo ($queryup->first_name.' '.$queryup->last_name); ?></span></p>

    <br/>
<br/>
<br/>
</div>