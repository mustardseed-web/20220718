<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Document</title>
</head>

<body class="bgcolor">
  <div class="container">

    {{-- @if (Auth::check())
    <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
    @else --}}
    {{-- <p>ログインしてください。（<a href="/login">ログイン</a>｜
      <a href="/register">登録</a>）
    </p>
    @endif --}}


    <h1 class="title">
      Todo List
    </h1>
    <button type="button" onclick="location.href='{{ route('search_index') }}' ">タスク検索</button>
    <div>

      <form action="{{ route('create') }}" method="post">
        @csrf
        @error('title')
        <p>{{$message}}</p>
        @enderror
        {{-- todo入力欄 --}}
        <input type="text" name="title" size="90" class="text">
        <!--  カテゴリープルダウン -->
        <select class="form-control" id="category-id" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
        {{-- 追加ボタン --}}
        <button type="submit" class="add_btn">追加</button>
      </form>

      <table>
        <tr>
          <th class="column_created_at">作成日</th>
          <th class="column_created_at">タスク名</th>
          <th class="column_title">タグ</th>
          <th class="column_updated_at">更新</th>
          <th class="column_delete">削除</th>
        </tr>

        @foreach($todos as $todo)
        <tr>
          <th class="column_created_at">{{$todo->created_at}}</th>

          {{-- 更新ボタン --}}
          <th class="column_updated_at">
            <form action="{{ route('update', ['todoId' => $todo->id]) }}" method="post">
              @method('PUT')
              @csrf
              <input type="text" name="title" size="50" value="{{$todo->title}}" class="#">
              {{-- カテゴリー選択 --}}
              <select class="form-control" id="category-id" name="category_id">
                @foreach ($categories as $category)
                {{-- <option value="{{ $category->id }}">{{ $todo->category->category_name }}</option> --}}
                {{-- <option value="{{ $category->id }}" @if(old('category_id')==$todo->category->id) selected @endif>{{
                  $category->category_name }}</option> --}}
                <option value="{{ $category->id }}" @if(old('category_name')==$todo->category->category_name) selected
                  @endif>{{
                  $category->category_name }}</option>
                @endforeach
              </select>

              <button type="submit" class="update_btn">更新</button>
            </form>
          </th>
          {{-- 削除ボタン --}}
          <th class="column_delete">
            <form action="{{ route('delete', ['todoId' => $todo->id]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" class="delete_btn">削除</button>
            </form>
          </th>
        </tr>

        @endforeach
      </table>
    </div>
  </div>
</body>

</html>