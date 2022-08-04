@extends('layout.admin')
@section('main')

<div class="container-fluid">
<form action="" method="" class="form-inline" role="form">

<div class="form-group">
    <input class="form-control" name="key" placeholder="Input name" value="{{request()->key}}">
   
</div>

<select name="order" class="form-control" >
    <option value="">Sắp xếp</option>
    @foreach(config('options.order_option') as $key=>$value )
    <option value="{{$key}}" {{request()->order==$key ? 'selected' : ''}}>{{$value}}</option>
    @endforeach

</select>
<select name="status" class="form-control" >
    <option value="">Trạng thái</option>
    <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Hiện thị</option>
    <option value="0" {{request()->status == 0 ? 'selected' : ''}}>Đang ẩn</option>


</select>

 
<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
<a href="{{route('create1')}}" class="btn btn-warning ml-2"><i class="fas fa-plus"></i>Thêm mới</a>
</form>

    <h1>Danh sách</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>STATUS</th>
                <th>TOTAL PRODUCT</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $cat)
         
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->status==0 ? 'ẩn' : 'hiện' }}</td>
                <td>{{$cat->products->count()}}</td>
                <td>{{$cat->created_at->format('d-m-y')}}</td>
                <td>{{$cat->updated_at}}</td>
               
                <td>   <form action="{{route('delete1',$cat->id)}}" method="post">
                {{csrf_field()}} 
                @method('delete')
                <a href="{{route('edit1',$cat->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                <button onclick="return confirm('bạn có chắc ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                </td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
    {{$data->appends(request()->all())->links()}}
    </div>
</div>

@stop()       

     