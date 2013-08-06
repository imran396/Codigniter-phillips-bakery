<?php echo $email_subject.PHP_EOL; ?>

<?php echo $this->lang->line('mailgun_instructional_body').PHP_EOL; ?>


------------------------------------------------------------
ORDER #<?php echo  $rows->order_code.PHP_EOL; ?>
<?php echo  date("d/m/Y",$rows->order_date).PHP_EOL; ?>

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