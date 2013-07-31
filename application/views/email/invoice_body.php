St. phillip's Bakery - Cake <?php if( $queryup->order_status ==300 ){ echo ucfirst( $queryup->orderstatus); }else{ echo "Invoice"; } ?>

St. Phillips Bakery
--------------------------
<?php
$locations=$this->locations_model->getLocations($queryup->locationid);

if(!empty($locations)){
?>

<?php echo $locations[0]->title.PHP_EOL; ?>
<?php echo $locations[0]->address1.PHP_EOL; ?>
<?php echo $locations[0]->address2.PHP_EOL; ?>
<?php echo $locations[0]->city; ?> , <?php echo $locations[0]->province; ?> <?php echo $locations[0]->postal_code.PHP_EOL; ?>
<?php echo $locations[0]->country.PHP_EOL; ?>
<?php echo $locations[0]->email.PHP_EOL; ?>
<?php echo $this->orders_model->phoneNoFormat($locations[0]->phone).PHP_EOL; ?>
<?php } ?>


ORDER ESTIMATE #<?php echo $queryup->order_code; ?> <?php echo $this->orders_model->getDateFormat($queryup->order_date).PHP_EOL; ?>
------------------------------------------------------------
CUSTOMER DETAILS

<?php echo $queryup->first_name.' '. $queryup->last_name.PHP_EOL; ?>
<?php echo $queryup->address_1.PHP_EOL; ?>
<?php echo $queryup->address_2.PHP_EOL; ?>
<?php echo $queryup->city; ?>, <?php echo $queryup->province; ?> <?php echo $queryup->postal_code.PHP_EOL; ?>
<?php echo $this->orders_model->phoneNoFormat($queryup->phone_number).PHP_EOL; ?>
<?php echo $queryup->email.PHP_EOL; ?>
------------------------------------------------------------
ORDER INFORMATION

PICKUP/DELIVERY: 		<?php echo ucfirst($queryup->delivery_type).PHP_EOL; ?>
DATE: 					<?php echo $this->orders_model->dateFormat($queryup->delivery_date); ?> <?php echo $this->orders_model->timeFormat($queryup->delivery_time).PHP_EOL; ?>
<?php
if($queryup->delivery_type != 'delivery' ){
echo "PICKUP LOCATION:".		$this->productions_model->getLocations($queryup->pickup_location_id).PHP_EOL;
}else{
echo "DELIVERY ZONE:". 			$queryup->zone_title.PHP_EOL;
}
?>


<?php
if($this->productions_model->deliveryInfo($queryup->order_id) && $queryup->delivery_type == 'delivery'){
?>
DELIVER TO

<?php

$deliveryInfo = $this->productions_model->deliveryInfo($queryup->order_id);
if( $deliveryInfo->name){ echo $deliveryInfo->name.PHP_EOL;  }
if( $deliveryInfo->address_1){ echo $deliveryInfo->address_1.PHP_EOL; }
if( $deliveryInfo->address_2){ echo $deliveryInfo->address_2.PHP_EOL; }
if( $deliveryInfo->city || $deliveryInfo->postal ){
if($deliveryInfo->city){  echo $deliveryInfo->city; }  if($deliveryInfo->province){  echo ' , '.$deliveryInfo->province; }  if( $deliveryInfo->postal){ echo ', '.$deliveryInfo->postal.PHP_EOL; }
}
echo $this->orders_model->phoneNoFormat($deliveryInfo->phone).PHP_EOL;
if( $deliveryInfo->email){ echo $deliveryInfo->email.PHP_EOL;  }
}?>

------------------------------------------------------------
CAKE DETAILS

IMAGE ON CAKE: <?php if($queryup->on_cake_image){ echo $this->orders_model->fileName($queryup->on_cake_image).PHP_EOL; } ?>
REFERENCE PHOTO: <?php
$instructionals = $this->productions_model->photoGallery($queryup->order_id);
if(!empty($instructionals)){
    foreach($instructionals as $instructional){

        echo $this->orders_model->fileName($instructional->instructional_photo) ." , ".PHP_EOL;

    } } ?>
<?php if($queryup->inscription){ ?>
INSCRIPTION:

<?php echo '>'.$queryup->inscription.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->special_instruction){ ?>
SPECIAL INSTRUCTIONS:

<?php echo $queryup->special_instruction.PHP_EOL; ?>
<?php } ?>
------------------------------------------------------------
<?php echo $queryup->title ?>                                  <?php echo "$".$queryup->matrix_price.PHP_EOL; ?>
<?php if($queryup->magic_cake_id){ ?>
MAGIC CAKE ID: 			<?php echo $queryup->magic_cake_id.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->flavour_name){ ?>
FLAVOUR: 			    <?php echo $queryup->flavour_name.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->serving_size){ ?>
SIZE: 			        <?php echo $queryup->serving_size.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->shape){ ?>
SHAPE: 			        <?php echo $queryup->shape.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->serving_title){ ?>
SERVING: 			    <?php echo $queryup->serving_title.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->orderTiers){ ?>
TIERS: 			        <?php echo $queryup->orderTiers.PHP_EOL; ?>
<?php } ?>

<?php if($queryup->printed_image_surcharge >0 ){ ?>
PRINTED IMAGE:                                  <?php echo "$".$queryup->printed_image_surcharge.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->delivery_zone_surcharge >0 ){ ?>
DELIVERY:                                       <?php echo "$".$queryup->delivery_zone_surcharge.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->magic_surcharge >0 ){ ?>
MAGIC SURCHARGE:                                <?php echo "$".$queryup->magic_surcharge.PHP_EOL; ?>
<?php } ?>
<?php if($queryup->discount_price >0 ){ ?>
DISCOUNT:                                       <?php echo "$".$queryup->discount_price.PHP_EOL; ?>
<?php } ?>
------------------------------------------------------------
TOTAL:                                         <?php if($queryup->override_price > 0 ){ echo "$".$queryup->override_price.PHP_EOL;}else{ echo "$".$queryup->total_price.PHP_EOL;} ?>

------------------------------------------------------------

Thank You
<?php
if(!empty($locations)){ echo $locations[0]->email.PHP_EOL; } ?>
stphillipsbakery.com