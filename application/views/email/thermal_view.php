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
    #wrapper
    {
        width:350px;
        margin:0 auto;
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
<h1 class="cen">ORDER</h1>
<br />

<p class="cen">St. Phillip's Bakery</p>
<hr />
<?php
$locations=$this->locations_model->getLocations($queryup->locationid);
if(!empty($locations)){
?>
<?php if($locations[0]->title){ ?><p class="cen"><?php echo $locations[0]->title; ?></p><?php } ?>
<?php if($locations[0]->address1){ ?><p class="cen"><?php echo $locations[0]->address1; ?></p><?php } ?>
<?php if($locations[0]->address2){ ?><p class="cen"><?php echo $locations[0]->address2; ?></p><?php } ?>
<?php if($locations[0]->city || $locations[0]->province || $locations[0]->postal_code){ ?><p class="cen"><?php echo $locations[0]->city; ?> , <?php echo $locations[0]->province; ?> <?php echo $locations[0]->postal_code; ?></p><?php } ?>
<?php if($locations[0]->country){ ?><p class="cen"><?php echo $locations[0]->country; ?></p><?php } ?>
<?php if($locations[0]->email){ ?><p class="cen"><?php echo $locations[0]->email; ?></p><?php } ?>
<?php if($locations[0]->phone){ ?><p class="cen"><?php echo $this->orders_model->phoneNoFormat($locations[0]->phone); ?></p><?php } ?>
<?php } ?>
<br />

<p>ORDER #<?php echo $queryup->order_code; ?> <?php echo $this->orders_model->dateFormat($queryup->order_date); ?></p>
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
    <li><?php echo $this->orders_model->dateFormat($queryup->delivery_date); ?> <?php echo $this->orders_model->timeFormat($queryup->delivery_time); ?></li>
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
<p>CAKE DETAILS</p>
<br />
<p>IMAGE ON CAKE: <?php if($queryup->on_cake_image){ echo $this->orders_model->fileName($queryup->on_cake_image); } ?></p>
<p>REFERENCE PHOTOS: <?php
    $instructionals = $this->productions_model->photoGallery($queryup->order_id);
    if(!empty($instructionals)){
        foreach($instructionals as $instructional){

            echo $this->orders_model->fileName($instructional->instructional_photo) ." , ";

        } } ?></p>
<br />
<?php if($queryup->inscription){ ?>
<p>INSCRIPTION</p>
<br />
<p>> <?php echo $queryup->inscription; ?>
 <?php } ?>
    <br />
    <?php if($queryup->special_instruction){ ?>
<p>SPECIAL INSTRUCTIONS</p>
<br />
<p>> <?php echo $queryup->special_instruction; ?></p>
<?php } ?>
<hr />
<ul class="col_1">
    <?php if($queryup->title){ ?>
        <li><p><?php echo $queryup->title ?></p></li>
    <?php } ?>
    <?php if($queryup->magic_cake_id){ ?>
        <li><p>MAGIC CAKE ID:</p></li>
    <?php } ?>
    <?php if($queryup->flavour_name){ ?>
        <li><p>FLAVOUR:</p></li>
    <?php } ?>
    <?php if($queryup->serving_size){ ?>
        <li><p>SIZE:</p></li>
    <?php } ?>
    <?php if($queryup->shape){ ?>
        <li><p>SHAPE:</p></li>
    <?php } ?>
    <?php if($queryup->serving_title){ ?>
        <li><p>SERVING:</p></li>
    <?php } ?>
    <?php if($queryup->tiers){ ?>
        <li><p>TIERS:</p></li>
    <?php } ?></ul>

<ul class="col_2">
    <li><p><?php echo "$".$queryup->matrix_price; ?></p></li>
    <?php if($queryup->magic_cake_id){ ?>
        <li><p><?php echo $queryup->magic_cake_id; ?></p></li>
    <?php } ?>
    <?php if($queryup->flavour_name){ ?>
        <li><p><?php echo $queryup->flavour_name; ?></p></li>
    <?php } ?>
    <?php if($queryup->serving_size){ ?>
        <li><p><?php echo $queryup->serving_size; ?></p></li>
    <?php } ?>
    <?php if($queryup->shape){ ?>
        <li><p><?php echo $queryup->shape; ?></p></li>
    <?php } ?>
    <?php if($queryup->serving_title){ ?>
        <li><p><?php echo $queryup->serving_title; ?></p></li>
    <?php } ?>
    <?php if($queryup->tiers){ ?>
        <li><p><?php echo $queryup->orderTiers; ?></p></li>
    <?php } ?>
</ul>
<div class="clr"></div>


<ul class="col_1">
    <?php if($queryup->printed_image_surcharge >0 ){ ?>
        <li><p>PRINTED IMAGE:</p></li>
    <?php } ?>
    <?php if($queryup->delivery_zone_surcharge){ ?>
        <li><p>DELIVERY:</p></li>
    <?php } ?>
    <?php if($queryup->magic_surcharge){ ?>
        <li><p>MAGIC SURCHARGE:</p></li>
    <?php } ?>
    <?php if($queryup->discount_price){ ?>
        <li><p>DISCOUNT:</p></li>
    <?php } ?>
</ul>

<ul class="col_2">
    <?php if($queryup->printed_image_surcharge >0 ){ ?>
        <li><p><?php echo "$".$queryup->printed_image_surcharge; ?></p></li>
    <?php } ?>
    <?php if($queryup->delivery_zone_surcharge){ ?>
        <li><p><?php echo "$".$queryup->delivery_zone_surcharge; ?></p></li>
    <?php } ?>
    <?php if($queryup->magic_surcharge){ ?>
        <li><p><?php echo "$".$queryup->magic_surcharge; ?></p></li>
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
        <li><p><?php if($queryup->override_price){ echo "$".$queryup->override_price;}else{ echo "$".$queryup->total_price;} ?></p></li>
    <?php } ?>
</ul>
<div class="clr"></div>

<br />
<hr />
<br />
<p class="cen">Thank You</p>
<?php if(!empty($locations)){ ?><p class="cen"><?php echo $locations[0]->email; ?></p><?php } ?>
<br />
<p class="cen">stphillipsbakery.com</p>
<br />

<p class="cen">
    <img src="<?php echo base_url()?>assets/uploads/orders/barcode<?php echo  $queryup->order_code ?>.png" />
</p>
<br/>
<br/>
<br/>
</div>