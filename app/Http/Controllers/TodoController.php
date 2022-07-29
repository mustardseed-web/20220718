<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;//追記

class TodoController extends Controller
{
  public function __construct()
  {
      $this->category = new Category();
  }

  public function index()
  {
      $todos = Todo::all();
      $categories = $this->category->get();
      return view('index', compact('todos','categories'));
  }


  public function create(CreateRequest $request)
  {
      $todo = new Todo;
      $todo->title = $request->title();
      $todo->user_id = $request->user_id();
      $todo->save();
      return redirect()->route('index');
  }

  public function update(UpdateRequest $request)
  {   
      $todoId = (int) $request->route('todoId');
      $todo = Todo::where('id', $todoId)->firstOrFail();
      $todo -> title = $request -> title();
      $todo -> save();
      return redirect()
      -> route('index', ['todoId' => $todo->id]);
  }

  public function delete(Request $request)
  {
      $todoId = (int) $request->route('todoId');
      $todo = Todo::where('id', $todoId)->firstOrFail();
      $todo->delete();
      return redirect()
          ->route('index');
  }

  public function search(Request $request)
  { 
    $todos = Todo::all();
    $categories = $this->category->get();
    $keyword = $request->input('keyword');
    $category_id = $request->input('category_id');
    $query = Category::query();
    if(isset($keyword)) {
        $query->where('title', 'LIKE', "%{$keyword}%");
    }
    //カテゴリが選択された場合、categoriesテーブルからcategory_idが一致する商品を$queryに代入
    if (isset($category_id)) {
      $query->where('category_id', $category_id);
    }
    $posts = $query->get();
    return view('search', compact('posts', 'keyword', 'category_id', 'categories', 'todos'));
}

    // 画面遷移    
    public function search_index(Request $request)
    {
      $todos = Todo::all();
      $categories = $this->category->get();
      return view('search', compact('todos','categories'));
    }
}
