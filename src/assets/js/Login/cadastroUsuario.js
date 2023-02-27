$("#botaoCadastrar").on('click', function() {

    const url = 'Controllers/UsuarioController.php';

    const dadosUsuario = {
        emailUsuario: $('#emailUsuario').val(),
        senhaUsuario: $('#senhaUsuario').val()
    }

    $.ajax({
        type: 'POST',
        url: url,
        data: dadosUsuario,
        success: function (data) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Usuário cadastrado!',
                showConfirmButton: true,
                timer: 1500
            })
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        }
    })
    
})
