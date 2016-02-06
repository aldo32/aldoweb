var intentosFacebook = 0; 

window.fbAsyncInit = function() {
    // init the FB JS SDK
	FB.init({
		appId      : config.fb_app_id,
		cookie     : true,  // enable cookies to allow the server to access the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.0' // use version 2.0
	});

    // Additional initialization code such as adding Event Listeners goes here
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/" + config.locale + "/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
	loginFacebookApp('log');
}

//FUNCION RECURSIVA
function fbResultsToParams(key,value) {
	if (value instanceof Array) {
		return "";
	} else if (value instanceof Object) {
		var acParam = "[";
		for (var subkey in value) {
			acParam += fbResultsToParams(subkey,value[subkey]); 
		}
		acParam = acParam.replace(/&/g,'|');
		acParam +="]";
		return "&fb"+key+"="+acParam;
	} else {
		return "&fb"+key+"="+value;
	}
}

function login(fbparams) {
	var success = function(result){
		var exito = false;
		if (typeof result != 'undefined' && typeof result.status != 'undefined') {
			if (result.status.status == 200) {
				if (result.contenido.result) {
					 exito = true;
            		 if (typeof result.contenido.url != 'undefined'){
            			 window.location = result.contenido.url; 
            		 } else {
            			 window.location.reload(); 
            		 }
				} else {
	    			var errorObj;
					for (var name in result.contenido.validation.errores) {
						console.debug(result.contenido.validation.errores[name]);
						if (name == 'empresaBlocked') {
							window.location = result.contenido.validation.errores[name];
						} else {
							$('#login-facebook').append('<strong class="error-tag hide"><span class="ticon ticon-warning"></span>'+
									'<span class="error-desc">'+result.contenido.validation.errores[name]+'</span>'+
					    			'</strong>');
						}
					}
					$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
	    			setTimeout(function(){$('.error-tag').remove();},5400);
				}
			} else {
				realestate().ui.notification.add({text:result.errorMessage, type:"error"});
				enableSubmitButtons();
			}
		} else {
			realestate().ui.notification.add({text:'Error interno', type:"error"});
			enableSubmitButtons();
		}
	};
	$.ajax({
		url: "/login_login.ajax",
		data: fbparams,
		success: success
	});
}

function llenarDatosFacebookParaFormulario(userID, type) {
	//CONSULTO DATOS BASICOS QUE PRECISO PARA EL LOGIN O LA REGISTRACION
	//CUANDO RETONRAN DICHOS DATOS REALIZO LA INVOCACION CORRESPONDIENTE
	var query ="";
	if (type.substring(0, 3) == 'log'){
		query =  'SELECT uid, first_name, last_name, email FROM user WHERE uid='+userID;
	}
	FB.api({method: 'fql.query',
		query: query},
		function(response) {
			if (response.error_code == undefined) {
				var fbparams ="";
				for (var key in response[0]) {
					fbparams += fbResultsToParams(key,response[0][key]);
				}
				if (type == 'log') {
					login(fbparams);
				}
			} else if  (response.error_code == '190' && intentosFacebook < 5) {
				//ESTO ES PARA MANEJAR EL ERROR DE QUE EL USUARIO SE DESLOGUEO DESDE LA
				//PAGINA DE FACEBOOK Y LA API NO SE ENTERO
				intentosFacebook++;
				loginFacebookApp(type);
			} else {
				enableSubmitButtons();
				$('#login-facebook').append('<strong class="error-tag hide"><span class="ticon ticon-warning"></span>'+
		    			'<span class="error-desc">Error al obtener datos de Facebook. Vuelva a intentarlo en unos minutos.</span>'+
		    			'</strong>');
				$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
    			setTimeout(function(){$('.error-tag').remove();},5400);
				console.log('Error al obtener datos de Facebook. Vuelva a intentarlo en unos minutos.');
			}
		});
}

function loginFacebookApp(type) {
	disableSubmitButtons();
	FB.getLoginStatus(function(response) {
		if (response.status == 'connected') {
			llenarDatosFacebookParaFormulario(response.authResponse.userID,type);
		} else {
			FB.login(function(response) {
				if (response.status === 'connected') {
					llenarDatosFacebookParaFormulario(response.authResponse.userID,type);
				} else {
					console.log('No se pudo loguear en Facebook...');
					enableSubmitButtons();
				}
			},{scope: 'public_profile,email'});
		}
	});
}

function disableSubmitButtons() {
	$('#login').find('input[type=submit]').attr('disabled','disabled');
}

function enableSubmitButtons() {
	$('#login').find('input[type=submit]').removeAttr('disabled');
}