@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <?php
                            use Illuminate\Support\Facades\Session;
		                    $message = Session::get('message');
		                    if($message){
			                    echo '<span class="text-alert">'.$message.'</span>';
			                    Session::put('message',null);
		                    }
	                    ?>
                        <div class="panel-body">
                        
                            <div class="position-center">
                                @foreach($edit_event as $key => $editevent_value)
                                <form role="form" action="{{URL::to('/update-event-product/'.$editevent_value->event_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sự kiện</label>
                                    <input type="text" value="{{$editevent_value->event_name}}" name="event_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sự kiện">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sự kiện</label>
                                    <textarea class="form-control" style="resize: none" rows="5" name="event_product_desc" id="exampleInputPassword1" placeholder="Mô tả sự kiện"
                                    >{{$editevent_value->event_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                
                                
                                <button type="submit" name="update_event" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                                @endforeach
                        </div>
                    </section>

            </div>
            
@endsection