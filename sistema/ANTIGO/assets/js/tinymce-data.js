/*Tinymce Init*/

$(function() {
	"use strict";
	
	tinymce.init({
	  selector: '.tinymce',
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