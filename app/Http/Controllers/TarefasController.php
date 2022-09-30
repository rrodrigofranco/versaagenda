<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tarefas;

class TarefasController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $tarefas = Tarefas::all()->where('id_user', $user->id);
        return View('pages.tarefas', compact('tarefas'));
    }

    //Rota para mostrar as tarefas pendentes
    public function pendentes()
    {
        $user = auth()->user();
        $data = date('Y-m-d');
        $horario = date('H:i');

        $tarefas = Tarefas::all()
        ->where('id_user', $user->id)
        ->where('data', '>' ,$data)
        ->where('horario', '>' ,$horario);
        return View('pages.tarefas', compact('tarefas'));
    }

    public function deletar($id, Request $request) //Excluir uma tarefa
    {
        Tarefas::destroy($id);
        $request->session()->flash('sucesso', "Tarefa excluída com sucesso!");
        return redirect()->route('listartarefas');
    }

    public function formEditar($id) //Formulário de edição
    {
        $tarefa = Tarefas::find($id);
        $action = route('editarTarefa', $tarefa->id);
        return View('pages.adicionar', compact('tarefa', 'action'));
    }

    public function editarTarefa($id, Request $request) //Salvando a edição
    {
        $tarefa = Tarefas::find($id);
        $tarefa->update($request->all());
        $request->session()->flash('sucesso', "Tarefa alterada com sucesso!");
        return redirect()->route('listartarefas');
    }
}
