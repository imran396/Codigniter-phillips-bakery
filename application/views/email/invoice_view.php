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
    }
    .left
    {
        float:left;
    }
    .right
    {
        float:right;
    }
    .align-right
    {
        text-align:right;
    }
    .col_half
    {
        width:350px;
    }

    .col_half table tr td{ width: 170px}

    .copl_fourth
    {
        width:175px;
    }

    .col_fourth
    {
        width:175px;
    }


    #wrapper
    {
        width:700px;
        margin:0 auto;
    }
    ul{
        list-style-type: none;
    }
    h1
    {
        font-size:32px;
        line-height:40px;
    }
</style>

<div id="wrapper">
<div class="col_half left">
    <h1><?php if( $queryup->order_status !=301 ){ echo strtoupper($queryup ->orderstatus); }else{ echo "INVOICE"; } ?></h1>
</div>

<div class="col_half right">
    <?php
    $locations=$this->locations_model->getLocations($queryup->locationid);
    ?>
    <p  class="align-right"><?php echo $this->lang->line('global_email_subject'); ?></p>
    <?php if(!empty($locations)){ ?>
    <?php if($locations[0]->title){ ?><p  class="align-right"><?php echo $locations[0]->title; ?></p><?php } ?>
    <?php if($locations[0]->address1){ ?><p  class="align-right"><?php echo $locations[0]->address1; ?></p><?php } ?>
    <?php if($locations[0]->address2){ ?><p  class="align-right"><?php echo $locations[0]->address2; ?></p><?php } ?>
    <?php if($locations[0]->city){ ?><p  class="align-right"><?php echo $locations[0]->city; ?> , <?php echo $locations[0]->province; ?> <?php echo $locations[0]->postal_code; ?></p><?php } ?>
    <?php if($locations[0]->country){ ?><p  class="align-right"><?php echo $locations[0]->country; ?></p><?php } ?>
    <?php if($locations[0]->email){ ?><p  class="align-right"><?php echo $locations[0]->email; ?></p><?php } ?>
    <?php if($locations[0]->phone){ ?><p  class="align-right"><?php echo $this->orders_model->phoneNoFormat($locations[0]->phone); ?></p><?php } ?>
    <?php } ?>
</div>
<div class="clr"></div>

<p>ORDER #<?php echo $queryup->order_code; ?> <?php echo getOrderDateFormat($queryup->order_date); ?></p>
<hr />
<br />
<ul class="copl_fourth left">
    <li>CUSTOMER DETAILS</li>
</ul>

<ul class="col_fourth left">
    <li>ORDER INFORMATION</li>
</ul>

<ul class="col_fourth left">
    <li>&nbsp;</li>
</ul>
<?php
if($queryup->delivery_type == 'delivery' ){
?>
<ul class="col_fourth left">
    <li>DELIVER TO</li>
</ul>
<?php } ?>
<div class="clr"></div>
<br />





<ul class="col_fourth left">
    <li><?php echo $queryup->first_name.' '. $queryup->last_name ?></li>
    <?php if($queryup->address_1){?>
    <li><?php echo $queryup->address_1; ?></li>
    <?php } ?>
    <?php if($queryup->address_2){?>
    <li><?php echo $queryup->address_2; ?></li>
    <?php } ?>
    <?php if($queryup->city !="" || $queryup->province !="" || $queryup->postal_code !=""  ){?>
    <li><?php echo $queryup->city; ?> <?php if($queryup->province){ echo ",".$queryup->province; } ?> <?php echo $queryup->postal_code; ?></li>
    <?php } ?>
    <?php if($queryup->phone_number){?>
    <li><?php echo $this->orders_model->phoneNoFormat($queryup->phone_number); ?></li>
    <?php } ?>
    <?php if($queryup->email){?>
    <li><?php echo $queryup->email; ?></li>
    <?php } ?>
</ul>

<div class="left col_fourth">
    <ul class="">
        <li>PICKUP/DELIVERY:</li>
        <li>DATE:</li>
        <?php
        if($queryup->delivery_type != 'delivery' ){
            ?>
            <li>PICKUP LOCATION:</li>
        <?php
        }else{
            ?>
            <li>DELIVERY ZONE:</li>
        <?php } ?>
    </ul>
</div>

<ul class="left col_fourth">
    <li><?php echo ucfirst($queryup->delivery_type); ?></li>
    <li><?php echo $this->orders_model->dateFormat($queryup->delivery_date); ?> <?php echo $this->orders_model->timeFormat($queryup->delivery_time); ?></li>
    <?php
    if($queryup->delivery_type != 'delivery' ){
        ?>
        <li><?php  echo $this->productions_model->getLocations($queryup->pickup_location_id);  ?></li>
    <?php }else{ ?>
        <li><?php echo $queryup->zone_title; ?></li>
    <?php } ?>
