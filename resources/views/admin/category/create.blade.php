@extends('layout.admin')
@section('main')
<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Muc  <a href="" type="button" class="btn btn-info">THEM MOI</a></h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
            <div class="col-md-6">
             <!-- /.card -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">THEM MOI DANH MUC</h3>
         
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method = "POST" action="{{route('store1')}}"> 
              {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ten Danh Muc</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name">
                      @error('name')
                      <small>{{$message}}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="form-check col-sm-4 ">
                            <input type="radio" class="form-check-input" id="status" name="status" value="1">
                            <label class="form-check-label" for="status">hiện</label>
                        </div>
                        <div class="form-check col-sm-4 ">
                            <input type="radio" class="form-check-input" id="statusb" name="status" value="0">
                            <label class="form-check-label" for="statusb">ẩn</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">THEM</button>
                  <a type="button" class="btn btn-default float-right">THOAT</a>
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
  </div>
  <!-- /.content-wrapper -->
  @stop()      