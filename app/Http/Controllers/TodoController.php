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
      $user_id = Auth::id();
      $todo = new Todo;
      $todo->user_id = $user_id;
      $todo->category_id = $request->category_id;
      $todo->title = $request->title();
      $todo->save();
      return redirect()->route('index', compact('user_id'));
  }

  public function update(UpdateRequest $request)
  {   
      $todoId = (int) $request->route('todoId');
      $todo = Todo::where('id', $todoId)->firstOrFail();
      $todo -> title = $request -> title();
      $todo -> save();
      return redirect()-> route('index', ['todoId' => $todo->id]);

  }

  public function delete(Request $request)
  {
      $todoId = (int) $request->route('todoId');
      $todo = Todo::where('id', $todoId)->firstOrFail();
      $todo->delete();
      return redirect()->route('index');
  }

  public function searchUpdate(UpdateRequest $request)
  {   $categories = $this->category->get();
      $postId = (int) $request->route('postId');
      $post = Todo::where('id', $postId)->firstOrFail();
      $post -> title = $request -> title();
      $post -> save();
      // return view('search', ['postId' => $post->id, 'categories' => $categories, 'post' => $post]);
      return back();
  }

  public function searchDelete(Request $request)
  {   $categories = $this->category->get();
      $postId = (int) $request->route('postId');
      $post = Todo::where('id', $postId)->firstOrFail();
      $post->delete();
      return view('search', ['postId' => $post->id, 'categories' => $categories]);
  }

  public function search(Request $request)
  { 
    $todos = Todo::all();
    // $this->category = new Category();
    $categories = $this->category->get();
    $searchWord = $request->input('searchWord');
    $category_id = $request->input('category_id');
    $query = Todo::query();
    if(!empty($searchWord)) {
      $query->where('title', 'LIKE', "%{$searchWord}%");
    }
    //カテゴリが選択された場合、categoriesテーブルからcategory_idが一致するtodoを$queryに代入
    if (!empty($category_id)) {
      $query->where('category_id', $category_id);
    }
    $posts = $query->get();
    return view('search', compact('posts', 'searchWord', 'category_id', 'categories', 'todos'));
}

    // 検索画面へ遷移    
    public function search_index(Request $request)
    {
      $todos = Todo::all();
      $categories = $this->category->get();
      return view('search', compact('todos','categories'));
    }
}
