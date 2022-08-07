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
        タスク検索
      </h1>
      <form action="{{ route('logout') }}" method="post" class="logput_button_position">
        @csrf
        <span>「{{ auth()->user()->name }}」でログイン中</span>
        <input class="lg_btn" type="submit" value="ログアウト">
      </form>
    </div>

    <div class="sub_container">
      {{-- //* 検索機能ここから *// --}}
      <form action="{{ route('search') }}" method="get" class="display_flex">
        @csrf
        <!--入力欄-->
        <input type="text" name="searchWord" size="100" class="search_textbox">
        <!--  カテゴリープルダウン -->
        <div class="form-group">
          <select class="search_category" id="category_id" name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            {{-- <option value="{{ $category->id }}" @if($category->id==$todo->category->id) selected @endif>{{ --}}
              $category->category_name }}</option>
            @endforeach
          </select>
        </div>
        {{-- 検索ボタン --}}
        <input type="submit" value="検索" class="serach_button_sample">
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

      <!--検索結果テーブル 検索された時のみ表示する-->
      @if (!empty($posts))
      <div class="#">
        <table class="#">
          @foreach($posts as $post)
          <tr>
            <td>{{ $post->created_at }}</td>
            <td>
              <form action="{{ route('searchUpdate', ['postId' => $post->id]) }}" method="post">
                @method('PUT')
                @csrf
                <!--  更新内容入力欄 -->
                <input type="text" name="title" size="50" value="{{$post->title}}" class="#">
                <!--  カテゴリープルダウン -->
                <select class="form-control" id="category_id" name="category_id">
                  @foreach ($categories as $category)
                  {{-- $category->idはカテゴリーテーブルのid --}}
                  {{-- $post->category->idは検索結果のレコードに紐づくカテゴリーid --}}
                  <option value="{{ $category->id }}" @if($category->id==$post->category->id) selected @endif>{{
                    $category->category_name }}</option>
                  @endforeach
                </select>
                @endforeach
                <!--  更新ボタン -->
                <button type="submit" class="update_btn">更新</button>
              </form>
            <td class="column_delete">
              {{-- 削除機能 --}}
              <form action="{{ route('searchDelete', ['postId' => $post->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <!--  削除ボタン -->
                <button type="submit" class="delete_btn">削除</button>
              </form>
            </td>
          </tr>
        </table>
        {{-- @else
        <p>見つかりませんでした。</p> --}}
        @endif
        <a href="{{ url('/') }}">戻る</a>
      </div>

</body>

</html>