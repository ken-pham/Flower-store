@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                            use Illuminate\Support\Facades\Session;
		                    $message = Session::get('message');
		                    if($message){
			                    echo '<span class="text-alert">'.$message.'</span>';
			                    Session::put('message',null);
		                    }
	                    ?>
                            <div class="position-center">
                                @foreach($edit_product as $key =>$pro )
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro -> product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro -> product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="number" name="soluong" class="form-control" id="exampleInputEmail1" value="{{$pro -> soluong}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea class="form-control" style="resize: none" rows="5" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm">{{$pro -> product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key =>$cate)
                                            @if($cate -> category_id == $pro ->category_id)
                                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                <label for="exampleInputPassword1">Sự kiện</label>
                                    <select name="event" class="form-control input-sm m-bot15">
                                        @foreach($event_product as $key =>$cate1)
                                            @if($cate1 -> event_id == $pro ->event_id)
                                                <option selected value="{{$cate1->event_id}}">{{$cate1->event_name}}</option>
                                            @else
                                                <option value="{{$cate1->event_id}}">{{$cate1->event_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                <label for="exampleInputPassword1">Loài hoa và cây</label>
                                    <select name="species" class="form-control input-sm m-bot15">
                                        @foreach($species_product as $key =>$cate2)
                                            @if($cate2 -> species_id == $pro ->species_id)
                                                <option selected value="{{$cate2->species_id}}">{{$cate2->species_name}}</option>
                                            @else
                                                <option value="{{$cate2->species_id}}">{{$cate2->species_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>     
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiên thị</option>
                                    
                                     </select>
                                </div>
                                
                                <button type="submit" name="add_category" class="btn btn-info">Cập nhật</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
            
@endsection