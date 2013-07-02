<div class="container-fluid fixed container-new">
<div class="navbar main">
    <div class="icon-wrapper"><a href="/admin" class="icon-home"></a></div>
    <a href="/admin/production/inproduction" class="back"><span>Back</span></a>
    <span class="tlogo">Cakes Order Detail</span>
    <div class="pull-right">
        <div class="search-form">
            <div class="error-msg"><span>Error No Results</span></div>
            <input type="text" name="" value="" placeholder="Search Orders" class="error" />
            <input type="submit" name="" value="Search" />
        </div>
        <a href="" class="button"><span class="icon icon-print"></span> Print Page</a>
    </div>
    <div class="separator"></div>
</div>
<div id="wrapper">
<div class="panel">
    <div class="pull-right">
        <div class="row-fluid row-widest">
            <select class="selectpicker span12">
                <option>Status</option>
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>
        </div>
    </div>
    <div class="pull-right">
        <div class="widget">
            <div class="widget-body list">
                <ul>
                    <li>
                        <span>Total</span>
                        <span class="count">$1000.00</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="title">Wedding cake withavery longfancyname</div>
    <div class="customer">Very long customer name</div>
    <div class="separator"></div>
</div><!-- end of panel -->
<div class="slider-img">
    <ul>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
        <li><a href=""><span class="plus"></span><span class="desc">On Cake</span><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
    </ul>
</div><!-- End Slider -->
<div class="double">
    <div class="col">
        <div class="box">
            <div class="scrolled">
                <div class="info">
                    <div class="line">
                        <div class="title">Bakery location</div><?php echo $this->productions_model->getLocations($queryup ->location_id); ?>
                    </div>
                    <div class="line">
                        <div class="title">Pickup / delivery date</div><?php echo $this->productions_model->dateFormate($queryup->delivery_date); ?>
                    </div>
                    <div class="line">
                        <div class="title">Delivery zone</div><?php echo $this->productions_model->getZones($queryup->delivery_zone_id); ?>
                    </div>
                    <div class="line">
                        <div class="title">Pickup time</div><?php echo $queryup->delivery_time; ?>
                    </div>
                    <div class="line">
                        <div class="title">Flavor</div><?php echo $queryup->flavour_name; ?>
                    </div>
                    <div class="line">
                        <div class="title">Size and shape</div>Size and  <?php echo $queryup->shape; ?>
                    </div>
                    <div class="line">
                        <div class="title">Serving</div>Serving
                    </div>
                    <div class="line">
                        <div class="title">Tiers</div><?php echo $queryup->tiers; ?>
                    </div>
                    <div class="line">
                        <div class="title">Magic cake id</div><?php echo $queryup->magic_cake_id; ?>
                    </div>
                    <div class="line">
                        <div class="title">Magic cake surcharge</div><?php echo $queryup->magic_surcharge; ?>
                    </div>
                    <div class="line">
                        <div class="title">Inscription</div><?php echo $queryup->inscription; ?>
                    </div>
                    <div class="line last">
                        <div class="title">Special instructions</div>
                        <?php echo $queryup->special_instruction; ?>
                    </div>
                </div>
            </div>
        </div><!-- End Box -->
    </div>
    <div class="col">
        <div class="box tabber">
            <div class="widget widget-2 widget-tabs">
                <div class="widget-head">
                    <ul>
                        <li><a href="#customer-information-tab" data-toggle="tab">Customer Information</a></li>
                        <li class="active"><a href="#delivery-information-tab" data-toggle="tab">Delivery Information</a></li>
                    </ul>
                </div>
                <div class="widget-body">
                    <div class="tab-content">
                        <div class="tab-pane" id="customer-information-tab">
                            <div class="scrolled">
                                <div class="info">
                                    <div class="line">
                                        <div class="title">First Name</div> <?php echo $queryup->first_name; ?></div>
                                    <div class="line">
                                        <div class="title">Last Name</div><?php echo $queryup->last_name; ?>
                                    </div>
                                    <div class="line">
                                        <div class="title">Phone</div><?php echo $queryup->phone_number; ?>
                                    </div>
                                    <div class="line">
                                        <div class="title">Email</div><?php echo $queryup->email; ?>
                                    </div>
                                    <div class="line">
                                        <div class="title">Address</div><?php echo $queryup->address_1; ?>
                                    </div>
                                    <div class="line">
                                        <div class="title">Postal Code</div><?php echo $queryup->postal_code; ?>
                                    </div>
                                    <div class="line last">
                                        <div class="title title-big">Added Notes</div>
                                        <div class="note">
                                            <div class="note-header">
                                                <div class="row-fluid row-widest">
                                                    <div class="title">Added by:</div>
                                                    Verylong Employee Full  Name
                                                </div>
                                                <div class="row-fluid row-widest">
                                                    <div class="title">Date added:</div>
                                                    Day,#,Month
                                                </div>
                                                <div class="row-fluid row-widest">
                                                    <div class="title">Time added</div>
                                                    4:56 pm
                                                </div>
                                            </div>
                                            Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore
                                            and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem
                                            ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and
                                            aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum.
                                        </div>
                                        <div class="note">
                                            <div class="note-header">
                                                <div class="row-fluid row-widest">
                                                    <div class="title">Added by:</div>
                                                    Employee  Name
                                                </div>
                                                <div class="row-fluid row-widest">
                                                    <div class="title">Date added:</div>
                                                    Day,#,Month
                                                </div>
                                                <div class="row-fluid row-widest">
                                                    <div class="title">Time added</div>
                                                    4:56 pm
                                                </div>
                                            </div>
                                            Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore
                                            and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem
                                            ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and
                                            aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore
                                            and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem
                                            ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and
                                            aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore
                                            and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem
                                            ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and
                                            aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="delivery-information-tab">
                            <div class="scrolled">
                                <div class="info">
                                    <div class="line">
                                        <div class="title">Location or Contact Name</div>Location or Contact Name</div>
                                    <div class="line">
                                        <div class="title">Phone</div>416-456-0456
                                    </div>
                                    <div class="line">
                                        <div class="title">Address</div>Full Address here
                                    </div>
                                    <div class="line">
                                        <div class="title">Address 2</div>Full Secondary Address here
                                    </div>
                                    <div class="line">
                                        <div class="title">City</div>Toronto a City
                                    </div>
                                    <div class="line">
                                        <div class="title">Province</div>Ontario Province
                                    </div>
                                    <div class="line last">
                                        <div class="title">Special instructions</div>
                                        Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet
                                        dolore and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem
                                        upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set
                                        aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore
                                        and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem
                                        ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and
                                        aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore
                                        and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem
                                        ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and
                                        aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum.
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
                <li><a href="<?php echo base_url() ?>assets/images/img-1.jpg"><img src="<?php echo base_url() ?>assets/images/img-1.jpg" alt="" /></a></li>
            </ul>
        </div>
    </div>
</div>