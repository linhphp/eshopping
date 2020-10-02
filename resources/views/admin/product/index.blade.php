@extends('admin.layout.master')
@section('title','san pham')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Responsive Table
    </div>
    <div class="row w3-res-tb">
      
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">search!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>giá gốc</th>
            <th>giá khuyến mãi</th>
            <th>hình ảnh</th>
            <th>trạng thái</th>
            <th>số lượng</th>
            <th colspan="2" class="text-center">query</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->unit_price}}</td>
            <td>{{$product->promotion_price}}</td>
            <td><img src="upload/product/{{$product->image}}" width="50" height="50" alt=""></td>
            <!-- hien thi trang thai -->
            <td>
              @if($product->status == 1)
                <a href="{{route('unActive',$product->id)}}" style="color: darkred; font-size: 30px;" class="fa fa-thumbs-up"></a>
              @else
                <a href="{{route('active',$product->id)}}" style="color: darkblue; font-size: 30px;" class="fa fa-thumbs-down"></a>
              @endif
            </td>
            <!-- hien thi so luong -->
            <td>{{$product->quantity}}</td>
            <td>
              <a class="btn btn-default" href="{{ route('san-pham.edit',$product->id) }}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i>
            </td>
            <td>
            	<form action="{{route('san-pham.destroy',$product->id)}}" method="post">
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
          {!! $products->links() !!}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection