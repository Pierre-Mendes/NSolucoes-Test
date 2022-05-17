<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('site.layouts._includes.head')
  <link rel="stylesheet" href="{{ asset('css/header.css')}}">
  <title>Registrar Usuário</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5" style="background-color: #0a6b3a!important">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('moduloUsuario.gerenciar') }}">Voltar</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('signout') }}">Sair</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login.view') }}">Login</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('registrar_usuario.view') }}">Cadastrar</a>
            </li>
        @endif
        </ul>
      </div>
    </div>
  </nav>

  <main class="signup-form">
    <div class="cotainer">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card">
            <h3 class="card-header text-center">Cadastrar Usuário</h3>
            <div class="card-body">

              <form action="{{ route('registrar_usuario') }}" method="POST">
                @csrf
                <input name="newUser" id="newUser" type="hidden" value="0" />
                <div class="form-group mb-3">
                  <input type="text" placeholder="Nome" id="name" class="form-control" name="name" required autofocus>
                  @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group mb-3">
                  <input type="text" placeholder="CPF" id="cpf" class="form-control" name="cpf" required autofocus>
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
                  <input type="password" placeholder="Senha" id="senha" class="form-control" name="senha" required>
                  @if ($errors->has('senha'))
                  <span class="text-danger">{{ $errors->first('senha') }}</span>
                  @endif
                </div>

                <div class="form-group mb-3">
                  <input type="password" placeholder="Confirmar Senha" id="confirmarSenha" class="form-control" name="confirmarSenha" required>
                  @if ($errors->has('confirmarSenha'))
                  <span class="text-danger">{{ $errors->first('confirmarSenha') }}</span>
                  @endif
                </div>

                <div class="d-grid mx-auto">
                  <button type="submit" class="btn btn-dark btn-block" id="saveButton">Cadastrar</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function($) {
      $('#telefone').mask('(00) 00000-0000');
      $('#cep').mask('00000-000');
      $('#cpf').mask('000.000.000-00');

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
    });

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
</body>
</html>

