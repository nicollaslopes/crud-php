$('#modalEdicao').on('shown.bs.modal', function (event) {
    $('#myInput').trigger('focus')
  
    const button = $(event.relatedTarget)
    const idPessoa = button.data("id");
  
    $("#nomePessoa").val(button.data("nome-id"))
    $("#cpfPessoa").val(button.data("cpf-id"))
    $("#rgPessoa").val(button.data("rg-id"))
    $("#dtnascimentoPessoa").val(button.data("dtnascimento-id"))
    
    $("#botaoEdicao").on('click', function() {
  
      const nomePessoa = $("#nomePessoa").val()
      const cpfPessoa = $("#cpfPessoa").val()
      const rgPessoa = $("#rgPessoa").val()
      const dtnascimentoPessoa = $("#dtnascimentoPessoa").val()
  
      const dadosPessoa = {
              idPessoa: idPessoa, 
              nomePessoa: nomePessoa,
              cpfPessoa: cpfPessoa,
              rgPessoa: rgPessoa,
              dtnascimentoPessoa: dtnascimentoPessoa,
              acao: 'editar'
            };
  
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