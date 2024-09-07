<?php

namespace App\Http\Controllers;

use App\Helpers\SSLCommerz;
use App\Helpers\ResponseHelper;
use App\Models\CustomerProfile;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\ProductCart;
use App\Models\SslcommerzAccount;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function CreateInvoice(Request $request)
    {
        DB::beginTransaction();
        try {
            // receive data form header
            $user_id = $request->header('id');
            $user_email = $request->header('email');
            // Genarate uniqid
            $tran_id = uniqid();
            $delivery_status = 'Pending';
            $payment_status = 'Pending';
            // Get Customer Profile Form Database 
            $Profile = CustomerProfile::where('user_id', '=', $user_id)->first();
            $cus_details = "Name:$Profile->cus_name,Address:$Profile->cus_add,City:$Profile->cus_city,Phone: $Profile->cus_phone";
            $ship_details = "Name:$Profile->ship_name,Address:$Profile->ship_add ,City:$Profile->ship_city ,Phone: $Profile->cus_phone";
            // Get Cart Data Form Database
            $total = 0;
            $cartList = ProductCart::where('user_id', '=', $user_id)->get();
            foreach ($cartList as $cartItem) {
                $total = $total + $cartItem->price;
            }
            // Calculate Data
            $vat = ($total * 3) / 100;
            $payable = $total + $vat;
            // Create Invoice
            $invoice = Invoice::create([
                'total' => $total,
                'vat' => $vat,
                'payable' => $payable,
                'cus_details' => $cus_details,
                'ship_details' => $ship_details,
                'tran_id' => $tran_id,
                'delivery_status' => $delivery_status,
                'payments_status' => $payment_status,
                'user_id' => $user_id
            ]);
            // Get Created Invoice ID
            $invoiceID = $invoice->id;
            // Insert Product Using Foreach loop
            foreach ($cartList as $EachProduct) {
                InvoiceProduct::create([
                    'invoice_id' => $invoiceID,
                    'product_id' => $EachProduct['product_id'],
                    'user_id' => $user_id,
                    'qty' =>  $EachProduct['qty'],
                    'sale_price' =>  $EachProduct['price'],
                ]);
            }
            // Send data on sslcommerz helpers 
            $paymentMethod = SSLCommerz::InitiatePayment($Profile, $payable, $tran_id, $user_email);
            DB::commit();
            return ResponseHelper::Out('success', array(['paymentMethod' => $paymentMethod, 'payable' => $payable, 'vat' => $vat, 'total' => $total]), 200);
        } catch (Exception $e) {
            DB::rollBack();
            return ['status' => 'fail', 'message' => $e->getMessage()];
        }
    }

    function InvoiceList(Request $request)
    {
        $user_id = $request->header('id');
        return Invoice::where('user_id', $user_id)->get();
    }

    function InvoiceProductList(Request $request)
    {
        $user_id = $request->header('id');
        $invoice_id = $request->invoice_id;
        return InvoiceProduct::where(['user_id' => $user_id, 'invoice_id' => $invoice_id])->with('product')->get();
    }

    function PaymentSuccess(Request $request)
    {
        SSLCommerz::InitiateSuccess($request->query('tran_id'));
        return redirect('/profile');
    }
    function PaymentCancel(Request $request)
    {
        SSLCommerz::InitiateCancel($request->query('tran_id'));
        return redirect('/profile');
    }

    function PaymentFail(Request $request)
    {
        return SSLCommerz::InitiateFail($request->query('tran_id'));
        return redirect('/profile');
    }

    function PaymentIPN(Request $request)
    {
        return SSLCommerz::InitiateIPN($request->input('tran_id'), $request->input('status'), $request->input('val_id'));
    }
}
