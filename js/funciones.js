$(function() { 
	var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;	
	$("#boton").click(function(){  
		$("#error").fadeOut().remove();
		
        if ($("#name").val() == "") {  
			$("#name").focus().after('<p id="error" class="bg-danger">&nbsp &nbsp Ingrese su nombre</p>');  
			return false;  
		}  
        if ($("#email").val() == "" || !emailreg.test($("#email").val())) {
			$("#email").focus().after('<p id="error" class="bg-danger">&nbsp &nbsp Ingrese un email correcto</p>');  
			return false;  
		}  
        if ($("#asunto").val() == "") {  
			$("#asunto").focus().after('<p id="error" class="bg-danger">&nbsp &nbsp Ingrese un asunto</p>');  
			return false;  
		}  
        if ($("#message").val() == "") {  
			$("#message").focus().after('<p id="error" class="bg-danger">&nbsp &nbsp Ingrese un mensaje</p>');   
			return false;  
		}  
    });  
	$("#name, #asunto, #message").bind('blur keyup', function(){  
        if ($(this).val() != "") {  			
			$('#error').fadeOut();
			return false;  
		}  
	});	
	$("#email").bind('blur keyup', function(){  
        if ($("#email").val() != "" && emailreg.test($("#email").val())) {	
			$('#error').fadeOut();  
			return false;  
		}  
	});
});


//<span class="error">Ingrese un email correcto</span>