<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        if (request('search')) {
            $tarefas = Tarefa::where('tarefa', 'like', '%' . request('search') . '%')->get();
        } else {
            $tarefas = Tarefa::all();
        }
        return view('home')->with('tarefas', $tarefas);
    }
}
