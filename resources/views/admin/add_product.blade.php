@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gía sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="number" name="soluong" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" style="resize: none" rows="5" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục hoa</label>
                                    <select name="cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key =>$cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                     </select>
                                <label for="exampleInputPassword1">Danh mục sự kiện</label>
                                    <select name="event" class="form-control input-sm m-bot15">
                                        @foreach($event_product as $key =>$cate1)
                                            <option value="{{$cate1->event_id}}">{{$cate1->event_name}}</option>
                                        @endforeach
                                     </select>
                                <label for="exampleInputPassword1">Lòai hoa và cây</label>
                                    <select name="species" class="form-control input-sm m-bot15">
                                        @foreach($species_product as $key =>$cate2)
                                            <option value="{{$cate2->species_id}}">{{$cate2->species_name}}</option>
                                        @endforeach
                                     </select>
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiên thị</option>
                                    
                                     </select>
                                </div>
                                
                                <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
@endsection