$(document).ready(function(){

    var aluno= $('#aluno').val();
    var curso= $('#curso').val();
    var disciplina= $('#disciplina').val();

    $.ajax({
        url: 'controlers/aluno/load_boletim.php',
        type:'POST',
        data: {aluno: aluno, curso: curso, disciplina: disciplina},
        success:function(html){
            $('#teste').append(html);
            $('.load').css('display','none');
        }
    });

});