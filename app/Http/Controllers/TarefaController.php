<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\User;
use Auth;
use DateTime;


class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $tarefa = new Tarefa;
        $tarefa->titulo = $request->tarefa_titulo;
        $tarefa->descricao = $request->tarefa_descricao;
        $tarefa->data_limite_conclusao = $request->tarefa_data;
        $tarefa->save();

        $user = User::find($request->tarefa_responsavel);

        $user->tarefas()->attach(['tarefa_id' => $tarefa->id]);

        return redirect('home')->with('status', 'Nova tarefa criada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formatarDaata = DateTime::createFromFormat('d/m/Y', $request->data_limite_conclusao)->format('m-d-Y');
        Tarefa::where('id',$id)->update([
            'titulo'=>$request->titulo,
            'descricao'=>$request->descricao,
            'data_limite_conclusao'=>$formatarDaata
        ]);
        $tarefa = Tarefa::find($id);
        $tarefa->users()->detach();
        $tarefa->users()->attach(['user_id' => $request->user]);

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->users()->detach();
        $tarefa->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
