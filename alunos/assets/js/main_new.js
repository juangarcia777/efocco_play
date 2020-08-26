(function ($) {
	"use strict";

	$(".msg-trigger-btn").on("click", function (event) {
		event.stopPropagation();
		event.preventDefault();
		var $this = $(this);
		var $prevTartget = $(this).parent().siblings().children(".msg-trigger-btn").attr('href');
		var target = $this.attr('href');

		if(target=='#avisos-exibe'){
			GetListAvisos();
		}

		$(target).slideToggle();
		$($prevTartget).slideUp();
		
    });

	//Close When Click Outside
	$('body').on('click', function(e){
		var $target = e.target;
		if (!$($target).is('.message-dropdown') && !$($target).parents().is('.message-dropdown')) {
			$(".message-dropdown").slideUp("slow");
		}
	});


	
	// mobile header seach box active
	$(".search-trigger").on('click', function(){
		$('.search-trigger, .mob-search-box').toggleClass('show');
	})
	
	$(".chat-trigger, .close-btn").on('click', function(){
		$('.mobile-chat-box').toggleClass('show');
	})
	$(".request-trigger").on('click', function(){
		$('.frnd-request-list').toggleClass('show');
	})

	// mobile friend search active js
	$(".search-toggle-btn").on('click', function(){
		$('.mob-frnd-search-inner').toggleClass('show');
	})

	// profile dropdown triger js
	$('.profile-triger').on('click', function(event){
		event.stopPropagation();
        $(".profile-dropdown").slideToggle();
	})

	//Close When Click Outside
	$('body').on('click', function(e){
		var $target = e.target;
		if (!$($target).is('.profile-dropdown') && !$($target).parents().is('.profile-dropdown')) {
			$(".profile-dropdown").slideUp("slow");
		}
	});

	// nice select active js
	$('select').niceSelect();

	// Scroll to top active js
	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 600) {
			$('.scroll-top').removeClass('not-visible');
		} else {
			$('.scroll-top').addClass('not-visible');
		}
	});
	$('.scroll-top').on('click', function (event) {
		$('html,body').animate({
			scrollTop: 0
		}, 1000);
	});


	$(window).on('load', function() {                
    	
		if ($("#pagina-disciplina").length > 0) {
			  var dados = $(location).attr('hash'); 
			  var trabalho=0;     		
      		if(dados!=''){
      			
      			var url = 'views/aulas/assisti_aula.php';
      			var ex = dados.split('#aula=');
				var busca = ex[1];


				var n = busca.search("&questionario=");

				if(n>0){
					var ex2 = ex[1].split('&questionario=');
					var aula = ex2[0];
					location.hash = "aula="+aula+'&questionario='+ex2[1];
					var url = 'views/aulas/questionario.php?id='+ex2[1];
					$('#box_'+aula).addClass('aula-atual');

				} else {
					
					var n = ex[1].search("&trabalho=");

					if(n>0){
						
						var ex3 = ex[1].split('&trabalho=');
						var aula = ex3[0];
						location.hash = "aula="+aula+'&trabalho='+ex3[1];
						var trabalho = ex3[1];
						
					} else {
						var aula = ex[1];
						location.hash = "aula="+aula;
						$('#box_'+ex[1]).addClass('aula-atual');
					}

					
				}

				$("#expand-aulas"+aula).addClass('show');

				$.post(url,{id:aula, trabalho:trabalho}, function(data){
			    	$("#body-assisti-aula").html(data);
			        $('#status').fadeOut();
					$('#preloader').delay(50).fadeOut('slow');
					
					if(trabalho!=''){
						
					}	

			    });

      		} else {
      			$.post('views/aulas/bem_vindo.php',{id:0}, function(data){
			    	$("#body-assisti-aula").html(data);
			        $('#status').fadeOut();
			        $('#preloader').delay(50).fadeOut('slow');
			    });
      		}
    	} else {
    		$('#status').fadeOut();
        	$('#preloader').delay(50).fadeOut('slow');
    	}
        
	});


    
})(jQuery);



