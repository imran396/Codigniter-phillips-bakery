<div id="content">

    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
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
                                <div class="span12">
                                    <div class="control-group">
                                        <label class="control-label"><?php echo $this->lang->line('cake_title');?></label>
                                        <div class="controls">
                                            <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('cake_title');?>" value="<?php echo(isset($queryup[0]->title))? $queryup[0]->title:set_value('title'); ?>"  class="validate[required] span12 " name="title" id="title"  />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><?php echo $this->lang->line('revel_cake'); ?></label>
                                        <div class="controls">
                                            <select  class="validate[required] span10" id="revel_product_id" name="revel_product_id">
                                                <option value="">---<?php echo $this->lang->line('select_one'); ?>---</option>
                                                <?php
                                                $revel_product_id = (isset($queryup[0]->revel_product_id))? $queryup[0]->revel_product_id:set_value('revel_product_id');
                                                foreach($revel_product as $rows): ?>
                                                    <option value="<?php echo $rows->id ?>" <?php if($revel_product_id ==  $rows->id ){ echo "selected='selected'"; } ?></option><?php echo $rows->name; ?></option>
                                            <?php endforeach;?>
                                            </select>
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
                                        <label class="control-label">Available Flavours</label>
                                        <div class="controls">
                                            <div class="row-fluid">
                                                <select class="validate[required] " style="width: 100%;"  name="flavour_id[]"  multiple>
                                                    <option value="" >---<?php echo $this->lang->line('select');?>---</option>
                                                    <?php

                                                    if(isset($queryup[0]->cake_id) > 0){
                                                        $flavour_id =($queryup[0]->flavour_id !="" ) ? $queryup[0]->flavour_id : serialize(array());
                                                    }else{
                                                        $flavour_id =(isset($queryup[0]->flavour_id)) ? $queryup[0]->flavour_id : serialize(array());
                                                    }
                                                    $flavourid=(unserialize($flavour_id));
                                                    foreach($flvresult as $flavour):
                                                        ?>
                                                        <option value="<?php echo $flavour->flavour_id;  ?>" <?php if( in_array($flavour->flavour_id, $flavourid) ){  echo "selected='selected'"; } ?> ><?php echo $flavour->title; ?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
<!--
                                    <div class="control-group uniformjs">
                                        <label class="control-label"><?php /*echo $this->lang->line('tiers');*/?></label>
                                        <div class="separator"></div>
                                        <?php
