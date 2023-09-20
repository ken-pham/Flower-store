@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật loài hoa và cây
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
                                @foreach($edit_species as $key => $species_edit_value)
                                <form role="form" action="{{URL::to('/update-species-product/'.$species_edit_value->species_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loài hoa</label>
                                    <input type="text" value="{{$species_edit_value->species_name}}" name="species_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả loài hoa</label>
                                    <textarea class="form-control" style="resize: none" rows="5" name="species_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"
                                    >{{$species_edit_value->species_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                
                                
                                <button type="submit" name="update_species" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                                @endforeach
                        </div>
                    </section>

            </div>
            
@endsection