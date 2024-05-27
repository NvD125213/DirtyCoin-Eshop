<?php

namespace App\Http\Controllers;

use App\Models\tb_order;
use App\Models\tb_orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    private $order;
    private $orderdetail;

    public function __construct(tb_order $order, tb_orderdetail $orderdetail ) {
        $this -> order = $order;
        $this -> orderdetail = $orderdetail;
    }

    public function getAmount() {
          
        $cart = session()->get('Cart');
        $subTotal = 0;
        foreach($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        return $subTotal;
    }
 
    public function vn_payment(Request $request) {
       
      
        $order = $this->order->create([
            'name'=> $request->name,
            'email' => $request->email,
            'address'=> $request->address,
            'address_city'=> $request->address_city,
            'code_zip'=> $request->code_zip,
            'phone' => $request->phone,
            'payment' => $request->payment 
        ]);
        $carts = session()->get('Cart');
        $subTotal = 0;
        foreach ($carts as $items) {
            $totalProduct = $items['quantity'] * $items['price'];
            $subTotal += $totalProduct;

            $data = [
                'id_Order' => $order->id,
                'id_Product' => $items['id'],
                'quantity' => $items['quantity'],
                'total_price' => $totalProduct,
            ];
            $this->orderdetail->create($data);
        }
  
     
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/shop/order/infor";
        $vnp_TmnCode = "Y6ZD5CJK";//Mã website tại VNPAY 
        $vnp_HashSecret = "FVVTEQTUJVGJGTBTDJVZVOVTRVGSIHEC"; //Chuỗi bí mật
        
        $vnp_TxnRef = "ODC_" .$order['id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = "DirtyCoin";
        $vnp_Amount = $this->getAmount() * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
       
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
          
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
        $this->sendMail($order, $totalProduct, $subTotal);

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            $this->order->find($order['id'])->delete();
            echo json_encode($returnData);
        }
    }

    public function sendMail($order, $total, $totalSub) {
        $email = $order->mail;
        Mail::send('Users.email', compact('order', 'total', 'subTotal'), 
        function($message) use ($email) {
            $message->from('ducvan2k3000@gmail.com', 'Dirty Coin Eshop');
            $message->to($email, $email);
            $message->subject('Thông báo đặt hàng');
            
        });
    }

   
}    
    