<?php

namespace SevenPay;

use \SevenPay\Banks\Banks;
use \SevenPay\Config\Callback;
use \SevenPay\Consult\Consult;
use \SevenPay\Deposit\Deposit;
use \SevenPay\Exception\ParameterError;
use \SevenPay\Recharge\Recharge;

class SevenPay
{
    const URL = 'https://api.sevenpagamentos.com/';

    private $api_code = null;
    public function __construct($api_code)
    {
        if (is_null($api_code)) {
            throw new ParameterError("Public Key required.");
        } else {
            $this->code = $api_code;
        }

        $this->Callback = new Callback($this);
        $this->ListBank = new Banks($this);
        $this->Recharge = new Recharge($this);
        $this->Deposit = new Deposit($this);
        $this->Consult = new Consult($this);
    }

}
