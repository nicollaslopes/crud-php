$("#botaoLogin").on('click', function() {

    const url = 'Controllers/AutenticacaoController.php';

    const dadosUsuario = {
        emailUsuario: $('#emailUsuario').val(),
        senhaUsuario: $('#senhaUsuario').val()
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: dadosUsuario,
        success: function (response) {
            if(response === 'error'){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'E-mail ou senha inválida!',
                timer: 5000
                })
            } else {
                window.location.href = 'view/painel.php';
            }
        }
    })
  
})
