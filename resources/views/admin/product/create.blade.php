@extends('layout.admin')
@section('title','thêm mới sản phẩm')
@section('main')
   <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <h2>
          </h2>
            <div class='col-12'>
             <!-- /.card -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">THEM MOI DANH MUC</h3>
            
              </div>
              <form class="form-horizontal" method = "POST" action="{{route('product.store')}}" enctype="multipart/form-data" > 
              {{csrf_field()}}
              <div class="card-body row">
                 <div class="col-8">
                      <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Ten San Pham</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{old('name')}}">
                            @error('name')
                      <small>{{$message}}</small>
                      @enderror
                          </div>
                      </div>
                        
                      <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">Mieu Ta</label>
                          <div class="col-sm-10">
                            <textarea class="form-control ngu" name="content" row="3" 
                                placeholder="Nội dung miêu tả" >{{old('content')}}</textarea>@error('content')
                      <small>{{$message}}</small>
                      @enderror
                          </div>
                          
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-3">Ảnh khác</label>
                          <input class="col-sm-9 " type="file" name="other_image[]" multiple>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Gia</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Price" name="price" value="{{old('price')}}">
                        @error('price')
                      <small>{{$message}}</small>
                      @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Gia KM</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Price" name="sale_price" value="{{old('sale_price')}}">
                        @error('sale_price')<small >{{$message}}</small> @enderror
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Danh Muc</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="category_id">
                        <option value="">Chon mot ...</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected' : ''}}>{{$cat->name}}
                        </option>
                        @endforeach
                        </select>
                        @error('category_id')
                      <small>{{$message}}</small>
                      @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                          <label class="col-sm-3">Status</label>
                          <input class="col-sm-9 " type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-3"></div>  
                      <div class="col-sm-9">
                      <span class="btn btn-success col fileinput-button ">
                        <i class="fas fa-plus"></i>
                        <span>Chọn ảnh</span>
                      </span>
                      @error('upload')
                      <small class="help-block">{{$message}}</small>
                      @enderror
                      <img class="mt-3" src="https://thumbs.dreamstime.com/b/no-image-available-icon-photo-camera-flat-vector-illustration-132483141.jpg" id="show_img" style="width:100%">
                        <input type="file" class="form-control" id="select_file" placeholder="Images" name="upload" style="display:none"/>
                      </div>
                    </div>
                </div>
              </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">THEM</button>
                  <a href="{{route('index1')}}" type="button" class="btn btn-default float-right">THOAT</a>
                </div>
                <!-- /.card-footer -->
              </form>
          
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

@stop()   
@section('css')
<link rel="stylesheet" href="{{url('public/admin/plugins')}}/summernote/summernote.min.css">
<link rel="stylesheet" href="{{url('public/admin/plugins')}}/select2/css/select2.min.css">
@stop()

@section('js')
<script src="{{url('public/admin/plugins')}}/summernote/summernote.min.js"></script>
<script src="{{url('public/admin/plugins')}}/select2/js/select2.full.min.js"></script>
<script src="{{url('public/admin/plugins')}}/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $('.ngu').summernote({
      height : 150
    });

    $('.select2').select2()
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $('.fileinput-button').click(function() {
      $('#select_file').click();
    })
    $('#select_file').change(function(){
      var file = $(this)[0].files[0];

      var reader = new FileReader();

      reader.onload =function(ev){
        console.log(ev.target.result)
        $('img#show_img').attr('src',ev.target.result)
      }
      reader.readAsDataURL(file);
    })
</script>
@stop()