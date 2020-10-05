@extends('admin.layout.master')
@section('title','danh sach nguoi dung')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      danh sách người dùng
    </div>
   
    <div class="table-responsive">
      <div class="alert-secondary col-8" style="padding-left:20px; ">
      </div>
      @if(Session::has('massege'))
      <div class="alert-success alert">
        {{Session::get('massege')}}
      </div>
      @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>tên</th>
            <th>email</th>
            <th>quyền hạn</th>
            <th>ngày tạo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <form action="{{route('user.update',$user->id)}}" method="post">
              @csrf
              <td>
            	<input type="number" name="power" value="{{$user->power}}">

            	<input type="submit"  class="btn btn-default" value="cập nhật">
              </td>
            </form>
            <td>{{$user->created_at}}</td>
            <td>
              xoa
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-7 text-left">
         	<p>chú ý: quyền hạn khác 1,2 hoặc null <span class="text-danger">(người dùng bình thường)</span></p>
         	<p>chú ý: quyền hạn = 1 <span class="text-danger">(quản trị viên)</span></p>
        </div>
        <div class="col-sm-5 text-right text-center-xs">      
        {{$users->links()}}        
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
