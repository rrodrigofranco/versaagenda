<?php

namespace App\Http\Controllers;
use App\Models\Tarefas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if(is_null($user)){
            return View('login');
        }
        $data = date('Y-m-d');
        $tarefas = Tarefas::all()->where('id_user', $user->id);
        $pendentes = Tarefas::all()
        ->where('id_user', $user->id)
        ->where('data','>' , $data);
        return View('home', compact('tarefas', 'pendentes'));

    }
}
