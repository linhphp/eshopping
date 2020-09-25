@extends('admin.layout.master')
@section('title','danh muc san pham')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      danh mục sản phẩm
    </div>
   
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>tên thương hiệu</th>
            <th>mô tả ngắn</th>
            <th>Date</th>
            <th colspan="2" class="text-center">query</th>
          </tr>
        </thead>
        <tbody>
          @foreach($brands as $brand)
          {{-- <input type="hidden" value="{{ $brand->id }}"> --}}
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->desc }}</td>
            <td>{{ $brand->created_at }}</td>

            <td>
              <a class="btn btn-default" href="{{ route('thuong-hieu-san-pham.edit',$brand->id) }}" class="active" ui-toggle-class="">edit<i class="fa fa-check text-success text-active"></i>
            </td>
            <td>
              <form action="{{ route('thuong-hieu-san-pham.destroy',$brand->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-default">delete<i class="fa fa-times text-danger text"></i></a></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {!! $brands->links() !!}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
