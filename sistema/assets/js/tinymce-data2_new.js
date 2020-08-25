/*Tinymce Init*/

$(function() {
	"use strict";
	
	tinymce.init({
	  selector: '.tinymce',
	  setup : function(ed) {
        ed.on("keyup", function(){    
        	
            name = $(this).attr('id');           
            if(name=='glossario'){
            	if(tinymce.activeEditor.getContent()!=''){$("#dados2").show();} else {$("#dados2").hide()} 	
            }

            if(name=='objetivo_aula'){
            	if(tinymce.activeEditor.getContent()!=''){$("#dados3").show();} else {$("#dados3").hide()} 	
            }

            if(name=='apresentacao'){
            	if(tinymce.activeEditor.getContent()!=''){$("#dados4").show();} else {$("#dados4").hide()} 	
            }

            if(name=='doc_complementares'){
            	if(tinymce.activeEditor.getContent()!=''){$("#dados5").show();} else {$("#dados5").hide()} 	
            }

            if(name=='ref_bibliograficas'){
            	if(tinymce.activeEditor.getContent()!=''){$("#dados6").show();} else {$("#dados6").hide()} 	
            }
           


        });
   	  },
	  language_url : 'vendors/bower_components/tinymce/pt_BR.js',
	  height: 400,
	  plugins: [
		'advlist autolink lists link image charmap print  anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste code'
	  ],
	  toolbar: 'styleselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ',
	 
	});
});