@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{URL::to('/save-species-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loài hoa</label>
                                    <input type="text" name="species_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả loài hoa</label>
                                    <textarea class="form-control" style="resize: none" rows="5" name="species_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="species_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiên thị</option>
                                    
                                     </select>
                                </div>
                                
                                <button type="submit" name="add_species" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
@endsection