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
            <a href="/admin/gallery" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add page</a>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- End Content -->
<div class="separator"></div>
<br/>
<div class="innerLR">
        <div class="widget widget-gray widget-body-white">
            <div class="widget-body" style="padding: 10px 0;">
                <div class="slider-img">
                    <ul>
                        <?php
                        $i=1;
                        $result = $this->gallery_model->getCakeGallery();
                        foreach($result as  $rows ) :?>
                         <li><a title="<?php echo $rows->title; ?>" class="select-image select-image-group" rel="group-<?php echo $rows->cake_id ?>" href="<?php echo base_url(); ?>/<?php echo $rows->image; ?>"><span class="plus"></span><img src="<?php echo base_url(); ?>/<?php echo $rows->image; ?>" alt="" /></a>
                             <?php
                             $galleries = $this->gallery_model->getGallery($rows->cake_id);
                             foreach($galleries as $gallery):
                                 ?>
                                 <a rel='group-<?php echo $rows->cake_id ?>' class="select-image-group"  href="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>"></a>
                             <?php endforeach; ?>
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