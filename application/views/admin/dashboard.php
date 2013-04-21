<!-- Start Content -->
<form action="<?php echo $this->uri->segment(1,NULL)?>/categories" name="form">
<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> <?php echo $this->lang->line('admin_panel'); ?></a></li>
    <li class="divider"></li>
    <li><?php echo $this->lang->line('settings');?></li>
</ul>
<div class="separator"></div>

<div class="heading-buttons">
    <h3 class="glyphicons display"><i></i> <?php echo $this->lang->line('categories');?></h3>
    <div class="buttons pull-right">

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
<div class="widget widget-4">
    <div class="widget-head">
        <h3 class="heading">Form Elements</h3>
    </div>
    <div class="widget-body">
        <p>There are various form elements contained in AdminPlus, custom select controls, custom checkbox &amp; radio controls, custom input controls with &amp; without appended / prepended elements (icons, dropdowns, dropups, groups), toggle (on/off) buttons, icons &amp; many more.</p>
    </div>
</div>

<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h4 class="heading">Input controls</h4>
    </div>
    <div style="padding: 10px 0 0;" class="widget-body">

        <div class="row-fluid">
            <div class="span6">

                <div class="widget widget-4">
                    <div class="widget-head"><h4 class="heading">Default</h4></div>
                    <div class="separator"></div>
                    <div class="row-fluid">
                        <input type="text" class="span12" placeholder="Text input">
                    </div>
                </div>

                <div class="widget widget-4 row-fluid">
                    <div class="widget-head"><h4 class="heading">Extended</h4></div>
                    <div class="separator"></div>
                    <div class="input-prepend">
                        <span class="add-on">@</span>
                        <input type="text" placeholder="Username" class="span12" id="prependedInput">
                    </div>
                </div>

                <div class="widget widget-4 row-fluid">
                    <div class="widget-head"><h4 class="heading">Combined</h4></div>
                    <div class="separator"></div>
                    <div class="input-prepend input-append">
                        <span class="add-on">$</span>
                        <input type="text" placeholder="100,000,000" id="appendedPrependedInput" class="span12">
                        <span class="add-on">.00</span>
                    </div>
                </div>

                <div class="widget widget-4 uniformjs">
                    <div class="widget-head">
                        <h4 class="heading">Checkbox</h4>
                    </div>
                    <div class="separator"></div>
                    <label class="checkbox">
                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" value="1" class="checkbox" style="opacity: 0;"></span></div>
                        Option 1 - Sexy checkbox
                    </label>
                    <label class="checkbox">
                        <div class="checker" id="uniform-undefined"><span class="checked"><input type="checkbox" checked="checked" value="1" class="checkbox" style="opacity: 0;"></span></div>
                        Option 2 - Checked
                    </label>
                    <label class="checkbox">
                        <div class="checker disabled" id="uniform-undefined"><span><input type="checkbox" disabled="disabled" value="1" class="checkbox" style="opacity: 0;"></span></div>
                        Option 3 - Disabled checkbox
                    </label>
                </div>

            </div>
            <div class="span6">

                <div class="widget widget-4 row-fluid">
                    <div class="widget-head"><h4 class="heading">Buttons</h4></div>
                    <div class="separator"></div>
                    <div class="input-append">
                        <input type="text" placeholder="Placeholder .." id="appendedInputButtons" class="span6">
                        <button type="button" class="btn"><i class="icon-search"></i></button>
                        <button type="button" class="btn">Options</button>
                    </div>
                </div>

                <div class="widget widget-4 row-fluid">
                    <div class="widget-head"><h4 class="heading">Dropdown / Dropup</h4></div>
                    <div class="separator"></div>
                    <div class="input-append">
                        <input type="text" id="appendedDropdownButton" class="span8">
                        <div class="btn-group dropup">
                            <button data-toggle="dropdown" class="btn dropdown-toggle">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="widget widget-4 row-fluid">
                    <div class="widget-head"><h4 class="heading">Segmented Groups</h4></div>
                    <div class="separator"></div>
                    <div class="input-append">
                        <input type="text" class="span7">
                        <div class="btn-group dropup">
                            <button tabindex="-1" class="btn">Action</button>
                            <button tabindex="-1" data-toggle="dropdown" class="btn dropdown-toggle">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="widget widget-4 uniformjs">
                    <div class="widget-head">
                        <h4 class="heading">Radio</h4>
                    </div>
                    <div class="separator"></div>
                    <label class="radio">
                        <div class="radio" id="uniform-undefined"><span><input type="radio" value="1" name="radio" class="radio" style="opacity: 0;"></span></div>
                        Option 1 - Sexy radio
                    </label><br>
                    <label class="radio">
                        <div class="radio" id="uniform-undefined"><span class="checked"><input type="radio" checked="checked" value="1" name="radio" class="radio" style="opacity: 0;"></span></div>
                        Option 2 - Checked
                    </label><br>
                    <label class="radio">
                        <div class="radio disabled" id="uniform-undefined"><span><input type="radio" disabled="disabled" value="1" name="radio" class="radio disabled" style="opacity: 0;"></span></div>
                        Option 3 - Disabled radio
                    </label>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h4 class="heading">File controls</h4>
    </div>
    <div style="padding: 10px 0;" class="widget-body">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">File upload widget</h4>
                    </div>
                    <div class="separator"></div>
                    <div data-provides="fileupload" class="fileupload fileupload-new">
                        <div class="input-append">
                            <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file"></span><a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget widget-4">
                    <div class="widget-head">
                        <h4 class="heading">File upload button</h4>
                    </div>
                    <div class="separator"></div>
                    <div data-provides="fileupload" class="fileupload fileupload-new">
                        <span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file"></span>
                        <span class="fileupload-preview"></span>
                        <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">×</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget widget-gray widget-body-white row-fluid">
    <div class="widget-head">
        <h4 class="heading">WYSIHTML5 Editor</h4>
    </div>
    <div style="padding: 10px 0 0;" class="widget-body">
        <ul id="mustHaveId-wysihtml5-toolbar" class="wysihtml5-toolbar" style=""><li class="dropdown"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="icon-font icon-white"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b></a><ul class="dropdown-menu"><li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a></li><li><a data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li><li><a data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li></ul></li><li><div class="btn-group"><a title="CTRL+B" data-wysihtml5-command="bold" class="btn btn-primary" href="javascript:;" unselectable="on">Bold</a><a title="CTRL+I" data-wysihtml5-command="italic" class="btn btn-primary" href="javascript:;" unselectable="on">Italic</a></div></li><li><div class="btn-group"><a title="Unordered List" data-wysihtml5-command="insertUnorderedList" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-list icon-white"></i></a><a title="Ordered List" data-wysihtml5-command="insertOrderedList" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-th-list icon-white"></i></a><a title="Outdent" data-wysihtml5-command="Outdent" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-indent-right icon-white"></i></a><a title="Indent" data-wysihtml5-command="Indent" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-indent-left icon-white"></i></a></div></li><li><div class="bootstrap-wysihtml5-insert-link-modal modal hide fade"><div class="modal-header"><a data-dismiss="modal" class="close">×</a><h3>Insert Link</h3></div><div class="modal-body"><input class="bootstrap-wysihtml5-insert-link-url input-xlarge" value="http://"></div><div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a></div></div><a title="Link" data-wysihtml5-command="createLink" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-share icon-white"></i></a></li><li><div class="bootstrap-wysihtml5-insert-image-modal modal hide fade"><div class="modal-header"><a data-dismiss="modal" class="close">×</a><h3>Insert Image</h3></div><div class="modal-body"><input class="bootstrap-wysihtml5-insert-image-url input-xlarge" value="http://"></div><div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="#">Insert image</a></div></div><a title="Insert image" data-wysihtml5-command="insertImage" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-picture icon-white"></i></a></li></ul><textarea rows="5" class="wysihtml5 span12" id="mustHaveId" style="display: none;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe width="0" height="0" frameborder="0" class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(216, 217, 218); border-style: solid; border-width: 1px; clear: none; display: inline-block; float: none; margin: 0px 0px 10px; outline: 0px none rgb(167, 167, 167); outline-offset: 0px; padding: 4px 6px; position: static; z-index: auto; vertical-align: middle; text-align: start; box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.075) inset; border-radius: 0px 0px 0px 0px; width: 692px; height: 110px; top: auto; left: auto; right: auto; bottom: auto;"></iframe>
    </div>
