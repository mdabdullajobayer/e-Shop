<?php

namespace App\Helpers;

use App\Models\Invoice;
use App\Models\SslcommerzAccount;
use Exception;
use Illuminate\Support\Facades\Http;

class SSLCommerz
{
    static function  InitiatePayment($Profile, $payable, $tran_id, $user_email): array
    {
        try {
            $ssl = SslcommerzAccount::first();
            $response = Http::asForm()->post($ssl->init_url, [
                "store_id" => $ssl->store_id,
                "store_passwd" => $ssl->store_passwd,
                "total_amount" => $payable,
                "currency" => $ssl->currency,
                "tran_id" => $tran_id,
                "success_url" => "$ssl->success_url?tran_id=$tran_id",
                "fail_url" => "$ssl->fail_url?tran_id=$tran_id",
                "cancel_url" => "$ssl->cancel_url?tran_id=$tran_id",
                "ipn_url" => $ssl->ipn_url,
                "cus_name" => $Profile->cus_name,
                "cus_email" => $user_email,
                "cus_add1" => $Profile->cus_add,
                "cus_add2" => $Profile->cus_add,
                "cus_city" => $Profile->cus_city,
                "cus_state" => $Profile->cus_city,
                "cus_postcode" => $Profile->cus_postcode,
                "cus_country" => $Profile->cus_country,
                "cus_phone" => $Profile->cus_phone,
                "cus_fax" => $Profile->cus_phone,
                "shipping_method" => "YES",
                "ship_name" => $Profile->ship_name,
                "ship_add1" => $Profile->ship_add,
                "ship_add2" => $Profile->ship_add,
                "ship_city" => $Profile->ship_city,
                "ship_state" => $Profile->ship_city,
                "ship_country" => $Profile->ship_country,
                "ship_postcode" => $Profile->ship_postcode,
                "product_name" => "Apple Shop Product",
                "product_category" => "Apple Shop Category",
                "product_profile" => "Apple Shop Profile",
                "product_amount" => $payable,
            ]);
            return $response->json('desc');
        } catch (Exception $e) {
            return ['status' => 'fail', 'message' => $e->getMessage()];
        }
    }

    static function InitiateSuccess($tran_id): int
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payments_status' => 'Success']);
        return 1;
    }


    static function InitiateFail($tran_id): int
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payments_status' => 'Fail']);
        return 1;
    }



    static function InitiateCancel($tran_id): int
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payments_status' => 'Cancel']);
        return 1;
    }

    static function InitiateIPN($tran_id, $status, $val_id): int
    {
        Invoice::where(['tran_id' => $tran_id, 'val_id' => 0])->update(['payments_status' => $status, 'val_id' => $val_id]);
        return 1;
    }
}
