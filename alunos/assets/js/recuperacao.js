$('#enviar').on('click', function(){
    
    var email= $('#email').val();

    $('#localButton').addClass('hide');
    $('#load').removeClass('hide');
    $.ajax({
      url: 'controlers/aluno/recupera_senha.php',
      type: 'POST',
      data: { email: email },
      success: function(resp) {
        if(resp == 0) {
          alert('Desculpe seu email, não foi encontrado !');
          $('#localButton').removeClass('hide');
          $('#load').addClass('hide');
        } else {
          alert('Enviamos um email de recuperação pra você.');
          $('#localButton').removeClass('hide');
          $('#enviar').text('Confira seu E-mail !');
          $('#enviar').attr('disabled','disabled');
          $('#load').addClass('hide');
        }
        
      }
    });
  });