</div>

<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h4 class="heading">Toggle buttons</h4>
    </div>
    <div class="widget-body center">
        <div class="toggle-button" style="width: 100px; height: 25px;">
            <div style="left: 0px; width: 150px;"><input type="checkbox" checked="checked"><span class="labelLeft" style="width: 50px; height: 25px; line-height: 25px;">ON</span><label for="" style="width: 50px; height: 25px;"></label><span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">OFF </span></div>
        </div>
        <div data-togglebutton-style-enabled="info" class="toggle-button" style="width: 100px; height: 25px;">
            <div style="left: 0px; width: 150px;"><input type="checkbox" checked="checked"><span class="labelLeft info" style="width: 50px; height: 25px; line-height: 25px;">ON</span><label for="" style="width: 50px; height: 25px;"></label><span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">OFF </span></div>
        </div>
        <div data-togglebutton-style-enabled="warning" class="toggle-button" style="width: 100px; height: 25px;">
            <div style="left: 0px; width: 150px;"><input type="checkbox" checked="checked"><span class="labelLeft warning" style="width: 50px; height: 25px; line-height: 25px;">ON</span><label for="" style="width: 50px; height: 25px;"></label><span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">OFF </span></div>
        </div>
        <div data-togglebutton-style-enabled="danger" class="toggle-button" style="width: 100px; height: 25px;">
            <div style="left: 0px; width: 150px;"><input type="checkbox" checked="checked"><span class="labelLeft danger" style="width: 50px; height: 25px; line-height: 25px;">ON</span><label for="" style="width: 50px; height: 25px;"></label><span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">OFF </span></div>
        </div>
        <div data-togglebutton-style-enabled="success" class="toggle-button" style="width: 100px; height: 25px;">
            <div style="left: 0px; width: 150px;"><input type="checkbox" checked="checked"><span class="labelLeft success" style="width: 50px; height: 25px; line-height: 25px;">ON</span><label for="" style="width: 50px; height: 25px;"></label><span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">OFF </span></div>
        </div>
        <div data-togglebutton-style-custom-enabled-gradient="#000000" data-togglebutton-style-custom-enabled-background="#3F4246" class="toggle-button" style="width: 100px; height: 25px;">
            <div style="left: 0px; width: 150px;"><input type="checkbox" checked="checked"><span class="labelLeft" style="width: 50px; height: 25px; line-height: 25px; color: rgb(255, 255, 255); background-image: -moz-linear-gradient(center top , rgb(63, 66, 70), rgb(0, 0, 0));">ON</span><label for="" style="width: 50px; height: 25px;"></label><span class="labelRight" style="width: 50px; height: 25px; line-height: 25px;">OFF </span></div>
        </div>
    </div>
