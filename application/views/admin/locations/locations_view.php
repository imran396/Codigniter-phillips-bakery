<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('locations');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/locations"><?php echo $this->lang->line('create_location'); ?></a></li>
            <li class="divider"></li>
            <li><a href="/admin/locations/listing"><?php echo $this->lang->line('list'); ?></a></li>
        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/locations/save" name="form1" id="form1">
 <div class="innerLR">
     <input type="hidden" name="location_id" id="location_id" value="<?php echo(isset($queryup[0]->location_id))? $queryup[0]->location_id : set_value('location_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('locations');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('location_name');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('location_name');?>" value="<?php echo(isset($queryup[0]->title))? $queryup[0]->title:set_value('title'); ?>"  class="validate[required] span10" name="title" id="title"  />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('address1');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('address1');?>" value="<?php echo(isset($queryup[0]->address1))? $queryup[0]->address1:set_value('address1'); ?>"   class="span12" name="address1" id="address1"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('address2');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('address2');?>" value="<?php echo(isset($queryup[0]->address2))? $queryup[0]->address2:set_value('address2'); ?>"  class="span12" name="address2" id="address2"  />
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
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('postal_code');?>" value="<?php echo(isset($queryup[0]->postal_code))? $queryup[0]->postal_code:set_value('postal_code'); ?>"   class=" span10" name="postal_code" id="postal_code"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('country');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('country');?>" value="<?php echo(isset($queryup[0]->country))? $queryup[0]->country:set_value('country'); ?>"   class="span10" name="country" id="country"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('pos_api');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('pos_api');?>" value="<?php echo(isset($queryup[0]->pos_api))? $queryup[0]->pos_api:set_value('pos_api'); ?>"   class="span12" name="pos_api" id="pos_api"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('surcharge');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('country');?>" value="<?php echo(isset($queryup[0]->surcharge))? $queryup[0]->surcharge:set_value('surcharge'); ?>"   class="span10" name="surcharge" id="surcharge"  />
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