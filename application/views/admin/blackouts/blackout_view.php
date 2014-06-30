
<script type="text/javascript" src="/assets/multi-datepicker/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="/assets/multi-datepicker/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/assets/multi-datepicker/js/jquery-ui.multidatespicker.js"></script>

<?php
$blackoutdate=isset($queryup->blackout_date)?$queryup->blackout_date:'';
$blackoutdate=explode(',',$blackoutdate);
$lastdate = end($blackoutdate);
?>

<script type="text/javascript">
    <!--
    var latestMDPver = $.ui.multiDatesPicker.version;
    var lastMDPupdate = '2012-03-28';

    $(function() {
        // Version //
        //$('title').append(' v' + latestMDPver);
        $('.mdp-version').text('v' + latestMDPver);
        $('#mdp-title').attr('title', 'last update: ' + lastMDPupdate);

        // Documentation //
        $('i:contains(type)').attr('title', '[Optional] accepted values are: "allowed" [default]; "disabled".');
        $('i:contains(format)').attr('title', '[Optional] accepted values are: "string" [default]; "object".');
        $('#how-to h4').each(function () {
            var a = $(this).closest('li').attr('id');
            $(this).wrap('<'+'a href="#'+a+'"></'+'a>');
        });
        $('#demos .demo').each(function () {
            var id = $(this).find('.box').attr('id') + '-demo';
            $(this).attr('id', id)
                .find('h3').wrapInner('<'+'a href="#'+id+'"></'+'a>');
        });

        // Run Demos
        $('.demo .code').each(function() {
            eval($(this).attr('title','NEW: edit this code and test it!').text());
            this.contentEditable = true;
        }).focus(function() {
                if(!$(this).next().hasClass('test'))
                    $(this)
                        .after('<button class="test">test</button>')
                        .next('.test').click(function() {
                            $(this).closest('.demo').find('.box').removeClass('hasDatepicker').empty();
                            eval($(this).prev().text());
                            $(this).remove();
                        });
            });
        $('#with-altField').multiDatesPicker({
            <?php echo isset($queryup->blackout_date) ?
            'addDates: '. json_encode(explode(',', $queryup->blackout_date))."," :''; ?>
            altField: '#altField'
            <?php if($lastdate){ ?>
            , defaultDate:'<?php echo $lastdate; ?>'
            <?php } ?>
        });

        $('.btn-dark').click(function(){


            var location_id = $('#location_id').val();
            var flavour_id = $('#flavour_id').val();
            var blackout_date = $('#altField').val();
            if(location_id == "Select One"){
                alert('Error. Please select location.');
                return false;
            }
            if(flavour_id =="Select One"){
                alert('Error. Please select flavour.');
                return false;
            }
            if(blackout_date ==""){
                alert('Error. Please select date.');
                return false;
            }
            $.ajax({
                url:"<?php echo site_url('admin/blackouts/checkLessCurrentDate')?>",
                data:"blackout_date="+blackout_date,
                type:"post",
                success: function(val){

                    if(val > 0){

                        alert('Error. You cannot select a date in the past. Please try again.');
                        return false;
                    }else{
                        var inp = $('<input>')
                            .attr('type','hidden')
                            .val($('#flavour_id').val())
                            .attr('name', 'flavour_ids')
                            .appendTo($('#from'));

                        $('#from')[0].submit();
                    }


                }
            })



        })
    });
    // -->
</script>
<div class="container-fluid fixed container-new">
    <div class="navbar main">
        <div class="icon-wrapper"><a href="/admin/productions" class="icon-home"></a></div>
        <span class="tlogo">Manage Blackouts</span>
        <div class="pull-right">
