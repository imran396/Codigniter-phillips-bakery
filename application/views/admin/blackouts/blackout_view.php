<script type="text/javascript" src="/assets/multi-datepicker/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="/assets/multi-datepicker/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/assets/multi-datepicker/js/jquery-ui.multidatespicker.js"></script>

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
            altField: '#altField'
        });
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
    <div id="wrapper">
        <div class="double">
            <div class="col left-bar">
                <form name="from" id="from" action="/admin/blackouts/save" method="post">
                <h3>Create a New Blackout</h3>
                <div class="box box-narrow">
                    <div class="label">Select <?php echo $this->lang->line('location'); ?></div>
                    <div class="row-fluid row-widest">
                        <select class="selectpicker span12" name="location_id">
                            <option><?php echo $this->lang->line('select_one'); ?></option>
                            <?php foreach($locations as $rows):?>
                                <option value="<?php echo $rows->location_id; ?>" ><?php echo $rows->title;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="label">Select <?php echo $this->lang->line('flavour'); ?></div>
                    <div class="row-fluid row-widest">
                        <select class="selectpicker span12" name="flavour_id">
                           <option><?php echo $this->lang->line('select_one'); ?></option>
                            <?php foreach($blockouts as $rows):?>
                           <option value="<?php echo $rows->flavour_id; ?>" ><?php echo $rows->title;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="label">Select Date / Multiple Date</div>
<!--                    <div class="dates">Date Sept 17 to Sept 26, 2013</div>-->
                    <div class="controls">
                        <div id="with-altField"></div>
                        <input type="hidden" id="altField" name="blackout_date">
                    </div>
                    <div class="buttons">
                        <input type="hidden" name="blackouts_id" value="<?php echo isset($queryup[0]->blackouts_id) ? $queryup[0]->blackouts_id :''; ?>">
                        <input type="submit" value="Add to blackouts"  class="btn btn-dark">
                    </div>
                </div><!-- End Box -->
                </form>
            </div><!-- End Left-bar -->
            <div class="col right-bar">
                <h3>Existing Blackouts</h3>
                <div class="widget">
                    <div class="widget-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="145">Flavor</th>
                                <th width="132">Blackout Dates</th>
                                <th width="319"> </th>
                            </tr>
                            </thead>
                            <tbody class="overflow">
                            <?php
                            foreach($paging[0] as $rows ):
                                $blackout_date=explode(',',$rows->blackout_date);
                            ?>
                            <tr>
                                <td><strong><?php echo $rows->title; ?></strong></td>
                                <td><a class="remove_a" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo $rows->blackout_date; ?>" ><?php echo $this->blackouts_model->dateFormate($blackout_date[0]); ?></a></td>
                                <td align="right" style="text-align: right; padding-right: 15px"><a onclick="return confirm('Are you sure you want to delete?')" href="/admin/blackouts/remove/<?php echo $rows->blackout_id; ?>" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a></td>
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

<style type="text/css">
    .remove_a {
        color: #201D1D !important;
        text-decoration: none !important;
        text-transform: capitalize;
    }
</style>