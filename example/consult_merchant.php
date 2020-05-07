<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = '0355f916e30abe355d6ec7fba895f5eb';

$Bank = new \SevenPay\SevenPay($api_code);
// CONSULTAR MINHA CONTA
$request = $Bank->Consult->merchant();

print_r($request);

?></pre>