<?php

namespace App\Http\Controllers;

use App\Models\tb_order;
use App\Models\tb_orderdetail;
use Illuminate\Http\Request;

class tb_order_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $order;
    private $orderdetail;
    private $payment;

    public function __construct(tb_order $order, tb_orderdetail $orderdetail ) {
        $this -> order = $order;
        $this -> orderdetail = $orderdetail;
    }


    public function index(Request $request)
    {   
        $cart = session()->get('Cart');
        $subTotal = 0;
        foreach($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        return view('Users.checkout', compact('cart', 'subTotal'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Thêm đơn hàng 
        $order = $this->order->create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'address_city' => $request->address_city,
            'phone' => $request->phone,
            'code_zip' => $request->code_zip,
            'payment' => $request->payment
        ]);
        $carts = session()->get('Cart');
        $subTotal = 0;

        foreach( $carts as $items) {
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
       
        if($request->payment == "directcheck") {

            session()->forget('Cart');
            return redirect()
            ->route('inforOrder')
            ->with('notification', 'Đặt hàng thành công! Kiểm tra email để biết thêm thông tin chi tiết.');
        }
        else if($request->payment == "banktransfer") {
            $data_url = $this->payment->vn_payment([
                'vnp_TxnRef' => $order->id,
                'vnp_Amount' => $subTotal,

            ]);
            return redirect()->to($data_url);
        }

      

    }
    public function infor() {
        $notification = '';
        return view('Users.info', compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(tb_order $tb_order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tb_order $tb_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tb_order $tb_order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_order $tb_order)
    {
        //
    }
}
