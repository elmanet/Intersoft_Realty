$(function(){
	$("#refreshimg").click(function(){
		$.post('newsession.php');
		$("#captchaimage").load('image_req.php');
		return false;
	});
	
	$("#captchaform").validate({
		rules: {
			captcha: {
				required: true,
				remote: "modules/acceso/process.php"
			},
			username:"required",
			password:"required",
		},
		messages: {
			captcha: " Captcha Incorrecto!",
			username: " <br/><small style='color:#fff;'>Debes Ingresar T&uacute; Username</small>",
			password: " <br /><small style='color:#fff;'>Debes Ingresar T&uacute; Contrase&ntilde;a</small>",	
		},

		onkeyup: true
	});
	
});
