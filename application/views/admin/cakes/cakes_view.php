<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('cakes');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>
    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('cakes');?></h3>

        <div class="clearfix"></div>
    </div>
    <div class="separator"></div>
    <br/>
    <form method="post" action="/<?php echo $this->uri->segment(1,NULL)?>/cakes/save" name="form1" id="form1" enctype="multipart/form-data" >
 <div class="innerLR">
     <input type="hidden" name="cake_id" id="cake_id" value="<?php echo(isset($queryup[0]->cake_id))? $queryup[0]->cake_id : set_value('cake_id'); ?>" />
     <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('cakes');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('cake_title');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('cake_title');?>" value="<?php echo(isset($queryup[0]->title))? $queryup[0]->title:set_value('title'); ?>"  class="validate[required] span12 " name="title" id="title"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('description');?></label>
                                    <div class="controls">
                                        <textarea rows="" cols="" name="description" id="description" class="midium-textarea" ><?php echo(isset($queryup[0]->description))? $queryup[0]->description:set_value('description'); ?></textarea>

                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('category_id');?></label>
                                    <div class="controls">
                                        <div class="row-fluid">
                                            <select class="validate[required] " style="width: 100%;"  name="category_id">
                                                <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                                                <?php
                                                $category_id = (isset($queryup[0]->category_id))? $queryup[0]->category_id:set_value('category_id');
                                                foreach($catresult as $category):
                                                ?>
                                                    <option value="<?php echo $category->category_id;  ?>" <?php if($category_id == $category->category_id){ echo "selected='selected'"; } ?> ><?php echo $category->title; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('flavour_id');?></label>
                                    <div class="controls">
                                        <div class="row-fluid">
                                            <select class="validate[required] " style="width: 100%;"  name="flavour_id">
                                                <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                                                <?php
                                                $flavour_id = (isset($queryup[0]->flavour_id))? $queryup[0]->flavour_id:set_value('flavour_id');
                                                foreach($flvresult as $flavour):
                                                ?>
                                                    <option value="<?php echo $flavour->flavour_id;  ?>" <?php if($flavour_id == $flavour->flavour_id){ echo "selected='selected'"; } ?> ><?php echo $flavour->title; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group uniformjs">
                                    <label class="control-label"><?php echo $this->lang->line('shapes');?></label>
                                    <div class="separator"></div>
                                    <?php
                                    if(isset($queryup[0]->cake_id) > 0){
                                        $shape_id =($queryup[0]->shape_id !="" ) ? $queryup[0]->shape_id : serialize(array());
                                    }else{
                                        $shape_id =(isset($queryup[0]->shape_id)) ? $queryup[0]->shape_id : serialize(array());
                                    }

                                    $shapeid=(unserialize($shape_id));
                                    foreach($sapresult as $shapes):
                                    ?>

                                    <label class="radio">
                                        <input type="checkbox" class="radio" name="shape_id[]" value="<?php echo $shapes->title;?>" <?php if( in_array($shapes->title, $shapeid) ){?> checked="checked" <?php } ?> />
                                        <?php echo $shapes->title;?>
                                    </label>
                                    <?php endforeach; ?>

                                </div>
                                <div class="control-group uniformjs">
                                    <label class="control-label"><?php echo $this->lang->line('tiers');?></label>
                                    <div class="separator"></div>
                                    <select class=" " style="width: 100%;"  name="tiers">
                                        <option value="" >---<?php echo $this->lang->line('select_one');?>---</option>
                                        <?php
                                        $tiers = (isset($queryup[0]->tiers))? $queryup[0]->tiers:set_value('tiers');
                                        for($i=1; 10 >= $i ; $i++ ){
                                            ?>
                                            <option value="<?php echo $i;  ?>" <?php if($tiers== $i){ echo "selected='selected'"; } ?> ><?php echo $i .$this->lang->line('tiers'); ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('meta_tag');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('meta_tag');?>" value="<?php echo(isset($queryup[0]->meta_tag))? $queryup[0]->meta_tag:set_value('meta_tag'); ?>"   class="span10" name="meta_tag" id="meta_tag"  /><span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('upload_image');?></label>
                                    <div class="controls">
                                        <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                                            <div class="input-append">
                                                <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input class="" type="file" name="image_name"></span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                            </div>
                                        </div>
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