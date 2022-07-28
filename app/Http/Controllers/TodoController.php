<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;

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
    $keyword = $request->input('keyword');

    $query = Todo::query();

    if(!empty($keyword)) {
        $query->where('title', 'LIKE', "%{$keyword}%");
            // ->orWhere('author', 'LIKE', "%{$keyword}%");
    }

    $posts = $query->get();

    return view('index', compact('posts', 'keyword'));
}

}
