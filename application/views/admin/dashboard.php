<div id="content">
<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
    <li class="divider"></li>
    <li>Forms</li>
    <li class="divider"></li>
    <li>Form Validator</li>
</ul>
<div class="widget widget-2 widget-tabs widget-tabs-2 tabs-right border-bottom-none">
    <div class="widget-head">
        <ul>
            <li class="active"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Account settings</a></li>
            <li><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>Account details</a></li>
        </ul>
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
                            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save changes</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
<br/>
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i> Form Validator</h3>
<div class="separator"></div>

<form class="form-horizontal" style="margin-bottom: 0;" id="validateSubmitForm" method="get" autocomplete="off">

<div class="well" style="padding-bottom: 20px; margin: 0;">
<h4>Validate a form with jQuery</h4>
<hr class="separator" />
<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="firstname">First name</label>
            <div class="controls"><input class="span12" id="firstname" name="firstname" type="text" /></div>
        </div>
        <div class="control-group">
            <label class="control-label" for="lastname">Last name</label>
            <div class="controls"><input class="span12" id="lastname" name="lastname" type="text" /></div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls"><input class="span12" id="username" name="username" type="text" /></div>
        </div>
    </div>
    <div class="span6">
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls"><input class="span12" id="password" name="password" type="password" /></div>
        </div>
        <div class="control-group">
            <label class="control-label" for="confirm_password">Confirm password</label>
            <div class="controls"><input class="span12" id="confirm_password" name="confirm_password" type="password" /></div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls"><input class="span12" id="email" name="email" type="email" /></div>
        </div>
    </div>
</div>

<hr class="separator" />

<div class="row-fluid uniformjs">
    <div class="span4">
        <h4 style="margin-bottom: 10px;">Policy &amp; Newsletter</h4>
        <label class="checkbox" for="agree">
            <input type="checkbox" class="checkbox" id="agree" name="agree" />
            Please agree to our policy
        </label>
        <label class="checkbox" for="newsletter">
            <input type="checkbox" class="checkbox" id="newsletter" name="newsletter" />
            Receive Newsletter
        </label>
    </div>
    <div class="span8">
        <div id="newsletter_topics">
            <h4>Topics</h4>
            <p>Select at least two topics you would like to receive in the newsletter.</p>
            <label for="topic_marketflash">
                <input type="checkbox" id="topic_marketflash" value="marketflash" name="topic" />
                Marketflash
            </label>
            <label for="topic_fuzz">
                <input type="checkbox" id="topic_fuzz" value="fuzz" name="topic" />
                Latest fuzz
            </label>
            <label for="topic_digester">
                <input type="checkbox" id="topic_digester" value="digester" name="topic" />
                Mailing list digester
            </label>
        </div>
    </div>
</div>
<div class="widget widget-4 uniformjs">
    <div class="widget-head">
        <h4 class="heading">Radio</h4>
    </div>
    <div class="separator"></div>
    <label class="radio">
        <input type="radio" class="radio" name="radio" value="1" />
        Option 1 - Sexy radio
    </label><br/>
    <label class="radio">
        <input type="radio" class="radio" name="radio" value="1" checked="checked" />
        Option 2 - Checked
    </label><br/>
    <label class="radio">
        <input type="radio" class="radio disabled" name="radio" value="1" disabled="disabled" />
        Option 3 - Disabled radio
    </label>
</div>
<hr class="separator" />
<div class="widget widget-4">
    <div class="widget-head">
        <h4 class="heading">File upload widget</h4>
    </div>
    <div class="separator"></div>
    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="input-append">
            <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
        </div>
    </div>
</div>
<hr class="separator" />
<div class="form-actions">
    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
    <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
</div>
<div class="separator line"></div>

<div class="widget widget-gray widget-body-white">
<div class="widget-head">
    <h4 class="heading">Advanced Select controls</h4>
