  




  $('.cpf').mask('000.000.000-00');
  $('.cep').mask('00000-000');
  $('.celular_ddd').mask('(00) 00000-0000');
  $('.telefone_ddd').mask('(00) 0000-0000');



$(function() {
    
    $(document).on('click', '.info-details', function(e) {      
      id = $(this).attr('data-id'); 
      url = $(this).attr('data-link'); 
	  $(".body-modal-info").html('aguarde...');
      $("#ModalDetailInfo").modal();
       $.post(url,{id:id}, function(data){
          $(".body-modal-info").html(data);          
      });
    });

});


function aovivo(){
	if($('#collapseExample').is(':visible')){
		$('input[name="link_aovivo"]').val('');
		$('input[name="data_aovivo"]').val('');	
	} 
}

function AVAdisciplinasAulas(id){
	$("#disciplina").html('<option value="">carregando...</option>');          
	$.post('controlers/pesquisas/busca_disciplinas.php',{id:id}, function(data){
		
        $("#disciplina").html(data);          
    });
}

function AVAalunoturmas(id){
	$("#aluno").html('<option value="">carregando...</option>');          
	$.post('controlers/pesquisas/busca_alunos_turmas.php',{id:id}, function(data){
		
        $("#aluno").html(data);          
    });
}





$(document).ready(function() {

	$("#FormRelatorioGerencial").submit(function(){
	  $("#preloader").show();
	  $("#status").show();
	  $("#spinner").show();
	});


	$("#titulo").keyup(function() {
		if($("input[name='titulo']").val()!=''){$("#dados1").show();} else{$("#dados1").hide();}
	});


	if($("#dados1").length == 1) {
		if($("input[name='titulo']").val()!=''){$("#dados1").show();}	
		if($("textarea[name='glossario']").val()!=''){$("#dados2").show();}		
		if($("textarea[name='objetivo_aula']").val()!=''){$("#dados3").show();}		
		if($("textarea[name='apresentacao']").val()!=''){$("#dados4").show();}		
		if($("textarea[name='doc_complementares']").val()!=''){$("#dados5").show();}		
		if($("textarea[name='ref_bibliograficas']").val()!=''){$("#dados6").show();}		
	}

    
    if ($("input[name=aviso-mensagem-ava]").length) { 

    	aviso_message = $("input[name=aviso-mensagem-ava]").val();
    	aviso_type = $("input[name=aviso-tipo-ava]").val();

    	if(aviso_message!='' && aviso_type!='') {
	        
	           $.toast().reset('all');   
				$("body").removeAttr('class').addClass("bottom-center-fullwidth");
				$.toast({
		           	heading: aviso_message,
		            text: '',
		            position: 'bottom-center',
		            loaderBg:'#3cb878',
		            icon: aviso_type,
		            hideAfter: 3500
		        });
				return false;
	            

	        $("input[name=aviso-tipo-ava]").val('');
    		$("input[name=aviso-mensagem-ava]").val('');

	    }

	}

});



$(document).on('click', '.apaga-elemento', function(e) {
   
        id = $(this).attr('data-id'); 
        post = $(this).attr('data-post'); 
        aviso_title = $(this).attr('data-title'); 
        aviso_message = $(this).attr('data-text'); 
        retorno = $(this).attr('data-return'); 
       	opt = $(this).attr('data-opcao');  
  

        swal({   
           title: aviso_title,   
	            text: aviso_message,   
	            type: "warning",   
	            confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Não, cancelar',
                confirmButtonClass: 'btn',
                cancelButtonClass: 'btn btn-danger m-l-10',                                
                showCancelButton: true,
                closeOnConfirm: false, 
                confirmButtonColor: '#5cb85c',
                cancelButtonColor: '#d9534f' 
        }, function(){   
              
        
            	$.post(post, {id:id, opcao:opt}, function(a){

            		location.href = retorno;
            	});	
            

             
        });
		return false;
		
		   

});





$(document).on('click', '.checkbox-all', function(e) {
   
  if ($(this).is(':checked')) {
      $(".select-checkbox"). prop("checked", true);
  } else {
      $(".select-checkbox"). prop("checked", false);
  }

});






$(window).on('load', function() {                
    	
		$('#status').fadeOut();
        	$('#preloader').delay(350).fadeOut('slow');
        
	});



  // ADICIONA UM ALUNO EM UMA TURMA
  function addAlunoCurso(id, turma) {

  		  // Get the checkbox
		  var checkBox = document.getElementById("checkbox"+id);

		  // If the checkbox is checked, display the output text
		  if (checkBox.checked == true){
		    var opcao = 1;
		  } else {
		    var opcao = 2;
		  }

		$.ajax({

		        type:"GET",//or POST
		        url:'controlers/alocacao/alunos-em-turmas.php',
		                           //  (or whatever your url is)
		        data:{data1:id,data2:turma,data3:opcao},
		        //can send multipledata like {data1:var1,data2:var2,data3:var3
		        //can use dataType:'text/html' or 'json' if response type expected 
		        success:function(responsedata){
		               swal({   
							title: "Eba!",   
				             type: "success", 
							text: "Aluno adicionado/removido com sucesso!",
							confirmButtonColor: "#3cb878",   
				        });

		        }
		     })

	}

	// ADICIONA UMA DISCIPLINA EM UMA TURMA
	  function addDiscTurma(id, turma) {

	  		  // Get the checkbox
			  var checkBox = document.getElementById("checkbox"+id);

			  // If the checkbox is checked, display the output text
			  if (checkBox.checked == true){
			    var opcao = 1;
			  } else {
			    var opcao = 2;
			  }

			$.ajax({

			        type:"GET",//or POST
			        url:'controlers/alocacao/disciplinas-em-turmas.php',
			                           //  (or whatever your url is)
			        data:{data1:id,data2:turma,data3:opcao},
			        //can send multipledata like {data1:var1,data2:var2,data3:var3
			        //can use dataType:'text/html' or 'json' if response type expected 
			        success:function(responsedata){
			             
			             $.toast().reset('all');   
						$("body").removeAttr('class').addClass("bottom-center-fullwidth");
						$.toast({
				           	heading: 'Alteração efetuada com sucesso!',
				            text: '',
				            position: 'bottom-center',
				            loaderBg:'#3cb878',
				            icon: 'success',
				            hideAfter: 3500
				        });
						return false;	 

			        }
			     })

		}

	// ADICIONA UMA TURMA EM UM CURSO
	  function addTurmaCurso(id, curso) {

	  		  // Get the checkbox
			  var checkBox = document.getElementById("checkbox"+id);

			  // If the checkbox is checked, display the output text
			  if (checkBox.checked == true){
			    var opcao = 1;
			  } else {
			    var opcao = 2;
			  }

			  console.log(id+'+'+curso);

			$.ajax({

			        type:"GET",//or POST
			        url:'controlers/alocacao/turmas-em-cursos.php',
			                           //  (or whatever your url is)
			        data:{data1:id,data2:curso,data3:opcao},
			        //can send multipledata like {data1:var1,data2:var2,data3:var3
			        //can use dataType:'text/html' or 'json' if response type expected 
			        success:function(responsedata){
			                $.toast().reset('all');   
						$("body").removeAttr('class').addClass("bottom-center-fullwidth");
						$.toast({
				           	heading: 'Alteração efetuada com sucesso!',
				            text: '',
				            position: 'bottom-center',
				            loaderBg:'#3cb878',
				            icon: 'success',
				            hideAfter: 3500
				        });
						return false;	 

			        }
			     })

		}

	