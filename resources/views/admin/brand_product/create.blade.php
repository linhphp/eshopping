@extends('admin.layout.master')
@section('title','Create | beand')
@section('content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mới thương hiệu sản phẩm
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
                    <form class="form-horizontal bucket-form" action="{{ route('thuong-hieu-san-pham.store') }}" method="post">
                      @method('post')
                      @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">tên thương hiệu</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                        <button class="btn btn-success" type="submit">thêm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection