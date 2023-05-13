<?php
namespace App\PaymentGateways;

use App\Contracts\PaymentGatewayContract;
class Stripe implements PaymentGatewayContract{
    public function createGatewayAccount($data,$gateway){
        switch ($gateway) {
            case 'stripe':
                return "stripe gateway";
                break;
            case 'paypal':
                    return "paypal gateway";
                    break;
            default:
                return "error";
                break;
        }
    }
}