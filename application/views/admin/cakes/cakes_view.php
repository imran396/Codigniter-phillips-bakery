<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('cakes');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/cakes"><?php echo $this->lang->line('create_cake'); ?></a></li>
            <li class="divider"></li>
            <li><a href="/admin/cakes/listing"><?php echo $this->lang->line('list'); ?></a></li>
        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
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
                                    <label class="control-label"><?php echo $this->lang->line('price');?></label>
                                    <div class="controls">
                                        <div class="input-prepend input-append">
                                            <span class="add-on">$</span>
                                            <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('price');?>" value="<?php echo(isset($queryup[0]->price))? $queryup[0]->price:set_value('price'); ?>"   class="validate[required] span10" name="price" id="appendedPrependedInput" class="span12">
                                            <span class="add-on">.00</span>
                                        </div>


                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('category_id');?></label>
                                    <div class="controls">
                                        <div class="row-fluid">
                                            <select style="width: 100%;" id="category_id" name="category_id">
                                                <?php
                                                $category_id = (isset($queryup[0]->category_id))? $queryup[0]->category_id:set_value('category_id');
                                                foreach($catresult as $type):
                                                ?>
                                                    <option value="<?php echo $type->category_id;  ?>" <?php if($category_id == $type->category_id){ echo "selected='selected'"; } ?> ><?php echo $type->title; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('location_id');?></label>
                                    <div class="controls">
                                        <div class="row-fluid">
                                            <select style="width: 100%;" id="select2_1" id="location_id" name="location_id">

                                                <?php
                                                $location_id = (isset($queryup[0]->location_id))? $queryup[0]->location_id:set_value('location_id');
                                                foreach($locresult as $location):
                                                ?>
                                                    <option value="<?php echo $location->location_id;  ?>" <?php if($location_id == $location->location_id){ echo "selected='selected'"; } ?> ><?php echo $location->title; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
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