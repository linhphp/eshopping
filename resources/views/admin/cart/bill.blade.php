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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>kiểu thanh toán</th>
            <th>tổng tiền</th>
            <th>ghi chú</th>
            <th>trạng thái</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($bills as $bill)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$bill['payment']}}</td>
            <td>{{$bill['total_price']}}</td>
            <form action="{{route('bill.update',$bill['id'])}}" method="post">
              @csrf
            <td><input type="text" name="note" value="{{$bill['note']}}"></td>
            <td>
              <input type="text" name="status" value="{{$bill['status']}}">
            <input type="submit"  class="btn btn-default" value="cập nhật">
            </form>
            </td>

            
            <td>
              <a href="{{route('bill.detail',$bill['id'])}}" class="btn btn-default">chi tiết<i class="fa fa-check text-success text-active"></i></a>
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
