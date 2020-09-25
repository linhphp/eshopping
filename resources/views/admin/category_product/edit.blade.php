@extends('admin.layout.master')
@section('title','Create | category')
@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
            
      
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                chỉnh sửa danh mục sản phẩm
            </header>
            @if(Session::has('massege'))
              <div class="alert-success alert">
                {{ Session::get('massege') }}
              </div>
            @endif
            <div class="panel-body">
              @if(count($errors) > 0)
              <div class="row">
                <div class="col-8">
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $er)
                    {{ $er }} <br>
                    @endforeach
                  </div>
                  
                </div>
              </div>
              @endif
                <form class="form-horizontal bucket-form" action="{{ route('danh-muc-san-pham.update',$cate->id) }}" method="post">
                  @method('PATCH')
                  @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label">tên danh mục</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="{{ $cate->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">mô tả ngắn</label>
                        <div class="col-sm-6">
                            <textarea type="text" name="desc" class="form-control">{{ $cate->desc }} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                    <button class="btn btn-success" type="submit">sửa đổi</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

       
        </div>
        </div>

        

        <!-- page end-->
        </div>
@endsection