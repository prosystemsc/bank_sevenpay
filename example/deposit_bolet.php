<pre><?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api_code = 'cb9b8d0f2d518e2fed80e113603fdb0d';

$Bank = new \SevenPay\SevenPay($api_code);
// DEPOSITAR METODO BOLETO
$data_vencimento = date('Y-m-d', strtotime('+5 days', strtotime(date('Y-m-d'))));
$data = [
    'value' => 50,
    'phone' => '62981748435',
    'email' => 'saviocolodiano@gmail.com',
    'document' => '44673839803',
    'name' => 'Savio jose colodiano',
    'zip_code' => '74150-200',
    'city' => 'Goiania',
    'state' => 'GO',
    'district' => 'Setor marista',
    'complement' => 'QD L28',
    'due_date' => $data_vencimento,
];

$request = $Bank->Deposit->createBolet($data);

print_r($request);

?></pre>