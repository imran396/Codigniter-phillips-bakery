<div id="content">

        <ul class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
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
    <div class="innerLR">
        <table class="table table-bordered table-striped" >
            <tr><td><?php echo $this->lang->line('location');?></td></tr>
            <tr><td>

                    <form action="" method="get" onsubmit="location" >
                        <select onclick="" style="width: 100%;"  name="location_id" class="validate[required]" onchange="window.location=this.value">
                            <option value="<?php echo site_url('admin/price_matrix/matrix/0')?>" >---<?php echo $this->lang->line('select_location');?>---</option>
                            <?php
                            foreach($locresult as $location):
                                ?>
                                <option value="<?php echo site_url('admin/price_matrix/matrix/'.$location->location_id)?>" <?php if($location_id == $location->location_id){ echo "selected='selected'"; } ?> ><?php echo $location->title; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </form>

                </td>
            </tr>

        </table>
    </div>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/price_matrix/save/<?php echo $this->uri->segment(4,0)?>" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="cake_id" id="cake_id" value="<?php echo(isset($queryup[0]->cake_id))? $queryup[0]->cake_id : set_value('cake_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('price_matrix');?></h4>
                    </div>
                    <div class="widget-body" style="padding: 10px 0;">

                        <table class="table table-bordered table-striped">
                            <tr><td id="matrix-flavour"><?php echo $this->lang->line('cake_name');?></td>

                                <td>
                                    <table class="table table-bordered table-striped" >
                                       <tr>
                                        <td align="left" colspan="<?php echo $count=count($serresult); ?>" >List of Servings</td>

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
                                            <input type="hidden" name="cake_id[]" value="<?php echo $flv->cake_id;  ?>" />
                                            <tr>
                                                <td class="matrix-flavour-name">
                                                    <?php echo $flv->title; ?>
                                                </td>
                                                <?php foreach($serresult as $type):
                                                    $matrix =$this->price_matrix_model->getPrice($location_id,$flv->cake_id,$type->serving_id);
                                                    $price_matrix_id = isset($matrix[0]->price_matrix_id)? $matrix[0]->price_matrix_id :0 ;
                                                    $price = isset($matrix[0]->price)? $matrix[0]->price :'0.00';
                                                    ?>
                                                    <td>
                                                    <input type="hidden" name="serving_id_<?php echo $flv->cake_id; ?>[]" value="<?php echo $type->serving_id;  ?>" />
                                                    <input type="hidden" name="price_matrix_<?php echo $flv->cake_id; ?>[]" value="<?php echo $price_matrix_id;  ?>" />
                                                    <input type="text" class="input-mini numbersOnly" name="price_<?php echo $flv->cake_id; ?>[]"  value="<?php echo $price; ?>"/> </td>
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