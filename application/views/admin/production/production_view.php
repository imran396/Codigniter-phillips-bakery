<div class="container-fluid fixed container-new">
    <div class="navbar main">
        <div class="icon-wrapper"><a href="<?php echo site_url()?>" class="icon-home"></a></div>
        <span class="tlogo">Cake Ordering System</span>
<!--        <div class="pull-right">-->
<!--            <div class="search-form">-->
<!--                <div class="error-msg"><span>Error No Results</span></div>-->
<!--                <input type="text" name="" value="" placeholder="Search Orders" class="error" />-->
<!--                <input type="submit" name="" value="Search" />-->
<!--            </div>-->
<!--            <a href="" class="button"><span class="icon icon-print"></span> Print Page</a>-->
<!--        </div>-->
        <div class="separator"></div>
    </div>
    <div id="wrapper" class="black">
        <div class="panel-choice">
            <div class="logo"></div>
            <div class="options">

                <div class="btn-group">
                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" >Cakes in Production</a>
                    <ul class="dropdown-menu pull-right">
                        <?php foreach($locationresult as $location):
                        if($location->vaughan_location !=1){ ?>
                            <li><a href="/admin/productions/location_production/<?php echo $location->location_id;  ?>"><?php echo $location->title; ?></a></li>
                        <?php } endforeach; ?>
                            <li class="divider"></li>
                        <?php foreach($locationresult as $location):
                        if($location->vaughan_location ==1){ ?>
                            <li><a href="/admin/productions/location_production/<?php echo $location->location_id;  ?>"><?php echo $location->title; ?></a></li>
                        <?php } endforeach; ?>
                    </ul>
                </div>
                <a href="/admin/blackouts" class="btn">Manage Blackouts</a>
            </div>
        </div>
    </div><!-- End Wrapper -->

</div>
<style type="text/css">
    .dropdown-menu{ min-width: 395px!important}
</style>