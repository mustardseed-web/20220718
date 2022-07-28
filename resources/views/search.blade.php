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
  <div>
    <form action="{{ route('search') }}" method="GET">
      <input type="text" name="keyword">
      <!--  カテゴリープルダウン -->
      <div class="form-group">
        <select class="form-control" id="category-id" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
      <input type="submit" value="検索">
    </form>
    {{-- 項目名 --}}
    <div class="display_flex column_margin">
      <p class="column_created_at">作成日</p>
      <p class="column_title">タスク名</p>
      <p class="column_tag">タグ</p>
      <p class="column_updated_at">更新</p>
      <p class="column_delete">削除</p>
    </div>

  </div>
  {{-- //*検索機能ここまで*// --}}
</body>

</html>