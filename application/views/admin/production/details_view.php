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


    });
</script>
<script>
    function printpage()
    {
        window.print()
    }
</script>
<style type="text/css" media="print">
    .pull-right , .back{
        display: none;
    }
    .container-new .filters {
        display: none;
    }
    .slider-img{
        display: none;
    }
    .line{
        background: #fff !important;
    }
    .double .box.tabber .scrolled {
        height: auto;
    }
    .icon-wrapper{
        display: none;
    }
    .container-new *::-moz-placeholder {
        background: #fff !important;
    }
    .desc{
        display: none;
    }
    .plus{
        display: none;
    }
</style>
<div class="container-fluid fixed container-new">
<div class="navbar main">
    <div class="icon-wrapper"><a href="/admin" class="icon-home"></a></div>
    <a href="/admin/productions/inproduction" class="back"><span>Back</span></a>
    <span class="tlogo">Cakes Order Detail</span>
    <div class="pull-right">
        <div class="search-form">
            <div class="error-msg"></div>
            <form action="/admin/productions/search" method="post">
                <input type="text" class="validate[required]" name="search" id="search" value="" placeholder="Search Orders" class="error" />
                <input type="button" id="searchButton" name="" value="Search" />
            </form>
        </div>
        <a href="javascript:void(0)" class="button"  onclick="printpage()" ><span class="icon icon-print"></span> Print Page</a>
    </div>
    <div class="separator"></div>
</div>
<div id="wrapper">
<div class="panel">
    <div class="pull-right">
        <div class="row-fluid row-widest">
            <form action="" method="get" onsubmit="location" >
            <select class="selectpicker span12" name="order_status" id="order_status" onchange="window.location=this.value" >
                <?php if($this->productions_model->currentProductionStatus($queryup->production_status)){?>
                <option class="label"><?php echo $this->productions_model->currentProductionStatus($queryup->production_status) ?></option>
                <?php }else{ ?>
                <option class="label">Status</option>
                <?php } ?>
                    <?php
                    $getOrderStatus = $this->productions_model->getOrderStatus();
                    foreach($getOrderStatus as $production_status):
                        if($queryup->production_status != $production_status->title){
                        ?>
                        <option value="<?php echo site_url('admin/productions/status/'.$queryup->order_code.'/'.$production_status->title)?>"><?php echo $production_status->description ?></option>
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
                        <span class="count"><?php if($queryup->override_price !='0.00') echo $queryup->override_price; else echo $queryup->total_price; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="title" style="height: 20px"><?php echo $queryup->title ?></div>
    <div class="customer"><?php echo $queryup->first_name.' '. $queryup->last_name ?></div>
    <div class="separator"></div>
</div><!-- end of panel -->
<div class="slider-img">
    <ul>
        <?php
        $cake_id=$queryup->cake_id;
        $galleries = $this->gallery_model->getGallery($cake_id);
        if(!empty($galleries)){
            foreach($galleries as $gallery):
                ?>
                <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url().$gallery->image; ?>" alt="" /></a></li>
            <?php endforeach; } ?>
        <?php
        $instructionals = $this->productions_model->photoGallery($queryup->order_id);
        if(!empty($instructionals)){
        foreach($instructionals as $instructional){
            ?>
            <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url().$instructional->instructional_photo; ?>" alt="" /></a></li>
        <?php } } ?>
    </ul>
</div><!-- End Slider -->
<div class="double">
    <div class="col">
        <div class="box">
            <div class="scrolled">
                <div class="info">
                    <?php
                    if($this->productions_model->getLocations($queryup->location_id)){ ?>
                    <div class="line">
                        <div class="title">Bakery location</div><?php echo $this->productions_model->getLocations($queryup ->location_id); ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->delivery_date){ ?>
                    <div class="line">
                        <div class="title">Pickup / delivery date</div><?php echo $this->productions_model->dateFormate($queryup->delivery_date); ?>
                    </div>
                    <?php } ?>
                    <?php if( $this->productions_model->getZones($queryup->delivery_zone_id) > 0){ ?>
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
                    <?php if( $queryup->serving_size){ ?>
                    <div class="line">
                        <div class="title">Serving</div><?php echo $queryup->serving_title; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->tiers){ ?>
                    <div class="line">
                        <div class="title">Tiers</div><?php echo $queryup->tiers; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->magic_cake_id){ ?>
                    <div class="line">
                        <div class="title">Magic cake id</div><?php echo $queryup->magic_cake_id; ?>
                    </div>
                    <?php } ?>
                    <?php if( $queryup->magic_surcharge){ ?>
                    <div class="line">
                        <div class="title">Magic cake surcharge</div><?php echo $queryup->magic_surcharge; ?>
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
                                        <div class="title">Phone</div><?php echo $queryup->phone_number; ?>
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
                                            <div class="title">Address</div><?php echo $queryup->address_2; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if( $queryup->postal_code){ ?>
                                    <div class="line">
                                        <div class="title">Postal Code</div><?php echo $queryup->postal_code; ?>
                                    </div>
                                    <?php } ?>

                                    <div class="line last">
                                        <div class="title title-big">Added Notes</div>
                                        <?php

                                        if($this->productions_model->orderNotes($queryup->order_id)){
                                        $notes = $this->productions_model->orderNotes($queryup->order_id);


                                        foreach( $notes as $orderNotes):
                                            $createdate = $orderNotes->create_date;
                                            $date = date("D M Y",$createdate);
                                            $time = date("g:i a",$createdate);

                                        ?>
                                        <div class="note">
                                            <div class="note-header">
                                                <?php if( $orderNotes->first_name){ ?>
                                                <div class="row-fluid row-widest-custom" >
                                                    <div class="title" style="padding-bottom: 0px" >Added by:</div>
                                                   <?php echo $orderNotes->first_name.' '.$orderNotes->last_name; ?>
                                                </div>
                                                <?php } ?>
                                                <div class="row-fluid row-widest-custom" >
                                                    <div class="title" style="padding-bottom:0px ">Date added:</div>
                                                    <?php echo $date; ?>
                                                </div>
                                                <div class="row-fluid row-widest-custom">
                                                    <div class="title" style="padding-bottom:0px">Time added:</div>
                                                    <?php echo $time; ?>
                                                </div>
                                            </div>
                                            <?php echo $orderNotes->notes; ?>
                                        </div>
                                        <?php endforeach; } ?>
                                    </div>
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
                                        <div class="title">Phone</div><?php echo $deliveryInfo->phone; ?>
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
                                    <?php if( $deliveryInfo->spacial_instruction){ ?>
                                    <div class="line last">
                                        <div class="title">Special instructions</div>
                                        <?php echo $deliveryInfo->spacial_instruction; ?>
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
                $galleries = $this->gallery_model->getGallery($cake_id);
                if(!empty($galleries)){
                    foreach($galleries as $gallery):
                        ?>

                        <li><a href="<?php echo base_url().$gallery->image; ?>"><img src="<?php echo base_url().$gallery->image; ?>" alt="" /></a></li>
                    <?php endforeach; } ?>
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