<!--            <div class="search-form">-->
<!--                <div class="error-msg"><span>Error No Results</span></div>-->
<!--                <input type="text" name="" value="" placeholder="Search Orders" class="error" />-->
<!--                <input type="submit" name="" value="Search" />-->
<!--            </div>-->
        </div>
        <div class="separator"></div>
    </div>

    <style>
        .dropdown-menu ul{
            max-height: 300px!important;
            overflow-y:scroll;
            overflow-x:hidden;
        }
    </style>

    <div id="wrapper">
        <div class="double">
            <div class="col left-bar">
                <form name="blackout_from" id="from" action="/admin/blackouts/save" method="post">
                <h3>Create a New Blackout  </h3>

                    <div class="box box-narrow">
                    <div class="label">Select <?php echo $this->lang->line('location'); ?></div>
                    <div class="row-fluid row-widest">
                        <?php

                        $location_id = (isset($queryup->location_id))? $queryup->location_id:set_value('location_id');
                        if($location_id > 0){
                            $locationfield['location_id']=$location_id;
                            echo $this->orders_model->getGlobalName('locations',$locationfield);
                        }else{
                        ?>
                        <select class="selectpicker span12" name="location_id" id="location_id">
                        <?php

                        $location_id = (isset($queryup->location_id))? $queryup->location_id:set_value('location_id');
                        if($location_id > 0){
                            $locationfield['location_id']=$location_id;
                            ?>
                            <option value="<?php echo $location_id; ?>" ><?php echo $this->orders_model->getGlobalName('locations',$locationfield); ?></option>
                        <?php }else{ ?>
                            <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                        <?php
                        }
                        foreach($locations as $location):
                            if($location_id != $location->location_id){
                                ?>
                                <option value="<?php echo $location->location_id;  ?>" ><?php echo $location->title; ?></option>
                            <?php } endforeach; ?>



                        </select>
                        <?php } ?>
                    </div>
                    <div class="label">Select <?php echo $this->lang->line('flavour'); ?></div>
                      <div class="row-fluid row-widest">
                          <?php

                          $flavour_id = (isset($queryup->flavour_id))? $queryup->flavour_id:set_value('flavour_id');
                          if($flavour_id > 0){
                              $flavourfield['flavour_id']=$flavour_id;
                              echo $this->orders_model->getGlobalName('flavours',$flavourfield);
                          }else{
                          ?>
                            <select class="" name="flavour_id[]" id="flavour_id" multiple="multiple">
                            <?php
                            echo $flavourid =isset($queryup->flavour_id) ? $queryup->flavour_id : set_value('flavour_id');
                            foreach($flavours as $flavour):
                            ?>
                               <option value="<?php echo $flavour->flavour_id;  ?>" <?php if( $flavour->flavour_id == $flavourid ){  echo "selected='selected'"; } ?> ><?php echo $flavour->title; ?></option>
                            <?php endforeach; ?>
                            </select>
                          <?php } ?>
                    </div>

                    <div class="label">Select Date / Multiple Date</div>
                        <?php //echo isset($queryup->blackout_date) ? $queryup->blackout_date :''; ?>
<!--
<div class="dates">Date Sept 17 to Sept 26, 2013</div>-->
                    <div class="controls">
                        <div id="with-altField"></div>
                        <input type="hidden" id="altField" name="blackout_date">
                    </div>
                    <div class="buttons">
                        <input type="hidden" name="blackout_id" value="<?php echo isset($queryup->blackout_id) ? $queryup->blackout_id :''; ?>">
                        <input type="button" value="Add to blackouts"  class="btn btn-dark">
                    </div>
                </div><!-- End Box -->
                </form>
            </div><!-- End Left-bar -->
            <div class="col right-bar">
                <h3>Existing Blackouts</h3>
                <div class="widget">
                    <div class="widget-body">
                        <table id="example" class="table table-striped table-bordered blackout-sortable">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Flavor</th>
                                <th width="100">Blackout Dates</th>
                                <th width="170"> </th>
                            </tr>
                            </thead>
                            <tbody style="height: 250px">
                            <?php
                            foreach($paging[0] as $rows ):
                                $blackout_date=explode(',',$rows->blackout_date);
                            ?>
                            <tr>
                                <td><strong><?php echo $this->productions_model->getLocations($rows->location_id); ?></strong></td>
                                <td><strong><?php echo $rows->title; ?></strong></td>
                                <td><a class="remove_a" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo $rows->blackout_date; ?>" ><?php echo end($blackout_date); // $this->blackouts_model->dateFormate(end($blackout_date)); ?></a></td>
                                <td align="right" style="text-align: right; padding-right: 15px">
                                    <a href="/admin/blackouts/edit/<?php echo $rows->blackout_id; ?>" class="btn btn-green"><img src="<?php echo base_url()?>/assets/images-new/icon-pencil.png" alt=""> Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete?')" href="/admin/blackouts/remove/<?php echo $rows->blackout_id; ?>" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a></td>
                            </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                    <br/>
                    <div class="pagination pagination-small pagination-right" style="margin-top: 0; margin-bottom: 12px;">
                        <?php echo $paging[1]; ?>

                    </div>
                </div>
            </div><!-- End Right-bar -->
            <div class="separator"></div>
        </div>
    </div><!-- End Wrapper -->
