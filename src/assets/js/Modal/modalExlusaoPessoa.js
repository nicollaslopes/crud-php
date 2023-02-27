$('#modalExclusao').on('shown.bs.modal', function (event) {
    $('#myInput').trigger('focus')
  
    const button = $(event.relatedTarget)
    const idPessoa = button.data("id");
    const dadosPessoa = {
                          idPessoa: idPessoa,
                          acao: 'excluir'
                        }
  
    $("#botaoExclusao").on('click', function() {
  
      const url = '../Controllers/PessoaController.php';
  
      $.ajax({
          type: 'POST',
          url: url,
          data: dadosPessoa,
          dataType: 'html',
          success: function (data) {
            window.location.reload();
          }
      })
    })
  
})