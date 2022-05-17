<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserModuleController extends Controller
{
    public function moduloUsuarios()
    {
        $users = User::select('*')->get();
        return view('moduloUsuarios', compact('users'));
    }

    public function buscarInfosUsuario(Request $request) {
        $data = $request->all();
        $userInfos = User::select('*')->where('id', $data['id'])->get();

        if (count($userInfos) > 0) {
            return response()->json(['status' => true, 'message' => 'success', 'data' => $userInfos]);
        } else {
            return response()->json(['status' => false, 'message' => 'error', 'data' => null]);
        }

    }

    public function editarInfosUsuario(Request $request) {
        $data = $request->all();
        $userInfos = User::select('*')->where('id', $data['id'])->get();

        if (count($userInfos) > 0) {
            return response()->json(['status' => true, 'message' => 'success', 'data' => $userInfos]);
        } else {
            return response()->json(['status' => false, 'message' => 'error', 'data' => null]);
        }
    }

    public function salvarInfosUsuario(Request $request) {
        $data = $request->all();

        User::where('id', $data['id_user'])->update([
            'name' => $data['editName'],
            'email' => $data['editEmail_address'],
            'password' => Hash::make($data['editSenha']),
            'cep' => $data['editCep'],
            'telefone' => $data['editTelefone'],
            'endereco' => $data['editEndereco'],
            'numero' => $data['editNumero'],
            'complemento' => $data['editComplemento'],
            'bairro' => $data['editBairro'],
            'cidade' => $data['editCidade'],
            'estado' => $data['editEstado'],
        ]);
        return redirect()->route('moduloUsuario.gerenciar')->with('message','Usuário Atualizado com Sucesso!');
    }

    public function excluirInfosUsuario(Request $request) {
        $data = $request->all();
        User::where('id', $data['id'])->delete();
    }
}

?>
