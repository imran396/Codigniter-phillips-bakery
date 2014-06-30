<?php

//$ch = curl_init('http://localhost/pboat/index.php/cron/email_notification');
$ch = curl_init(site_url('admin/cron/order_cancelled'));
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, "secret=knd6fh49f36dh439576dh3659dj43");
curl_exec ($ch);
curl_close ($ch);

?>