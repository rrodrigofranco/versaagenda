<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $action = route('editarProfile', $user->id);
        return View('pages.profile', compact('user', 'action'));
    }

    public function editarProfile($id, Request $request) //Salvando a edição
    {
        $usuario = User::find($id);
        $usuario->update(['name' => $request->nome, 'email' => $request->email, 'password' => bcrypt($request->senha)]);

        $request->session()->flash('sucesso', "Edição feita com sucesso!");
        return redirect()->route('profile');
    }

}
