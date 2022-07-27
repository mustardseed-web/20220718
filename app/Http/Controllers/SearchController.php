<?php

namespace App\Http\Controllers\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function __invoke(Request $request)
    {
      //キーワード受け取り
      $keyword = $request->input('keyword');
  
      //クエリ生成
      $query = Todo::query();
  
      //もしキーワードがあったら
      if(!empty($keyword))
      {
          $query->where('email','like','%'.$keyword.'%');
          $query->orWhere('name','like','%'.$keyword.'%');
      }
  
      // 全件取得 +ページネーション
      $students = $query->orderBy('id','desc')->paginate(5);
      return view('student.list')->with('students',$students)->with('keyword',$keyword);
  }
}
