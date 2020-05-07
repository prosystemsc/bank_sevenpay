<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = '0355f916e30abe355d6ec7fba895f5eb';

$Bank = new \SevenPay\SevenPay($api_code);
// DEPOSITAR METODO TED
$file = realpath('./file.png');

$data = [
    'value' => 10,
    'reference' => 123,
    'name' => 'Savio Colodiano',
    'document' => '446.738.398-03',
    'email' => 'saviocolodiano@gmail.com',
    'address' => 'Rua 27 qd L28 LT 14/18',
    'zip_code' => '74150-200',
    'district' => 'Setor Marista',
    'city' => 'Goiania',
    'state' => 'GO',
    'file' => $file,
];

$request = $Bank->Deposit->createTed($data);

print_r($request);

?></pre>