$(document).ready(function() {

    $("#FormDuvidasPost").submit(function(){
    	$("#btn-enviar").html('AGUARDE...');
    	$("#btn-enviar").addClass('btn-enviando');
    	id_aula_setada = $("#id_aula_setada").val();

		var formdata = $("#FormDuvidasPost").serialize()+'&id_aula='+id_aula_setada;

		$.ajax({type: "POST", url:$("#FormDuvidasPost").attr('action'), data:formdata, success: function(msg){										
				
			$("#btn-enviar").html('ENVIAR');
			$("#btn-enviar").removeClass('btn-enviando');	
			$('#FormDuvidasPost')[0].reset();
			$("#sucesso-msg").removeClass('hide');
			setTimeout(function(){ $("#sucesso-msg").addClass('hide'); }, 3000);
		} 
		});
		
		return false;
	});
    
});

	
	
	$(document).on('click', '.botao-responde-questionario', function(e) {

		var qtd = $(".qtd-perguntas-quest").length;
		var respondidos = $("input[type=radio]:checked").length;
		var final_resp = 'A ação não poderá ser desfeita!';
		var button_cancel = 'Não, voltar ao teste';
		var ops = 'Enviar Respostas?';
		var no = true;	

		if(qtd!=respondidos){
			var final_resp = 'Existem '+(qtd-respondidos)+' questões sem resposta!';	
			var button_cancel = 'Voltar e responder';
			var ops = 'Ops';
			var no = false;
		} 
		

		Swal.fire({
		  title: ops,
		  text: final_resp,
		  icon: 'question',
		  showCancelButton: true,
		  showConfirmButton: no,
		  confirmButtonColor: '#9900CC',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sim, enviar!',
		  cancelButtonText: button_cancel
		}).then((result) => {
		  if (result.value) {
		  	$("#preloader").show();
		  	$("#status").show();
		    $("#FormPostQuestionarioResponde").submit();

		  }
		})


	});

