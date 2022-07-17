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
  <h1>
    Todo List
  </h1>
  <div>
    <form action="{{ route('create') }}" method="post">
      @csrf
      @error('title')
      <p>{{$message}}</p>
      @enderror
      <input type="text" name="title">
      <button type="submit">追加</button>
    </form>
    <table>
      <tbody>
        <tr>
          <td>作成日</td>
          <td>タスク名</td>
          <td>更新</td>
          <td>削除</td>
        </tr>
      </tbody>
    </table>
    <div>
      @foreach($todos as $todo)
      <details>
        {{$todo->created_at}}
        {{$todo->title}}
        @csrf
        <button type="submit">更新</button>
        <form action="{{ route('delete', ['todoId' => $todo->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit">削除</button>
        </form>
      </details>
      @endforeach
    </div>
  </div>
</body>

</html>