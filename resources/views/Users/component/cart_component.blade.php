<div class="container-fluid pt-5" id="listCart">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Id</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                  <?php 
                      $subTotal = 0;
                      $count = 0; 
                  ?>
                  @if(Session::has('Cart') != null) 
                  @foreach($cart as $id => $item)
                  <?php
                      $totalProduct = $item['price']  * $item['quantity'];
                      $subTotal += $totalProduct;
                      $count++;
                  ?>
                    <tr id="row_{{$id}}">
                        <td>{{$count}}</td>
                        <td class="align-middle" style="text-align: left;"><img src="{{$item['image_path']}}" alt="" style="width: 50px;">{{$item['name']}}</td>
                        <td class="align-middle">${{number_format($item['price'])}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                
                                <input type="number" data-id="{{$id}}" id="quantity_{{$id}}"  class="form-control form-control-sm bg-secondary text-center" value="{{$item['quantity']}}">
                            
                            </div>
                        </td>
                        <td class="align-middle" id="total_{{$id}}">{{number_format($totalProduct)}}</td>
                        <td class="align-middle"><button class="btn btn-sm btn-primary btn-delete" data-id="{{$id}}"><i class="fa fa-times"></i></button></td>
                    </tr>
                  @endforeach
                     
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">             
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng giá trị</h6>
                        <h6 class="font-weight-medium" id="subTotal">{{number_format($subTotal)}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí ship</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{number_format($subTotal)}}</h5>
                    </div>
                    <a href="{{ route('Checkout.index') }}" class="btn btn-block btn-primary my-3 py-3">THANH TOÁN</a>
                </div>
            </div>
        </div>
    </div>
</div>