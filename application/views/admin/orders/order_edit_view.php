
<div id="content">
<ul class="breadcrumb">
    <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('orders');?></li>
</ul>
<br/>
<?php $this->load->view('admin/layouts/message'); ?>
<br/>
<div class="separator"></div>

<div class="heading-buttons">
    <h3 class="glyphicons sort"><i></i><?php
        echo $this->lang->line('orders');?><?php  echo "- #".$queryup->order_code;  ?></h3>
    <span style="float: right; display: block; margin-right:20px ">
    <a href="<?php echo site_url('admin/orders/sendCustomerEmail/'. $queryup->order_code)?>"  class="btn btn-icon btn-primary glyphicons envelope"><i></i>Email</a>
    <a target="_blank" href="<?php echo site_url('api/orders/productionInvoice/')?>?print=thermal&order_id=<?php echo $queryup->order_id ?>"  class="btn btn-icon btn-primary glyphicons print"><i></i>Print</a>
</span>
    <div class="clearfix"></div>
</div>
<br/>
<form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/orders/save" name="form1" id="form1" enctype="multipart/form-data">
<div class="well" style="padding-bottom: 20px; margin: 0;">
<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('cake_information');?></h4>
</div>
<?php  //print_r($queryup); ?>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">
        <div class="control-group" >
            <label class="control-label" ><?php echo $this->lang->line('bakery_location');?></label>
            <div class="controls">
                <?php echo $this->productions_model->getLocations($queryup ->locationid); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('cake_name');?></label>
            <div class="controls">
                <?php if($queryup->title){ echo $queryup->title; }else{ echo "Custom Cake"; } ?>
                </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $this->lang->line('flavour_name');?></label>
            <div class="controls">
                <?php echo $queryup->flavour_name; ?>
            </div>
        </div>
        <div class="control-group" id="hide_tiers">
            <label class="control-label" for="email"><?php echo $this->lang->line('tiers');?></label>
            <div class="controls">
                <?php  if($queryup->orderTiers) echo $queryup->orderTiers; ?>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $this->lang->line('serving_name');?></label>
            <div class="controls">
                <?php echo $queryup->serving_title; ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email"><?php echo $this->lang->line('fondant');?></label>
            <div class="controls">
                <?php  if($queryup->fondant ==1) echo "Yes"; else echo "No";  ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('size_shape');?></label>
            <div class="controls">
                <?php  echo $queryup->serving_size; ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('price');?>&nbsp;&nbsp;$<span id="price"><?php echo $queryup->matrix_price; ?></span></label>

        </div>

    </div>
</div>
<hr class="separator" />
<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('customer_information');?></h4>
</div>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">

        <div class="control-group">
            <label class="control-label" for="firstname"><?php echo $this->lang->line('customer_name');?></label>
            <div class="controls">
                <?php echo $queryup->first_name.' '. $queryup->last_name ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('employee_name');?></label>
            <div class="controls">

                <?php //echo $this->productions_model->getEmployee($queryup ->employee_id); ?>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('manager_name');?></label>
            <div class="controls">
                <?php echo $this->productions_model->getEmployee($queryup ->manager_id); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('discount_price');?></label>
            <div class="controls">
                <?php echo $queryup->discount_price; ?>
            </div>
        </div>


    </div>
</div>
<hr class="separator" />
<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('date_location');?></h4>
</div>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><strong><?php echo $this->lang->line('order_created');?></strong>:<?php echo dateFormatStr($queryup->order_date); ?> </label>
        </div>
        <div class="control-group">
            <label class="control-label" for="firstname"><?php echo $this->lang->line('delivery_type');?></label>
            <div class="controls">
                <?php echo $queryup->delivery_type; ?>
            </div>
        </div>
        <?php if($queryup->pickup_location_id > 0 && $queryup->delivery_type=='pickup' ){?>
        <div class="control-group" id="locationid" >
            <label class="control-label" ><?php echo $this->lang->line('pickup_location');?></label>
            <div class="controls">
                <?php echo $this->productions_model->getLocations($queryup ->pickup_location_id); ?>
            </div>
        </div>
        <?php } ?>
