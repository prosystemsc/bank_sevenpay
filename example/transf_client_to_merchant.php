<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = 'a5ed3ab4b4c4104991a078dbbc4348aa';

$Bank = new \SevenPay\SevenPay($api_code);
// Transferir saldo cliente para comerciante
// INFORMAÇÕES DA CONTA PARA QUE IRAR RECEBER A RECARGA
$data = [
    'value' => 10,
    'two_factor' => '102030', // CÓDIGO AUTHENTICADOR
    'email' => 'saviocolodiano@gmail.com',
    'type' => 'cash',
];

$request = $Bank->Recharge->client($data);

print_r($request);

?></pre>