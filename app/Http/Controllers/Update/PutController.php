<?php

namespace App\Http\Controllers\Update;

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
        $todo = Todo::where('id', $request->id())->firstOrFail();
        $todo -> title = $todo -> title();
        $todo -> save();
        return redirect()
        -> route('index', ['todoId' => $todo->id]);
    }
}