</div>
<div class="widget-body" style="padding: 10px 0;">
<div class="row-fluid">
<div class="span6">
<h5>Basics</h5>
<div class="row-fluid">
    <select style="width: 100%;" id="select2_1">
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
    <select multiple="multiple" style="width: 100%;" id="select2_2">
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
    <select style="width: 100%;" id="select2_3">
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
    <select multiple="multiple" style="width: 100%;" id="select2_4">
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
    <input type="hidden" id="select2_5" style="width: 100%;" value="brown,red,green" />
    <div class="separator bottom"></div>
    <h5>Disabled Mode</h5>
    <select disabled="disabled" id="select2_6_1" style="width:100%">
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
    <select disabled="disabled" id="select2_6_2" multiple style="width:100%">
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
    <input type="button" id="select2_6_enable" class="btn btn-primary" value="Enable"/>
    <input type="button" id="select2_6_disable" class="btn btn-warning" value="Disable"/>
    <div class="separator bottom"></div>
    <h5>Templating</h5>
    <select style="width: 100%;" id="select2_7">
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
</div>

</form>
<!-- End Content -->
<div class="separator"></div>

<h3 class="glyphicons show_thumbnails"><i></i> Classic Tables</h3>
<div class="separator"></div>

<div class="innerLR">

    <div class="widget widget-gray widget-body-white">
        <div class="widget-head"><h4 class="heading">Minimal Table</h4></div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="widget widget-gray widget-body-white">
        <div class="widget-head"><h4 class="heading">Bordered Table</h4></div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="widget widget-gray widget-body-white">
        <div class="widget-head"><h4 class="heading">Condensed Table</h4></div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="widget widget-gray widget-body-white">
        <div class="widget-head"><h4 class="heading">Striped Table</h4></div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="separator"></div>

<h3 class="glyphicons show_thumbnails"><i></i> Themed Tables</h3>
<div class="separator"></div>

<div class="innerLR">
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Primary Table</h4>
        </div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-bordered table-primary">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th>Column Heading</th>
                    <th>Column Heading</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Primary Condensed Table</h4>
        </div>
        <div class="widget-body" style="padding: 10px 0;">
            <table class="table table-bordered table-primary table-condensed">
                <thead>
                <tr>
                    <th class="center">No.</th>
                    <th>Column Heading</th>
                    <th>Column Heading</th>
                    <th>Column Heading</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center">1</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">2</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                <tr>
                    <td class="center">3</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                    <td>Lorem ipsum dolor</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="separator"></div>

<h3 class="glyphicons show_thumbnails"><i></i> Enhanced Tables</h3>
<div class="separator"></div>

<div class="innerLR">
<div class="widget widget-gray widget-body-white">
<div class="widget-head">
    <h4 class="heading">Data Table</h4>
</div>
<div class="widget-body" style="padding: 10px 0;">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
<thead>
<tr>
    <th>Rendering eng.</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Eng. vers.</th>
    <th>CSS grade</th>
</tr>
</thead>
<tbody>
<tr class="gradeX">
    <td>Trident</td>
    <td>Internet Explorer 4.0</td>
    <td>Win 95+</td>
    <td class="center">4</td>
    <td class="center">X</td>
</tr>
<tr class="gradeC">
    <td>Trident</td>
    <td>Internet Explorer 5.0</td>
    <td>Win 95+</td>
    <td class="center">5</td>
    <td class="center">C</td>
