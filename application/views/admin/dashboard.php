<div class="heading-buttons">
    <h3 class="glyphicons display"><i></i> Dashboard</h3>

    <div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator"></div>

<div class="menubar">
    <ul>
        <li></li>
    </ul>
</div>
<?php if (!empty($quantity) AND (!empty($daily_sop))){ ?>
<div class="innerLR">
    <div class="row-fluid">
        <div class="span4">
            <div id="chart_div" style="width: 1000px; height: 500px;"></div>

            <script type="text/javascript">
                google.load("visualization", "1", {packages: ["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['SKU', 'Actual', 'Required'],
                        <?php

                            $options =  array();
                            foreach($quantity AS $data){

                                foreach($daily_sop AS $sop){

                                    if($data['sku_id'] == $sop['sku_id']){
                                        $requiredQuantity = $sop['quantity'] * 2.5 ;
                                        $options[] = "['$data[sku_code]', $data[stock_in_hand],$requiredQuantity]";
                                    }
                                }
                            }

                            echo implode(','.PHP_EOL, $options);

                        ?>
                    ]);

                    var options = {
                        title: 'SCR On Today',
                        hAxis: {title: 'SKU', titleTextStyle: {color: 'red'}}
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
        </div>

    </div>
</div>

<?php }else{  ?>
<div class="row-fluid">
    <div class="span4">
    <h3>No Report Found!</h3>
    </div>

</div>
<?php } ?>