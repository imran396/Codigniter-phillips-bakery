<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('servings');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('servings');?></h3>
        <div class="clearfix"></div>
    </div>
    <br/>
    <!-- End Content -->
    <div class="separator"></div>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/servings/save" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="serving_id" id="serving_id" value="<?php echo(isset($queryup[0]->serving_id))? $queryup[0]->serving_id : set_value('serving_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('servings');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('serving_name');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('serving_name');?>" value="<?php echo(isset($queryup[0]->title))? $queryup[0]->title:set_value('title'); ?>"  class="validate[required] span10" name="title" id="title"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('size');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('size');?>" value="<?php  echo(isset($queryup[0]->size))? form_prep($queryup[0]->size):set_value('size'); ?>"  class="validate[required] span10" name="size" id="size"  />
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