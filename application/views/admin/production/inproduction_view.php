<div class="container-fluid fixed container-new">
<div class="navbar main">
    <div class="icon-wrapper"><a href="/admin/production" class="icon-home"></a></div>
    <span class="tlogo">Cakes in Production</span>
    <div class="pull-right">
        <div class="search-form">
            <div class="error-msg"><span>Error No Results</span></div>
            <input type="text" name="" value="" placeholder="Search Orders" class="error" />
            <input type="submit" name="" value="Search" />
        </div>
        <a href="" class="button"><span class="icon icon-print"></span> Print Page</a>
    </div>
    <div class="separator"></div>
</div>
<div id="wrapper">
<div class="widget filters">
    <div class="widget-body">
        <a href="" class="icon-refresh"></a>
        <span class="label">Filter By:</span>
        <div class="row-fluid">
            <select class="selectpicker span12">
                <option class="label">Status</option>
                <option>Pending</option>
                <option>In Production</option>
                <option>Sold</option>
            </select>
        </div>
        <div class="row-fluid">
            <select class="selectpicker span12">
                <option class="label">Fondant</option>
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>
        </div>
        <div class="row-fluid row-wider">
            <select class="selectpicker span12">
                <option class="label">Flavor</option>
                <option>Chocolate</option>
                <option>Vanilia</option>
                <option>Lemon</option>
                <option>Extra tasty long flavor </option>
            </select>
        </div>
        <div class="row-fluid row-wide">
            <select class="selectpicker span12">
                <option class="label">Pickup/Dellivery</option>
                <option>Dellivery</option>
                <option>Dellivery</option>
            </select>
        </div>
        <div class="row-fluid row-widest">
            <span class="label pull-left">Date</span>
            <div class="pull-right">
                <div class="controls">
                    <input type="text" id="datepicker" value="" placeholder="Start" />
                </div>
                <div class="controls">
                    <input type="text" id="datepicker2" value="" placeholder="End" />
                </div>
            </div>
        </div>
        <div class="row-fluid row-widerer">
            <span class="label pull-left">Time</span>
            <div class="pull-right">
                <div class="timepicker">
                    <input type="text" value="" class="hasTimeDropdown" placeholder="Start" />
                    <div class="popup timedropdown">
                        <div class="ui-datepicker-title">Choose Time</div>
                        <div class="innerLR">
                            <div class="slider-range-timer row-fluid">
                                <div class="span3 heading-bar">
                                    <label class="span8">Time:</label>
                                    <input type="text" class="amount span4" />
                                </div>
                                <div class="line">
                                    <label class="span8">Hour</label>
                                    <div class="span9 sliderhour">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                <div class="line">
                                    <label class="span8">Minute</label>
                                    <div class="span9 sliderminute">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <a href="" class="btn btn-block btn-success pull-right">Done</a>
                                    <a href="" class="btn btn-block btn-default">Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timepicker">
                    <input type="text" value="" class="hasTimeDropdown" placeholder="End" />
                    <div class="popup timedropdown">
                        <div class="ui-datepicker-title">Choose Time</div>
                        <div class="innerLR">
                            <div class="slider-range-timer row-fluid">
                                <div class="span3 heading-bar">
                                    <label class="span8">Time:</label>
                                    <input type="text" class="amount span4" />
                                </div>
                                <div class="line">
                                    <label class="span8">Hour</label>
                                    <div class="span9 sliderhour">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                                <div class="line">
                                    <label class="span8">Minute</label>
                                    <div class="span9 sliderminute">
                                        <div class="slider"></div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <a href="" class="btn btn-block btn-success pull-right">Done</a>
                                    <a href="" class="btn btn-block btn-default">Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div><!-- end of filters -->
<div class="innerLR">
    <div class="widget">
        <div class="widget-body">
            <table class="dynamicTable table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="70">Order #</th>
                    <th width="166">Customer Name</th>
                    <th width="170">Cake Name</th>
                    <th width="122">Pickup/Delivery</th>
                    <th width="93">Date</th>
                    <th width="48">Time</th>
                    <th width="65">Fondant</th>
                    <th width="84">Flavor</th>
                    <th width="110">Magic Cake ID</th>
                    <th width="75">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="center"><a href="/admin/orders/details/<?php echo "4560456"; ?>">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Fancy Double Chocolate Crispy Cream Crunch</td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="green">In Production</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Magic Chocolate crispy crunch </td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="red">Sold</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Coffee La Creme</td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="green">In Production</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Fancy Double Chocolate Crispy Cream Crunch</td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="green">In Production</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Magic Chocolate crispy crunch </td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="red">Sold</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Fancy Double Chocolate Crispy Cream Crunch</td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="green">In Production</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Magic Chocolate crispy crunch </td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="red">Sold</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Fancy Double Chocolate Crispy Cream Crunch</td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="green">In Production</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Magic Chocolate crispy crunch </td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="red">Sold</td>
                </tr>
                <tr>
                    <td class="center"><a href="">4560456</a></td>
                    <td class="center">Customer Name here</td>
                    <td>Fancy Double Chocolate Crispy Cream Crunch</td>
                    <td class="center">Delivery</td>
                    <td class="center">Aug 28, 2013</td>
                    <td class="center">4:56pm</td>
                    <td>Yes</td>
                    <td>Chocolate</td>
                    <td>24560456</td>
                    <td class="green">In Production</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="buttons">
        <a href="" class="button button-green"><span class="icon icon-scan"></span>Scan Bar Code</a>
    </div>
    <div class="pagination pagination-small pagination-right" style="margin-top: 0; margin-bottom: 12px;">
        <ul>
            <li class="disabled"><a href="#">&lsaquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#">11</a></li>
            <li><a href="#">&rsaquo;</a></li>
        </ul>
    </div>
</div><!-- End Wrapper -->

</div>
</div>