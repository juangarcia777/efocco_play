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



		$("#FormPerguntaPost").on('submit',function(){
			$("#btn-send").html('AGUARDE...');
			$("#btn-send").addClass('btn-enviando');
	
			var formdata = $("#FormPerguntaPost").serialize();
	
			$.ajax({type: "POST", url:'controlers/outros/envia_pergunta_suporte.php', data:formdata, success: function(msg){										
					
				$("#btn-send").html('ENVIAR');
				$("#btn-send").removeClass('btn-enviando');
				$("#sucesso-msg2").removeClass('hide');
				setTimeout(function(){ $("#sucesso-msg2").addClass('hide'); }, 3000);
			}
			});
			
			return false;
		});


		$('#ModalUploadArquivo').on('submit', function(e){
			e.preventDefault();

			$("#btn-arquivo").html('AGUARDE...');
			$("#btn-arquivo").addClass('btn-enviando');
	
			var form= $('#ModalUploadArquivo')[0];
			var data= new FormData(form);

			var id_aula= $('#id_aula_setada').val();
			var disciplina= $('#disciplina').val();
			var turma= $('#turma').val();
			var aluno= $('#aluno_logado').val();
	
			$.ajax({
			 type:'POST',
			 url: 'controlers/aulas/sobe_arquivo.php?id_aula='+id_aula+'&d='+disciplina+'&t='+turma+'&aluno='+aluno,
			 data: data,
			 contentType:false,
			 processData:false,
			 success: function(msg) {
				$("#btn-arquivo").html('ENVIAR');
				$("#btn-arquivo").removeClass('btn-enviando');
				$("#sucesso-msg-arq").removeClass('hide');
				setTimeout(function(){ $("#sucesso-msg-arq").addClass('hide'); }, 3000);
			  }   
			});

			
		});

		
	 $("#FormAvaliaAula").submit(function(){
    	
    	$("#ModalAvaliaAula").modal('hide');
    	id_aula_setada = $("#id_aula_setada").val();
		var formdata = $("#FormAvaliaAula").serialize()+'&id_aula='+id_aula_setada;

		$.ajax({type: "POST", url:$("#FormAvaliaAula").attr('action'), data:formdata, success: function(msg){										
			$('#FormAvaliaAula')[0].reset();
					
		} 
		});
		
		return false;
	});
    
});




	
	
	$(document).on('click', '.botao-responde-questionario', function(e) {

		var qtd = $(".qtd-perguntas-quest").length;
		
		var respondidos = $("input[type=radio]:checked").length;
		var respondidos_dissertativa = 0;

		$("textarea").each(function(){
        	if(this.value!=''){
        		respondidos_dissertativa = (respondidos_dissertativa+1);
        	}	        	
    	});
		

		var final_resp = 'A ação não poderá ser desfeita!';
		var button_cancel = 'Não, voltar ao teste';
		var ops = 'Enviar Respostas?';
		var no = true;	

		var total_respondidos = (respondidos+respondidos_dissertativa);
		

		if(qtd!=total_respondidos){
			var final_resp = 'Existem '+(qtd-total_respondidos)+' questões sem resposta!';	
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


	// FUNÇÕES CRIADA POR RUAN

 	function buscaNotas() {

		var id_aula= $('#id_aula_setada').val();
		var disciplina= $('#disciplina').val();
		var turma= $('#turma').val();
		var aluno= $('#aluno_logado').val();

		$.ajax({
			url: 'controlers/aulas/busca_anotacoes.php?aula='+id_aula+'&disciplina='+disciplina+'&turma='+turma+'&aluno='+aluno,
			type: 'GET',
			success:function(html) {
			$('.anotacoes_pai').html('');
			$('.anotacoes_pai').append(html);
			$(".anotacoes_pai").removeClass('hide');
			$('#loadNotas').addClass('hide');
			}
		});
 }


	function salvaNotas() {

	$("#btn-envia-nota").html('AGUARDE...');
	$("#btn-envia-nota").addClass('btn-enviando');

	var id_aula= $('#id_aula_setada').val();
	var disciplina= $('#disciplina').val();
	var turma= $('#turma').val();
	var aluno= $('#aluno_logado').val();
	var notas= $('#notas').val();

	$.ajax({
		url: 'controlers/aulas/salva_anotacoes.php?aula='+id_aula+'&disciplina='+disciplina+'&turma='
		+turma+'&aluno='+aluno+'&notas='+notas,
		type: 'POST',
		success:function(html) {
			$('.anotacoes_pai').html('');
			$('.anotacoes_pai').addClass('hide');
			$('#loadNotas').removeClass('hide');
			$("#btn-envia-nota").html('ENVIAR');
			$("#btn-envia-nota").removeClass('btn-enviando');
			$("#sucesso-msg-nota").removeClass('hide');
			setTimeout(function(){ 
			$("#sucesso-msg-nota").addClass('hide');
			}, 3000);
			
			buscaNotas();


		}
	});
}



 //---------------------------------------------------//