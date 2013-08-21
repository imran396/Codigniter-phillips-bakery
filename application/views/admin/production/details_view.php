<script type="text/javascript">

    /* when document is ready */
    $(document).ready(function(){

        $('#searchButton').click(function() {

            var search =$("#search").val();
            $.ajax({
                url:"<?php echo site_url('admin/productions/search')?>",
                data:"search="+search,
                type:"post",
                success: function(val){
                    if(val > 0){
                        window.location="<?php echo site_url('/admin/productions/details')?>/"+val;
                    }else{
                        $('.error-msg').html("<span>Error No Results</span>");
                    }
                    //console.log(val);
                }
            })
        });

        $('#order_status').change(function() {

            var status=$("#order_status").val();
            $.ajax({
                url:"<?php echo site_url('admin/productions/status')?>/"+status,
                type:"post",
                success: function(val){
                  alert('Order Changed to: '+val);
                }
            })


        });



    });
</script>
<script>
    function printpage()
    {
        window.print()
    }
</script>

<div class="container-fluid fixed container-new">
<div class="navbar main">
    <div class="icon-wrapper"><a href="/admin/productions" class="icon-home"></a></div>
    <a href="/admin/productions/inproduction" class="back"><span>Back</span></a>
    <span class="tlogo">Cakes Order Detail</span>
    <div class="pull-right">
        <div class="search-form">
            <div class="error-msg"></div>
            <form action="/admin/productions/searchOrder" method="post">
                <input type="text" class="validate[required]" name="search" id="search" value="" placeholder="Search Orders" class="error" />
                <input type="button" id="searchButton" name="" value="Search" />
            </form>
        </div>
        <a href="<?php echo site_url('api/orders/productionInvoice/')?>?print=laser&order_id=<?php echo $queryup->order_id ?>" class="button" target="_blank"  ><span class="icon icon-print"></span> Print Page</a>
    </div>
    <div class="separator"></div>
</div>
<div id="wrapper">
<div class="panel">
    <div class="pull-right">
        <div class="row-fluid row-widest">
            <form action="" method="get" onsubmit="location">
            <select class="selectpicker span12" name="order_status" id="order_status" >
                <?php if($this->productions_model->currentProductionStatus($queryup->order_status)){?>
                <option class="label"><?php echo $this->productions_model->currentProductionStatus($queryup->order_status) ?></option>
                <?php }else{ ?>
                <option class="label">Status</option>
                <?php } ?>
                    <?php
                    $getOrderStatus = $this->productions_model->getOrderStatus();
                    foreach($getOrderStatus as $production_status):
                        if($queryup->order_status != $production_status->production_status_code){
                        ?>
                        <option value="<?php echo $queryup->order_code.'/'.$production_status->production_status_code; ?>"><?php echo $production_status->description ?></option>
                    <?php } endforeach; ?>
                </select>

            </form>

        </div>
    </div>
    <div class="pull-right">
        <div class="widget">
            <div class="widget-body list">
                <ul>
                    <li>
                        <span>Total</span>
                        <span class="count">$<?php if($queryup->override_price !='0.00') echo $queryup->override_price; else echo $queryup->total_price; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="title" style="height: 20px"><?php if($queryup->title){ echo $queryup->title; }else{ echo "Custom Cake"; } ?></div>
    <div class="customer"><?php echo $queryup->first_name.' '. $queryup->last_name ?></div>
    <div class="separator"></div>
</div><!-- end of panel -->
<div class="slider-img">
    <?php
    $on_cake_image_needed = $queryup->on_cake_image_needed;
    if($on_cake_image_needed == 1 && empty($queryup->on_cake_image) && empty($instructionals) ){
    echo "<h2 style='text-align: center; font-size: 18px; line-height: 115px' >Waiting for customer images</h2>";
    }else{
    ?>
    <ul>
        <?php


        $cake_id=$queryup->cake_id;

        if(empty($queryup->on_cake_image) ){
        $galleries = $this->gallery_model->getGallery($cake_id);
        if(!empty($galleries)){
            foreach($galleries as $gallery):
                ?>
                <li><a href=""><span class="plus"></span><!--<span class="desc">Image On Cake</span>--><img src="<?php echo base_url().$gallery->image; ?>" alt="" /></a></li>
            <?php endforeach; } } ?>
        <?php

        if($queryup->on_cake_image){ ?>
        <li><a href=""><span class="plus"></span><span class="desc">Image On Cake</span><img src="<?php echo base_url().$queryup->on_cake_image; ?>" alt="" /></a></li>
        <?php } ?>
        <?php
        $instructionals = $this->productions_model->photoGallery($queryup->order_id);
        if(!empty($instructionals)){
        foreach($instructionals as $instructional){
            ?>
            <li><a href=""><span class="plus"></span><img src="<?php echo base_url().$instructional->instructional_photo; ?>" alt="" /></a></li>
        <?php } } ?>


    </ul>
    <?php } ?>
