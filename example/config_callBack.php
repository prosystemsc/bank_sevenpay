<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = '0355f916e30abe355d6ec7fba895f5eb';

$Bank = new \SevenPay\SevenPay($api_code);

// URL PARA RECEBER NOTIFICAÇÃO
$my_url = 'https://meusite.com/notificacao/bank';

$request = $Bank->Callback->config($my_url);

print_r($request);

?></pre>