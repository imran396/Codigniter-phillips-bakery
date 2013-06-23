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
        <div class="icon-wrapper"><a href="/admin" class="icon-home"></a></div>
        <span class="tlogo">Manage Blackouts</span>
        <div class="pull-right">
            <div class="search-form">
                <div class="error-msg"><span>Error No Results</span></div>
                <input type="text" name="" value="" placeholder="Search Orders" class="error" />
                <input type="submit" name="" value="Search" />
            </div>
        </div>
        <div class="separator"></div>
    </div>
    <div id="wrapper">
        <div class="double">
            <div class="col left-bar">
                <form name="from" id="from" action="/admin/blackouts/save" method="post">
                <h3>Create a New Blackout</h3>
                <div class="box box-narrow">
                    <div class="label">Select <?php echo $this->lang->line('flavour'); ?></div>
                    <div class="row-fluid row-widest">
                        <select class="selectpicker span12" name="flavour_id">
                           <?php foreach($blockouts as $rows):?>
                           <option value="<?php echo $rows->flavour_id; ?>" ><?php echo $rows->title;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="label">Select Date / Date Range</div>
                    <div class="dates">Date Sept 17 to Sept 26, 2013</div>
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
                        <table class="dynamicTable table table-bordered table-cleared">
                            <thead>
                            <tr>
                                <th width="145">Flavor</th>
                                <th width="132">Black out Dates</th>
                                <th width="319"> </th>
                            </tr>
                            </thead>
                            <tbody class="overflow">
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Aug 28, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Vanilla</strong></td>
                                <td>May 29, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Chocolate</strong></td>
                                <td>Feb 4, 2014</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Lemon</strong></td>
                                <td>Aug 28, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Carrot</strong></td>
                                <td>May 29, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Feb 4, 2014</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Aug 28, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>May 29, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Feb 4, 2014</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Aug 28, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>May 29, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Feb 4, 2014</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>Aug 28, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            <tr>
                                <td><strong>Name of Flavor</strong></td>
                                <td>May 29, 2013</td>
                                <td><a href="" class="btn btn-red"><img src="<?php echo base_url() ?>assets/images/icon-trash.png" alt="" /> Remove</a><a href="" class="btn btn-green"><img src="<?php echo base_url() ?>assets/images/icon-pencil.png" alt="" /> Edit</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Right-bar -->
            <div class="separator"></div>
        </div>
    </div><!-- End Wrapper -->
</div>