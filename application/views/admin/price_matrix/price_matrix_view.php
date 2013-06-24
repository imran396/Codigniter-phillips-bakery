<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('price_matrix');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/price_matrix"><?php echo $this->lang->line('manage_price_matrix'); ?></a></li>

        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/price_matrix/save/1" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="flavour_id" id="flavour_id" value="<?php echo(isset($queryup[0]->flavour_id))? $queryup[0]->flavour_id : set_value('flavour_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('price_matrix');?></h4>
                    </div>
                    <div class="widget-body" style="padding: 10px 0;">

                        <table class="table table-bordered table-striped">
                            <tr><td id="matrix-flavour"><?php echo $this->lang->line('flavour_name');?></td>

                                <td>
                                    <table class="table table-bordered table-striped" >
                                        <tr>
                                            <?php foreach($serresult as $size): ?>
                                                <td><?php echo $size->size ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr>
                                            <?php foreach($serresult as $servingtitle): ?>
                                                <td style="border-top:1px solid #000 " ><?php echo $servingtitle->title ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>



                                <td colspan="2">
                                    <table class="table table-bordered table-striped" >

                                        <?php

                                        foreach($flvresult as $flv):
                                            ?>
                                            <input type="hidden" name="flavour_id[]" value="<?php echo $flv->flavour_id;  ?>" />
                                            <tr>
                                                <td class="matrix-flavour-name">
                                                    <?php echo $flv->title; ?>
                                                </td>
                                                <?php foreach($serresult as $type): ?>
                                                    <td>
                                                    <input type="hidden" name="serving_id_<?php echo $flv->flavour_id; ?>[]" value="<?php echo $type->serving_id;  ?>" />
                                                    <input type="text" class="input-mini numbersOnly" name="price_<?php echo $flv->flavour_id; ?>[]"  value="<?php echo $this->price_matrix_model->getPrice($location_id,$flv->flavour_id,$type->serving_id); ?>"/> </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>

                                </table>
                                </td>

                            </tr>

                        </table>

                        <div class="form-actions" style="margin: 0;">
                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
                            <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
                        </div>
                    </div>
                </div>
            </div

        </div>

    </div>
    </form>
<br/>

<!-- End Content -->

</div>