<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('gallery');?></li>
        </ul>
    <br/>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>
    <div class="separator"></div>

    <div class="heading-buttons">
        <h3 class="glyphicons sort"><i></i><?php echo $this->lang->line('gallery');?></h3>
        <div class="buttons pull-right">
            <a href="/admin/gallery" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Image</a>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>
<br/>
<div class="innerLR">
        <div class="widget widget-gray widget-body-white">
            <div class="widget-body" style="padding: 10px 0;">
                <div class="gallery-img">
                    <ul>
                        <?php
                        $i=0;
                        foreach($galleries as $gallery):?>
                         <li>

                             <a title="" class="select-image select-image-group" rel="group-1" href="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>"><img src="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>" alt="" /></a>
                             <span style="display: block; margin-left:60px; margin-top: 8px ">
                             <a data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger" href="/admin/gallery/single_remove/<?php echo $gallery->cake_id; ?>/<?php echo $gallery->gallery_id; ?>"><i></i></a>
                            </span>
                         </li>

                         <?php $i++; endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>


</div>
</div>

<link rel="stylesheet" href="/assets/lightbox/colorbox.css" />
<script src="/assets/lightbox/jquery.colorbox.js"></script>
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".select-image-group").colorbox();
    });
</script>