</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/assets/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/assets/js/multiselect.js"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        jQuery.fn.dataTableExt.oSort['date-dd-mmm-yyyy-asc'] = function (a, b) {
            "use strict"; //let's avoid tom-foolery in this function
            var ordA = customDateDDMMMYYYYToOrd(a),
                ordB = customDateDDMMMYYYYToOrd(b);
            return (ordA < ordB) ? -1 : ((ordA > ordB) ? 1 : 0);
        };

        jQuery.fn.dataTableExt.oSort['date-dd-mmm-yyyy-desc'] = function (a, b) {
            "use strict"; //let's avoid tom-foolery in this function
            var ordA = customDateDDMMMYYYYToOrd(a),
                ordB = customDateDDMMMYYYYToOrd(b);
            return (ordA < ordB) ? -1 : ((ordA > ordB) ? 1 : 0);
        };

    } );
    $(document).ready(function() {

        $('#example').dataTable( {

            "aaSorting": [[2,'desc']],

            "aoColumnDefs": [
                { "bSortable":false, "aTargets": [3] }

            ],
            //"iDisplayLength": 500,
            "bPaginate": false
        } );

    } );
    /*
     *
     * MultiSelect jQuery plugin
     *
     * The external resources are:
     * jQuery 1.x + Jquery UI
     *
     * multiselect-min.js
     *     the plugin to get the multiselection
     */

    // Populates select tags with option tags

    var populateSelects = function(nOptions){
        if(typeof nOptions != "number")
            nOptions = 25;

        var options_HTML = "";

        for(var i = 0; i < nOptions; i++)
            options_HTML += "<OPTION value = 'i am the option " + i + "' >i am the option " + i + "</OPTION>";

        $("#test_target_no_optgroup").append(options_HTML);

        $("#test_target_with_optgroup_fc0").append(options_HTML);
        $("#test_target_with_optgroup_fc1").append(options_HTML);
        $("#test_target_with_optgroup_fc2").append(options_HTML);
        $("#test_target_with_optgroup_fc3").append(options_HTML);
    };

    // Applies multiselection on select tags

    var test_Multiselection = function(){
        $("#test_target_no_optgroup").MultiSelect({
            size: 20,
            css_class_selected: "test-selection"
        });
    };

    // Applies feature to select / deselect all options inside optgroup, by one click

    var test_categoriesSelection = function(){
        $("#flavour_id").MultiSelect({
            size: 30,
            css_class_selected: "test-selection"
        });
    }

    // Main

    $(document).ready(function(){

        populateSelects();

        test_Multiselection();

        test_categoriesSelection();

        $("#getV").click(function(){
            alert( $("#test_target_no_optgroup").val() );
        });

        $(".btn-dark").click(function(){
          //  alert( $("#flavour_id").val() );
        });
    });

</script>
<style type="text/css">

    .tooltip-inner {
        background: #272a2c;
        color: #bab9b9;
        width: 100%!important;
    }
    .remove_a {
        color: #201D1D !important;
        text-decoration: none !important;
        text-transform: capitalize;
    }

    .descri {
        margin-left: 25px;
        color: dimgray;
    }

    .descri_footer {
        color: #72A139;
        font-size: 13px;
        margin-top: 100px;
    }

    .test-selection {
        background-color: Highlight;
        color: HighlightText;
    }

    .category {
        cursor: pointer;
    }

    .wrap_categories {
        margin-left: 25px;
        margin-top: 10px;
        border: 1px solid #d6d6d6;
    }

    .wrap_categories div:hover {
        background-color: blueviolet;
    }

    .main_categories {
        display: inline-block;
        width: auto;
    }

    div.category:hover {
        color: blue;
    }

</style>