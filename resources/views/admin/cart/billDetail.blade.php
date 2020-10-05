@extends('admin.layout.master')
@section('title','danh sach don hang')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      đơn hàng chi tiết
    </div>
   
    <div class="table-responsive">
      <div class="alert-secondary col-8" style="padding-left:20px; ">
      </div>
      <div class="alert-success alert">
        <p >Thông tin KH: <span> {{$customer['name']}} </span></p>
      </div>
      @if(Session::has('massege'))
      <div class="alert-success alert">
        {{Session::get('massege')}}
      </div>
      @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>tên sản phẩm</th>
            <th>số lượng</th>
            <th>đơn giá</th>
            <th>thành tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($billDetails as $billDetail)
          <tr>
            <td>{{$billDetail->name}}</td>
            <td>{{$billDetail->quantity}}</td>
            <td>{{number_format($billDetail->promotion_price)}} VNĐ
            </td>
            <td>{{number_format($billDetail->price)}} VNĐ</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
