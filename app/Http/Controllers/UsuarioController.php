<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('dashboard', compact('usuarios'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'dt_nasc' => 'required|date',
        ]);


        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'dt_nasc' => $request->dt_nasc,
        ]);
        return redirect()->route('dashboard')->with('success', 'Usuário criado com sucesso!');

    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('users.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('users.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'dt_nasc' => 'required|date',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->only('nome', 'email', 'dt_nasc'));

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
