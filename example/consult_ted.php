<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = '0355f916e30abe355d6ec7fba895f5eb';

$Bank = new \SevenPay\SevenPay($api_code);
// CONSULTAR TED FEITA POR REFERENCE
$reference = 123;

$request = $Bank->Consult->ted($reference);

print_r($request);

?></pre>