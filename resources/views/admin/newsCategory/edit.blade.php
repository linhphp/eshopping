@extends('admin.layout.master')
@section('title','Edit | News-Category')

@section('content')
<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
            
      
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                chỉnh sửa thể loại bài viết
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
                <form class="form-horizontal bucket-form" action="{{ route('the-loai-bai-viet.update',$data->id) }}" method="post">
                  @method('PATCH')
                  @csrf
                    <div class="form-group">
                        <label class="col-sm-3 control-label">tên danh mục</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                    <button class="btn btn-success" type="submit">lưu thay đổi</button>
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