$('#enviar').on('click', function(){
    
    var senha= $('#senha').val();
    var hash= $('#hash').val();
    var redirect= $('#redirect').val();

    $('#localButton').addClass('hide');
    $('#load').removeClass('hide');
    $.ajax({
      url: 'controlers/aluno/new_password.php',
      type: 'POST',
      data: { senha: senha, hash: hash },
      success: function(resp) {
        if(resp == 1) {

          $('#localButton').removeClass('hide');
          $('#enviar').text('Pronto ! Vamos te redirecionar');
          $('#enviar').attr('disabled','disabled');
          $('#load').addClass('hide');
         
          setTimeout(() => {
          window.location.href= redirect;
          }, 3000);
        }
      }
    });
  });