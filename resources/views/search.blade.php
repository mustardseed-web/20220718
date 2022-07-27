<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <!-- 検索フォーム -->
  <form method="get" action="" class="form-inline">
    <div class="form-group">
      <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="名前やメールアドレス">
    </div>
    <div class="form-group">
      <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
    </div>
  </form>
</body>

</html>