/*                                        if(isset($queryup[0]->cake_id) > 0){
                                            $tiers =($queryup[0]->tiers !="" ) ? $queryup[0]->tiers : serialize(array());
                                        }else{
                                            $tiers =(isset($queryup[0]->tiers)) ? $queryup[0]->tiers : serialize(array());
                                        }

                                        $tierid=(unserialize($tiers));
                                        for($i=1; 7 >= $i ; $i++ ){
                                            */?>

                                            <label class="radio">
                                                <input type="checkbox" class="radio" name="tiers[]" value="<?php /*echo $i;*/?>" <?php /*if( in_array($i, $tierid) ){*/?> checked="checked" <?php /*} */?> />
                                                <?php /*echo $i;*/?>
                                            </label>
                                        <?php /*} */?>

                                    </div>-->
                                    <div class="control-group">
                                        <label class="control-label"><?php echo $this->lang->line('meta_tag');?></label>
                                        <div class="controls">
                                            <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('meta_tag');?>" value="<?php echo(isset($queryup[0]->meta_tag))? $queryup[0]->meta_tag:set_value('meta_tag'); ?>"   class="span10" name="meta_tag" id="meta_tag"  /><span data-original-title="<?php echo $this->lang->line('tag_msg'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
                                        </div>
                                    </div>

                                        <?php
                                        $i=0;
                                        if(!empty($galleries)){
                                            ?>

                                            <div class="">
                                                <table style="width: 100%" class="table table-bordered table-condensed js-table-sortable" style="height: 40px; margin-bottom: 20px;overflow-x: scroll">
                                                    <?php
                                                    $i=0;
                                                    foreach($galleries as $gallery):?>

                                                        <tr class="selectable" id="listItem_<?php echo $gallery->gallery_id; ?>" >
                                                            <td><?php echo $gallery->ordering; ?></td>
                                                            <td><a title="" class="select-image select-image-group" rel="group-1" href="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>"><?php  echo $this->gallery_model->fileName($gallery->image);?><?php //echo $this->lang->line('click_for_image');?></a> </td>
                                                            <td class="center js-sortable-handle"><span  class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
                                                            <td>
                                                            <a onclick="return confirm('Are you sure you want to delete?')" data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger" id="<?php echo $gallery->gallery_id; ?>"><i></i></a></td>
                                                        </tr>
                                                        <?php $i++; endforeach;  ?>
                                                </table>
                                            </div>
                                        <?php  } ?>
                                        <div class="clear"></div>
                                       <div class="control-group">

                                        <div id="pluploadUploader">
                                            <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
                                        </div>

                                    </div>
                                   <!-- <div class="control-group">
                                        <label class="control-label"><?php /*echo $this->lang->line('upload_image');*/?></label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="">
                                                <div class="input-append">
                                                    <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input class="" type="file" name="image_name"></span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                                </div>
                                                <?php /*$image= (isset($queryup[0]->image))? $queryup[0]->image:set_value('image');
                                                if($image){
                                                */?>
                                                <div style="width: 200px; height: 140px; border: 1px solid #000000">
                                               <img src="<?php /*echo base_url($image); */?>" alt="">
                                                </div>
                                                <?php /*} */?>
                                            </div>
                                        </div>
                                    </div>-->


                                    <div class="control-group uniformjs">
                                        <label class="control-label"><?php echo $this->lang->line('status');?></label>
                                        <div class="separator"></div>
                                        <?php $status = (isset($queryup[0]->status))? $queryup[0]->status:1; ?>
                                        <label class="radio">
                                            <input type="radio" class="radio" name="status" value="1" <?php if($status == 1){?> checked="checked" <?php } ?> />
                                            <?php echo $this->lang->line('publish');?>
                                        </label><br/>
                                        <label class="radio">
                                            <input type="radio" class="radio" name="status" value="0" <?php if($status != 1 ){?> checked="checked" <?php } ?>  />
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
<!-- plupload -->
<style type="text/css">@import url(/assets/theme/scripts/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>
<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/theme/scripts/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/theme/scripts/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>

<script type="text/javascript">
    // Convert divs to queue widgets when the DOM is ready
    $(function() {
        $("#pluploadUploader").pluploadQueue({
            // General settings
            runtimes : 'gears,browserplus,html5',
            url : '/admin/gallery/upload',
            max_file_size : '10mb',
            chunk_size : '2mb',
            unique_names : true,
            sortable: true,
            // Resize images on clientside if we can
            resize : {width : 730, height : 480, quality : 90},
            // Specify what files to browse for
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ],

            // Flash settings
            flash_swf_url : 'theme/scripts/plupload/js/plupload.flash.swf',

            // Silverlight settings
            silverlight_xap_url : 'theme/scripts/plupload/js/plupload.silverlight.xap'
        });

        // Client side form validation
        /*$('#pluploadForm').submit(function(e) {
         var uploader = $('#pluploadUploader').pluploadQueue();

         // Files in queue upload them first
         if (uploader.files.length > 0) {
         // When all files are uploaded submit form
         uploader.bind('StateChanged', function() {
         if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
         $('#pluploadForm').submit();
         }
         });

         uploader.start();
         } else {
         alert('You must queue at least one file.');
         }

         return false;
         });*/
    });
</script>
<link rel="stylesheet" href="/assets/lightbox/colorbox.css" />
<script src="/assets/lightbox/jquery.colorbox.js"></script>
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".select-image-group").colorbox();
    });
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".js-table-sortable").sortable({
            opacity: '0.5',
            axis:'vertically',
            handle : '.js-sortable-handle',
            update : function () {
                var order = $(this).sortable('serialize');
                $.ajax({
                    type: "POST",
                    url:"<?php echo site_url('admin/cakes/sorting/'.$this->uri->segment(4,0))?>",
                    data:order,
                    cache: false,
                    success: function(html){
                        alert(html);
                        $('#loader').html(html);
                    }
                });
            }
        });

        $('.btn-danger').click(function(){

            var gallery_id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url:"<?php echo site_url('admin/cakes/single_remove/'.$this->uri->segment(4,0))?>",
                data:'gallery_id='+gallery_id,
                cache: false,
                success: function(val){
                    if(val =='success'){
                        $('#listItem_'+gallery_id).remove();
                    }

                }
            });

        })
    });

</script>
