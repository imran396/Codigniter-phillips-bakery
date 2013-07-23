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
<!--        <div class="buttons pull-right">
            <a href="/admin/gallery" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i>Add New Image</a>
        </div>-->
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
                        $i=1;
                        foreach($paging[0] as  $rows ) :?>
                         <li>
                             <?php
                             $x=1;
                             $galleries = $this->gallery_model->getGallery($rows->cake_id);
                             foreach($galleries as $gallery):
                                 if($x ==1){
                                 ?>
                                 <a title="<?php echo $rows->title; ?>" class="select-image select-image-group" rel="group-<?php echo $rows->cake_id ?>" href="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>"><span class="plus"></span><img src="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>" alt="" /></a>
                                 <?php } ?>
                                 <a title="<?php echo $rows->title; ?>" rel='group-<?php echo $rows->cake_id ?>' class="select-image-group"  href="<?php echo base_url(); ?>/<?php echo $gallery->image; ?>"></a>

                             <?php $x++; endforeach; ?>

                             <span style="display: block; margin-left:45px; margin-top: 8px ">
                             <a data-original-title="<?php echo $this->lang->line('edit'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons pencil btn-success" href="/admin/cakes/edit/<?php echo $rows->cake_id; ?>"><i></i></a>
                             <a data-original-title="<?php echo $this->lang->line('delete'); ?>" data-placement="top" data-toggle="tooltip" class="btn-action glyphicons remove_2 btn-danger" href="/admin/gallery/remove/<?php echo $rows->cake_id; ?>"><i></i></a>
                            </span>
                         </li>

                         <?php $i++; endforeach; ?>
                    </ul>
                </div>
                <?php if($paging[1]){ ?>
                    <div class="row-fluid row-fluid-custom"><div class="left-custom-paging">Showing <?php echo ($paging[3]+1); ?> to <?php echo ($i-1); ?> of <?php echo $paging[2]; ?> Entries.</div><div class="paging_bootstrap pagination custom-pagination"><?php echo $paging[1]; ?></div></div>
                <?php } ?>
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