@extends('site.layouts.layout')

@section('title', 'Gerenciar Usuários')
@section('content')
<div class="col-10 mt-2">
  <h2>Gerenciar Usuarios</h2>
</div>

@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session()->get('message') }}
    </div>
@endif

<div class="table-responsive m-auto tabela justify-content-center">
  <div class="col-md-12">
    <div class="col-md-5 offset-md-7">
      <button class="float-right m-3 btn btn-dark" data-toggle="modal" data-toggle="tooltip" data-placement="left" title="Cadastrar Usuário" data-target="#createNewUser">
        <i class="fas fa-plus-square fa-2x"></i>
      </button>
    </div>
    <table class="table table-sm table-striped mx-auto hover table-bordered" id="filtertable">
      <thead class="thead-dark">
        <tr class="text-center">
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">CEP</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereço</th>
          <th scope="col">Número</th>
          <th scope="col">Complemento</th>
          <th scope="col">Bairro</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $item)
        <tr>
          <input type="hidden" name="id_usuario" id="id_usuario" value="{{ $item['id'] }}" />
          <td>{{ $item['name'] }}</td>
          <td>{{ $item['cpf'] }}</td>
          <td>{{ $item['cep'] }}</td>
          <td>{{ $item['telefone'] }}</td>
          <td>{{ $item['endereco'] }}</td>
          <td>{{ $item['numero'] }}</td>
          <td>{{ $item['complemento'] }}</td>
          <td>{{ $item['bairro'] }}</td>
          <td>{{ $item['cidade'] }}</td>
          <td>{{ $item['estado'] }}</td>
          <td>{{ $item['email'] }}</td>
          <td>
            <a id="btn-ver" onclick="buscarInfosUsuario( {{ $item->id }} )" title="Ver Informações do Usuário"  class="pl-2"><i class="fas fa-eye" style="color: #343a40"></i></a>
            <a id="btn-editar" onclick="editUserInfos( {{ $item->id }} )" title="Editar Informações do Usuário"  class="pl-2"><i class="fas fa-pen" style="color: #343a40"></i></a>
            <a id="btn-excluir" onclick="deletarUsuario( {{ $item->id }} )" title="Excluir Usuário" class="pl-2"><i class="fas fa-trash" style="color: #343a40"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Cadastrar Novo Usuário-->
