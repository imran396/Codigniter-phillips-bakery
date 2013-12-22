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
        line-height:16px;
        font-size:12px;
        font-family:Times;
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
        font-size:32px;
        line-height:40px;
        letter-spacing:5px;
    }
    .col_1
    {
        float:left;
        width:50%;
    }
    .col_2
    {
        float:right;
        width:50%;
    }
</style>
<div id="wrapper">
<h1 class="cen"><?php if( $queryup->order_status !=301 ){ echo strtoupper($queryup ->orderstatus); }else{ echo "ORDER"; } ?></h1>
<br />
<p class="cen" ><?php echo $this->lang->line('global_email_subject'); ?></p>
<hr />

<p>ORDER #<?php echo $queryup->order_code; ?> <br/><?php echo getOrderPrintDateFormat($queryup->order_date); ?></p>
<hr />

<ul class="col_1">
    <li>
        <p>CUSTOMER DETAILS</p>
    </li>
</ul>

<ul class="col_2">
    <li>
        <p>DELIVERY DETAILS</p>
    </li>
</ul>
<div class="clr"></div>
<br />

<ul class="col_1">
    <li><?php echo $queryup->first_name.' '. $queryup->last_name ?></li>
    <?php if($queryup->address_1){?>
    <li><?php echo $queryup->address_1; ?></li>
    <?php } ?>
    <?php if($queryup->address_2){?>
    <li><?php echo $queryup->address_2; ?></li>
    <?php } ?>
    <?php if($queryup->city !="" || $queryup->province !="" || $queryup->postal_code !=""  ){?>
    <li><?php echo $queryup->city; ?>, <?php echo $queryup->province; ?> <?php echo $queryup->postal_code; ?></li>
    <?php } ?>
    <?php if($queryup->phone_number){?>
    <li><?php echo $this->orders_model->phoneNoFormat($queryup->phone_number); ?></li>
    <?php } ?>
    <?php if($queryup->email){?>
    <li><?php echo $queryup->email; ?></li>
    <?php } ?>
</ul>

<ul class="col_2">
    <?php
    if($this->productions_model->deliveryInfo($queryup->order_id) && $queryup->delivery_type == 'delivery'){
        $deliveryInfo = $this->productions_model->deliveryInfo($queryup->order_id);
        ?>
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
    <?php } ?>

</ul>

<div class="clr"></div>
<br />

<hr />
<p>ORDER INFORMATION</p>
<br />

<ul class="col_1">
    <li>
        <p>PICKUP/DELIVERY:</p>
    </li>
    <li>
        <p>DATE:</p>
    </li>
    <?php
    if($queryup->delivery_type != 'delivery' ){
    ?>
    <li>
        <p>PICKUP LOCATION:</p>
    </li>
    <?php }else{ ?>
    <li>
        <p>DELIVERY ZONE:</p>
    </li>
    <?php } ?>
</ul>

<ul class="col_2">
    <li><?php echo ucfirst($queryup->delivery_type); ?></li>
    <li><?php $delivery_date = strtotime($queryup->delivery_date); echo getOrderPrintDateFormat($delivery_date).","; ?> <?php echo timeFormatAmPm($queryup->delivery_time); ?></li>
    <?php
    if($queryup->delivery_type != 'delivery' ){
        ?>
        <li><?php  echo $this->productions_model->getLocations($queryup->pickup_location_id);  ?></li>
    <?php }else{ ?>
        <li><?php echo $queryup->zone_title; ?></li>
    <?php } ?>
</ul>
<div class="clr"></div>

<hr />
<?php if($queryup->title){ ?>
<p><strong><?php echo strtoupper($queryup->title); ?></strong></p>
<br />
<?php } ?>
<ul class="col_1">

    <?php if($queryup->magic_cake_id){ ?>
        <li><p><strong>MAGIC CAKE ID:</strong></p></li>
    <?php } ?>
    <?php if($queryup->flavour_name){ ?>
        <li><p><strong>FLAVOUR:</strong></p></li>
    <?php } ?>
    <?php if($queryup->shape){ ?>
        <li><p><strong>SHAPE:</strong></p></li>
    <?php } ?>
    <?php if($queryup->serving_title){ ?>
        <li><p><strong>SERVING:</strong></p></li>
    <?php } ?>
    <?php if($queryup->tiers){ ?>
        <li><p><strong>TIERS:</strong></p></li>
    <?php } ?></ul>