</div>

<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h4 class="heading">Select controls</h4>
    </div>
    <div style="padding: 10px 0;" class="widget-body">
        <div class="row-fluid">
            <div class="span3">
                <h5>Default</h5>
                <div class="row-fluid">
                    <select class="span12">
                        <optgroup label="Picnic">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </optgroup>
                        <optgroup label="Camping">
                            <option>Tent</option>
                            <option>Flashlight</option>
                            <option>Toilet Paper</option>
                        </optgroup>
                    </select>
                </div>
                <hr>
                <h5>Extended</h5>
                <div class="row-fluid">
                    <select class="selectpicker span12" style="display: none;">
                        <optgroup label="Picnic">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </optgroup>
                        <optgroup label="Camping">
                            <option>Tent</option>
                            <option>Flashlight</option>
                            <option>Toilet Paper</option>
                        </optgroup>
                    </select><div class="btn-group bootstrap-select span12"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: 78px; overflow-y: scroll;"><li rel="0"><dt>Picnic</dt><a href="#" tabindex="-1" class="opt0">Mustard</a></li><li rel="1"><a href="#" tabindex="-1" class="opt0">Ketchup</a></li><li rel="2" class="optgroup-div"><a href="#" tabindex="-1" class="opt0">Relish</a></li><li rel="3"><dt>Camping</dt><a href="#" tabindex="-1" class="opt1">Tent</a></li><li rel="4"><a href="#" tabindex="-1" class="opt1">Flashlight</a></li><li rel="5"><a href="#" tabindex="-1" class="opt1">Toilet Paper</a></li></ul></div></div>
                </div>
            </div>
            <div class="span5">
                <h5>Styles</h5>
                <div class="row-fluid">
                    <select data-style="btn-primary" class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-primary"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                    <select data-style="btn-default" class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-default"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                </div>
                <div class="row-fluid">
                    <select data-style="btn-info" class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-info"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                    <select data-style="btn-success" class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-success"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                </div>
                <div class="row-fluid">
                    <select data-style="btn-warning" class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-warning"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                    <select data-style="btn-inverse" class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix btn-inverse"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                </div>
            </div>
            <div class="span4">
                <h5>Grid</h5>
                <div class="row-fluid">
                    <select class="selectpicker span3" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span3"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                    <select class="selectpicker span9" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span9"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                </div>
                <div class="row-fluid">
                    <select class="selectpicker span4" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span4"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                    <select class="selectpicker span8" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span8"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                </div>
                <div class="row-fluid">
                    <select class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                    <select class="selectpicker span6" style="display: none;">
                        <option>Mustard</option>
                        <option>Ketchup</option>
                        <option>Relish</option>
                    </select><div class="btn-group bootstrap-select span6"><button data-toggle="dropdown" class="btn dropdown-toggle clearfix"><span class="filter-option pull-left">Mustard</span>&nbsp;<span class="caret"></span></button><div role="menu" class="dropdown-menu"><ul style="max-height: none; overflow-y: auto;"><li rel="0"><a href="#" tabindex="-1">Mustard</a></li><li rel="1"><a href="#" tabindex="-1">Ketchup</a></li><li rel="2"><a href="#" tabindex="-1">Relish</a></li></ul></div></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="separator line"></div>

