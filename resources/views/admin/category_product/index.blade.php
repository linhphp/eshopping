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
            <th>tên danh mục</th>
            <th>mô tả ngắn</th>
            <th>Date</th>
            <th colspan="2" class="text-center">query</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cates as $cate)
          <input type="hidden" value="{{ $cate->id }}">
          <tr>
            <td>{{ $cate->name }}</td>
            <td>{{ $cate->desc }}</td>
            <td>{{ $cate->created_at }}</td>

            <td>
              <a class="btn btn-default" href="{{ route('danh-muc-san-pham.edit',$cate->id) }}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i>
            </td>
            <td>
            	<form action="{{ route('danh-muc-san-pham.destroy',$cate->id) }}" method="post">
            		@method('DELETE')
            		@csrf
            		<button class="btn btn-default"><i class="fa fa-times text-danger text"></i></a></button>
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
          {!! $cates->links() !!}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
