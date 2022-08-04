@extends('layout.admin')
@section('title','Sản phẩm')
@section('main')

<div class="container-fluid">
<form action="" method="GET" class="form-inline" role="form">

    <div class="form-group">
        <input class="form-control" name="key" placeholder="Input name" value="{{request()->key}}">
       
    </div>
    
    <select name="order" class="form-control" >
        <option value="">Sắp xếp</option>
        @foreach(config('options.order_option') as $key=>$value )
        <option value="{{$key}}" {{request()->order== $key ? 'selected' : ''}}>{{$value}}</option>
        @endforeach

    </select>
    <select name="cat" class="form-control" >
        <option value="">Danh mục</option>
        @foreach($cats as $cat)
        <option value="{{$cat->id}}" {{request()->cat == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
        
        @endforeach
    </select>
    <select name="status" class="form-control" >
        <option value="">Trạng thái</option>
        <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Hiện thị</option>
        <option value="2" {{request()->status == 2 ? 'selected' : ''}}>Đang ẩn</option>

    </select>
    
     
    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    <a href="{{route('product.create')}}" class="btn btn-warning ml-2"><i class="fas fa-plus"></i>Thêm mới</a>
    <a href="javascript:void(0)" class="btn btn-danger btn-delete-all ml-2"><i class="fas fa-trash"></i>Xóa lựa chọn</a>
</form>
<hr>
        <h1>Danh sách</h1>
        <hr>
        <form action="{{route('product.deleteAll')}}" method="post" id="formDeleteAll">
        {{csrf_field()}} @method('delete')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th> <div class="icheck-success d-inline">
                        <input type="checkbox" id="check_all" >
                        <label for="check_all">
                        </label>
                      </div></th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PRICE/SALE PRICE</th>
                    <th>IMAGE</th>
                    <th>CATEGORY</th> 
                    <th>STATUS</th>
                    <th>CREATED AT</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $model)
                <tr>
                    <td>
                        <div class="icheck-success d-inline">
                        <input type="checkbox" name="id[]" value="[{{$model->id}}]" id="item-{{$model->id}}" class="check_item" >
                        <label for="item-{{$model->id}}">
                        </label>
                      </div>
                    </td>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{number_format($model->price)}}/ {{($model->sale_price)}}</td>
                    <td>
                        <img src="{{url('public/uploads')}}/{{$model->image}}" width="60">
                    </td>
                    <td>{{$model->cat->name}}</td>
                    <td>{{$model->status==0 ? 'ẩn' : 'hiện' }}</td>
                    <td>{{$model->created_at->format('d-m-y')}}</td>
                
                   
                    <td>  
                        <a class="btn btn-sm btn-primary" href="{{route('product.edit',$model->id)}}"><i class="fas fa-edit"></i></a>
                        <a href="{{route('product.destroy',$model->id)}}"   class="btn btn-sm btn-danger btn-single-delete"><i class="fas fa-trash"></i></a>  
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
        </form>
        <div class="text-center">
        {{$data->appends(request()->all())->links()}}
        </div>

</div>
<form action="" method="post" id="singleDelete">
{{csrf_field()}} @method('delete')
</from>
@stop() 
@section('css')
<link rel="stylesheet" href="{{url('public/admin/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@stop()   
@section('js')
<script>
        $('a.btn-delete-all').hide()
        $('input#check_all').click(function(){
        var isCheck = $(this).is(':checked');
        if(isCheck){
            $('input.check_item').prop('checked',true)
            $('a.btn-delete-all').show();
        }else{
            $('input.check_item').prop('checked',false)
            $('a.btn-delete-all').hide();
        }
    });
        
        $('input.check_item').click(function(){
        var isCheckLength = $('input.check_item:checked').length;
        if(isCheckLength >0) {
            $('a.btn-delete-all').show();

        }else{
            $('a.btn-delete-all').hide();
        }
    });

    $('a.btn-single-delete').click(function(ev){
        ev.preventDefault();
        var href = $(this).attr('href');
        $('form#singleDelete').attr('action',href);
        if(confirm('bạn có chắc khong?')){
            $('form#singleDelete').submit();
        }
        

    });
    $('a.btn-delete-all').click(function(ev){
        ev.preventDefault();
        $('form#formDeleteAll').submit()
    })
</script>
@stop()     

     