<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefas;

class AdicionarController extends Controller
{
    public function index()
    {
        return View('pages.adicionar');
    }

    public function adicionar(Request $request)
    {
        $tarefa = new Tarefas();

        $tarefa->id_user = $request->id_user ?? '';
        $tarefa->nome = $request->nome ?? '';
        $tarefa->horario = $request->horario ?? '';
        $tarefa->data = $request->data ?? '';


        $tarefas = Tarefas::all()
        ->where('horario', '=', $tarefa->horario)
        ->where('data', '=', $tarefa->data)
        ->where('id_user', '=', $tarefa->id_user)
        ->first();

        if (is_null($tarefas)) {  //Verificando se já existe horário/data
            $tarefa->save();
            return redirect()->route('listartarefas');
        }else{
            $request->session()->flash('erro', 'Não é permitido tarefas no mesmo dia/horário!');
            return redirect()->route('adicionar');
        }


    }
}
