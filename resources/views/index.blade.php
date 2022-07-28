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
    <h1 class="title">
      Todo List
    </h1>
    <button type="button" onclick="location.href='{{ route('search_index') }}' ">タスク検索</button>
    <div>
      <!--  カテゴリープルダウン -->
      <div class="form-group">
        <select class="form-control" id="category-id" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
      {{-- 追加ボタン --}}
      <form action="{{ route('create') }}" method="post">
        @csrf
        @error('title')
        <p>{{$message}}</p>
        @enderror
        <input type="text" name="title" size="90" class="text">
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
          <th class="column_title">{{$todo->title}}</th>
          <th class="column_category">{{$todo->category}}</th>

          <!--  カテゴリープルダウン -->
          <div class="form-group">
            <select class="form-control" id="category-id" name="category_id">
              @foreach ($categories as $category)
              <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
              @endforeach
            </select>
          </div>

          <th class="column_updated_at">
            <form action="{{ route('create', ['todoId' => $todo->id]) }}" method="post">
              @csrf
              <input type="text" name="title" size="50" value="{{$todo->title}}" class="#">
              <button type="submit" class="update_btn">更新</button>
            </form>
          </th>

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