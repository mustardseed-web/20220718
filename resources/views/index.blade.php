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
    <div>
      <form action="{{ route('create') }}" method="post">
        @csrf
        @error('title')
        <p>{{$message}}</p>
        @enderror
        <input type="text" name="title" size="50" class="text">
        <button type="submit" class="add_btn">追加</button>
      </form>
      <table class="table">
        <tbody>
          <tr>
            <div>
              <td class="column_created_at">作成日</td>
            </div>
            <div>
              <td class="column_title">タスク名</td>
            </div>
            <div>
              <td class="column_updated_at">更新</td>
            </div>
            <div>
              <td class="column_delete">削除</td>
            </div>
          </tr>
        </tbody>
      </table>
      <div class="display_flex">
        @foreach($todos as $todo)
        <div class="todo-created_at">
          {{$todo->created_at}}
        </div>
        <div class="todo-title">
          <input type="text" name="title" size="50" class="#">
          {{$todo->title}}
        </div>
        <button type="submit">更新</button>
        <form action="{{ route('delete', ['todoId' => $todo->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit">削除</button>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</body>

</html>