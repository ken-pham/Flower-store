@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách đơn hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th>Mã đơn hàng </th>
            <th>Khách hàng </th>
            <th>Tổng Tiền</th>
            <th>Ngày giao hàng</th>
            <th>Thời gian giao hàng</th>
            <th>Ghi chú</th>
            <th>Tình trạng đơn hàng</th>
            <th>Trạng Thái đơn hàng</th>
            <th>Chi tiết đơn hàng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
          
          <tr>
          
            
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            
            <td>{{ $order-> order_id }}</td>
            @foreach($customers as $key => $customer)
              @if($customer-> custom_id == $order-> custom_id)
                  <td>{{$customer-> custom_name}}</td>
              @endif
            @endforeach
            
            <td>{{ $order->order_total.'VND' }}</td>
            @foreach($shippings as $key => $shipping)
              @if($shipping->shipping_id == $order->shipping_id)
                <td>{{ $shipping->shipping_date }}</td>
                <td>{{ $shipping->shipping_time }}</td>
                <td>{{ $shipping->shipping_note }}</td>
                <td>{{ $shipping->trang_thai }}</td>
              @endif
            @endforeach
            <?php
            if( $order-> order_status == 0)
            {
            ?>
            <td>Đang chuẩn bị</td>
            <?php
            }else{
            ?>
            <td>Đang giao hàng</td>
            <?php
            }
            ?>
            
            <td><a href="{{URL::to('/chi-tiet/'.$order-> order_id )}}">Xem</a></td>
          </tr>
         
          @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
   
@endsection