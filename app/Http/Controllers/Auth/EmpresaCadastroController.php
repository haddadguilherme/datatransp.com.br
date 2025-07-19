<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpresaCadastroController extends Controller
{
    public function create()
    {
        return view('auth.cadastro_empresa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_nome' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'alpha_dash', 'unique:empresas,slug'],
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $empresa = Empresa::create([
            'nome' => $request->empresa_nome,
            'slug' => Str::slug($request->slug),
        ]);

        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Relacionar usuário à empresa
        $user->empresas()->attach($empresa->id);

        // Fazer login e redirecionar
        Auth::login($user);

        return redirect()->to("/{$empresa->slug}/dashboard");
    }
}
