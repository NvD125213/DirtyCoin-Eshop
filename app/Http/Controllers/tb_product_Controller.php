<?php

namespace App\Http\Controllers;

use App\Models\tb_product;
use App\Models\tb_categories;
use App\Components\Recusive;
use App\Models\tb_list_image;
use App\Models\tb_product_sizes;
use App\Models\tb_sizes;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class tb_product_Controller extends Controller
{
    use StorageImageTrait;
    private $categories;
    private $product;
    private $listImage;
    private $productSize;
    private $size;

    public function __construct(tb_categories $categories, tb_product $product, tb_list_image $listImage, tb_product_sizes $productSize, tb_sizes $size) {
        $this -> categories = $categories;
        $this -> product = $product;
        $this -> listImage = $listImage;
        $this -> productSize = $productSize;
        $this -> size = $size;

    }  
    public function index()
    {
        $products = $this->product->paginate(10); 
        return view('Products.index', compact('products'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function getCategory($parentid) {
        $data = $this->categories->all();
        $rescusive = new Recusive($data);
        $htmlOptions = $rescusive->categoriesRescusive($parentid);
        return $htmlOptions;
    }
    public function create()
    {
        //
        $htmlOptions = $this->getCategory($parentid=null);
        return view('products.add', compact('htmlOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'id_Cate' => $request->id_Cate,

       ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'image_path', 'product');
        if(!empty($dataUploadFeatureImage)) {
            $dataProductCreate['image_path'] = $dataUploadFeatureImage['file_path'];
            $dataProductCreate['image_name'] = $dataUploadFeatureImage['file_name'];

        }

        $product = $this->product->create($dataProductCreate);

        if($request->hasFile('image')) {
            foreach($request->image as $itemFile) {
                $dataProductImageDetail = $this->uploadMutiple($itemFile, 'product');
                $product->images()->create([
                    'image' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name'],
                ]);
                

            }
        }

        if (!empty($request->tags)) {
            foreach ($request->tags as $tagItem) {
                $tagInstance = $this->size->firstOrCreate([
                    'name' => $tagItem
                ]);
                $tagListIds[] = $tagInstance->id; // Lưu trữ id của mỗi tag
            }
            $product->tags()->attach($tagListIds); // Gán tất cả các tag cho sản phẩm
        }
        return redirect()->route('products.index');
       }
       catch(Exception $ex) {
            DB::rollBack();
            Log::error('Message' . $ex->getMessage() . 'Line: ' . $ex->getLine());
       }

    }

    /**
     * Display the specified resource.
     */
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = $this->product->find($id);

        $htmlOptions = $this->getCategory($product->id_Cate); 
        return view('Products.edit', compact('htmlOptions', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
    
            $product = $this->product->find($id);
            if (!$product) {
                // Xử lý trường hợp không tìm thấy sản phẩm
            }
    
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'discount' => $request->discount,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'id_Cate' => $request->id_Cate,
            ];
    
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductUpdate['image_name'] = $dataUploadFeatureImage['file_name'];
            }
    
            $product->update($dataProductUpdate);
    
            if ($request->hasFile('image')) {
                $product->images()->delete(); // Xóa hình ảnh cũ của sản phẩm
                foreach ($request->image as $itemFile) {
                    $dataProductImageDetail = $this->uploadMutiple($itemFile, 'product');
                    if ($dataProductImageDetail) {
                        $product->images()->create([
                            'image' => $dataProductImageDetail['file_path'],
                            'image_name' => $dataProductImageDetail['file_name'],
                        ]);
                    }
                }
            }
    
            if (!empty($request->tags)) {
                $tagListIds = [];
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->size->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    $tagListIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagListIds);
            }
    
            DB::commit();
            return redirect()->route('products.index');
        } catch (Exception $ex) {
            DB::rollBack();
            // Xử lý ngoại lệ, ví dụ: ghi log hoặc hiển thị thông báo lỗi
        }
    }
    public function delete($id) {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], status:200);

            
        }
        catch(Exception $ex) {
            Log::error('Message' . $ex->getMessage() . 'Line: ' . $ex->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status:500);
        }
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_product $tb_product)
    {
        //
    }
    public function show() {
        $show = $this->product->latest()->get();
        return view('Users.home', compact('show'));
    }

    // public function addToCart(Request $request, $id)
    // {
    //     $product = $this->product->where('id',$id)->first();
    //     if($product != null) {
    //         $oldCart = Session('Cart') ? Session('Cart') : null ;
    //         $newCart = new Cart($oldCart);

    //         $newCart->addToCart($product, $id);

    //         $request->session()->put('Cart', $newCart);
            
    //     }
        
    //     return view('Users.cart');
      
    // }
 
    public function addToCart($id)
    {
       $product = $this->product->find($id);
       $cart = session()->get('Cart');
       if(isset($cart[$id])) {
        $cart[$id]['quantity'] = $cart[$id]['quantity'] +1 ;

       } else {
        $cart[$id] = [
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'image_path' => $product->image_path,
            'quantity' => 1
        ];
       }

       session()->put('Cart', $cart);
       return response()->json([
        'code' => 200,
        'message' => 'success',

       ], 200);
    }

    public function showCart() {
        $cart = session()->get('Cart');
        return view('Users.cart', compact('cart'));
    }

    public function updateToCart(Request $request) {
        if($request->id && $request->quantity) {
            $cart = session()->get('Cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('Cart', $cart);
            $totalProduct = $cart[$request->id]['price'] * $cart[$request->id]['quantity'];
            $subTotal = 0;
            foreach ($cart as $item) {
                $subTotal += $item['price'] * $item['quantity'];
            }
            $cart = session()->get('Cart');
            return response()->json([
                'totalProduct' => $totalProduct,
                'subTotal' => $subTotal
            ], 200);
        }
    }

    public function deleteCart(Request $request) {
        $productId = $request->id;
        $cart = session()->get('Cart');
        unset($cart[$productId]);
        session()->put('Cart', $cart); 
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item['price'] * $item['quantity'];
        }   
        return response()->json([
            'success' => true,
            'subTotal' => $subTotal
        ]);
    }

}

