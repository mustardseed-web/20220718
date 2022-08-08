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
    <div class="header_title_button">
      <h1 class="title">
        Todo List
      </h1>
      <form action="{{ route('logout') }}" method="post" class="logout_button_position">
        @csrf
        <span>「{{ auth()->user()->name }}」でログイン中</span>
        <input class="lg_btn" type="submit" value="ログアウト">
      </form>
    </div>
    <button class="atag_search_button" type="button"
      onclick="location.href='{{ route('search_index') }}' ">タスク検索</button>

    <div class="sub_container">
      <form action="{{ route('create') }}" method="post">
        @csrf
        @error('title')
        <p>{{$message}}</p>
        @enderror
        {{-- todo入力欄 --}}
        <input type="text" name="title" size="100" class="text">
        <!--  カテゴリープルダウン -->
        <select class="add_category" id="category-id" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
        {{-- 追加ボタン --}}
        <button type="submit" class="add_btn">追加</button>
      </form>

      <div class="todo_list_container">
        <table>
          <tr>
            <th class="th_created_at">作成日</th>
            <th class="th_task_name">タスク名</th>
            <th class="th_category">タグ</th>
            <th class="th_updated_at">更新</th>
            <th class="th_delete">削除</th>
          </tr>
      </div>

      @foreach($todos as $todo)
      <tr class="todo_list">
        <td class="column_created_at">{{$todo->created_at}}</td>
        {{-- 更新ボタン --}}
        <form action="{{ route('update', ['todoId' => $todo->id]) }}" method="post">
          @method('PUT')
          @csrf
          <td>
            {{-- タスク入力欄 --}}
            <input type="text" name="title" size="30" value="{{$todo->title}}" class="todo_task_name">
          </td>

          <td>
            {{-- カテゴリー選択 --}}
            <select class="column_category" id="category-id" name="category_id">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" @if($category->id==$todo->category->id) selected @endif>{{
                $category->category_name }}</option>
              @endforeach
            </select>
          </td>

          <td>
            {{-- 更新ボタン --}}
            <button type="submit" class="update_btn">更新</button>
          </td>
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
      </table>
    </div>
  </div>
</body>

</html>