</ul>

<ul class="left col_fourth">
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
            <li><?php if($deliveryInfo->city){  echo $deliveryInfo->city; } ?> , <?php if($deliveryInfo->province){  echo $deliveryInfo->province; } ?> , <?php if( $deliveryInfo->postal){ ?> ON <?php echo $deliveryInfo->postal; } ?></li>
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
<br />
<p>CAKE DETAILS</p>
<div class="clr"></div>
<br />

<ul class="col_half left">
    <li>Image on cake: <?php if($queryup->on_cake_image){ echo $this->orders_model->fileName($queryup->on_cake_image); } ?></li>
</ul>

<ul class="col_half left">
    <li>Reference Images:        <?php
        $instructionals = $this->productions_model->photoGallery($queryup->order_id);
        if(!empty($instructionals)){
            foreach($instructionals as $instructional){

                echo $this->orders_model->fileName($instructional->instructional_photo) ." , ";

            } } ?>
    </li>
</ul>
<div class="clr"></div>
<br />
<?php if($queryup->inscription){ ?>
    <ul class="col_half left">
        <li>Inscription: </li>
        <br />
        <li>> <?php echo $queryup->inscription; ?></li>
    </ul>
<?php } ?>
<?php if($queryup->special_instruction){ ?>
    <ul class="col_half left">
        <li>Special Instructions:</li>
        <br />
        <li>> <?php echo $queryup->special_instruction; ?></li>
    </ul>
<?php } ?>
<div class="clr"></div>
<br />
<hr />
<br />

<div class="col_half left">
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <p class="cen">
        <img src="<?php echo base_url()?>assets/uploads/orders/barcode<?php echo  $queryup->order_code ?>.png" />
    </p>
    <br />
    <p class="cen">Thank You</p>
    <p class="cen"><?php
        if(!empty($locations)){ echo $locations[0]->email; } ?></p>
    <p class="cen">stphillipsbakery.com</p>

</div>
<div class="col_half right">

    <table>
        <tbody>
        <?php if($queryup->title){ ?>
        <tr><td><?php echo $queryup->title ?></td><td><?php echo $queryup->matrix_price; ?></td></tr>
        <?php } ?>
        <?php if($queryup->magic_cake_id){ ?>
        <tr><td>MAGIC CAKE ID:</td><td><?php echo $queryup->magic_cake_id; ?></td></tr>
        <?php } ?>
        <?php if($queryup->flavour_name){ ?>
        <tr><td>FLAVOUR:</td><td><?php echo $queryup->flavour_name; ?></td></tr>
        <?php } ?>
        <?php if($queryup->serving_size){ ?>
        <tr><td>SIZE:</td><td><?php echo $queryup->serving_size; ?></td></tr>
        <?php } ?>
        <?php if($queryup->shape){ ?>
        <tr><td>SHAPE:</td><td><?php echo $queryup->shape; ?></td></tr>
        <?php } ?>
        <?php if($queryup->serving_title){ ?>
        <tr><td>SERVING:</td><td><?php echo $queryup->serving_title; ?></td></tr>
        <?php } ?>
        <?php if($queryup->orderTiers){ ?>
        <tr><td>TIERS:</td><td><?php echo $queryup->orderTiers; ?></td></tr>
        <?php } ?>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <?php if($queryup->printed_image_surcharge > 0){ ?>
            <tr><td>PRINTED IMAGE</td><td><?php echo "$".$queryup->printed_image_surcharge; ?></td></tr>
        <?php } ?>
        <?php if($queryup->delivery_zone_surcharge > 0){ ?>
            <tr><td>DELIVERY:</td><td><?php echo "$".$queryup->delivery_zone_surcharge; ?></td></tr>
        <?php } ?>
         <?php if($queryup->magic_surcharge > 0){ ?>
            <tr><td>MAGIC SURCHARGE:</td><td><?php echo "$".$queryup->magic_surcharge; ?></td></tr>
        <?php } ?>
        <?php if($queryup->discount_price > 0){ ?>
            <tr><td>DISCOUNT:</td><td><?php echo "$".$queryup->discount_price; ?></td></tr>
        <?php } ?>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2"> <hr /></td></tr>
        <tr><td>TOTAL</td><td><?php if($queryup->override_price > 0){ echo "$".$queryup->override_price;}else{ echo "$".$queryup->total_price;} ?></td></tr>
        </tbody>
    </table>
</div>

</div>
