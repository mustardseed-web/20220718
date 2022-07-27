<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRequest;
use App\Models\Todo;


class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(UpdateRequest $request)
    {   
      // dd($request);
        $todoId = (int) $request->route('todoId');
        $todo = Todo::where('id', $todoId)->firstOrFail();
        $todo -> title = $request -> title();
        $todo -> save();
        return redirect()
        -> route('index', ['todoId' => $todo->id]);
    }
}
