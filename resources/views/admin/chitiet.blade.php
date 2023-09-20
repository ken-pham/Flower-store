@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default" style="height: 1000px; font-size:small;">
    <div class="panel-heading">
    Chi tiết đơn hàng

    <div class="row w3-res-tb" style="font-size:small;">
    @foreach($orders as $key => $order)
      <div align ="left" class="col-sm-4 m-b-xs">
            @foreach($customers as $key => $customer)
              @if($customer-> custom_id == $order-> custom_id)
                  <label for="">Người đặt</label> 
                  <span>{{$customer->custom_name}}</span><br>
                  <label for="">Số điện thoại</label>
                  <span>{{$customer->custom_phone}}</span><br>
              @endif
            @endforeach
            @foreach($shippings as $key => $shipping)
              @if($shipping->shipping_id == $order->shipping_id)
                    <label for="">Trạng thái</label>
                    <span>{{$shipping->trang_thai}}</span><br>
                    
                    
                    @endif
            @endforeach          
      </div>
      <div align ="left" class="col-sm-4">
      @foreach($shippings as $key => $shipping)
              @if($shipping->shipping_id == $order->shipping_id)
                    <label for="">người nhận</label>
                    <span>{{$shipping->shipping_name}}</span><br>
                    <label for="">Số điện thoại</label>
                    <span>{{$shipping->shipping_phone}}</span><br>
                    <label for="">địa chỉ email</label>
                    <span>{{$shipping->shipping_email}}</span><br>
                    
                    @endif
            @endforeach
      </div>
      <div align ="left" class="col-sm-4">
            @foreach($shippings as $key => $shipping)
              @if($shipping->shipping_id == $order->shipping_id)
                    <label for="">Địa chỉ</label>
                    <span>{{$shipping->shipping_address}}</span><br>
                    <label for="">Ngày giao</label>
                    <span>{{$shipping->shipping_date}}</span><br>
                    <label for="">Thời gian giao</label>
                    <span>{{$shipping->shipping_time}}</span><br>
                    
              @endif
            @endforeach
      </div>
      
    @endforeach
    </div>
    <div class="table-responsive">
      <?php 
        use Illuminate\Support\Facades\Session;
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm </th>
            <th>Hình ảnh </th>
            <th>Đơn giá</th>
            <th>Số lượng mua</th>
            
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($order_pro as $key => $pro)
          
          <tr>
          
            
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            
            <td>{{ $pro-> product_name }}</td>
            @foreach($products as $key => $product)
              @if($product-> product_id == $pro-> product_id)
                  <td><img src="{{URL::to('/public/uploads/product/'.$product->product_image)}}" alt="" height="100" width="100" /></td>
              @endif
            @endforeach
            
            <td>{{number_format($pro->product_price).' VND'}}</td>
            
            <td>{{ $pro->product_qty }}</td>
            
                
            
            
          </tr>
         
          @endforeach
          
        </tbody>
      </table>
    </div>
    
  </div>
  
</div>
  
@endsection