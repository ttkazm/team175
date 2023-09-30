@extends('layouts.app')
 
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>

              @endforeach
        </ul>
    </div>
@endif

 
<!-- 商品一覧表示 -->
<div class="panel panel-default">
    <div class="panel-heading">
    <h4>商品一覧画面</h4>
    </div>

    <!-- TODO:商品登録ボタン -->
    <div class="position-absolute top-10 end-0"><button class="submit"><a href="/store">商品登録</a></button></div>

    <br>
    <br>

    <!-- 検索画面 -->
    <form action="{{ url('/search') }}" method="post">
    @csrf
        <input type="text" name="keyword" class="form-control" placeholder="keyword" value="{{ request('keyword') }}">
        <button class="submit">検索</button>
    </form>

    <div class="panel-body">
        <table class="table table-striped item-table">
 
            <!-- テーブルヘッダ -->
            <thead>
                <th>ID</th>
                <th>名前</th>
                <th>種別</th>
                <th>詳細</th>
            </thead>
 
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($results as $result)
                <tr>
                    <td class="table-text">{{ $result->id }}</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->type_name }}</td>
                        <td>{{ $result->detail }}</td>
                        <td><button class="btn btn-default"><a href="/edit/{{ $result->id }}">商品詳細</a></button></td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection