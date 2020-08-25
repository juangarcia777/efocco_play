$(function() {
    $('#toggle-event').change(function() {
      	
      	//ENABLE DARK	
      	if($(this).prop('checked')){
        	$('head').append('<link rel="stylesheet" href="assets/css/dark.css" id="dark_theme">');
          dark =1;
      	//ENABLE LIGHT	
      	} else {      		
      		$('#dark_theme').remove();
          dark =0;
      	}

        $.post('controlers/configuracoes/salva_dark_tema.php', {dark:dark});

    })



    $(document).on('click', '.check-files-aula, .nome-aula-click', function(e) {   

      if($(this).data('aula')) {
        aula_id = $(this).attr('data-aula');         
        $("#aula_completa_check_"+aula_id). prop("checked", true);
      }   

      if($(this).data('questionario')) {
        quest_id = $(this).attr('data-questionario');                 
        //$("#questionario_completo_check_"+quest_id). prop("checked", true);
      }   
      
      total = 0;
      count = 0;
      id = $(this).attr('data-id');   
      $(':checkbox[data-id="'+id+'"]').each(function () {
          if($(this).is(':checked')){
              count++;
          }
        total++;    
      });
       
      if(total==count){
        $("#aula-completa-check-"+id). prop("checked", true);
      } else {
        $("#aula-completa-check-"+id). prop("checked", false);
      } 

    });





    $(document).on('click', '.assisti-aula, .abre-questionario', function(e) {
            
      $("#body-assisti-aula").html('');
      $('#status').fadeIn();
      $('#preloader').fadeIn();
      
      if($('#div-verifica-mobile').is(':visible')){
        $('#sidebar').toggleClass('active');  
      }

      

      //TITULO
      if($(this).data('name')) {
        name = $(this).attr('data-name');
        $("#nomes-aula-topo").html(name);
      }

      //QUESTIONARIO
      if($(this).data('questionario')) {
        id = $(this).attr('data-questionario');
        aula = $(this).attr('data-id');                  
        location.hash = "aula="+aula+'&questionario='+id;
        url = 'views/aulas/questionario.php';
      //AULA  
      } else {
        id = $(this).attr('data-id');       
        location.hash = "aula="+id;
        url = 'views/aulas/assisti_aula.php';
      }


      if($(this).data('glossario')) {
        url = 'views/aulas/glossario_aula.php';
      }
      
      $.post(url,{id:id}, function(data){
          $("#body-assisti-aula").html(data);
          $('#status').fadeOut();
          $('#preloader').delay(350).fadeOut('slow');
      });
        
    });



    $(document).on('click', '.nota_questionario', function(e) {
        
        location.hash = "aula="+aula+'&nota';
        $("#body-assisti-aula").html('');
        $('#status').fadeIn();
        $('#preloader').fadeIn();
        
        $.post('views/aulas/nota_questionario.php',{nada:0}, function(data){
          $("#body-assisti-aula").html(data);
          $('#status').fadeOut();
          $('#preloader').delay(350).fadeOut('slow');
        });

    });


    $(document).on('click', '.close-menu-aulas', function(e) {
      
        $('#sidebar').toggleClass('active');

    });


    $(".pesquisa-aulas").keyup(function(){
      if(this.value!=''){
        var retorno = this.value;        

        if(retorno.length>1){
          $(".aulas-materia").hide();            
          var pesquisa = retorno.toLowerCase();  
          $('[data-name*="'+pesquisa+'"]').show();
          $('[data-expand*="'+pesquisa+'"]').addClass('show');
        }
        
      } else {
        $(".aulas-materia").show();            
      }
    });


    $(".formulario-form").submit(function(){
      $(".icon-button-form-post").removeClass('hide');
    });
    

})


function GetCountAvisos(){
  $.post('api/avisos/contador_nao_lidos.php', function(data) {
    if(data>0){
        if(data>99){data='99+';}
        $(".avisos-topo").html(data);  
        $(".avisos-topo").show();    
      } else {
        $(".avisos-topo").hide();   
        $(".avisos-topo").html('');   
      }         
  }); 
}

function GetListAvisos(){          
  $(".aguarde-avisos").show();
  //$.post('api/avisos/lista_avisos_topo.php', function(data) {    
    
        //var data = JSON.parse(data);
    //    $(".aguarde-avisos").hide();
     //   $("#list-avisos-topo").append(data);
        
            

 // }); 
}



$(document).ready(function() {

    if ($(".avisos-topo").length > 0) {
      //GetCountAvisos();
    }



    
    
});