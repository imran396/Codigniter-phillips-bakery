<div id="content">
 <?php
    $size = '300x300';
    $content = $employee_code;
    $encoding = 'UTF-8';
    $correction = 'L';
    $rootUrl = "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=$content&choe=$encoding&chld=$correction";
    echo '<img src="'.$rootUrl.'">';
?>

    <div onclick="window.print();"> Print </div>

</div>



