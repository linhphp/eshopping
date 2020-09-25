@extends('admin.layout.master')
@section('title','tat ca bai viet')
@section('content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      tất cả bài viết
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
            <th>tiêu đề</th>
            <th>nguồn</th>
            <th>thể loại</th>
            <th>image</th>
            <th>ngày tạo</th>
            <th colspan="2" class="text-center">query</th>
          </tr>
        </thead>
        <tbody>
          @foreach($datas as $news)
          {{-- <input type="hidden" value="{{ $brand->id }}"> --}}
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->source }}</td>
            <td>{{ $news->cate_name }}</td>
            <td><img width="50" height="50" src="upload/news/{{$news->image}}" alt=""></td>
            <td>{{$news->created_at}}</td>

            <td>
              <a class="btn btn-default" href="{{ route('bai-viet.edit',$news->id) }}" class="active" ui-toggle-class="">edit<i class="fa fa-check text-success text-active"></i>
            </td>
            <td>
              <form action="{{ route('bai-viet.destroy',$news->id) }}" method="post">
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