<div class="widget widget-gray widget-body-white">
<div class="widget-head">
    <h4 class="heading">Advanced Select controls</h4>
</div>
<div style="padding: 10px 0;" class="widget-body">
<div class="row-fluid">
<div class="span6">
<h5>Basics</h5>
<div class="row-fluid">
    <div class="select2-container" id="s2id_select2_1" style="width: 100%;"><a tabindex="-1" class="select2-choice" onclick="return false;" href="javascript:void(0)">   <span>Alaska</span><abbr style="display:none;" class="select2-search-choice-close"></abbr>   <div><b></b></div></a><input type="text" class="select2-focusser select2-offscreen"><div style="display:none" class="select2-drop select2-with-searchbox">   <div class="select2-search">       <input type="text" class="select2-input" autocomplete="off">   </div>   <ul class="select2-results">   </ul></div></div><select id="select2_1" style="width: 100%;" class="select2-offscreen" tabindex="-1">
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
</div>
<div class="separator bottom"></div>
<h5>Multi-Value Select Boxes</h5>
<div class="row-fluid">
    <div class="select2-container select2-container-multi" id="s2id_select2_2" style="width: 100%;">    <ul class="select2-choices">  <li class="select2-search-field">    <input type="text" class="select2-input" autocomplete="off" style="width: 10px;">  </li></ul><div style="display:none;" class="select2-drop select2-drop-multi">   <ul class="select2-results">   </ul></div></div><select id="select2_2" style="width: 100%;" multiple="multiple" class="select2-offscreen" tabindex="-1">
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
</div>
<div class="separator bottom"></div>
<h5>Placeholders</h5>
<div class="row-fluid">
    <div class="select2-container" id="s2id_select2_3" style="width: 100%;"><a tabindex="-1" class="select2-choice select2-default" onclick="return false;" href="javascript:void(0)">   <span>Select a State</span><abbr style="display: none;" class="select2-search-choice-close"></abbr>   <div><b></b></div></a><input type="text" class="select2-focusser select2-offscreen"><div style="display:none" class="select2-drop select2-with-searchbox">   <div class="select2-search">       <input type="text" class="select2-input" autocomplete="off">   </div>   <ul class="select2-results">   </ul></div></div><select id="select2_3" style="width: 100%;" class="select2-offscreen" tabindex="-1">
        <option></option>
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
    <div class="separator bottom"></div>
    <div class="select2-container select2-container-multi" id="s2id_select2_4" style="width: 100%;">    <ul class="select2-choices">  <li class="select2-search-field">    <input type="text" class="select2-input select2-default" autocomplete="off" style="width: 596px;">  </li></ul><div style="display:none;" class="select2-drop select2-drop-multi">   <ul class="select2-results">   </ul></div></div><select id="select2_4" style="width: 100%;" multiple="multiple" class="select2-offscreen" tabindex="-1">
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
</div>
</div>
<div class="span6">
    <h5>Tagging Support</h5>
    <div class="select2-container select2-container-multi" id="s2id_select2_5" style="width: 100%;">    <ul class="select2-choices">  <li class="select2-search-choice">    <div>brown</div>    <a tabindex="-1" class="select2-search-choice-close" onclick="return false;" href="#"></a></li><li class="select2-search-choice">    <div>red</div>    <a tabindex="-1" class="select2-search-choice-close" onclick="return false;" href="#"></a></li><li class="select2-search-choice">    <div>green</div>    <a tabindex="-1" class="select2-search-choice-close" onclick="return false;" href="#"></a></li><li class="select2-search-field">    <input type="text" class="select2-input" autocomplete="off" style="width: 10px;">  </li></ul><div style="display:none;" class="select2-drop select2-drop-multi">   <ul class="select2-results">   </ul></div></div><input type="hidden" value="brown,red,green" style="width: 100%;" id="select2_5" class="select2-offscreen" tabindex="-1">
    <div class="separator bottom"></div>
    <h5>Disabled Mode</h5>
    <div class="select2-container select2-container-disabled" id="s2id_select2_6_1" style="width: 100%;"><a tabindex="-1" class="select2-choice" onclick="return false;" href="javascript:void(0)">   <span>Alaska</span><abbr style="display:none;" class="select2-search-choice-close"></abbr>   <div><b></b></div></a><input type="text" class="select2-focusser select2-offscreen" disabled="disabled"><div style="display:none" class="select2-drop select2-with-searchbox">   <div class="select2-search">       <input type="text" class="select2-input" autocomplete="off">   </div>   <ul class="select2-results">   </ul></div></div><select style="width:100%" id="select2_6_1" disabled="disabled" class="select2-offscreen" tabindex="-1">
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
    <div class="separator bottom"></div>
    <div class="select2-container select2-container-multi select2-container-disabled" id="s2id_select2_6_2" style="width: 100%;">    <ul class="select2-choices">  <li class="select2-search-field">    <input type="text" class="select2-input" autocomplete="off" style="width: 10px;" disabled="disabled">  </li></ul><div style="display:none;" class="select2-drop select2-drop-multi">   <ul class="select2-results">   </ul></div></div><select style="width:100%" multiple="" id="select2_6_2" disabled="disabled" class="select2-offscreen" tabindex="-1">
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option><option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
            <option value="VT">Vermont</option><option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
    <div class="separator bottom"></div>
    <input type="button" value="Enable" class="btn btn-primary" id="select2_6_enable">
    <input type="button" value="Disable" class="btn btn-warning" id="select2_6_disable">
    <div class="separator bottom"></div>
    <h5>Templating</h5>
    <div class="select2-container" id="s2id_select2_7" style="width: 100%;"><a tabindex="-1" class="select2-choice" onclick="return false;" href="javascript:void(0)">   <span><img src="http://ivaynberg.github.com/select2/images/flags/ak.png" class="flag">Alaska</span><abbr style="display:none;" class="select2-search-choice-close"></abbr>   <div><b></b></div></a><input type="text" class="select2-focusser select2-offscreen"><div style="display:none" class="select2-drop select2-with-searchbox">   <div class="select2-search">       <input type="text" class="select2-input" autocomplete="off">   </div>   <ul class="select2-results">   </ul></div></div><select id="select2_7" style="width: 100%;" class="select2-offscreen" tabindex="-1">
        <optgroup label="Alaskan/Hawaiian Time Zone">
            <option value="AK">Alaska</option>
            <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
            <option value="CA">California</option>
            <option value="NV">Nevada</option>
            <option value="OR">Oregon</option>
            <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
            <option value="AZ">Arizona</option>
            <option value="CO">Colorado</option>
            <option value="ID">Idaho</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NM">New Mexico</option>
            <option value="ND">North Dakota</option>
            <option value="UT">Utah</option>
            <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="IL">Illinois</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="OK">Oklahoma</option>
            <option value="SD">South Dakota</option>
            <option value="TX">Texas</option>
            <option value="TN">Tennessee</option>
            <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="IN">Indiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="OH">Ohio</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WV">West Virginia</option>
        </optgroup>
    </select>
