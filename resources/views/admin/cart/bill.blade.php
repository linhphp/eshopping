@extends('admin.layout.master')
@section('title','danh sach don hang')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      danh sách đơn hàng
    </div>
   
    <div class="table-responsive">
      <div class="alert-secondary col-8" style="padding-left:20px; ">
      </div>
      <div class="alert-success alert">
        <p >Thông tin KH: <span> {{$customer->name}} </span></p>
      </div>
      @if(Session::has('massege'))
      <div class="alert-success alert">
        {{Session::get('massege')}}
      </div>
      @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>kiểu thanh toán</th>
            <th>tổng tiền</th>
            <th>ghi chú</th>
            <th colspan="2" class="text-center">trạng thái</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($bills as $bill)
          <tr>
            <td>{{$bill['payment']}}</td>
            <td>{{$bill['total_price']}}</td>
            <form action="{{route('bill.update',$bill['id'])}}" method="post">
              @csrf
              <td>{{$bill['note']}}</td>
              <td>
                <select name="status" id="" class="form-control">
                  <option value="{{$bill['status']}}">{{$bill['status']}}</option>
                  <option value="Đang giao hàng">Đang giao hàng</option>
                  <option value="Đã giao hàng">Đã giao hàng</option>
                  <option value="Huỷ Bỏ">Huỷ bỏ</option>
                </select>
              </td>
              <td><input type="submit"  class="btn btn-default" value="cập nhật"></td>
            </form>

            
            <td>
              <a href="{{route('bill.detail',$bill['id'])}}" class="btn btn-default">chi tiết</a>
            </td>
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
