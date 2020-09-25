@extends('admin.layout.master')
@section('title','danh muc bai viet')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      danh mục bài viết
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
            <th>tên danh mục</th>
            <th>tên slug</th>
            <th>ngày tạo</th>
            <th colspan="2" class="text-center">query</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $cate)
          {{-- <input type="hidden" value="{{ $brand->id }}"> --}}
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cate->name }}</td>
            <td>{{ $cate->slug }}</td>
            <td>{{ $cate->created_at }}</td>

            <td>
              <a class="btn btn-default" href="{{ route('the-loai-bai-viet.edit',$cate->id) }}" class="active" ui-toggle-class="">edit<i class="fa fa-check text-success text-active"></i>
            </td>
            <td>
              <form action="{{ route('the-loai-bai-viet.destroy',$cate->id) }}" method="post">
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
          {!! $datas->links() !!}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