<?php if($queryup->delivery_zone_id > 0 && $queryup->delivery_type=='delivery' ){?>
        <div class="control-group" id="deliveryzoneid">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('delivery_zone');?></label>
            <div class="controls">
                <?php echo $this->productions_model->getZones($queryup->delivery_zone_id); ?>
            </div>
        </div>
<?php } ?>
    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" >&nbsp;</label>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('delivery_date');?></label>
            <div class="controls"><?php echo $queryup->delivery_date; ?>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('delivery_time');?></label>
            <div class="controls">
                <?php echo $queryup->delivery_time; ?>

            </div>
        </div>


    </div>
</div>
<hr class="separator" />
<?php
if($this->productions_model->deliveryInfo($queryup->order_id) && $queryup->delivery_zone_id > 0 ){
$deliveryInfo = $this->productions_model->deliveryInfo($queryup->order_id);

?>
<div id="delivery-info">
    <div class="widget-head">
        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('delivery_information');?></h4>
    </div>
    <hr class="separator" />
    <div class="row-fluid">
        <div class="span6">

            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('name');?></label>
                <div class="controls">
                    <?php echo $deliveryInfo->name; ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('phone_number');?></label>
                <div class="controls">
                    <?php
                    $from = $deliveryInfo->phone;
                    echo $to = sprintf("%s-%s-%s",
                        substr($from, 0, 3),
                        substr($from, 3, 3),
                        substr($from, 6, 8));
                    ?>
                </div>
            </div>
            <!--       <div class="control-group">
            <label class="control-label"><?php /*echo $this->lang->line('email');*/?></label>
            <div class="controls">
                <input type="text" placeholder="<?php /*echo $this->lang->line('enter').' '.$this->lang->line('email');*/?>" value="<?php /*echo(isset($queryup[0]->email))? $queryup[0]->email:set_value('email'); */?>"  class="validate[custom[email]] span10" name="email" id="email"  />
            </div>
        </div>-->


            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('delivery_instruction');?></label>
                <div class="controls">
                    <textarea rows="" style="width: 320px; height: 95px" class="midium-textarea" cols="" name="delivery_instruction" id="delivery_instruction"> <?php echo (isset($deliveryInfo->delivery_instruction))? $deliveryInfo->delivery_instruction:set_value('delivery_instruction'); ?></textarea>
                </div>
            </div>


        </div>
        <div class="span6">
            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('address1');?></label>
                <div class="controls">
                    <?php echo $deliveryInfo->address_1; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('address2');?></label>
                <div class="controls">
                    <?php echo $deliveryInfo->address_2; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('city');?></label>
                <div class="controls">
                    <?php echo $deliveryInfo->city; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('province');?></label>
                <div class="controls">
                    <?php echo $deliveryInfo->province; ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo $this->lang->line('postal_code');?></label>
                <div class="controls">
                    <?php echo $deliveryInfo->postal; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php } ?>
<hr class="separator" />
<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('cake_instruction');?></h4>
</div>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">

        <div class="control-group">
            <label>
                <?php $on_cake_image_needed = (isset($queryup->on_cake_image_needed))? $queryup->on_cake_image_needed:set_value('on_cake_image_needed'); ?>
                <input type="checkbox" <?php if($on_cake_image_needed > 0){ echo "checked"; } ?> disabled="disabled" value="1" id="custom_cake_surcharge" name="on_cake_image_needed"  >&nbsp;<?php echo $this->lang->line('custom_cake_surcharge');?>
            </label>

        </div>
        <div class="control-group" id="hideoncake">
            <?php $cake_email_photo = (isset($queryup->cake_email_photo))? $queryup->cake_email_photo:set_value('cake_email_photo'); ?>
            <label><input type="checkbox"  disabled="disabled" value="1" <?php if($cake_email_photo ==1){ echo "checked"; } ?> id="cake_email_photo" name="cake_email_photo"  >&nbsp;<?php echo $this->lang->line('cake_email_photo');?></label>

        </div>
        <div class="control-group">
            <?php $instructional_email_photo = (isset($queryup->instructional_email_photo))? $queryup->instructional_email_photo:set_value('instructional_email_photo'); ?>
            <label ><input type="checkbox" disabled="disabled" <?php if($instructional_email_photo ==1){ echo "checked"; } ?> value="1" id="instructional_email_photo" name="instructional_email_photo"  >&nbsp;<?php echo $this->lang->line('instructional_email_photo');?></label>
        </div>
        <div class="control-group">
            <?php $vaughan_location = (isset($queryup->vaughan_location))? $queryup->vaughan_location:1; ?>
            <label ><input type="checkbox" disabled="disabled" <?php if($vaughan_location ==1 ){ echo "checked"; } ?> value="1" id="vaughan_location" name="vaughan_location"  >&nbsp;<?php echo $this->lang->line('is_vaughan_location');?></label>
        </div>
        <div class="control-group">
            <label ><input type="checkbox"  value="1" id="mailtouser" name="mailtouser"  >&nbsp;<?php echo $this->lang->line('mailtouser');?></label>
        </div>


    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('magic_cake_id');?></label>
            <div class="controls">
                <?php echo $magic_cake_id = (isset($queryup->magic_cake_id))? $queryup->magic_cake_id:set_value('magic_cake_id'); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('magic_surcharge');?></label>
            <div class="controls">
                <?php echo $magic_surcharge = (isset($queryup->magic_surcharge))? $queryup->magic_surcharge:set_value('magic_surcharge'); ?>
            </div>
        </div>


    </div>
