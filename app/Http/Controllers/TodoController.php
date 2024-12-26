<?php

namespace App\Http\Controllers;
use App\Models\Todo; //To use model Todo
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function home(){
        $todos=Todo::all();
      //  dd($todos);
        return view('home',['todos'=>$todos]);
    }

    public function store(Request $request)
    {
        //dd($request);
        //dd($request->post(key:'title'));

        //To validate data
        $validatedData=$request->validate([
            'title'=>'required|max:124'
        ]);

         //dd($validatedData);

        /*$todo = new Todo();
        $todo->title = $request->post(key:'title');
        $todo->save();*/

        //we can use write like this also
        /*$todo = new Todo;
        $todo->title = $request->title;
        $todo->save();*/

        //also we can use mass assignmnet method
        Todo::create($validatedData);

        return redirect(to:'/'); // or return back();
    }
   public function edit($id){
        $todo=Todo::findOrFail($id);
        //dd($id);
        return view('update',['todo'=>$todo]);
    }

    public function update(Request $request,Todo $todo){
        $validatedData=$request->validate([
            'title'=>'required|max:124'
        ]);
        //dd($validatedData);
        $todo->title=$validatedData['title'];
        $todo->save();
        return redirect(to:'/');
    }
    public function delete(Todo $todo){
        $todo->delete();
        return back();
    }

}