</tr>
<tr class="gradeA">
    <td>Trident</td>
    <td>Internet Explorer 5.5</td>
    <td>Win 95+</td>
    <td class="center">5.5</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Trident</td>
    <td>Internet Explorer 6</td>
    <td>Win 98+</td>
    <td class="center">6</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Trident</td>
    <td>Internet Explorer 7</td>
    <td>Win XP SP2+</td>
    <td class="center">7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Trident</td>
    <td>AOL browser (AOL desktop)</td>
    <td>Win XP</td>
    <td class="center">6</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 1.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 1.5</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 2.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Firefox 3.0</td>
    <td>Win 2k+ / OSX.3+</td>
    <td class="center">1.9</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.0</td>
    <td>OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Camino 1.5</td>
    <td>OSX.3+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape 7.2</td>
    <td>Win 95+ / Mac OS 8.6-9.2</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Browser 8</td>
    <td>Win 98SE+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Netscape Navigator 9</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.1</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.2</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.2</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.3</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.3</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.4</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.4</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.5</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.5</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.6</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">1.6</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.7</td>
    <td>Win 98+ / OSX.1+</td>
    <td class="center">1.7</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Mozilla 1.8</td>
    <td>Win 98+ / OSX.1+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Seamonkey 1.1</td>
    <td>Win 98+ / OSX.2+</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Gecko</td>
    <td>Epiphany 2.20</td>
    <td>Gnome</td>
    <td class="center">1.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 1.2</td>
    <td>OSX.3</td>
    <td class="center">125.5</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 1.3</td>
    <td>OSX.3</td>
    <td class="center">312.8</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 2.0</td>
    <td>OSX.4+</td>
    <td class="center">419.3</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>Safari 3.0</td>
    <td>OSX.4+</td>
    <td class="center">522.1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>OmniWeb 5.5</td>
    <td>OSX.4+</td>
    <td class="center">420</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>iPod Touch / iPhone</td>
    <td>iPod</td>
    <td class="center">420.1</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Webkit</td>
    <td>S60</td>
    <td>S60</td>
    <td class="center">413</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 7.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 7.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 8.0</td>
    <td>Win 95+ / OSX.2+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 8.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 9.0</td>
    <td>Win 95+ / OSX.3+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 9.2</td>
    <td>Win 88+ / OSX.3+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera 9.5</td>
    <td>Win 88+ / OSX.3+</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Opera for Wii</td>
    <td>Wii</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Nokia N800</td>
    <td>N800</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>Presto</td>
    <td>Nintendo DS browser</td>
    <td>Nintendo DS</td>
    <td class="center">8.5</td>
    <td class="center">C/A<sup>1</sup>
    </td>
</tr>
<tr class="gradeC">
    <td>KHTML</td>
    <td>Konqureror 3.1</td>
    <td>KDE 3.1</td>
    <td class="center">3.1</td>
    <td class="center">C</td>
</tr>
<tr class="gradeA">
    <td>KHTML</td>
    <td>Konqureror 3.3</td>
    <td>KDE 3.3</td>
    <td class="center">3.3</td>
    <td class="center">A</td>
</tr>
<tr class="gradeA">
    <td>KHTML</td>
    <td>Konqureror 3.5</td>
    <td>KDE 3.5</td>
    <td class="center">3.5</td>
    <td class="center">A</td>
</tr>
<tr class="gradeX">
    <td>Tasman</td>
    <td>Internet Explorer 4.5</td>
    <td>Mac OS 8-9</td>
    <td class="center">-</td>
    <td class="center">X</td>
</tr>
<tr class="gradeC">
    <td>Tasman</td>
    <td>Internet Explorer 5.1</td>
    <td>Mac OS 7.6-9</td>
    <td class="center">1</td>
    <td class="center">C</td>
</tr>
<tr class="gradeC">
    <td>Tasman</td>
    <td>Internet Explorer 5.2</td>
    <td>Mac OS 8-X</td>
    <td class="center">1</td>
    <td class="center">C</td>
</tr>
<tr class="gradeA">
    <td>Misc</td>
    <td>NetFront 3.1</td>
    <td>Embedded devices</td>
    <td class="center">-</td>
    <td class="center">C</td>
</tr>
<tr class="gradeA">
    <td>Misc</td>
    <td>NetFront 3.4</td>
    <td>Embedded devices</td>
    <td class="center">-</td>
    <td class="center">A</td>
</tr>
<tr class="gradeX">
    <td>Misc</td>
    <td>Dillo 0.8</td>
    <td>Embedded devices</td>
    <td class="center">-</td>
    <td class="center">X</td>
</tr>
<tr class="gradeX">
    <td>Misc</td>
    <td>Links</td>
    <td>Text only</td>
    <td class="center">-</td>
    <td class="center">X</td>
</tr>
<tr class="gradeX">
    <td>Misc</td>
    <td>Lynx</td>
    <td>Text only</td>
    <td class="center">-</td>
    <td class="center">X</td>
</tr>
<tr class="gradeC">
    <td>Misc</td>
    <td>IE Mobile</td>
    <td>Windows Mobile 6</td>
    <td class="center">-</td>
    <td class="center">C</td>
</tr>
<tr class="gradeC">
    <td>Misc</td>
    <td>PSP browser</td>
    <td>PSP</td>
    <td class="center">-</td>
    <td class="center">C</td>
</tr>
<tr class="gradeU">
    <td>Other browsers</td>
    <td>All others</td>
    <td>-</td>
    <td class="center">-</td>
    <td class="center">U</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<br/>
</div>