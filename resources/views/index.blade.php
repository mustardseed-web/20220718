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
      {{-- 追加 --}}
      <form action="{{ route('create') }}" method="post">
        @csrf
        @error('title')
        <p>{{$message}}</p>
        @enderror
        <input type="text" name="title" size="90" class="text">
        <button type="submit" class="add_btn">追加</button>
      </form>
      {{-- 項目名 --}}
      <div class="display_flex column_margin">
        <p class="column_created_at">作成日</p>
        <p class="column_title">タスク名</p>
        <p class="column_tag">タグ</p>
        <p class="column_updated_at">更新</p>
        <p class="column_delete">削除</p>
      </div>

      @foreach($todos as $todo)
      <div class="display_flex todo_list_container">
        <div class="todo-created_at">
          {{$todo->created_at}}
        </div>
        <div class="todo-created_at">
          {{$todo->title}}
        </div>

        <!--  カテゴリープルダウン -->
        <div class="form-group">
          <label for="category-id">{{ __('カテゴリー') }}<span class="#">{{ __('必須') }}</span></label>
          <select class="form-control" id="category-id" name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
          </select>
        </div>

        {{-- put --}}
        <form action="{{ route('create', ['todoId' => $todo->id]) }}" method="post">
          @csrf
          <input type="text" name="title" size="50" value="{{$todo->title}}" class="#">
          <button type="submit" class="update_btn">更新</button>
        </form>

        {{-- delete --}}
        <form action="{{ route('delete', ['todoId' => $todo->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="delete_btn">削除</button>
        </form>
      </div>
      @endforeach
      {{-- 修正 --}}
    </div>
  </div>
</body>

</html>