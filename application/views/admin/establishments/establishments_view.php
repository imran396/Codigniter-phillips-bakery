<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('establishments');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('establishments');?></h3>
        <div class="clearfix"></div>
    </div>
    <br/>
    <form method="post" action="/admin/establishments/save" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="establishment_id" id="establishment_id" value="<?php echo(isset($queryup[0]->establishment_id))? $queryup[0]->establishment_id : set_value('establishment_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('establishments');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('establishment_id');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('establishment_id');?>" value="<?php echo(isset($queryup[0]->revel_establishment_id))? $queryup[0]->revel_establishment_id:set_value('revel_establishment_id'); ?>"  class="validate[required] span5" name="revel_establishment_id" id="revel_establishment_id"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('cake_id');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('cake_id');?>" value="<?php echo(isset($queryup[0]->revel_product_id))? $queryup[0]->revel_product_id:set_value('revel_product_id'); ?>"  class="validate[required] span5" name="revel_product_id" id="revel_product_id"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('is_custom_product');?></label>
                                    <div class="controls">
                                        <?php $is_custom_product = (isset($queryup[0]->is_custom_product)) ? $queryup[0]->is_custom_product:0; ?>
                                        <input type="checkbox"  value="1" <?php if($is_custom_product == 1){?> checked="checked" <?php } ?>  name="is_custom_product" id="is_custom_product"  />
                                    </div>
                                </div>

                                <div class="control-group uniformjs">
                                    <label class="control-label"><?php echo $this->lang->line('status');?></label>
                                    <div class="separator"></div>
                                    <?php $status = (isset($queryup[0]->status))? $queryup[0]->status:1; ?>
                                    <label class="radio">
                                        <input type="radio" class="radio" name="status" value="1" <?php if($status ==1){?> checked="checked" <?php } ?> />
                                        <?php echo $this->lang->line('publish');?>
                                    </label><br/>
                                    <label class="radio">
                                        <input type="radio" class="radio" name="status" value="0" <?php if($status !=1 ){?> checked="checked" <?php } ?>  />
                                        <?php echo $this->lang->line('unpublish');?>
                                    </label><br/>

                                </div>

                            </div>

                        </div>


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