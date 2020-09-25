@extends('admin.layout.master')
@section('title','danh sach khach hang')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      danh sách khách hàng
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
            <th>tên khách hàng</th>
            <th>email</th>
            <th>địa chỉ</th>
            <th>số điện thoại</th>
            <th>ngày order</th>
            <th colspan="2" class="text-center">query</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $customer)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->updated_at }}</td>

            <td>
              <a class="btn btn-default" href="{{route('customer.showBill',$customer->id)}}" class="active" ui-toggle-class="">xem đơn hàng<i class="fa fa-check text-success text-active"></i>
            </td>
            <td>
	            <form action="" method="">
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
         
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          {!! $customers->links() !!}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