<ul class="col_2">

    <?php if($queryup->magic_cake_id){ ?>
        <li><p><strong><?php echo $queryup->magic_cake_id; ?></strong></p></li>
    <?php } ?>
    <?php if($queryup->flavour_name){ ?>
        <li><p><strong><?php echo $queryup->flavour_name; ?></strong></p></li>
    <?php } ?>
    <?php if($queryup->shape){ ?>
        <li><p><strong><?php echo $queryup->shape; ?></strong></p></li>
    <?php } ?>
    <?php if($queryup->serving_title){ ?>
        <li><p><strong><?php echo $queryup->serving_title; ?></strong></p></li>
    <?php } ?>
    <?php if($queryup->orderTiers > 0){ ?>
        <li><p><strong><?php echo $queryup->orderTiers; ?></strong></p></li>
    <?php } ?>
</ul>

<br />
<div class="clr"></div>
<br />
<?php if($queryup->inscription){ ?>
<p><strong>INSCRIPTION</strong></p>
<p><strong>*<?php echo $queryup->inscription; ?></strong></p>
 <?php } ?>
 <br />
 <?php if($queryup->special_instruction){ ?>
<p><strong>SPECIAL INSTRUCTIONS</strong></p>
     <?php $special_instruction = explode(PHP_EOL,$queryup->special_instruction);
     foreach($special_instruction as $instruction){
     ?>
    <p><strong>*<?php echo $instruction; ?></strong></p>
     <?php } ?>
<?php } ?>
<hr />

<div class="clr"></div>


<ul class="col_1">
    <?php if($queryup->title){ ?>
        <li><p><?php echo strtoupper($queryup->title) ?></p></li>
    <?php } ?>

    <?php if($queryup->printed_image_surcharge >0 ){ ?>
        <li><p>PRINTED IMAGE:</p></li>
    <?php } ?>
    <?php if($queryup->delivery_zone_surcharge){ ?>
        <li><p>DELIVERY:</p></li>
    <?php } ?>
    <?php if($queryup->magic_surcharge){ ?>
        <li><p>OTHER SURCHARGE:</p></li>
    <?php } ?>
    <?php if($queryup->discount_price){ ?>
        <li><p>DISCOUNT:</p></li>
    <?php } ?>
</ul>

<ul class="col_2">
    <?php if($queryup->matrix_price >0 ){ ?>
    <li><p><?php echo "$".$queryup->matrix_price; ?></p></li>
    <?php } ?>
    <?php if($queryup->printed_image_surcharge >0 ){ ?>
        <li><p><?php echo "$".$queryup->printed_image_surcharge; ?></p></li>
    <?php } ?>
    <?php if($queryup->delivery_zone_surcharge){ ?>
        <li><p><?php echo "$".$queryup->delivery_zone_surcharge; ?></p></li>
    <?php } ?>
    <?php if($queryup->magic_surcharge){ ?>
        <li><p><?php echo "$(".$queryup->magic_surcharge.')'; ?></p></li>
    <?php } ?>
    <?php if($queryup->discount_price){ ?>
        <li><p><?php echo "$".$queryup->discount_price; ?></p></li>
    <?php } ?>

</ul>
<div class="clr"></div>


<hr />

<ul class="col_1">
    <li>
        <p>TOTAL:</p>
    </li>
</ul>

<ul class="col_2">
    <?php if($queryup->total_price){ ?>
        <li><p><?php if($queryup->override_price > 0){ echo "$".$queryup->override_price;}else{ echo "$".$queryup->total_price;} ?></p></li>
    <?php } ?>
</ul>
<div class="clr"></div>

<hr />
<br />
<p class="cen">Thank You</p>
<?php if(!empty($locations[0]->email)){ ?><p class="cen"><?php echo $locations[0]->email; ?></p><?php } ?>
<p class="cen">stphillipsbakery.com</p>
</br>
<p class="cen">
    <img src="<?php echo base_url()?>assets/uploads/orders/barcode<?php echo  $queryup->order_code ?>.png" />
</p>
<br/>
<br/>
<br/>
</div>