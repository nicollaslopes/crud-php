<?php require_once '../vendor/autoload.php'; ?>
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"
    ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <form action="Controller/autenticacao.php" method="POST">
    <section class="vh-100" style="background-color: #508bfc;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <h3 class="mb-5">Entrar</h3>

                <div class="form-outline mb-4">
                  <input type="email" id="emailUsuario" name="emailUsuario" class="form-control form-control-lg" required />
                  <b><label class="form-label" for="emailUsuario">Email</label></b>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="senhaUsuario" name="senhaUsuario" class="form-control form-control-lg" required />
                  <b><label class="form-label" for="senhaUsuario">Password</label></b>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </form>
              <hr class="my-4">
                <button class="btn btn-success btn-lg btn-block" id="botaoCadastrar" type="button">Cadastrar</button>
              <hr class="my-4">

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>

<script>

  $("#botaoCadastrar").on('click', function() {



    const url = 'Controller/incluirUsuario.php';

    const dadosUsuario = {
      emailUsuario: $('#emailUsuario').val(),
      senhaUsuario: $('#senhaUsuario').val()
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: dadosUsuario,
        dataType: 'html',
        success: function (data) {
          
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Usuário cadastrado!',
            showConfirmButton: false,
            timer: 1500
          })
        }
    });
  })

</script>