<div id="content">

        <ul class="breadcrumb">
            <li><a href="dashboard" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->lang->line('categories');?></li>
        </ul>
    <br/>
    <div class="menubar">
        <ul>
            <li><a href="/admin/categories"><?php echo $this->lang->line('add_categories'); ?></a></li>
            <li class="divider"></li>
            <li><a href="/admin/categories/listing"><?php echo $this->lang->line('list'); ?></a></li>
        </ul>
    </div>
    <?php $this->load->view('admin/layouts/message'); ?>
    <br/>

<!-- End Content -->
<div class="separator"></div>

<div class="innerLR">
    <table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable">
        <thead>
        <tr>
            <th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
            <th style="width: 1%;" class="center">No.</th>
            <th>Title</th>
            <th style="width: 1%;" class="center">Drag</th>
            <th class="center">author</th>
            <th class="right" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">1</td>
            <td><strong>Home Page</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">Guest</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-inverse">updated</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">2</td>
            <td><strong>About us</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">MosaicPro</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-inverse">updated</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">3</td>
            <td><strong>Photo Gallery</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">Admin</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-important">created</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">4</td>
            <td><strong>Contact us</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">MosaicPro</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-important">created</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">5</td>
            <td><strong>Services</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">MosaicPro</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-inverse">updated</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">6</td>
            <td><strong>Events</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">Guest</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-inverse">updated</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">7</td>
            <td><strong>Testimonials</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">MosaicPro</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-important">created</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">8</td>
            <td><strong>Our Blog</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">Admin</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-important">created</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">9</td>
            <td><strong>Custom Page</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">MosaicPro</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-inverse">updated</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        <tr class="selectable">
            <td class="center uniformjs"><input type="checkbox" /></td>
            <td class="center">10</td>
            <td><strong>Opening Hours</strong></td>
            <td class="center js-sortable-handle"><span class="glyphicons btn-action single move" style="margin-right: 0;"><i></i></span></td>
            <td class="center important">MosaicPro</td>
            <td class="center" style="width: 80px;">22 Jan 2013</td>
            <td class="center" style="width: 80px;"><span class="label label-block label-inverse">updated</span></td>
            <td class="center" style="width: 60px;">
                <a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
                <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
            </td>
        </tr>
        </tbody>
    </table>
        <div class="widget widget-gray widget-body-white">

            <div class="widget-body" style="padding: 10px 0;">
                <table class="table table-bordered table-primary">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th><?php echo $this->lang->line('categories');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=1;
                    foreach($result as  $rows ) :?>
                    <tr>
                        <td class="center"><?php echo $i; ?></td>
                        <td><?php echo $rows->title; ?></td>
                        <td>
                            <a class="glyphicons no-js glyphicons-ok <?php if($rows->status ==1 ){ echo 'ok'; }else{ echo 'ban';}?>" href="/admin/categories/status/<?php echo $rows->category_id; ?>"><i></i></a>
                            <a class="btn-action glyphicons pencil btn-success" href="/admin/categories/edit/<?php echo $rows->category_id; ?>"><i></i></a>
                            <a class="btn-action glyphicons remove_2 btn-danger" href="/admin/categories/remove/<?php echo $rows->category_id; ?>"><i></i></a>


                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
</div>