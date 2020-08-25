$(document).ready(function() {


$('#modal_aula').on('hidden.bs.modal', function () {
	player.play();
});

function millisToMinutesAndSeconds(a) {
	var minutes = (Math.floor((a%3600)/60));
	var seconds= a - minutes * 60;
	return minutes+":"+seconds;
  }
  


if($("#video_aula").val() != ''){

	var iframe = $('#VimeoVideoPlayer');
	var player = new Vimeo.Player(iframe);
	
	player.getDuration().then(function(duration){
		var tempo = millisToMinutesAndSeconds(duration);
		$('#tempo').html(tempo);
	}).catch(function(error){
		
	});

    var disparo=0;
	var disparo2=0;
	
	var disp_30= 0;
	var disp_60= 0;


    player.on('timeupdate', function(e) {
		porcentagem = (e.percent*100);


		if(porcentagem>30){

			if(disp_30==0){
				disp_30=1;
				
				player.pause();
				$("#modal_aula").modal();
				
			}

		}

		if(porcentagem>60){

			if(disp_60==0){
				disp_60=1;
				
				player.pause();
				$("#modal_aula").modal();
				
			}

		}

		if(porcentagem>90){

			if(disparo==0){

				$('.travada').first().addClass('assisti-aula');
				$('.travada').first().removeAttr('onclick');
				$('.travada').first().removeClass('travada');
				
				disparo=1;		
				var aula = $("#id_aula_setada").val();								
				$.post('controlers/aulas/check_visualizados.php',{aula:aula,tipo:'aula'}, function(a){
					$("#aula-completa-check-"+aula).prop("checked", true);
				}); 

			
			}

			var fim = (e.duration-3);	            
	        if(e.seconds>fim && disparo2==0){
	            $("#ModalAvaliaAula").modal();
				disparo2=1;
			}

			
		
		}
	});

} else {

	var aula = $("#id_aula_setada").val();								
	setTimeout(function(){ 
		$('.travada').first().addClass('assisti-aula');
		$('.travada').first().removeAttr('onclick');
		$('.travada').first().removeClass('travada');
		$.post('controlers/aulas/check_visualizados.php',{aula:aula,tipo:'aula'}, function(a){$("#aula-completa-check-"+aula). prop("checked", true);})
		
	}, 3000); 

}


    
});