</div>

<hr class="separator" />
<div class="row-fluid">
    <div class="span12">
        <div class="control-group" id="cakeemailphoto">
            <label class="control-label"><?php echo $this->lang->line('onCakeImage'); ?></label>
            <div class="controls">
                <div data-provides="fileupload" class="fileupload fileupload-new">
                    <div class="input-append">
                        <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input class="" type="file" name="onCakeImage"></span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                        <?php $on_cake_image = (isset($queryup->on_cake_image))? $queryup->on_cake_image:''; ?>"
                        <?php if($on_cake_image){ ?><span>
                            <img src="<?php  echo base_url().$queryup->on_cake_image;?>" alt="" style="height: 80px; width: 80px; margin-left: 20px;">

                            </span>

                        <?php } ?>
                    </div>
                    <?php if($on_cake_image){ ?> <a href="<?php  echo base_url().$queryup->on_cake_image;?>" target="_blank" >Click here</a> <?php } ?>
                </div>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('inscription');?></label>
            <div class="controls">

                <input style="width: 100%" type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('inscription');?>" value="<?php echo $inscription = (isset($queryup->inscription))? $queryup->inscription:set_value('inscription'); ?>" id="inscription"  name="inscription">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('special_instruction');?></label>
            <div class="controls">
                <textarea rows="" cols="" style="width: 98%" name="special_instruction" id="special_instruction" class="midium-textarea" ><?php echo(isset($queryup->special_instruction))? $queryup->special_instruction:set_value('special_instruction'); ?></textarea>
            </div>
        </div>

        <?php
        if(isset($queryup->order_id)){
            $instructionals = $this->productions_model->photoGallery($queryup->order_id);
            if(!empty($instructionals)){
                ?>

                <div class="">
                    <table style="width: 98%" class="table table-bordered table-condensed js-table-sortable" style="height: 40px; margin-bottom: 20px;overflow-x: scroll">
                        <?php foreach($instructionals as $instructional){ ?>

                            <tr class="selectable" id="listItem_<?php echo $instructional->instructional_photo_id; ?>" >
                                <td><?php echo $instructional->ordering; ?></td>
                                <td><a href="<?php  echo base_url().$instructional->instructional_photo;?>" class="select-image-group" rel="group-1"><?php  echo $this->orders_model->fileName($instructional->instructional_photo);?><?php //echo $this->lang->line('click_for_image');?></a> </td>
                                <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                <td><a onclick="return confirm('Are you sure you want to delete?')" data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger instructional-danger" rel="<?php echo $instructional->instructional_photo_id; ?>"  id="<?php echo $instructional->instructional_photo; ?>"><i></i></a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php  } } ?>
        <div class="clear"></div>
        <br/>
        <div id="instructionalemailphoto">

            <div id="pluploadUploader">
                <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
            </div>

        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('order_status');?></label>
            <?php $order_status = (isset($queryup->order_status))? $queryup->order_status:set_value('order_status'); ?>
            <select class="search_dropdown" name="order_status" id="order_status" style="width: 100%">
                <?php
                $getOrderStatus = $this->productions_model->getOrderStatus();
                foreach($getOrderStatus as $orderStatus):

                    ?>
                    <option value="<?php echo $orderStatus->production_status_code; ?>" <?php if($order_status == $orderStatus->production_status_code ){ echo "selected='selected'"; } ?> ><?php echo $orderStatus->description ?></option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>

</div>
<hr class="separator" />
<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('order_notes');?></h4>
</div>
<?php
$uporder_id =isset($queryup->order_id) ? $queryup->order_id:'';
if($uporder_id > 0){
    $order_notes = $this->productions_model->orderNotes($queryup->order_id);
    if(!empty($order_notes)){
        ?>
        <table style="width: 100%" class="table table-bordered table-condensed">
            <?php

            $notes = $this->productions_model->orderNotes($queryup->order_id);
            foreach( $notes as $orderNotes):
                $createdate = $orderNotes->create_date;
                $date = date("D j M",$createdate);
                $time = date("g:i a",$createdate);

                ?>
                <tbody id="note_<?php echo $orderNotes->order_notes_id; ?>" >
                <tr>
                    <td class="notes-title notes-title-added">Added by:<?php echo $orderNotes->first_name.' '.$orderNotes->last_name; ?></td>
                    <td class="notes-title notes-title-date">Date added:<span class="note-text" ><?php echo $date; ?></span></td>
                    <td class="notes-title notes-title-time">Time added:<span class="note-text" ><?php echo $time; ?></span></td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete?')" data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger notes-danger" id="<?php echo $orderNotes->order_notes_id; ?>"><i></i></a></td>
                </tr>
                <tr>
                    <td colspan="4"> <?php echo $orderNotes->notes; ?></td>
                </tr>
                </tbody>
            <?php endforeach;  ?>

        </table>
    <?php } } ?>

<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('added_by');?></label>
            <select class="search_dropdown"  id="notes_employee_id" style="width: 100%;"  name="notes_employee_id">
                <?php foreach($employeeresult as $employee): ?>
                    <option value="<?php echo $employee->id;  ?>" ><?php echo $employee->first_name.' '.$employee->last_name; ?></option>
                <?php  endforeach; ?>
            </select>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('notes');?></label>
            <div class="controls">
                <textarea rows="" cols="" style="width: 98%" name="notes" id="notes" class="midium-textarea" ></textarea>

            </div>
        </div>
    </div>
</div>

<hr class="separator" />
<table style="width: 100%" class="table table-bordered table-condensed">
    <tr>
        <?php $matrix_price = (isset($queryup->matrix_price))? $queryup->matrix_price:'0.00'; ?>
        <input type="hidden" name="matrix_price" id="matrix_price" value="<?php echo $matrix_price; ?>">
        <td><?php echo $this->lang->line('matrix_price');?></td><td id="matrixprice">$<?php echo $matrix_price; ?></td>
    </tr>
    <tr>
        <?php $discount_price = (isset($queryup->discount_price))? $queryup->discount_price:'0.00'; ?>
        <input type="hidden" name="discount_price" id="discount_price" value="<?php echo $discount_price; ?>">
        <td><?php echo $this->lang->line('discount_price');?></td><td id="discountprice">$<?php echo $discount_price; ?></td>
    </tr>
    <tr>
        <?php $printed_image_surcharge = (isset($queryup->printed_image_surcharge))? $queryup->printed_image_surcharge:'0.00'; ?>
        <input type="hidden" name="printed_image_surcharge" id="printed_image_surcharge" value="<?php echo $printed_image_surcharge; ?>">
        <td><?php echo $this->lang->line('printed_image_surcharge');?></td><td id="printedimagesurcharge">$<?php echo $printed_image_surcharge; ?></td>
    </tr>
    <tr>
        <?php $magic_surcharge = (isset($queryup->magic_surcharge))? $queryup->magic_surcharge:'0.00'; ?>
        <input type="hidden" name="magic_surcharge" id="magic_surcharge" value="<?php echo $magic_surcharge; ?>">
        <td><?php echo $this->lang->line('magic_surcharge');?></td><td id="magicsurcharge">$<?php echo $magic_surcharge; ?></td>
    </tr>
    <tr>
        <?php $delivery_zone_surcharge = (isset($queryup->delivery_zone_surcharge))? $queryup->delivery_zone_surcharge:'0.00'; ?>
        <input type="hidden" name="delivery_zone_surcharge" id="delivery_zone_surcharge" value="<?php echo $delivery_zone_surcharge; ?>">
        <td><?php echo $this->lang->line('delivery_zone_surcharge');?></td><td id="deliveryzonesurcharge">$<?php echo $delivery_zone_surcharge; ?></td>
    </tr>

    <tr>
        <?php $total_price = (isset($queryup->total_price))? $queryup->total_price:'0.00'; ?>
        <input type="hidden"  name="total_price" id="total_price" value="<?php echo $total_price;?>">
        <td><?php echo $this->lang->line('total_price');?></td><td>$<span id="totalprice"><?php echo $total_price;?></span></td>
    </tr>
    <?php $override_price = (isset($queryup->override_price))? $queryup->override_price:'';
    if($override_price > 0){
    ?>
    <tr>

        <td><?php echo $this->lang->line('override_price');?></td>
        <td id="override_price">

            $<?php echo $override_price; ?></td>
    </tr>
    <?php } ?>

</table>
</div>



<hr class="separator"/>
<div class="form-actions">

    <input type="hidden" id="on_cake_image_needed" name="on_cake_image_needed" value="<?php echo $on_cake_image_needed = (isset($queryup->on_cake_image_needed))? $queryup->on_cake_image_needed:set_value('on_cake_image_needed'); ?>">
    <input type="hidden" id="order_id" name="order_id" value="<?php echo (isset($queryup->order_id))? $queryup->order_id:0; ?>">
    <input type="hidden" id="cake_email_photo" name="cake_email_photo" value="<?php echo (isset($queryup->cake_email_photo))? $queryup->cake_email_photo:0; ?>">
    <input type="hidden" id="instructional_email_photo" name="instructional_email_photo" value="<?php echo (isset($queryup->instructional_email_photo))? $queryup->instructional_email_photo:0; ?>">
    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
    <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
</div>
<div class="separator line"></div>
</form>

</div>

<!-- plupload -->
<style type="text/css">@import url(/assets/theme/scripts/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>
<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/theme/scripts/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/theme/scripts/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>

<script type="text/javascript">
    // Convert divs to queue widgets when the DOM is ready
    $(function() {
        $("#pluploadUploader").pluploadQueue({
            // General settings
            runtimes : 'gears,browserplus,html5',
            url : '/admin/gallery/upload',
            max_file_size : '10mb',
            chunk_size : '2mb',
            unique_names : true,
            sortable: true,
            // Resize images on clientside if we can
            resize : {width : 730, height : 480, quality : 90},
            // Specify what files to browse for
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ],

            // Flash settings
            flash_swf_url : 'theme/scripts/plupload/js/plupload.flash.swf',

            // Silverlight settings
            silverlight_xap_url : 'theme/scripts/plupload/js/plupload.silverlight.xap'
        });

        // Client side form validation
        /*$('#pluploadForm').submit(function(e) {
         var uploader = $('#pluploadUploader').pluploadQueue();

         // Files in queue upload them first
         if (uploader.files.length > 0) {
         // When all files are uploaded submit form
         uploader.bind('StateChanged', function() {
         if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
         $('#pluploadForm').submit();
         }
         });

         uploader.start();
         } else {
         alert('You must queue at least one file.');
         }

         return false;
         });*/
    });
</script>
<link rel="stylesheet" href="/assets/lightbox/colorbox.css" />
<script src="/assets/lightbox/jquery.colorbox.js"></script>
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".select-image-group").colorbox();
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".js-table-sortable").sortable({
            opacity: '0.5',
            axis:'vertically',
            handle : '.js-sortable-handle',
            update : function () {
                var order = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    url:"<?php echo site_url('admin/orders/sorting/'.$this->uri->segment(4,0))?>",
                    data:order,
                    cache: false,
                    success: function(html){
                        alert(html);
                        $('#loader').html(html);
                    }
                });
            }
        });

        $('.instructional-danger').click(function(){

            var path = $(this).attr('id');
            var rel = $(this).attr('rel');
            $.ajax({
                type: "POST",
                url:"<?php echo site_url('admin/orders/instructional_gallery_delete/'.$this->uri->segment(4,0))?>",
                data:'path='+path,
                cache: false,
                success: function(val){
                    if(val =='success'){
                        $('#listItem_'+rel).remove();
                    }

                }
            });

        })

        $('.notes-danger').click(function(){

            var order_notes_id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url:"<?php echo site_url('admin/orders/notes_remove')?>",
                data:'order_notes_id='+order_notes_id,
                cache: false,
                success: function(val){
                    if(val =='success'){
                        $('#note_'+order_notes_id).remove();
                    }

                }
            });

        })
    });

</script>





