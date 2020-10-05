@extends('admin.layout.master')
@section('title', 'edit | product')
@section('content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    chỉnh sửa sản phẩm
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('san-pham.update',$product->id) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name='name' value="{{$product->name}}" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="">giá gốc</label>
                            <input type="text" name='unit_price' value="{{$product->unit_price}}" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="">Giá khuyến mãi</label>
                            <select name="promotion" class="form-control input-sm m-bot15">
                                <option value="0">0%</option>
                                <option value="10">10%</option>
                                <option value="25">25%</option>
                                <option value="50">50%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" name='image' class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label for="">mô tả sản phẩm</label>
                            <textarea name="desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương hiệu sản phẩm">{{$product->desc}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">danh mục sản phẩm</label>

                            <select name="cate" class="form-control input-sm m-bot15">
                                @foreach($cates as $key => $value)
                                @if($value == $product->cate_id)
                                <option selected value="{{ $value }}">{{ $key }}</option>
                                @esle
                                <option value="{{ $value }}">{{ $key }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">thương hiệu sản phẩm</label>

                            <select name="brand" class="form-control input-sm m-bot15">
                                @foreach($brands as $key => $value)
                                @if($value == $product->brand_id)
                                <option selected value="{{ $value }}">{{ $key }}</option>
                                @else
                                <option value="{{ $value }}">{{ $key }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control input-sm m-bot15">
                            	
                                <option value="0">ẩn</option>
                                <option  value="1">hiển thị</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">nội dung sản phẩm</label>
                            <textarea rows='5' name="content" id="editor" rows="5" style="resize: none;" class="form-control"  placeholder="nội dung sản phẩm">{!!$product->content!!}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">sửa sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>

<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