</div>
</div>
</div>
</div>

<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h4 class="heading">Color picker &amp; Date pickers</h4>
    </div>
    <div class="widget-body">

        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Color picker</label>
                <div class="controls">
                    <input type="text" value="#D15353" id="colorpickerColor" style="background-color: rgb(209, 83, 83); color: rgb(0, 0, 0);"><br><br>
                    <div id="colorpicker"><div class="farbtastic"><div class="color" style="background-color: rgb(255, 0, 0);"></div><div class="wheel"></div><div class="overlay"></div><div class="h-marker marker" style="left: 97px; top: 13px;"></div><div class="sl-marker marker" style="left: 89px; top: 90px;"></div></div></div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Date picker</label>
                <div class="controls">
                    <input type="text" value="" id="datepicker" class="hasDatepicker">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Inline Date picker</label>
                <div class="controls">
                    <div id="datepicker-inline" class="hasDatepicker"><div class="ui-datepicker-inline ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" style="display: block;"><div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all"><a title="Prev" data-event="click" data-handler="prev" class="ui-datepicker-prev ui-corner-all"><span class="ui-icon ui-icon-circle-triangle-w">Prev</span></a><a title="Next" data-event="click" data-handler="next" class="ui-datepicker-next ui-corner-all"><span class="ui-icon ui-icon-circle-triangle-e">Next</span></a><div class="ui-datepicker-title"><span class="ui-datepicker-month">April</span>&nbsp;<span class="ui-datepicker-year">2013</span></div></div><table class="ui-datepicker-calendar"><thead><tr><th class="ui-datepicker-week-end"><span title="Sunday">Su</span></th><th><span title="Monday">Mo</span></th><th><span title="Tuesday">Tu</span></th><th><span title="Wednesday">We</span></th><th><span title="Thursday">Th</span></th><th><span title="Friday">Fr</span></th><th class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th></tr></thead><tbody><tr><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">31</span></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">1</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">2</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">3</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">4</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">5</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">6</a></td></tr><tr><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">7</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">8</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">9</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">10</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">11</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">12</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">13</a></td></tr><tr><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">14</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">15</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">16</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">17</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">18</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">19</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">20</a></td></tr><tr><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end ui-datepicker-days-cell-over  ui-datepicker-current-day ui-datepicker-today"><a href="#" class="ui-state-default ui-state-highlight ui-state-active ui-state-hover">21</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">22</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">23</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">24</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">25</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">26</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">27</a></td></tr><tr><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" ui-datepicker-week-end "><a href="#" class="ui-state-default">28</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">29</a></td><td data-year="2013" data-month="3" data-event="click" data-handler="selectDay" class=" "><a href="#" class="ui-state-default">30</a></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">1</span></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">2</span></td><td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">3</span></td><td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled "><span class="ui-state-default">4</span></td></tr></tbody></table></div></div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
<div class="innerLR">

    <form class="form-horizontal">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Personal details</h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">First name</label>
                                    <div class="controls">
                                        <input type="text" value="John" class="span10" />
                                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last name</label>
                                    <div class="controls">
                                        <input type="text" value="Doe" class="span10" />
                                        <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Date of birth</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input type="text" id="datepicker" class="span12" value="13/06/1988" />
                                            <span class="add-on glyphicons calendar"><i></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Gender</label>
                                    <div class="controls">
                                        <select class="span12">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Age</label>
                                    <div class="controls">
                                        <input type="text" value="25" class="input-mini" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group row-fluid">
                            <label class="control-label">About me</label>
                            <div class="controls">
                                <textarea id="mustHaveId" class="wysihtml5 span12" rows="5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea>
                            </div>
                        </div>
                        <div class="form-actions" style="margin: 0;">
                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save changes</button>
                            <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane active" id="account-settings">
                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons settings"><i></i>Account settings</h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span3">
                                <strong>Change password</strong>
                                <p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="span9">
                                <label for="inputUsername">Username</label>
                                <input type="text" id="inputUsername" class="span10" value="john.doe2012" disabled="disabled" />
                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>
                                <div class="separator"></div>

                                <label for="inputPasswordOld">Old password</label>
                                <input type="password" id="inputPasswordOld" class="span10" value="" placeholder="Leave empty for no change" />
                                <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
                                <div class="separator"></div>

                                <label for="inputPasswordNew">New password</label>
                                <input type="password" id="inputPasswordNew" class="span12" value="" placeholder="Leave empty for no change" />
                                <div class="separator"></div>

                                <label for="inputPasswordNew2">Repeat new password</label>
                                <input type="password" id="inputPasswordNew2" class="span12" value="" placeholder="Leave empty for no change" />
                                <div class="separator"></div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="row-fluid">
                            <div class="span3">
                                <strong>Contact details</strong>
                                <p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="span9">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <label for="inputPhone">Phone</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons phone"><i></i></span>
                                            <input type="text" id="inputPhone" class="input-large" placeholder="01234567897" />
                                        </div>
                                        <div class="separator"></div>

                                        <label for="inputEmail">E-mail</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons envelope"><i></i></span>
                                            <input type="text" id="inputEmail" class="input-large" placeholder="contact@mosaicpro.biz" />
                                        </div>
                                        <div class="separator"></div>

                                        <label for="inputWebsite">Website</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons link"><i></i></span>
                                            <input type="text" id="inputWebsite" class="input-large" placeholder="http://www.mosaicpro.biz" />
                                        </div>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="span6">
                                        <label for="inputFacebook">Facebook</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons facebook"><i></i></span>
                                            <input type="text" id="inputFacebook" class="input-large" placeholder="/mosaicpro" />
                                        </div>
                                        <div class="separator"></div>

                                        <label for="inputTwitter">Twitter</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons twitter"><i></i></span>
                                            <input type="text" id="inputTwitter" class="input-large" placeholder="/mosaicpro" />
                                        </div>
                                        <div class="separator"></div>

                                        <label for="inputSkype">Skype ID</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons skype"><i></i></span>
                                            <input type="text" id="inputSkype" class="input-large" placeholder="mySkypeID" />
                                        </div>
                                        <div class="separator"></div>

                                        <label for="inputYahoo">Yahoo ID</label>
                                        <div class="input-prepend">
                                            <span class="add-on glyphicons yahoo"><i></i></span>
                                            <input type="text" id="inputYahoo" class="input-large" placeholder="myYahooID" />
                                        </div>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="margin: 0; padding-right: 0;">
                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i><?php echo $this->lang->line('save_changes');?></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
<div class="separator bottom"></div>

<!-- End Content -->
</form>