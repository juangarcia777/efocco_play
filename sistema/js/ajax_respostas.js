function envia(id) {
	var log= $('#logado').val();
	var resposta = $("input[name='radio']:checked").val();
	$.ajax({
		url: 'http://localhost/novo-ava/ava-effoco/controlers/alunos/resposta.php',
		type: 'POST',
		data: { user: log, resp: resposta, id_quest: id },
		success:function(html) {
			swal({   
			title: "Resposta Enviada!",   
             type: "success", 
			text: "",
			confirmButtonColor: "#3cb878",   
        });
		},
		error:function() {
			alert("Erro Interno...Tente novamente mais tarde");
		}

	});
}

