@extends('admin.layout.master')
@section('title', 'create | news')
@section('content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài viết
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('bai-viet.store') }}" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                        <div class="form-group">
                            <label for="">tiêu đề:</label>
                            <input type="text" name='title' class="form-control" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="">nguồn:</label>
                            <input type="text" name='source' class="form-control" placeholder="Enter source">
                        </div>
                         <div class="form-group">
                            <label for="">hình ảnh:</label>
                            <input type="file" name='image' class="form-control" placeholder="Enter image">
                        </div>
                        
                        <div class="form-group">
                            <label for="">mô tả: </label>
                            <textarea name="desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương hiệu sản phẩm"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">thể loại:</label>

                            <select name="cate" class="form-control input-sm m-bot15">
                                @foreach($cates as $key => $value)
                                <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">nội dung:</label>
                            <textarea rows='5' name="content" id="editor" rows="5" style="resize: none;" class="form-control"  placeholder="nội dung sản phẩm"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">thêm sản phẩm</button>
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
