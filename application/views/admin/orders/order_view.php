
<script type="text/javascript">

    /* when document is ready */
    $(document).ready(function(){

        $('#cake_id').change(function() {

            var cake_id =$("#cake_id").val();

            $.ajax({
                url:"<?php echo site_url('admin/orders/getFlavour')?>",
                data:"cake_id="+cake_id,
                type:"post",
                success: function(val){
                    var n=val.split("@a&");
                    $('#flavourid').html(n[0]);
                    $('#tiers').html(n[1]);
                }
            })
        });

        $('#flavourid').change(function() {

            var flavour_id =$("#flavourid").val();

            $.ajax({
                url:"<?php echo site_url('admin/orders/getServings')?>",
                data:"flavour_id="+flavour_id,
                type:"post",
                success: function(val){
                    var n=val.split("@a&");
                    $('#servings').html(n[0]);
                    $('#size').html(n[1]);
                    $('#fondant').html(n[2]);
                }
            })
        });

        $('#servings').change(function() {

            var price_matrix_id =$("#servings").val();
            var flavour_id =$("#flavourid").val();
            $.ajax({
                url:"<?php echo site_url('admin/orders/getPrice')?>",
                data:"flavour_id="+flavour_id+"&price_matrix_id="+price_matrix_id,
                type:"post",
                success: function(val){
                   // console.log(val);
                    var n=val.split("@a&");
                    $('#servings').html(n[0]);
                    $('#size').html(n[1]);
                    $('#price').html(n[2]);
                    $('#matrix_price').val(n[3]);
                    $('#matrixprice').html("$"+n[3]);
                }
            })
        });

        $('#size').change(function() {

            var price_matrix_id =$("#size").val();
            var flavour_id =$("#flavourid").val();
            $.ajax({
                url:"<?php echo site_url('admin/orders/getPrice')?>",
                data:"flavour_id="+flavour_id+"&price_matrix_id="+price_matrix_id,
                type:"post",
                success: function(val){
                    //console.log(val);
                    var n=val.split("@a&");
                    $('#servings').html(n[0]);
                    $('#size').html(n[1]);
                    $('#price').html(n[2]);
                    $('#matrix_price').val(n[3]);
                    $('#matrixprice').html("$"+n[3]);
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
        <?php $pickuptype = (isset($queryup[0]->delivery_type))? $queryup[0]->delivery_type:'pickup';
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


        $('#cake_email_photo').click(function() {

           if( $(this).is(':checked') ){
                $("#cakeemailphoto").hide();
           }else{
                $("#cakeemailphoto").show();
           }

        });

        $('#instructional_email_photo').click(function() {

            if( $(this).is(':checked') ){
                $("#instructionalemailphoto").hide();
            }else{
                $("#instructionalemailphoto").show();
            }
        });


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
                var price_matrix_id =$("#servings").val();
                $.ajax({
                    url:"<?php echo site_url('admin/orders/getPrintedImageSurcharge')?>",
                    data:"price_matrix_id="+price_matrix_id,
                    type:"post",
                    success: function(val){
                      console.log(val);
                      $('#printed_image_surcharge').val(val);
                      $('#printedimagesurcharge').html("$"+val);
                    }
                })
            }else{
                $('#printed_image_surcharge').val('');
                $('#printedimagesurcharge').html('');
            }
        });
        $('#delivery_zone_id').change(function() {

                var zone_id =$("#delivery_zone_id").val();
                $.ajax({
                    url:"<?php echo site_url('admin/orders/getZoneSurcharge')?>",
                    data:"zone_id="+zone_id,
                    type:"post",
                    success: function(val){
                      console.log(val);
                      $('#delivery_zone_surcharge').val(val);
                      $('#deliveryzonesurcharge').html("$"+val);
                    }
                })

        });

        $('#totalPrice').click(function() {

            var matrix_price = parseFloat($("#matrix_price").val());
            var discount_price = parseFloat($("#discount_price").val());
            var discount_price = document.getElementById('discount_price').value;
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




 });
</script>
<div id="content">
<ul class="breadcrumb">
    <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('orders');?></li>
</ul>
<br/>
<?php $this->load->view('admin/layouts/message'); ?>
<br/>
<div class="separator"></div>

<div class="heading-buttons">
    <h3 class="glyphicons sort"><i></i><?php
        echo $this->lang->line('orders');?></h3>
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
            <label class="control-label" ><?php echo $this->lang->line('pickup_location');?></label>
            <div class="controls">
                <select  id="location_id" style="width: 100%;"  name="location_id" class="search_dropdown">
                    <?php

                    $location_id = (isset($queryup[0]->location_id))? $queryup[0]->location_id:set_value('location_id');
                    if($location_id > 0){
                    $locationfield['location_id']=$location_id;
                    ?>
                    <option value="<?php echo $location_id; ?>" ><?php echo $this->orders_model->getGlobalName('locations',$locationfield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    foreach($locationresult as $location):
                    if($location_id != $location->location_id){
                    ?>
                    <option value="<?php echo $location->location_id;  ?>" ><?php echo $location->title; ?></option>
                    <?php } endforeach; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('cake_name');?></label>
            <div class="controls">
                <select class="validate[required] search_dropdown" id="cake_id" style="width: 100%;"  name="cake_id">
                        <?php
                        echo $cake_id = (isset($queryup[0]->cake_id))? $queryup[0]->cake_id:set_value('cake_id');
                        if($cake_id > 0){
                        $cakefield['cake_id']=$cake_id;
                        ?>
                        <option value="<?php echo $cake_id; ?>" ><?php echo $this->orders_model->getGlobalName('cakes',$cakefield); ?></option>
                        <?php }else{ ?>
                            <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                        <?php
                        }
                        foreach($cakeresult as $cake):
                        if($cake_id != $cake->cake_id){
                        ?>
                        <option value="<?php echo $cake->cake_id;  ?>" <?php if($cake_id == $cake->cake_id){ echo "selected='selected'"; } ?> ><?php echo $cake->title; ?></option>
                    <?php } endforeach; ?>

                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $this->lang->line('flavour_name');?></label>
            <div class="controls">
                <select class="validate[required] search_dropdown" id="flavourid" style="width: 100%;"  name="flavour_id">
                    <?php
                    $flavour_id = (isset($queryup[0]->flavour_id))? $queryup[0]->flavour_id:set_value('flavour_id');
                    if($flavour_id > 0){
                        $flavourfield['flavour_id']=$flavour_id;
                        ?>
                        <option value="<?php echo $flavour_id; ?>" ><?php echo $this->orders_model->getGlobalName('flavours',$flavourfield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    foreach($flvresult as $flavour):
                    if($flavour_id != $flavour->flavour_id){
                    ?>
                        <option value="<?php echo $flavour->flavour_id;  ?>" ><?php echo $flavour->title; ?></option>
                    <?php } endforeach; ?>

                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email"><?php echo $this->lang->line('tiers');?></label>
            <div class="controls">
                <select class="search_dropdown"  id="tiers" style="width: 100%;"  name="tiers">
                    <?php

                    $tiers = (isset($queryup[0]->tiers))? $queryup[0]->tiers:set_value('tiers');
                    if($tiers > 0){

                    ?>
                    <option value="<?php echo $tiers; ?>" ><?php echo $tiers; ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    for($i=1; 7 >= $i ; $i++ ){
                    if($tiers !=$i){
                    ?>
                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                    <?php } } ?>
                </select>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $this->lang->line('serving_name');?></label>
            <div class="controls">
                <select class="search_dropdown1" id="servings" style="width: 100%;"  name="price_matrix_id">
                <?php echo $servings; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email"><?php echo $this->lang->line('fondant');?></label>
            <div class="controls">
                <select class="search_dropdown"  id="fondant" style="width: 100%;"  name="fondant">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('size_shape');?></label>
            <div class="controls">
                <select class="search_dropdown1" id="size" style="width: 100%;"  name="size">
                    <?php echo $size; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email"><?php echo $this->lang->line('price');?></label>
            <div class="controls">
                <select disabled="" id="price" style="width: 100%;"  name="matrix_price">
                    <?php echo $cprice; ?>
                </select>
            </div>
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
                <select  id="customer_id" style="width: 100%;"  name="customer_id">
                     <?php
                    $customer_id = (isset($queryup[0]->customer_id))? $queryup[0]->customer_id:set_value('customer_id');
                    if($customer_id > 0){
                    $customerfield['customer_id']=$customer_id;
                    ?>
                    <option value="<?php echo $customer_id; ?>" ><?php echo $this->orders_model->getCustomerName('customers',$customerfield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    foreach($customerresult as $customer):
                    if($customer_id != $customer->customer_id){
                    ?>
                        <option value="<?php echo $customer->customer_id;  ?>" ><?php echo $customer->first_name.' '.$customer->last_name; ?></option>
                    <?php } endforeach; ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('employee_name');?></label>
            <div class="controls">
                <select  id="employee_id" style="width: 100%;"  name="employee_id">
                    <?php
                    $employee_id = (isset($queryup[0]->employee_id))? $queryup[0]->employee_id:set_value('employee_id');
                    if($employee_id > 0){
                        $employeefield['user_id']=$employee_id;
                        ?>
                        <option value="<?php echo $employee_id; ?>" ><?php echo $this->orders_model->getCustomerName('meta',$employeefield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    foreach($employeeresult as $employee):
                        if($employee_id != $employee->id){
                            ?>
                            <option value="<?php echo $employee->id;  ?>" ><?php echo $employee->first_name.' '.$employee->last_name; ?></option>
                        <?php } endforeach; ?>
                </select>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('manager_name');?></label>
            <div class="controls">
                <select  id="manager_id" style="width: 100%;"  name="manager_id">
                    <?php
                    $manager_id = (isset($queryup[0]->manager_id))? $queryup[0]->manager_id:set_value('manager_id');
                    if($manager_id > 0){
                        $managerfield['user_id']=$manager_id;
                        ?>
                        <option value="<?php echo $manager_id; ?>" ><?php echo $this->orders_model->getCustomerName('meta',$managerfield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    foreach($managerresult as $manager):
                        if($manager_id != $manager->id){
                            ?>
                            <option value="<?php echo $manager->id;  ?>" ><?php echo $manager->first_name.' '.$manager->last_name; ?></option>
                        <?php } endforeach; ?>
                </select>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('discount_price');?></label>
            <div class="controls">

                <input type="text" class="numbersOnly" value="<?php echo (isset($queryup[0]->discount_price))? $queryup[0]->discount_price:set_value('discount_price');?> " id="manager_discount_price" name="discount_price" >
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
            <label class="control-label" for="firstname"><?php echo $this->lang->line('delivery_type');?></label>
            <div class="controls">
                <select  id="delivery_type" style="width: 100%;"  name="delivery_type">
                    <?php
                    $delivery_type = (isset($queryup[0]->delivery_type))? $queryup[0]->delivery_type:set_value('delivery_type');
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
                        $pickup_location_id = (isset($queryup[0]->pickup_location_id))? $queryup[0]->pickup_location_id:set_value('pickup_location_id');
                        if($pickup_location_id > 0){
                        $pickfield['location_id']=$pickup_location_id;
                        ?>
                        <option value="<?php echo $pickup_location_id; ?>" ><?php echo $this->orders_model->getGlobalName('locations',$pickfield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }
                    foreach($locationresult as $location):

                        if($pickup_location_id != $location->location_id){
                        ?>
                        <option value="<?php echo $location->location_id;  ?>" ><?php echo $location->title; ?></option>
                    <?php } endforeach; ?>
                </select>
            </div>
        </div>

        <div class="control-group" id="deliveryzoneid">
            <label class="control-label" for="lastname"><?php echo $this->lang->line('delivery_zone');?></label>
            <div class="controls">
                <select  id="delivery_zone_id" style="width: 100%;"  name="delivery_zone_id" class="search_dropdown">
                    <?php
                    $delivery_zone_id = (isset($queryup[0]->delivery_zone_id))? $queryup[0]->delivery_zone_id:set_value('delivery_zone_id');
                    if($delivery_zone_id > 0){
                        $zonefield['zone_id']=$delivery_zone_id;
                        ?>
                        <option value="<?php echo $delivery_zone_id; ?>" ><?php echo $this->orders_model->getGlobalName('zones',$zonefield); ?></option>
                    <?php }else{ ?>
                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                    <?php
                    }

                    foreach($zoneresult as $zone):
                        if($delivery_zone_id ==  $zone->zone_id ){
                        ?>
                        <option value="<?php echo $zone->zone_id;  ?>" ><?php echo $zone->title; ?></option>
                    <?php } endforeach; ?>
                </select>
            </div>
        </div>

    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('date');?></label>
            <div class="controls">
                <input type="text" value="<?php echo (isset($queryup[0]->delivery_date))? $queryup[0]->delivery_date:set_value('delivery_date'); ?>" name="delivery_date" id="datepicker" class="date start">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('delivery_time');?></label>
            <div class="controls">

                <input type="text" value="<?php echo (isset($queryup[0]->delivery_time))? $queryup[0]->delivery_time:set_value('delivery_time'); ?>" name="delivery_time" id="timepicker" style="width: 70px;" class="hasTimepicker">
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
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('name');?>" value="<?php echo(isset($queryup[0]->name))? $queryup[0]->name:set_value('name'); ?>"  class="span10" name="name" id="name"  />
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('phone_number');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('phone_number');?>" value="<?php echo(isset($queryup[0]->phone))? $queryup[0]->phone:set_value('phone'); ?>"  class="validate[required,custom[phone]] span10" name="phone" id="phone"  />
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
                <textarea rows="" style="width: 320px; height: 95px" class="midium-textarea" cols="" name="delivery_instruction" id="delivery_instruction"> <?php echo (isset($queryup[0]->delivery_instruction))? $queryup[0]->delivery_instruction:set_value('delivery_instruction'); ?></textarea>
            </div>
        </div>


    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('address1');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('address1');?>" value="<?php echo(isset($queryup[0]->address_1))? $queryup[0]->address_1:set_value('address_1'); ?>"   class="span12" name="address_1" id="address_1"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('address2');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('address2');?>" value="<?php echo(isset($queryup[0]->address_2))? $queryup[0]->address_2:set_value('address_2'); ?>"  class="span12" name="address_2" id="address_2"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('city');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('city');?>" value="<?php echo(isset($queryup[0]->city))? $queryup[0]->city:set_value('city'); ?>"   class="span10" name="city" id="city"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('province');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('province');?>" value="<?php echo(isset($queryup[0]->province))? $queryup[0]->province:set_value('province'); ?>"   class="span10" name="province" id="province"  />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('postal_code');?></label>
            <div class="controls">
                <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('postal_code');?>" value="<?php echo(isset($queryup[0]->postal))? $queryup[0]->postal:set_value('postal'); ?>"   class=" span10" name="postal" id="postal"  />
            </div>
        </div>

    </div>
</div>
</div>
<hr class="separator" />
<div class="widget-head">
    <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('cake_instruction');?></h4>
</div>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">

        <div class="control-group">
        <label>
        <?php $printed_image_surcharge = (isset($queryup[0]->printed_image_surcharge))? $queryup[0]->printed_image_surcharge:set_value('printed_image_surcharge'); ?>
        <input type="checkbox" <?php if($printed_image_surcharge > 0){ echo "checked"; } ?> value="1" id="custom_cake_surcharge" name="custom_cake_surcharge"  ><?php echo $this->lang->line('custom_cake_surcharge');?>
        </label>

        </div>
        <div class="control-group">
            <?php $cake_email_photo = (isset($queryup[0]->cake_email_photo))? $queryup[0]->cake_email_photo:set_value('cake_email_photo'); ?>
            <label><input type="checkbox" value="1" <?php if($cake_email_photo ==1){ echo "checked"; } ?> id="cake_email_photo" name="cake_email_photo"  ><?php echo $this->lang->line('cake_email_photo');?></label>

        </div>
        <div class="control-group">
            <?php $instructional_email_photo = (isset($queryup[0]->instructional_email_photo))? $queryup[0]->instructional_email_photo:set_value('instructional_email_photo'); ?>
            <label ><input type="checkbox" <?php if($instructional_email_photo ==1){ echo "checked"; } ?> value="1" id="instructional_email_photo" name="instructional_email_photo"  ><?php echo $this->lang->line('instructional_email_photo');?></label>
          </div>
        <div class="control-group">
            <?php $vaughan_location = (isset($queryup[0]->vaughan_location))? $queryup[0]->vaughan_location:set_value('vaughan_location'); ?>
            <label ><input type="checkbox" <?php if($vaughan_location ==1){ echo "checked"; } ?> value="1" id="vaughan_location" name="vaughan_location"  > <?php echo $this->lang->line('is_vaughan_location');?></label>
        </div>
        <div class="control-group">

        </div>


    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('magic_cake_id');?></label>
            <div class="controls">
                <input type="text" value="<?php echo $magic_cake_id = (isset($queryup[0]->magic_cake_id))? $queryup[0]->magic_cake_id:set_value('magic_cake_id'); ?>" id="magic_cake_id"  name="magic_cake_id" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('magic_cake_id');?>" >
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('magic_surcharge');?></label>
            <div class="controls">
                <input type="text" value="<?php echo $magic_surcharge = (isset($queryup[0]->magic_surcharge))? $queryup[0]->magic_surcharge:set_value('magic_surcharge'); ?>" class="numbersOnly" id="magic_surcharge"  name="magic_surcharge" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('surcharge_amount');?>" >
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
                        <?php if(isset($queryup[0]->on_cake_image)){ ?><span><img src="<?php  echo base_url().$queryup[0]->on_cake_image;?>" alt="" style="height: 80px; width: 80px; margin-left: 20px;"></span><?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" ><?php echo $this->lang->line('inscription');?></label>
            <div class="controls">

                <input style="width: 100%" type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('inscription');?>" value="<?php echo $inscription = (isset($queryup[0]->inscription))? $queryup[0]->inscription:set_value('inscription'); ?>" id="inscription"  name="inscription">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $this->lang->line('special_instruction');?></label>
            <div class="controls">
                <textarea rows="" cols="" style="width: 100%" name="special_instruction" id="special_instruction" class="midium-textarea" ><?php echo(isset($queryup[0]->special_instruction))? $queryup[0]->special_instruction:set_value('special_instruction'); ?></textarea>

            </div>
        </div>

        <?php
        if(isset($queryup[0]->order_id)){
        $instructionals = $this->productions_model->photoGallery($queryup[0]->order_id);
        if(!empty($instructionals)){
            ?>

            <div class="">
                <table style="width: 100%" class="table table-bordered table-condensed js-table-sortable" style="height: 40px; margin-bottom: 20px;overflow-x: scroll">
                    <?php foreach($instructionals as $instructional){ ?>

                    <tr class="selectable" id="listItem_<?php echo $instructional->instructional_photo_id; ?>" >
                    <td><?php echo $instructional->ordering; ?></td>
                    <td><a href="<?php  echo base_url().$instructional->instructional_photo;?>" class="select-image-group" rel="group-1"><?php  echo $this->orders_model->fileName($instructional->instructional_photo);?><?php //echo $this->lang->line('click_for_image');?></a> </td>
                    <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                    <td><a onclick="return confirm('Are you sure you want to delete?')" data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger" rel="<?php echo $instructional->instructional_photo_id; ?>"  id="<?php echo $instructional->instructional_photo; ?>"><i></i></a></td>
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
        <div class="control-group uniformjs">
            <label class="control-label">
                <?php $order_status = (isset($queryup[0]->order_status))? $queryup[0]->order_status:set_value('order_status'); ?>
                <input type="checkbox" <?php if($order_status == 300 ){ echo "checked"; } ?> id="estimate" name="estimate" value="300"><?php echo $this->lang->line('is_estimate');?></label>
        </div>

    </div>

</div>
<table style="width: 100%" class="table table-bordered table-condensed">
    <tr>
        <?php $matrix_price = (isset($queryup[0]->matrix_price))? $queryup[0]->matrix_price:'0.00'; ?>
        <input type="hidden" name="matrix_price" id="matrix_price" value="<?php echo $matrix_price; ?>">
        <td><?php echo $this->lang->line('matrix_price');?></td><td id="matrixprice">$<?php echo $matrix_price; ?></td>
    </tr>
    <tr>
        <?php $discount_price = (isset($queryup[0]->discount_price))? $queryup[0]->discount_price:'0.00'; ?>
        <input type="hidden" name="discount_price" id="discount_price" value="<?php echo $discount_price; ?>">
        <td><?php echo $this->lang->line('discount_price');?></td><td id="discountprice">$<?php echo $discount_price; ?></td>
    </tr>
    <tr>
        <?php $printed_image_surcharge = (isset($queryup[0]->printed_image_surcharge))? $queryup[0]->printed_image_surcharge:'0.00'; ?>
        <input type="hidden" name="printed_image_surcharge" id="printed_image_surcharge" value="<?php echo $printed_image_surcharge; ?>">
        <td><?php echo $this->lang->line('printed_image_surcharge');?></td><td id="printedimagesurcharge">$<?php echo $printed_image_surcharge; ?></td>
    </tr>
    <tr>
        <?php $magic_surcharge = (isset($queryup[0]->magic_surcharge))? $queryup[0]->magic_surcharge:'0.00'; ?>
        <input type="hidden" name="magic_surcharge" id="magic_surcharge" value="<?php echo $magic_surcharge; ?>">
        <td><?php echo $this->lang->line('magic_surcharge');?></td><td id="magicsurcharge">$<?php echo $magic_surcharge; ?></td>
    </tr>
    <tr>
        <?php $delivery_zone_surcharge = (isset($queryup[0]->delivery_zone_surcharge))? $queryup[0]->delivery_zone_surcharge:'0.00'; ?>
        <input type="hidden" name="delivery_zone_surcharge" id="delivery_zone_surcharge" value="<?php echo $delivery_zone_surcharge; ?>">
        <td><?php echo $this->lang->line('delivery_zone_surcharge');?></td><td id="deliveryzonesurcharge">$<?php echo $delivery_zone_surcharge; ?></td>
    </tr>

<tr>
    <?php $total_price = (isset($queryup[0]->total_price))? $queryup[0]->total_price:'0.00'; ?>
    <input type="hidden"  name="total_price" id="total_price" value="<?php echo $total_price;?>">
        <td><?php echo $this->lang->line('total_price');?></td><td>$<span id="totalprice"><?php echo $total_price;?></span><span style="float: right; display: inline-block"><button type="button" id="totalPrice" class="btn btn-default"><?php echo $this->lang->line('total');?></button></span></td>
    </tr>
    <tr>

        <td><?php echo $this->lang->line('override_price');?></td>
        <td id="override_price">
            <?php $override_price = (isset($queryup[0]->override_price))? $queryup[0]->override_price:'0.00'; ?>
            <i>$</i><input type="text" value="<?php echo $override_price; ?>" name="override_price" id="override_price"></td>
    </tr>

</table>
</div>



<hr class="separator"/>
<div class="form-actions">
    <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id = (isset($queryup[0]->order_id))? $queryup[0]->order_id:set_value('order_id'); ?>" />
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

        $('.btn-danger').click(function(){

            var path = $(this).attr('id');
            var rel = $(this).attr('rel');
            $.ajax({
                type: "POST",
                url:"<?php echo site_url('admin/orders/instructional_gallery_delete/'.$this->uri->segment(4,0))?>",
                data:'path='+path,
                cache: false,
                success: function(val){
                    if(val =='success'){
                        alert(html);
                        $('#listItem_'+rel).remove();
                    }

                }
            });

        })
    });

</script>