<div class="modal fade" id="createNewUser" tabindex="-1" aria-labelledby="createNewUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createNewUser">Cadastrar Novo Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('registrar_usuario') }}" method="POST" id="send_form">
          @csrf
          <input name="newUser" id="newUser" type="hidden" value="1" />
          <div class="form-group mb-3">
            <input type="text" placeholder="Nome" id="name" class="form-control" name="name" required autofocus />
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="CPF" id="cpf" class="form-control" name="cpf" required autofocus />
            @if ($errors->has('cpf'))
            <span class="text-danger">{{ $errors->first('cpf') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="phone" placeholder="Telefone" id="telefone" class="form-control" name="telefone" required autofocus>
            @if ($errors->has('telefone'))
            <span class="text-danger">{{ $errors->first('telefone') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Cidade" id="cidade" class="form-control" name="cidade" required autofocus>
            @if ($errors->has('cidade'))
            <span class="text-danger">{{ $errors->first('cidade') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Estado" id="estado" class="form-control" name="estado" required autofocus>
            @if ($errors->has('estado'))
            <span class="text-danger">{{ $errors->first('estado') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="CEP" id="cep" class="form-control" name="cep" required autofocus>
            @if ($errors->has('cep'))
            <span class="text-danger">{{ $errors->first('cep') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Endereço" id="endereco" class="form-control" name="endereco" required autofocus>
            @if ($errors->has('endereco'))
            <span class="text-danger">{{ $errors->first('endereco') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Bairro" id="bairro" class="form-control" name="bairro" required autofocus>
            @if ($errors->has('bairro'))
            <span class="text-danger">{{ $errors->first('bairro') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="number" placeholder="Número" id="numero" class="form-control" name="numero" required autofocus>
            @if ($errors->has('numero'))
            <span class="text-danger">{{ $errors->first('numero') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Complemento" id="complemento" class="form-control" name="complemento" required autofocus>
            @if ($errors->has('complemento'))
            <span class="text-danger">{{ $errors->first('complemento') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required autofocus>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="password" placeholder="Senha" id="senha" class="form-control" name="senha" required autocomplete="on">
            @if ($errors->has('senha'))
            <span class="text-danger">{{ $errors->first('senha') }}</span>
            @endif
          </div>

          <div class="form-group mb-3">
            <input type="password" placeholder="Confirmar Senha" id="confirmarSenha" class="form-control" name="confirmarSenha" required autocomplete="on">
            @if ($errors->has('confirmarSenha'))
            <span class="text-danger">{{ $errors->first('confirmarSenha') }}</span>
            @endif
          </div>

          <div class="form-group text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" id="save">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ver Informações Usuário-->
<div class="modal fade" id="modalVerInfosUsuario" tabindex="-1" aria-labelledby="modalVerInfosUsuario" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVerInfosUsuario">Ver Informações do Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Nome" id="view-name" class="form-control" name="view-name" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="CPF" id="view-cpf" class="form-control" name="view-cpf" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="phone" placeholder="Telefone" id="view-telefone" class="form-control" name="view-telefone" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Cidade" id="view-cidade" class="form-control" name="view-cidade" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Estado" id="view-estado" class="form-control" name="view-estado" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="CEP" id="view-cep" class="form-control" name="view-cep" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Endereço" id="view-endereco" class="form-control" name="view-endereco" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Bairro" id="view-bairro" class="form-control" name="view-bairro" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="number" placeholder="Número" id="view-numero" class="form-control" name="view-numero" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Complemento" id="view-complemento" class="form-control" name="view-complemento" required autofocus />
        </div>

        <div class="form-group mb-3">
          <input readonly="true" type="text" placeholder="Email" id="view-email" class="form-control" name="view-email" required autofocus />
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Usuário-->
<div class="modal fade" id="modalEditarInfosUsuario" tabindex="-1" aria-labelledby="modalEditarInfosUsuario" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createNewUser">Editar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('moduloUsuario.salvar') }}" method="POST" id="send_edit_form">
          @csrf
          <input type="hidden" name="id_user" id="id_user"/>
          <div class="form-group mb-3">
            <input type="text" placeholder="Nome" id="editName" class="form-control" name="editName" required autofocus />
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="CPF" id="editCpf" class="form-control" name="editCpf" required autofocus readonly/>
          </div>

          <div class="form-group mb-3">
            <input type="phone" placeholder="Telefone" id="editTelefone" class="form-control" name="editTelefone" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Cidade" id="editCidade" class="form-control" name="editCidade" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Estado" id="editEstado" class="form-control" name="editEstado" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="CEP" id="editCep" class="form-control" name="editCep" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Endereço" id="editEndereco" class="form-control" name="editEndereco" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Bairro" id="editBairro" class="form-control" name="editBairro" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="number" placeholder="Número" id="editNumero" class="form-control" name="editNumero" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Complemento" id="editComplemento" class="form-control" name="editComplemento" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="text" placeholder="Email" id="editEmail_address" class="form-control" name="editEmail_address" required autofocus>
          </div>

          <div class="form-group mb-3">
            <input type="password" placeholder="Nova Senha" id="editSenha" class="form-control" name="editSenha" required autocomplete="on">
          </div>

          <div class="form-group mb-3">
            <input type="password" placeholder="Confirmar Nova Senha" id="editConfirmarSenha" class="form-control" name="editConfirmarSenha" required autocomplete="on">
          </div>

          <div class="form-group text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary" id="saveEditBtn">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function($) {
    $('#telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
    $('#cpf').mask('000.000.000-00');
    $('#editTelefone').mask('(00) 00000-0000');
    $('#editCep').mask('00000-000');
    $('#editCpf').mask('000.000.000-00');

    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
      elements[i].oninvalid = function(e) {
        e.target.setCustomValidity("");
        if (!e.target.validity.valid) {
          e.target.setCustomValidity("Campo Obrigatório!");
        }
      };
      elements[i].oninput = function(e) {
        e.target.setCustomValidity("");
      };
    }

    $('#confirmarSenha').on('keyup', function() {
      var senha = $('#senha').val();
      var confirmarSenha = $('#confirmarSenha').val();

      if (senha != confirmarSenha) {
        $('#confirmarSenha').addClass('is-invalid');
      } else {
        $('#confirmarSenha').removeClass('is-invalid');
      }
    });

    $('#email_address').on('change', function() {
      var email = $('#email_address').val();

      if (email == '') {
        $('#email_address').addClass('is-invalid');
        alert('Por Favor Insira um Email o Campo está Vazio!');
      } else {
        $('#email_address').removeClass('is-invalid');
      }

      var validateEmail = validarEmail(email);

      if (validateEmail == true) {
        $('#email_address').addClass('is-valid');
        $('#email_address').removeClass('is-invalid');
      } else {
        $('#email_address').addClass('is-invalid');
        $('#email_address').removeClass('is-valid');
        alert('Por favor, informe um E-mail válido.');
      }
    });

    $('#cpf').on('change', function() {
      var cpf = $('#cpf').val();
      var validateCPF = validarCPF(cpf);

      if (validateCPF == true) {
        $('#cpf').removeClass('is-invalid');
        $('#cpf').addClass('is-valid');
      } else {
        $('#cpf').removeClass('is-valid');
        $('#cpf').addClass('is-invalid');
        alert('Por favor, informe um CPF válido.');
      }
    });

    $('#editConfirmarSenha').on('keyup', function() {
      var senha = $('#editSenha').val();
      var confirmarSenha = $('#editConfirmarSenha').val();

      if (senha != confirmarSenha) {
        $('#editConfirmarSenha').addClass('is-invalid');
      } else {
        $('#editConfirmarSenha').removeClass('is-invalid');
      }
    });

    $('#editEmail_address').on('change', function() {
      var email = $('#editEmail_address').val();

      if (email == '') {
        $('#editEmail_address').addClass('is-invalid');
        alert('Por Favor Insira um Email o Campo está Vazio!');
      } else {
        $('#editEmail_address').removeClass('is-invalid');
      }

      var validateEmail = validarEmail(email);

      if (validateEmail == true) {
        $('#editEmail_address').addClass('is-valid');
        $('#editEmail_address').removeClass('is-invalid');
      } else {
        $('#editEmail_address').addClass('is-invalid');
        $('#editEmail_address').removeClass('is-valid');
        alert('Por favor, informe um E-mail válido.');
      }
    });

    $('#editCpf').on('change', function() {
      var cpf = $('#editCpf').val();
      var validateCPF = validarCPF(cpf);

      if (validateCPF == true) {
        $('#editCpf').removeClass('is-invalid');
        $('#editCpf').addClass('is-valid');
      } else {
        $('#editCpf').removeClass('is-valid');
        $('#editCpf').addClass('is-invalid');
        alert('Por favor, informe um CPF válido.');
      }
    });

  });

  function deletarUsuario(id) {
    var id = id;
    var confirmacao = confirm('Tem Certeza que Deseja Excluir?');

    if(confirmacao) {
        $.ajax({
            url: "{{ route('moduloUsuario.excluir') }}",
            method: 'POST',
            data: {_token: "{{ csrf_token() }}", id: id},
            success: function(data) {
                alert('Usuário Excluído com Sucesso!');
                location.reload();
            }
        });
    }
  }

  function editUserInfos(id) {
    var id = id;

    $.ajax({
      url: "{{ route('moduloUsuario.editar') }}",
      type: "POST",
      data: {_token: "{{ csrf_token() }}", id: id},
      dataType: 'json',
    }).done(function(response) {
      dataReturned = response;

      if (dataReturned.status == true && dataReturned.message == 'success') {
        jQuery.noConflict();
        $('#modalEditarInfosUsuario').modal('show');

        $('#id_user').val(dataReturned.data[0].id);
        $('#editName').val(dataReturned.data[0].name);
        $('#editCpf').val(dataReturned.data[0].cpf);
        $('#editTelefone').val(dataReturned.data[0].telefone);
        $('#editCidade').val(dataReturned.data[0].cidade);
        $('#editEstado').val(dataReturned.data[0].estado);
        $('#editCep').val(dataReturned.data[0].cep);
        $('#editEndereco').val(dataReturned.data[0].endereco);
        $('#editBairro').val(dataReturned.data[0].bairro);
        $('#editNumero').val(dataReturned.data[0].numero);
        $('#editComplemento').val(dataReturned.data[0].complemento);
        $('#editEmail_address').val(dataReturned.data[0].email);
      } else {
        alert('Erro ao buscar informações do usuário.');
      }

    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log("Error: " + textStatus);
    });

  }

  function buscarInfosUsuario(id) {
    var id = id;

    $.ajax({
      url: "{{ route('moduloUsuario.ver') }}"
      , type: "post"
      , data: {
        _token: "{{ csrf_token() }}"
        , id: id
      }
      , dataType: 'json'
    , }).done(function(response) {
      dataReturned = response;

      if (dataReturned.status == true && dataReturned.message == 'success') {
        jQuery.noConflict();
        $('#modalVerInfosUsuario').modal('show');

        $('#view-name').val(dataReturned.data[0].name);
        $('#view-cpf').val(dataReturned.data[0].cpf);
        $('#view-telefone').val(dataReturned.data[0].telefone);
        $('#view-cidade').val(dataReturned.data[0].cidade);
        $('#view-estado').val(dataReturned.data[0].estado);
        $('#view-cep').val(dataReturned.data[0].cep);
        $('#view-endereco').val(dataReturned.data[0].endereco);
        $('#view-bairro').val(dataReturned.data[0].bairro);
        $('#view-numero').val(dataReturned.data[0].numero);
        $('#view-complemento').val(dataReturned.data[0].complemento);
        $('#view-email').val(dataReturned.data[0].email);
      } else {
        alert('Erro ao buscar informações do usuário.');
      }

    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log("Error: " + textStatus);
    });
  }

  function validarEmail(email) {
    var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexEmail.test(String(email));

    if (regexEmail.test(email)) {
      return true;
    } else {
      return false;
    }
  }

  function validarCPF(cpf) {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;

    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf == '') {
      return false;
    }

    if (cpf.length != 11 || cpf == "00000000000" ||
      cpf == "11111111111" || cpf == "22222222222" ||
      cpf == "33333333333" || cpf == "44444444444" ||
      cpf == "55555555555" || cpf == "66666666666" ||
      cpf == "77777777777" || cpf == "88888888888" ||
      cpf == "99999999999") {
      return false;
    }

    for (i = 0; i < cpf.length - 1; i++) {
      if (cpf.charAt(i) != cpf.charAt(i + 1)) {
        digitos_iguais = 0;
        break;
      }
    }
    if (!digitos_iguais) {
      numeros = cpf.substring(0, 9);
      digitos = cpf.substring(9);
      soma = 0;

      for (i = 10; i > 1; i--) {
        soma += numeros.charAt(10 - i) * i;
      }

      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

      if (resultado != digitos.charAt(0)) {
        return false;
      }
      numeros = cpf.substring(0, 10);
      soma = 0;

      for (i = 11; i > 1; i--) {
        soma += numeros.charAt(11 - i) * i;
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

      if (resultado != digitos.charAt(1)) {
        return false;
      }
      return true;
    }
    return false;
  }

</script>
@endsection
