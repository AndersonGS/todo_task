<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\User;

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
            $tarefas = Tarefa::where('titulo', 'like', '%' . request('search') . '%')
            ->orWhere('descricao', 'like', '%' . request('search') . '%')
            ->get();
        }elseif(request('filter')){
            if(request('filter') === "criacao"){
                $tarefas = Tarefa::orderBy('created_at', 'ASC')->get();
            }elseif (request('filter') === "conclusao"){
                $tarefas = Tarefa::orderBy('data_limite_conclusao', 'ASC')->get();
            }elseif (request('filter') === "responsavel"){
                $sorted = Tarefa::with('users')->get();
                $tarefas = $sorted->sortBy(function ($value, int $key) {
                    $user = $value->users()->first();
                    if($user){
                        return $user->name;
                    }else{
                        return "";
                    }
                });
                // $tarefas = $sorted->sortBy('users');
                // dd($tarefas);
                // $tarefas = Tarefa::with(['users' => function($query) {
                //     $query->orderBy('users.name', 'asc');
                // }])->get();
                // $tarefas = Tarefa::join('tarefa_usuario','tarefas.id','=','tarefa_usuario.tarefa_id')
                // ->join('users', 'users.id','=','tarefa_usuario.user_id')
                // ->groupBy('tarefas.id')
                // ->groupBy('tarefa_usuario.id','users.id')
                // ->groupBy('users.id')
                // ->orderBy('users.name','asc')
                // ->get();
            }else{
                $tarefas = Tarefa::all();
            }

        } else {
            $tarefas = Tarefa::all();
        }
        $users = User::all();
        return view('home')->with('tarefas', $tarefas)->with('users', $users);
    }
}
