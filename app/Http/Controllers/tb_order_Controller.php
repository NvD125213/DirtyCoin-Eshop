<?php

namespace App\Http\Controllers;

use App\Models\tb_categories;
use App\Models\tb_order;
use App\Models\tb_orderdetail;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class tb_order_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $order;
    private $orderdetail;
    private $categories;

    public function __construct(tb_order $order, tb_orderdetail $orderdetail, tb_categories $categories ) {
        $this -> order = $order;
        $this -> orderdetail = $orderdetail;
        $this -> categories = $categories;
    }


    public function index(Request $request)
    {
        $categories = $this->categories->where('parent_id', null)->get();
   
        $cart = session()->get('Cart');
        $subTotal = 0;
        foreach($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        return view('Users.checkout', compact('cart', 'subTotal','categories'));
    }
    public function getAmount() {
          
        $cart = session()->get('Cart');
        $subTotal = 0;
        foreach($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }
        return $subTotal;
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
            $subTotal = $this->getAmount();
          
            $this->sendMail($order, $carts, $subTotal);

            return redirect()->route('inforOrder');
            
           


    }
    public function sendMail($order, $carts, $subTotal) {
        $email = $order->email;
        Mail::send('Users.email', compact('order', 'carts' , 'subTotal'), 
        function($message) use ($email) {
            $message->from('ducvan2k3000@gmail.com', 'Dirty Coin Eshop');
            $message->to($email, $email);
            $message->subject('Thông báo đặt hàng');
            
        });
    }
    public function infor() {
        $categories = $this->categories->where('parent_id', null)->get();
        $notification = '';
        return view('Users.info', compact('notification', 'categories'));
    }

    public function indexAdmin() {
        $order = $this->order->paginate(5)->appends(request()->query());
        return view('Orders.index', [
            'order' => $order
        ]);
    }
    
  
}
