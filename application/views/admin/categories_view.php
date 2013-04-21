<!-- Start Content -->
<form action="/<?php echo $this->uri->segment(1,NULL)?>/categories" name="form">
<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('settings');?></li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
    <h3 class="glyphicons display"><i></i> <?php echo $this->lang->line('categories');?></h3>
    <div class="buttons pull-right">

        <button type="reset" class="btn btn-icon btn-default glyphicons circle_remove pull-right" style="margin-left: 5px"><i></i><?php echo $this->lang->line('cancel');?></button>

        <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i><?php echo $this->lang->line('save_changes');?></button>
    </div>

    <div class="clearfix" style="clear: both;"></div>
<?php $this->load->view('admin/layouts/message'); ?>
</div>
<div class="separator"></div>

<div class="menubar">
    <ul>
        <li><a href="/admin/categories/list"><?php echo $this->lang->line('list');?></a></li>
        <li class="divider"></li>
        <li><a href="admin/categories"><?php echo $this->lang->line('add_new');?></a></li>


    </ul>
</div>

<div class="innerLR">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i><?php echo $this->lang->line('categories');?></h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('category_name');?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('category_name');?>" value="" class="span10" name="category_name" id="category_name"  />
                                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark"  data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><?php echo $this->lang->line('slug');?></label>
                                    <div class="controls">
                                        <input type="text"  placeholder="<?php echo $this->lang->line('enter').' '.$this->lang->line('slug');?>"  value="" class="span10" />
                                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <hr class="separator bottom" />

                        <div class="form-actions" style="margin: 0;">
                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i><?php echo $this->lang->line('save_changes');?></button>
                            <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i><?php echo $this->lang->line('cancel');?></button>
                        </div>
                    </div>
                </div>
            </div

        </div>

</div>
<div class="separator bottom"></div>

<!-- End Content -->
</form>