<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('flavours');?></li>
        </ul>
    <br/>

    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('flavours');?></h3>
        <div class="clearfix"></div>
    </div>
    <br/>
    <!-- End Content -->
    <div class="separator"></div>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/flavours/save" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="flavour_id" id="flavour_id" value="<?php echo(isset($queryup[0]->flavour_id))? $queryup[0]->flavour_id : set_value('flavour_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('flavours');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('flavour_name');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('flavour_name');?>" value="<?php echo(isset($queryup[0]->title))? $queryup[0]->title:set_value('title'); ?>"  class="validate[required] span10" name="title" id="title"  />
                                    </div>
                                </div>


                                <div class="control-group uniformjs">
                                    <label class="control-label"><?php echo $this->lang->line('fondant');?></label>
                                    <div class="separator"></div>
                                    <?php $fondant = (isset($queryup[0]->fondant))? $queryup[0]->fondant:1; ?>
                                    <label class="radio">
                                        <input type="radio" class="radio" name="fondant" value="1" <?php if($fondant ==1){?> checked="checked" <?php } ?> />
                                        <?php echo $this->lang->line('yes');?>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" class="radio" name="fondant" value="0" <?php if($fondant !=1 ){?> checked="checked" <?php } ?>  />
                                        <?php echo $this->lang->line('no');?>
                                    </label><br/>

                                </div>
                                <div class="control-group uniformjs">
                                    <label class="control-label"><?php echo $this->lang->line('tires');?></label>
                                    <div class="separator"></div>
                                    <?php


                                   if(isset($queryup[0]->flavour_id) > 0){
                                        $tire_id =($queryup[0]->tire_id !="" ) ? $queryup[0]->tire_id : serialize(array());
                                    }else{
                                        $tire_id =(isset($queryup[0]->tire_id)) ? $queryup[0]->tire_id : serialize(array());
                                    }

                                    $tireid=(unserialize($tire_id));
                                    for($i=1; 10 >= $i ; $i++ ){ ?>

                                        <label class="radio">
                                            <input type="checkbox" class="radio" name="tire_id[]" value="<?php echo $i;?>" <?php if( in_array($i, $tireid) ){ ?> checked="checked"<?php } ?> />
                                            <p style="line-height: 10px; display: inline-block "><?php echo $i;?></p>
                                        </label>
                                      <?php } ?>

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