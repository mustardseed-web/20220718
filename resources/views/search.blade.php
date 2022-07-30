<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Document</title>
</head>

<body>
  <h1 class="title">
    タスク検索
  </h1>
  {{-- //* 検索機能ここから *// --}}
  <!--入力-->
  <form action="{{ route('search') }}" method="GET">
    <input type="text" name="searchWord">
    <input type="submit" value="検索">

    <!--  カテゴリープルダウン -->
    <div class="form-group">
      <select class="form-control" id="category-id" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>
  </form>

  <table>
    <tr>
      <th class="column_created_at">作成日</th>
      <th class="column_created_at">タスク名</th>
      <th class="column_title">タグ</th>
      <th class="column_updated_at">更新</th>
      <th class="column_delete">削除</th>
    </tr>
  </table>

  <!--検索結果テーブル 検索された時のみ表示する-->
  @if (!empty($posts))
  <div class="#">
    <table class="#">
      @foreach($posts as $post)
      @foreach($todos as $todo)
      <tr>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category_name }}</td>
        <td>
          {{-- 更新ボタン --}}
          <form action="{{ route('update', ['todoId' => $todo->id]) }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="title" size="50" value="{{$todo->title}}" class="#">
            <button type="submit" class="update_btn">更新</button>
          </form>
          {{-- 削除ボタン --}}
        <td class="column_delete">
          <form action="{{ route('delete', ['todoId' => $todo->id]) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="delete_btn">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
      @endforeach
    </table>
    @else
    <p>見つかりませんでした。</p>
    @endif
  </div>

  <a href="{{ url('/') }}">戻る</a>

</body>

</html>