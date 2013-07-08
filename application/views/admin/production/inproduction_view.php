<script type="text/javascript">

    var doAction;
    function timedely(){
        clearTimeout(doAction);
        doAction = setTimeout(function(){
            doSearch();
        }, 5000);
    }

    function doSearch()
    {

        var result =$("#filter").serialize();

        $.ajax({
            url:"<?php echo site_url('admin/productions/filtering')?>",
            data:result,
            type:"post",
            success: function(val){
                $('.innerLR').html(val);
                //console.log(val);
            }
        })

    }
    /* when document is ready */
    $(document).ready(function(){

        $('#search-form').submit(function() {
            return false;
        });

        $('#order_status , #fondant , #flavour_id , #delivery_type , #datepicker , #datepicker2 , #delivery_start_time , #delivery_end_time').change(function(){

            timedely();

        });
    });
</script>
<div class="container-fluid fixed container-new">
<div class="navbar main">
    <div class="icon-wrapper"><a href="/admin/productions" class="icon-home"></a></div>
    <span class="tlogo">Cakes in Production</span>
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
<div class="widget filters">
<form action="" method="post" name="filter" id="filter">
    <div class="widget-body">
        <a href="" class="icon-refresh"></a>
        <span class="label">Filter By:</span>
        <div class="row-fluid">
            <select class="selectpicker span12" name="order_status" id="order_status">
                <option class="label">Status</option>
                <?php
                $getOrderStatus = $this->productions_model->getOrderStatus();
                foreach($getOrderStatus as $orderStatus):
                ?>
                <option value="<?php echo $orderStatus->title ?>"><?php echo $orderStatus->description ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row-fluid">
            <select class="selectpicker span12" name="fondant" id="fondant">
                <option class="label">Fondant</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="row-fluid row-wider">
            <select class="selectpicker span12" id="flavour_id" name="flavour_id">
                <option class="label">flavour</option>
                <?php
                $getFlavours = $this->productions_model->getFlavours();
                foreach($getFlavours as $flavours):
                    ?>
                    <option value="<?php echo $flavours->flavour_id ?>"><?php echo $flavours->title ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="row-fluid row-wide">
            <select class="selectpicker span12" id="delivery_type" name="delivery_type">
                <option class="label">Pickup/Delivery</option>
                <option value="delivery">Delivery</option>
                <option value="pickup">Pickup</option>
            </select>
        </div>
        <div class="row-fluid row-widest">
            <span class="label pull-left">Date</span>
            <div class="pull-right">
                <div class="controls">
                    <input type="text" id="datepicker" name="start_date" value="" placeholder="Start" />
                </div>
                <div class="controls">
                    <input type="text" id="datepicker2" name="end_date" value="" placeholder="End" />
                </div>
            </div>
        </div>
        <div class="row-fluid row-widerer">
            <span class="label pull-left">Time</span>
            <div class="pull-right">
                <div class="timepicker">
                    <input type="text" name="delivery_start_time" id="delivery_start_time" value="" class="hasTimeDropdown" placeholder="Start" />
                    <div class="popup timedropdown">
                        <div class="ui-datepicker-title">Choose Time</div>
                        <div class="innerLR">
                            <div class="slider-range-timer row-fluid">
                                <div class="span3 heading-bar">
                                    <label class="span8">Time:</label>
                                    <input type="text" class="amount span4" />
                                </div>
                                <div class="line">
                                    <label class="span8">Hour</label>
                                    <div class="span9 sliderhour">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                <div class="line">
                                    <label class="span8">Minute</label>
                                    <div class="span9 sliderminute">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <a href="" class="btn btn-block btn-success pull-right">Done</a>
                                    <a href="" class="btn btn-block btn-default">Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timepicker">
                    <input type="text" value=""  name="delivery_end_time" id="delivery_end_time" class="hasTimeDropdown" placeholder="End" />
                    <div class="popup timedropdown">
                        <div class="ui-datepicker-title">Choose Time</div>
                        <div class="innerLR">
                            <div class="slider-range-timer row-fluid">
                                <div class="span3 heading-bar">
                                    <label class="span8">Time:</label>
                                    <input type="text" class="amount span4" />
                                </div>
                                <div class="line">
                                    <label class="span8">Hour</label>
                                    <div class="span9 sliderhour">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                <div class="line">
                                    <label class="span8">Minute</label>
                                    <div class="span9 sliderminute">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <a href="" class="btn btn-block btn-success pull-right">Done</a>
                                    <a href="" class="btn btn-block btn-default">Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</form>
</div><!-- end of filters -->
<div class="innerLR">
    <div class="widget">
        <div class="widget-body">
            <table class="dynamicTable table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="70">Order #</th>
                    <th width="166">Customer Name</th>
                    <th width="170">Cake Name</th>
                    <th width="122">Pickup/Delivery</th>
                    <th width="93">Date</th>
                    <th width="67">Time</th>
                    <th width="65">Fondant</th>
                    <th width="84">Flavor</th>
                    <th width="110">Magic Cake ID</th>
                    <th width="75">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $var = ($paging[3] != '0')  ? ($paging[3]+1) : 1;
                $i=$var;
                foreach($paging[0] as $rows):
                ?>
                <tr>
                    <td class="center"><a href="/admin/productions/details/<?php echo $rows->order_code; ?>" ><?php echo $rows->order_code; ?></a></td>
                    <td class="center"><?php echo $rows->first_name.' '.$rows->last_name; ?></td>
                    <td><?php echo $rows->cake_name; ?></td>
                    <td class="center"><?php echo $rows->delivery_type; ?></td>
                    <td class="center"><?php echo $this->productions_model->dateFormate($rows->delivery_date); ?></td>
                    <td class="center"><?php echo $rows->delivery_time; ?></td>
                    <td><?php echo $rows->fondant; ?></td>
                    <td><?php echo $rows->flavour_name; ?></td>
                    <td><?php echo $rows->magic_cake_id; ?></td>
                    <td class="green"><?php echo $rows->production_status;?></td>
                </tr>
                <?php $i++; endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="buttons">
        <a href="" class="button button-green"><span class="icon icon-scan"></span>Scan Bar Code</a>
    </div>
    <div class="pagination pagination-small pagination-right" style="margin-top: 0; margin-bottom: 12px;">
        <?php echo $paging[1]; ?>

    </div>
</div><!-- End Wrapper -->

</div>
</div>
