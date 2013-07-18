Reply to this email and attach the example images you would
like your baker to reference.

Required By:	< Date dd/mm/yyyy >

------------------------------------------------------------
ORDER #<?php echo $order_id.PHP_EOL; ?>
<?php echo $order_date.PHP_EOL; ?>

------------------------------------------------------------
CUSTOMER DETAILS
<?php echo $rows->first_name.'&nbsp;'.$rows->last_name.PHP_EOL; ?>
<?php echo $rows->address_1.PHP_EOL; ?>
<?php echo $rows->address_2.PHP_EOL; ?>
<?php echo $rows->phone_number.PHP_EOL; ?>
<?php echo $rows->email.PHP_EOL; ?>
------------------------------------------------------------
Thank You
info@stphillipsbakery.com
stphillipsbakery.com