</div><!-- End Slider -->
<div class="double">
    <div class="col">
        <div class="box">
            <div class="scrolled">
                <div class="info">
                    <?php
                    if($this->productions_model->getLocations($queryup->locationid)){ ?>
                    <div class="line">
                        <div class="title">Bakery location</div><?php echo $this->productions_model->getLocations($queryup ->locationid); ?>
                    </div>
                    <?php } ?>
                    <div class="line">
                        <div class="title">Order ID</div><?php echo $queryup->order_code; ?>
                    </div>
                    <?php if( $queryup->order_date){ ?>
                        <div class="line">
                            <div class="title"><?php echo $this->lang->line('order_created');?></div><?php echo getOrderDateFormat($queryup->order_date); ?>
                        </div>
                    <?php } ?>
                    <?php if( $queryup->delivery_date){ ?>
                    <div class="line">
                        <div class="title">Pickup / delivery date</div><?php echo $this->productions_model->dateFormate($queryup->delivery_date); ?>
                    </div>
                    <?php } ?>
                    <?php if($queryup->delivery_type){ ?>
                        <div class="line">
                            <div class="title">Delivery type</div><?php echo sentence_case($queryup->delivery_type); ?>
                        </div>
                    <?php } ?>
                    <?php if( $queryup->delivery_zone_id > 0){ ?>
                    <div class="line">
                        <div class="title">Delivery zone</div><?php echo $this->productions_model->getZones($queryup->delivery_zone_id); ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->delivery_time){ ?>
                    <div class="line">
                        <div class="title">Pickup time</div><?php echo $queryup->delivery_time; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->flavour_name){ ?>
                    <div class="line">
                        <div class="title">Flavor</div><?php echo $queryup->flavour_name; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->shape || $queryup->serving_size ){ ?>
                    <div class="line">
                        <div class="title">Size and shape</div><?php  echo $queryup->serving_size; ?> <?php if( $queryup->shape){ ?> and  <?php echo $queryup->shape; } ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->serving_title){ ?>
                    <div class="line">
                        <div class="title">Serving</div><?php echo $queryup->serving_title; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->orderTiers){ ?>
                    <div class="line">
                        <div class="title">Tiers</div><?php echo $queryup->orderTiers; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->magic_cake_id){ ?>
                    <div class="line">
                        <div class="title">Magic cake id</div><?php echo $queryup->magic_cake_id; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->matrix_price > 0){ ?>
                        <div class="line">
                            <div class="title">Cake price</div><?php echo $queryup->matrix_price; ?>
                        </div>
                    <?php } ?>
                    <?php if( $queryup->magic_surcharge > 0){ ?>
                    <div class="line">
                        <div class="title">Magic cake surcharge</div><?php echo $queryup->magic_surcharge; ?>
                    </div>
                    <?php } ?>

                    <?php if( $queryup->printed_image_surcharge > 0){ ?>
                        <div class="line">
                            <div class="title">Printed Image Surcharge</div><?php echo $queryup->printed_image_surcharge; ?>
                        </div>
                    <?php } ?>
                    <?php if( $queryup->delivery_zone_surcharge > 0){ ?>
                        <div class="line">
                            <div class="title">Delivery Zone Surcharge</div><?php echo $queryup->delivery_zone_surcharge; ?>
                        </div>
                    <?php } ?>
                    <?php if( $queryup->discount_price > 0){ ?>
                        <div class="line">
                            <div class="title">Discount Price</div><?php echo $queryup->discount_price; ?>
                        </div>
                    <?php } ?>
                    <?php if( $queryup->inscription){ ?>
                    <div class="line">
                        <div class="title">Inscription</div><?php echo $queryup->inscription; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->special_instruction){ ?>
                    <div class="line last">
                        <div class="title">Special instructions</div>
                        <?php echo $queryup->special_instruction; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div><!-- End Box -->
    </div>
    <div class="col">
        <div class="box tabber">
            <div class="widget widget-2 widget-tabs">
                <div class="widget-head">
                    <ul>
                        <li class="active" ><a href="#customer-information-tab" data-toggle="tab">Customer Information</a></li>
                        <?php if($this->productions_model->deliveryInfo($queryup->order_id)){ ?>
                        <li><a href="#delivery-information-tab" data-toggle="tab">Delivery Information</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="widget-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="customer-information-tab">
                            <div class="scrolled">
                                <div class="info">
                                    <?php if( $queryup->first_name){ ?>
                                    <div class="line">
                                        <div class="title">First Name</div> <?php echo $queryup->first_name; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $queryup->last_name){ ?>
                                    <div class="line">
                                        <div class="title">Last Name</div><?php echo $queryup->last_name; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $queryup->phone_number){ ?>
                                    <div class="line">
                                        <div class="title">Phone</div>
                                        <?php $from = $queryup->phone_number;
                                        echo $to = sprintf("%s-%s-%s",
                                            substr($from, 0, 3),
                                            substr($from, 3, 3),
                                            substr($from, 6, 8));?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $queryup->email){ ?>
                                    <div class="line">
                                        <div class="title">Email</div><?php echo $queryup->email; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $queryup->address_1){ ?>
                                    <div class="line">
                                        <div class="title">Address</div><?php echo $queryup->address_1; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $queryup->address_2){ ?>
                                        <div class="line">
                                            <div class="title">Address 2</div><?php echo $queryup->address_2; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if( $queryup->postal_code){ ?>
                                    <div class="line">
                                        <div class="title">Postal Code</div><?php echo $queryup->postal_code; ?>
                                    </div>
                                    <?php } ?>
                                    <?php

                                    if($this->productions_model->orderNotes($queryup->order_id)){
                                    ?>

                                    <div class="line last">

                                        <div class="title title-big">Added Notes</div>
                                        <?php

                                        $notes = $this->productions_model->orderNotes($queryup->order_id);
                                        foreach( $notes as $orderNotes):
                                            $createdate = $orderNotes->create_date;
                                            $date = date("D j M",$createdate);
                                            $time = date("g:i a",$createdate);

                                        ?>
                                        <div class="note">
                                            <div class="note-header">
                                                <table>
                                                    <tr>
                                                        <td class="notes-title notes-title-added">Added by:</td><td class="note-text note-text-name"><?php echo $orderNotes->first_name.' '.$orderNotes->last_name; ?></td>
                                                        <td class="notes-title notes-title-date">Date:<span class="note-text" ><?php echo $date; ?></span></td>
                                                        <td class="notes-title notes-title-time">Time:<span class="note-text" ><?php echo $time; ?></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php echo $orderNotes->notes; ?>
                                        </div>
                                        <?php endforeach;  ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($this->productions_model->deliveryInfo($queryup->order_id)){
                        $deliveryInfo = $this->productions_model->deliveryInfo($queryup->order_id)
                        ?>
                        <div class="tab-pane" id="delivery-information-tab">

                            <div class="scrolled">
                                <div class="info">
                                    <?php if( $deliveryInfo->name){ ?>
                                    <div class="line">
                                        <div class="title">Location or Contact Name</div><?php echo $deliveryInfo->name; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $deliveryInfo->phone){ ?>
                                    <div class="line">
                                        <div class="title">Phone</div><?php
                                        $from = $deliveryInfo->phone;
                                        echo $to = sprintf("%s-%s-%s",
                                            substr($from, 0, 3),
                                            substr($from, 3, 3),
                                            substr($from, 6, 8));
                                       ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $deliveryInfo->address_1){ ?>
                                    <div class="line">
                                        <div class="title">Address</div><?php echo $deliveryInfo->address_1; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $deliveryInfo->address_2){ ?>
                                    <div class="line">
                                        <div class="title">Address 2</div><?php echo $deliveryInfo->address_2; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $deliveryInfo->city){ ?>
                                    <div class="line">
                                        <div class="title">City</div><?php echo $deliveryInfo->city; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $deliveryInfo->province){ ?>
                                    <div class="line">
                                        <div class="title">Province</div><?php echo $deliveryInfo->province; ?>
                                    </div>
                                    <?php } ?>
                                    <?php if( $deliveryInfo->delivery_instruction){ ?>
                                    <div class="line last">
                                        <div class="title">Special instructions</div>
                                        <?php echo $deliveryInfo->delivery_instruction; ?>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>

                        </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div><!-- End Box -->
    </div>
    <div class="separator"></div>
</div>
</div><!-- End Wrapper -->
</div>
<div class="popup popup-gallery" id="gallery-popup">
    <a href="" class="popup-close"></a>
    <div class="popup-content">
        <div class="current-img"></div>
        <div class="gallery-slider">
            <ul>
                <?php
                $cake_id=$queryup->cake_id;
                if(empty($queryup->on_cake_image)){
                $galleries = $this->gallery_model->getGallery($cake_id);
                if(!empty($galleries)){
                    foreach($galleries as $gallery):
                        ?>

                        <li><a href="<?php echo base_url().$gallery->image; ?>"><img src="<?php echo base_url().$gallery->image; ?>" alt="" /></a></li>
                <?php endforeach; } } ?>
                <?php if($queryup->on_cake_image){ ?>
                    <li><a href="<?php echo base_url().$queryup->on_cake_image; ?>"><img src="<?php echo base_url().$queryup->on_cake_image; ?>" alt="" /></a></li>
                <?php } ?>
                <?php
                $instructionals = $this->productions_model->photoGallery($queryup->order_id);
                if(!empty($instructionals)){
                foreach($instructionals as $instructional){
                    ?>
                    <li><a href="<?php echo base_url().$instructional->instructional_photo; ?>"><img src="<?php echo base_url().$instructional->instructional_photo; ?>" alt="" /></a></li>
                <?php } } ?>

                </ul>
        </div>
    </div>
</div>