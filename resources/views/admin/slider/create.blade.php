@extends('admin.layout.master')
@section('title', 'create | slider')
@section('content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm slider
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên slider</label>
                            <input type="text" name='slide_name' class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh slider</label>
                            <input type="file" name='slide_image' class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả slider</label>
                            <textarea name="slide_desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương slide"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">Thêm slider</button>
                    </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
