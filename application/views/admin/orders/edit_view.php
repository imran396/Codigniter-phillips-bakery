<script type="text/javascript">

/* when document is ready */
$(document).ready(function(){

    $('#vaughan_location').click(function(){

        if($("#vaughan_location").is(':checked')){

            var location_id =0;
            var flavour_id =$("#flavourid").val();
            $.ajax({
                url:"<?php echo site_url('admin/orders/getCheckBlackout')?>",
                data:"location_id="+location_id+"&flavour_id="+flavour_id,
                type:"post",
                success: function(val){
                    if(val !='success'){
                        alert(val);
                        $('#vaughan_location').prop('checked', false);
                    }
                }
            })

        }else{

            var location_id =$("#location_id").val();
            var flavour_id =$("#flavourid").val();
            $.ajax({
                url:"<?php echo site_url('admin/orders/getCheckBlackout')?>",
                data:"location_id="+location_id+"&flavour_id="+flavour_id,
                type:"post",
                success: function(val){
                    if(val !='success'){
                        alert(val);
                        $('#vaughan_location').prop('checked', true);
                    }
                }
            })
        }

    })

    $('#location_id').change(function() {

        var cake_id =$("#cake_id").val();
        var location_id =$("#location_id").val();
        var delivery_date = $("#datepicker").val();
        if(!cake_id > 0 ){
            return false;
        }
        if(cake_id == ""){
            $('#hide_tiers').show();
            return false;
        }
        if ($('#vaughan_location').is(':checked') == true) {
            var kitchen_location_id = 0;
        }else{
            var kitchen_location_id = $("#location_id").val();
        }
        $.ajax({
            url:"<?php echo site_url('admin/orders/getFlavour')?>",
            data:"cake_id="+cake_id+"&location_id="+location_id+"&kitchen_location_id="+kitchen_location_id+"&delivery_date="+delivery_date,
            type:"post",
            success: function(val){
                console.log(val);
                var n=val.split("@a&");
                $('#flavourid').html(n[0]);
                $('#serving_id').html(n[1]);
                $('#size_id').html(n[2]);
                $('#hide_tiers').hide();

            }
        })
    });

    $('#cake_id').change(function() {

        var cake_id =$("#cake_id").val();
        var delivery_date = $("#datepicker").val();
        var location_id =$("#location_id").val();
        if(!location_id > 0 ){
            $('#flavourid').val('');
            alert ('Must be select location');
            $('#s2id_cake_id a span').html('---Select one---');
            return false;
        }
        if(cake_id == ""){
            $('#hide_tiers').show();
            return false;
        }
        if ($('#vaughan_location').is(':checked') == true) {
            var kitchen_location_id = 0;
        }else{
            var kitchen_location_id = $("#location_id").val();
        }
        $.ajax({
            url:"<?php echo site_url('admin/orders/getFlavour')?>",
            data:"cake_id="+cake_id+"&location_id="+location_id+"&kitchen_location_id="+kitchen_location_id+"&delivery_date="+delivery_date,
            type:"post",
            success: function(val){
                console.log(val);
                var n=val.split("@a&");
                $('#flavourid').html(n[0]);
                $('#serving_id').html(n[1]);
                $('#shape_id').html(n[2]);
                if(n[3] != 0){
                    $('#fondant').html(n[3]);
                }
                $('#hide_tiers').hide();

            }
        })
    });

    <?php $cake_id = (isset($queryup->cake_id))? $queryup->cake_id:'';
    if($cake_id > 0){
    ?>
    $('#hide_tiers').hide();
    <?php } ?>

    $('#flavourid').change(function() {

        var cake_id =$("#cake_id").val();
        var flavour_id =$("#flavourid").val();
        var location_id =$("#location_id").val();
        var delivery_date = $("#datepicker").val();
        if(!location_id > 0 ){
            $('#flavourid').val('');
            alert ('Must be select location');
            $('#s2id_flavourid a span').html('---Select one---');
            return false;
        }
        if ($('#vaughan_location').is(':checked') == true) {
            var location_id = 0;
        }else{
            var location_id = $("#location_id").val();
        }
        $.ajax({
            url:"<?php echo site_url('admin/orders/getServings')?>",
            data:"cake_id="+cake_id+"&flavour_id="+flavour_id+"&location_id="+location_id+"&delivery_date="+delivery_date,
            type:"post",
            success: function(val){
                var n=val.split("@a&");
                if(n[0] =='error'){
                    alert(n[1]);
                }else{
                    if(n[0] !=""){

                       // $('#fondant').html(n[0]);
                    }

                }


            }
        })
    });

    $('#serving_id').change(function() {

        var serving_id =$("#serving_id").val();
        var cake_id =$("#cake_id").val();
        var location_id =$("#location_id").val();

        $.ajax({
            url:"<?php echo site_url('admin/orders/getPrice')?>",
            data:"cake_id="+cake_id+"&serving_id="+serving_id+'&location_id='+location_id,
            type:"post",
            success: function(val){
               // console.log(val);
                var n=val.split("@a&");
                $('#serving_id').html(n[0]);
                /* $('#size').html(n[1]);*/
                $('#price').html(n[2]);
                $('#matrix_price').val(n[2]);
                $('#matrixprice').html("$"+n[2]);
                // $('#s2id_serving_id a span').html(n[3]);
                $('#s2id_size_id a span').html(n[4]);
                if( $('#custom_cake_surcharge').is(':checked') ){
                    $('#printed_image_surcharge').val(n[5]);
                    $('#printedimagesurcharge').html("$"+n[5]);
                }
            }
        })
    });

    $('#size_id_off').change(function() {

        var size_id =$("#size_id").val();
        var cake_id =$("#cake_id").val();
        var location_id =$("#location_id").val();
        if(!cake_id > 0 ){
            return false;
        }
        $.ajax({
            url:"<?php echo site_url('admin/orders/getPrice')?>",
            data:"cake_id="+cake_id+"&serving_id="+size_id+'&location_id='+location_id,
            type:"post",
            success: function(val){
                console.log(val);
                var n=val.split("@a&");
                $('#servings').html(n[0]);
                $('#size').html(n[1]);
                $('#price').html(n[2]);
                $('#matrix_price').val(n[2]);
                $('#matrixprice').html("$"+n[2]);
                $('#s2id_serving_id a span').html(n[3]);
            }
        })
    });

    $('#delivery_type').change(function() {

        var delivery_type =$("#delivery_type").val();
        if(delivery_type =='delivery'){
            $("#delivery-info").show();
            $("#locationid").hide();
            $("#deliveryzoneid").show();
        }else{
            $("#delivery-info").hide();
            $("#deliveryzoneid").hide();
            $("#locationid").show();
            $('#delivery_zone_surcharge').val('');
            $('#deliveryzonesurcharge').html('');
        }
    });
    <?php $pickuptype = (isset($queryup->delivery_type))? $queryup->delivery_type:'pickup';
     if($pickuptype =='pickup'){
     ?>
    $("#delivery-info").hide();
    $("#locationid").show();
    $("#deliveryzoneid").hide();

    <?php }elseif($pickuptype =='delivery'){ ?>

    $("#delivery-info").show();
    $("#locationid").hide();
    $("#deliveryzoneid").show();

    <?php } ?>

    /* $('#instructional_email_photo').click(function() {

     if( $(this).is(':checked') ){
     $("#instructionalemailphoto").hide();
     }else{
     $("#instructionalemailphoto").show();
     }
     });
    <?php //$instructional_email_photo = (isset($queryup[0]->instructional_email_photo))? $queryup[0]->instructional_email_photo:'';
    //if($instructional_email_photo == 1){
    ?>
     $("#instructionalemailphoto").hide();
    <?php //} ?>*/


    jQuery('#printed_image_surcharge').keyup(function () {
        $("#printed_image_surcharge").val(this.value);
        $("#printedimagesurcharge").html("$"+this.value);
    });
    jQuery('#cake_magic_surcharge').keyup(function () {
        $("#magic_surcharge").val(this.value);
        $("#magicsurcharge").html("$"+this.value);
    });
    jQuery('#manager_discount_price').keyup(function () {
        $("#discount_price").val(this.value);
        $("#discountprice").html("$"+this.value);
    });

    $('#custom_cake_surcharge').click(function() {

        if( $(this).is(':checked') ){

            var serving_id =$("#serving_id").val();
            if(serving_id == 0 ){
                alert("Please select servings for printing surcharge");
                return false;
            }
            $('#hideoncake').show();
            $("#cakeemailphoto").show();
            $.ajax({
                url:"<?php echo site_url('admin/orders/getPrintedImageSurcharge')?>",
                data:"serving_id="+serving_id,
                type:"post",
                success: function(val){
                    $('#printed_image_surcharge').val(val);
                    $('#printedimagesurcharge').html("$"+val);
                }
            })
        }else{

            $('#hideoncake').hide();
            $("#cakeemailphoto").hide();
            $('#printed_image_surcharge').val('');
            $('#printedimagesurcharge').html('');
        }
    });

    <?php $on_cake_image_needed = (isset($queryup->on_cake_image_needed))? $queryup->on_cake_image_needed:'';
    if($on_cake_image_needed == 1){
    ?>
    $('#hideoncake').show();
    $("#cakeemailphoto").show();
    <?php }else{ ?>
    $('#hideoncake').hide();
    $("#cakeemailphoto").hide();
    <?php } ?>

    $('#delivery_zone_id').change(function() {

        var zone_id =$("#delivery_zone_id").val();
        $.ajax({
            url:"<?php echo site_url('admin/orders/getZoneSurcharge')?>",
            data:"zone_id="+zone_id,
            type:"post",
            success: function(val){
               // console.log(val);
                $('#delivery_zone_surcharge').val(val);
                $('#deliveryzonesurcharge').html("$"+val);
            }
        })

    });

    $('#totalPrice').click(function() {

        var matrix_price = parseFloat($("#matrix_price").val());
        var discount_price = parseFloat($("#discount_price").val());
        var printed_image_surcharge = parseFloat($("#printed_image_surcharge").val());
        var magic_surcharge = parseFloat($("#magic_surcharge").val());
        var delivery_zone_surcharge = parseFloat($("#delivery_zone_surcharge").val());


        $.ajax({
            url:"<?php echo site_url('admin/orders/getTotalPrice')?>",
            data:"matrix_price="+matrix_price+"&discount_price="+discount_price+"&printed_image_surcharge="+printed_image_surcharge+"&magic_surcharge="+magic_surcharge+"&delivery_zone_surcharge="+delivery_zone_surcharge,
            type:"post",
            success: function(val){
                //console.log(val);
                $('#total_price').val(val);
                $('#totalprice').html(val);
            }
        })


    });


    $('#delivery_time').timepicker({
        onSelect: function() {
            $(this).change();
        }
    });

    $("#datepicker").datepicker({
        onSelect: function() {
            checkPickupBlackout();
        }
    });

    function checkPickupBlackout(){

        var delivery_date = $("#datepicker").val();
        if(delivery_date){
            var flavour_id = $("#flavourid").val();
            if ($('#vaughan_location').is(':checked') == true) {
                var location_id = 0;
            }else{
                var location_id = $("#location_id").val();
            }

            $.ajax({
                url:"<?php echo site_url('admin/orders/getCheckBlackout')?>",
                data:"location_id="+location_id+"&flavour_id="+flavour_id+'&delivery_date='+delivery_date,
                type:"post",
                success: function(val){
                    if(val !='success'){
                        alert(val);
                        $('#datepicker').val('');
                    }
                }
            })
        }

    }




});
</script>
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
                <select disabled="disabled"  id="location_id" style="width: 100%;"  name="location_id" class="validate[required] search_dropdown">
                    <?php

                    $location_id = (isset($queryup->location_id))? $queryup->location_id:set_value('location_id');
                    foreach($locationresult as $location): ?>
                            <option value="<?php echo $location->location_id;  ?>" <?php if($location_id == $location->location_id ){ echo "selected='selected'"; }?>><?php echo $location->title; ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('cake_name');?></label>
            <div class="controls">
                <select disabled="disabled" class="search_dropdown" id="cake_id" style="width: 100%;"  name="cake_id">
                    <?php
                    $cake_id = (isset($queryup->cake_id))? $queryup->cake_id:set_value('cake_id');
                    foreach($cakeresult as $cake):?>
                            <option value="<?php echo $cake->cake_id;  ?>" <?php if($cake_id == $cake->cake_id){ echo "selected='selected'"; } ?> ><?php echo $cake->title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $this->lang->line('flavour_name');?></label>
            <div class="controls">
                <select class="validate[required] search_dropdown" id="flavourid" style="width: 100%;"  name="flavour_id">
                    <?php
                    $flavour_id = (isset($queryup->flavour_id))? $queryup->flavour_id:set_value('flavour_id');
                            foreach($flvresult as $flavour):

                            ?>
                            <option value="<?php echo $flavour->flavour_id;  ?>" <?php if($flavour_id == $flavour->flavour_id){ echo "selected='selected'"; } ?> ><?php echo $flavour->title; ?></option>
                        <?php  endforeach; ?>

                </select>
            </div>
        </div>
        <?php
         $tiers = (isset($queryup->tiers))? $queryup->tiers:set_value('tiers');
        ?>
        <div class="control-group" <?php if($tiers ==  0 ){ echo "id='hide_tiers'"; } ?> >
            <label class="control-label" for="email"><?php echo $this->lang->line('tiers');?></label>
            <div class="controls">
                <select class="search_dropdown"  id="tiers" style="width: 100%;"  name="tiers">
                    <?php
                    for($i=1; 7 >= $i ; $i++ ){

                            ?>
                            <option value="<?php echo $i; ?>" <?php if($tiers == $i ){ echo "selected='selected'"; } ?> ><?php echo $i; ?></option>
                        <?php  } ?>
                </select>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $this->lang->line('serving_name');?></label>
            <div class="controls">
                <select class="search_dropdown" id="serving_id" style="width: 100%;"  name="serving_id">
                    <option value="0" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php if(!empty($servings)){ echo $servings;} ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email"><?php echo $this->lang->line('fondant');?></label>
            <div class="controls">
                <div class="controls" id="fondant"><input type="hidden" id="fondant_id" value="0"><?php if(!empty($fond)){  echo $fond; } ?></div>


            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('size_shape');?></label>
            <div class="controls">
                <select class="search_dropdown" id="shape_id" style="width: 60%;"  name="shape_id">
                    <?php if(!empty($size)){  echo $size; } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('price');?>&nbsp;&nbsp;$<span id="price"><?php echo $queryup->matrix_price ?></span></label>

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
                <select disabled="disabled"  id="customer_id" style="width: 100%;"  name="customer_id">
                    <?php
                    $customer_id = (isset($queryup->customer_id))? $queryup->customer_id:set_value('customer_id');
                    foreach($customerresult as $customer):

                            ?>
                            <option <?php  if($customer_id == $customer->customer_id){ echo "selected='selected'"; }?> value="<?php echo $customer->customer_id;  ?>" ><?php echo $customer->first_name.' '.$customer->last_name; ?></option>
                        <?php  endforeach; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('employee_name');?></label>
            <div class="controls">
                <select disabled="disabled"  id="employee_id" style="width: 100%;"  name="employee_id">
                    <?php
                    $employee_id = (isset($queryup->employee_id))? $queryup->employee_id:set_value('employee_id');
                    foreach($employeeresult as $employee):
                    ?>
                    <option <?php  if($employee_id == $employee->id){ echo "selected='selected'"; }?> value="<?php echo $employee->id;  ?>" ><?php echo $employee->first_name.' '.$employee->last_name; ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('manager_name');?></label>
            <div class="controls">
                <select disabled="disabled" id="manager_id" style="width: 100%;"  name="manager_id">
                    <?php
                    $manager_id = (isset($queryup->manager_id))? $queryup->manager_id:set_value('manager_id');
                    foreach($managerresult as $manager):

                    ?>
                     <option <?php  if($manager_id == $manager->id){ echo "selected='selected'"; }?> value="<?php echo $manager->id;  ?>" ><?php echo $manager->first_name.' '.$manager->last_name; ?></option>
                    <?php  endforeach; ?>
                </select>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('discount_price');?></label>
            <div class="controls">

                <input type="text" class="numbersOnly" value="<?php echo (isset($queryup->discount_price))? $queryup->discount_price:set_value('discount_price');?> " id="manager_discount_price" name="discount_price" >
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
            <label class="control-label" ><strong><?php echo $this->lang->line('order_created');?></strong>: <?php $order_date = isset($queryup->order_date)?$queryup->order_date:''; if($order_date > 0){ echo getOrderDateFormat($queryup->order_date); } ?></label>
        </div>
        <div class="control-group">
            <label class="control-label" for="firstname"><?php echo $this->lang->line('delivery_type');?></label>
            <div class="controls">
                <select class="search_dropdown"  id="delivery_type" style="width: 100%;"  name="delivery_type">
                    <?php
                    $delivery_type = (isset($queryup->delivery_type))? $queryup->delivery_type:set_value('delivery_type');
                    ?>
                    <option value="pickup" <?php if($delivery_type =='pickup'){ echo "selected='selected'"; }?> ><?php echo $this->lang->line('pickup');?></option>
                    <option value="delivery" <?php if($delivery_type =='delivery'){ echo "selected='selected'"; }?> ><?php echo $this->lang->line('delivery');?></option>
                </select>
            </div>
        </div>
        <div class="control-group" id="locationid" >
            <label class="control-label" ><?php echo $this->lang->line('pickup_location');?></label>
            <div class="controls">
                <select  id="pickup_location_id" style="width: 100%;"  name="pickup_location_id" class="search_dropdown">
                    <?php
                    $pickup_location_id = (isset($queryup->pickup_location_id))? $queryup->pickup_location_id:set_value('pickup_location_id');
                    foreach($locationresult as $location):
                    ?>
                        <option <?php  if($pickup_location_id == $location->location_id ){ echo "selected='selected'"; } ?> value="<?php echo $location->location_id;  ?>" ><?php echo $location->title; ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
        </div>

        <div class="control-group" id="deliveryzoneid">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('delivery_zone');?></label>
            <div class="controls">
                <select  id="delivery_zone_id" style="width: 100%;"  name="delivery_zone_id" class="search_dropdown">
                    <?php
                    $delivery_zone_id = (isset($queryup->delivery_zone_id))? $queryup->delivery_zone_id:set_value('delivery_zone_id');
                    foreach($zoneresult as $zone):
                    ?>
                    <option <?php  if($delivery_zone_id == $zone->zone_id ){ echo "selected='selected'"; } ?> value="<?php echo $zone->zone_id;  ?>" ><?php echo $zone->title; ?></option>
                    <?php  endforeach; ?>
                </select>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" >&nbsp;</label>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('delivery_date');?></label>
            <div class="controls">
                <input type="text" value="<?php echo (isset($queryup->delivery_date))? $queryup->delivery_date:set_value('delivery_date'); ?>" name="delivery_date" id="datepicker" class="date start">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('delivery_time');?></label>
            <div class="controls">
                <input type="text" id="delivery_time"  value="<?php  $deliverytime=(isset($queryup->delivery_time))? $queryup->delivery_time:set_value('delivery_time'); if($deliverytime) echo timeFormat($deliverytime); ?>" name="delivery_time"  style="width: 70px;" class="">
            </div>
        </div>


    </div>
</div>
<hr class="separator" />


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
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('name');?>" value="<?php echo(isset($queryup->name))? $queryup->name:set_value('name'); ?>"  class="span10" name="name" id="name"  />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('phone_number');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('phone_number');?>" value="<?php echo(isset($queryup->phone))? $queryup->phone:set_value('phone'); ?>"  class="validate[required,custom[phone]] span10" name="phone" id="phone"  />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('delivery_instruction');?></label>
            <div class="controls">
                <textarea rows="" style="width: 320px; height: 95px" class="midium-textarea" cols="" name="delivery_instruction" id="delivery_instruction"><?php echo (isset($queryup->delivery_instruction))? $queryup->delivery_instruction:set_value('delivery_instruction'); ?></textarea>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('address1');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('address1');?>" value="<?php echo(isset($queryup->address_1))? $queryup->address_1:set_value('address_1'); ?>"   class="span12" name="address_1" id="address_1"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('address2');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('address2');?>" value="<?php echo(isset($queryup->address_2))? $queryup->address_2:set_value('address_2'); ?>"  class="span12" name="address_2" id="address_2"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('city');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('city');?>" value="<?php echo(isset($queryup->city))? $queryup->city:set_value('city'); ?>"   class="span10" name="city" id="city"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('province');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('province');?>" value="<?php echo(isset($queryup->province))? $queryup->province:set_value('province'); ?>"   class="span10" name="province" id="province"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('postal_code');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('postal_code');?>" value="<?php echo(isset($queryup->postal))? $queryup->postal:set_value('postal'); ?>"   class=" span10" name="postal" id="postal"  />
            </div>
        </div>

    </div>
</div>
</div>

<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('cake_instruction');?></h4>
</div>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">

        <div class="control-group">
        <label>
        <?php $on_cake_image_needed = (isset($queryup->on_cake_image_needed))? $queryup->on_cake_image_needed:set_value('on_cake_image_needed'); ?>
        <input type="checkbox" <?php if($on_cake_image_needed > 0){ echo "checked"; } ?> value="1" id="custom_cake_surcharge" name="on_cake_image_needed"  >&nbsp;<?php echo $this->lang->line('custom_cake_surcharge');?>
        </label>

        </div>
        <div class="control-group" id="hideoncake">
            <?php $cake_email_photo = (isset($queryup->cake_email_photo))? $queryup->cake_email_photo:set_value('cake_email_photo'); ?>
            <label><input type="checkbox" value="1" <?php if($cake_email_photo ==1){ echo "checked"; } ?> id="cake_email_photo" name="cake_email_photo"  >&nbsp;<?php echo $this->lang->line('cake_email_photo');?></label>

        </div>
        <div class="control-group">
            <?php $instructional_email_photo = (isset($queryup->instructional_email_photo))? $queryup->instructional_email_photo:set_value('instructional_email_photo'); ?>
            <label ><input type="checkbox" <?php if($instructional_email_photo ==1){ echo "checked"; } ?> value="1" id="instructional_email_photo" name="instructional_email_photo"  >&nbsp;<?php echo $this->lang->line('instructional_email_photo');?></label>
          </div>
        <div class="control-group">
            <?php $vaughan_location = (isset($queryup->vaughan_location))? $queryup->vaughan_location:set_value('vaughan_location'); ?>
            <label ><input type="checkbox" <?php if($vaughan_location ==1){ echo "checked"; } ?> value="1" id="vaughan_location" name="vaughan_location"  >&nbsp;<?php echo $this->lang->line('is_vaughan_location');?></label>
        </div>
        <div class="control-group">

        </div>


    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('magic_cake_id');?></label>
            <div class="controls">
                <input type="text" value="<?php echo $magic_cake_id = (isset($queryup->magic_cake_id))? $queryup->magic_cake_id:set_value('magic_cake_id'); ?>" id="magic_cake_id"  name="magic_cake_id" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('magic_cake_id');?>" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('magic_surcharge');?></label>
            <div class="controls">
                <input type="text" value="<?php echo $magic_surcharge = (isset($queryup->magic_surcharge))? $queryup->magic_surcharge:set_value('magic_surcharge'); ?>" class="numbersOnly" id="cake_magic_surcharge"  name="magic_surcharge" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('magic_surcharge');?>" >
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
                        <?php if($on_cake_image){ ?><span><img src="<?php  echo base_url().$queryup->on_cake_image;?>" alt="" style="height: 80px; width: 80px; margin-left: 20px;"></span><?php } ?>
                    </div>
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
$uporder_id =isset($queryup->order_id)?$queryup->order_id:'';
if($uporder_id > 0){
if($this->productions_model->orderNotes($queryup->order_id)){
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
        <td><?php echo $this->lang->line('matrix_price');?></td><td><span id="matrixprice" >$<?php echo $matrix_price; ?></span></td>
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
        <td><?php echo $this->lang->line('total_price');?></td><td>$<span id="totalprice"><?php echo $total_price;?></span><span style="float: right; display: inline-block"><button type="button" id="totalPrice" class="btn btn-default"><?php echo $this->lang->line('total');?></button></span></td>
    </tr>

    <tr>
    <td>Override Price</td><td>$<span id="totalprice"><input type="text" value="<?php echo $override_price = (isset($queryup->override_price))? $queryup->override_price:'0.00'; ?>" name="override_price" id="override_price"></span></td>
    </tr>


</table>
</div>



<hr class="separator"/>
<div class="form-actions">
    <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id = (isset($queryup->order_id))? $queryup->order_id:set_value('order_id'); ?>" />
    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
    <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
</div>
<div class="separator line"></div>
</form>

</div>
<style>
    .table th, .table td{
        vertical-align: middle;
    }
    #override_price{
        margin-bottom: 0;
    }
</style>
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





