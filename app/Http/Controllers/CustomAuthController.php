<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller {

    public function loginView()
    {
        return view('auth.login');
    }


    public function validarLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only('email', 'password', '_token');

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('index')->withSuccess('Login Realizado com Sucesso!');
        } else {
            return view('auth.login');
        }
    }

    public function registrarUsuarioView()
    {
        return view('auth.registrarUsuario');
    }


    public function registrarUsuario(Request $request)
    {
        $data = $request->all();

        User::updateOrCreate([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['senha']),
            'cpf' => $data['cpf'],
            'cep' => $data['cep'],
            'telefone' => $data['telefone'],
            'endereco' => $data['endereco'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
        ]);

        if($data['newUser'] == 1) {
            return redirect()->route('moduloUsuario.gerenciar')->with('message','Usuário Cadastrado com Sucesso!');
        } else {
            return redirect()->route('index')->with('message','Usuário Cadastrado com Sucesso!');
        }
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect()->route('login.view');
    }
}
