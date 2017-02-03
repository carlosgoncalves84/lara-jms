<?php

namespace App\Http\Controllers;

use App\Jokes;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\CreateJokesRequest;

class JokesController extends Controller
{
    public function index(){

        $jokes = Jokes::latest('jokedate')->published()->get();

        return view('manage.jokes.index', ['jokes' => $jokes]);

    }

    public function show($id){

        $joke = Jokes::fondOrFail($id);

        return view('manage.jokes.show', compact('joke'));

    }

    public function edit($id){

        $joke = Jokes::findOrFail($id);

        return view('manage.jokes.edit', compact('joke'));

    }

    public function update($id, CreateJokesRequest $request)
    {
        $jokes = Jokes::findOrFail($id);

        $jokes->update($request->all());

        return redirect('jokes');
    }

    public function destroy($id){

        Jokes::findOrFail($id)->delete();

        return redirect('jokes');

    }

    public function create(){}

    public function store(){}


}
