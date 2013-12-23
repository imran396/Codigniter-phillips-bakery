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
        font-size:24px;
        line-height:24px;

    }
    h2
    {
        font-size:22px;
        line-height:32px;

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

    }
    .col_1
    {
        float:left;
        width:50%;
    }

    .col_1 strong{
        font-size: 14px;
        font-weight: bold;
    }

    .col_2
    {
        float:right;
        width:50%;
    }
    .col_2 strong{
        font-size: 15px;
        font-weight: bold;
    }
    p span{
        float: right;
        display: inline-block;
    }

</style>
<div id="wrapper">
<h1 class="cen"><?php

    $locations=$this->locations_model->getLocations($queryup->locationid);
    if($locations[0]->title){ ?><?php echo strtoupper($locations[0]->title); ?><?php } ?></h1>

<p class="cen" ><?php echo $this->lang->line('global_email_subject'); ?></p>
<br/>
<p>ORDER #<?php echo $queryup->order_code; ?><span><?php echo strtoupper($queryup->employee_first_name.' '.$queryup->employee_last_name); ?></span></p>
<p>CUSTOMER:<?php echo $queryup->first_name.' '. $queryup->last_name ?></p>
<p><?php $delivery_date = strtotime($queryup->delivery_date); echo getOrderPrintKitchenDateFormat($delivery_date).","; ?> <?php echo timeFormatAmPm($queryup->delivery_time); ?></p>
<hr />

<?php if($queryup->on_cake_image ==""){ ?><p><h3>*IMAGE ON CAKE*</h3></p><?php } ?>
<?php if($queryup->on_cake_image ==""){ ?><p><h3>*REFERENCE IMAGES*</h3></p><?php } ?>
<div class="clr"></div>
<hr />
<div class="clr"></div>
<?php if($queryup->title){ ?>
<p><h2><?php echo strtoupper($queryup->title); ?></h2></p>
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
<p><h4>INSCRIPTION</h4></p>
<p><h4>*<?php echo $queryup->inscription; ?></h4></p>
 <?php } ?>
 <br />
 <?php if($queryup->special_instruction){ ?>
<p><h4>SPECIAL INSTRUCTIONS</h4></p>
     <?php $special_instruction = explode(PHP_EOL,$queryup->special_instruction);
     foreach($special_instruction as $instruction){
     ?>
    <p><h4>*<?php echo $instruction; ?></h4></p>
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
</br>
<p class="cen">
    <img src="<?php echo base_url()?>assets/uploads/orders/barcode<?php echo  $queryup->order_code ?>.png" />
</p>
<br/>
<br/>
<br/>
</div>