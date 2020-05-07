<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = '0355f916e30abe355d6ec7fba895f5eb';

$Bank = new \SevenPay\SevenPay($api_code);
// Transferir saldo Comerciante para cliente
// DADOS DA CONTA A SER RECARREGADA!
$data = [
    'value' => 10,
    'two_factor' => '102030', // CÓDIGO AUTHENTICADOR
    'email' => 'saviocolodiano@gmail.com',
    'type' => 'cash',
];

$request = $Bank->Recharge->merchant($data);

print_r($request);

?></pre>