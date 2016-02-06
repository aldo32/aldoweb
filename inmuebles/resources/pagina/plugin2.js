/* Switch device */
$(".js-mobile_mode").on('click', function(e){    
    e.preventDefault();
    var full = window.location.host
    var parts = full.split('.')
    var sub = parts[0]
    var mobile_domain = window.location.hostname.replace(sub,'m');
    realestate().cookies.setCookie('mobile_disabled','false',1,mobile_domain);
    window.location = $(this).attr("href");
    return false;
});

/****************************/
/*** CheckBroser **************/
/****************************/
function browserTester(browserString) {
    return navigator.userAgent.toLowerCase().indexOf(browserString) > -1;
}
function isIOS() {
	return !!navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad)/);
}
function get_browser(){
    var N=navigator.appName, ua=navigator.userAgent, tem;
    var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
    M=M? [M[1], M[2]]: [N, navigator.appVersion, '-?'];
    return M[0];
    }
function get_browser_version(){
    var N=navigator.appName, ua=navigator.userAgent, tem;
    var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
    M=M? [M[1], M[2]]: [N, navigator.appVersion, '-?'];
    return M[1];
    }
function isIE11(){
    return !!navigator.userAgent.match(/Trident.*rv\:11\./)
}

/* CONSOLA *******************************************************/
/* Para que el uso de console. no crashee los navegadores viejos */
(function (con) {
  'use strict';
  var prop, method;
  var properties = 'memory'.split(',');
  var methods = ('assert,count,debug,dir,dirxml,error,exception,group,' +
     'groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,' +
     'time,timeEnd,trace,warn').split(',');
  while (prop = properties.pop()) con[prop] = con[prop] || {};
  while (method = methods.pop()) con[method] = con[method] || function() {};
})(window.console = window.console || {});


jQuery.fn.outerHTML = function() {
    return $('<div>').append( this.eq(0).clone() ).html();
};

//$_GET VARS
var VARS_GET=document.location.search.replace('?','').split('&');
typeof VARS_GET == 'undefined' ? $_GET = false : $_GET = new Array();
if ($_GET) for(i=0;i<VARS_GET.length;i++){var temp_GET=VARS_GET[i].split('=');$_GET[temp_GET[0]]=temp_GET[1];};

/*Lectura de hash vars enhanced*/
var $_HASH_GET = [],
    $_HASH;
var initHash = function(){
    if(document.location.hash){
	var hash_string = document.location.href.split('#!/')[1];
	//Busco si hay hash queries
	if( hash_string && hash_string.search(/[?]/) >= 0){
		var hash_exploded = hash_string.split('?');
		var hash_gets = hash_exploded[1];
		$_HASH = hash_exploded[0];
		var hash_gets_vars = hash_gets.split('&');
		typeof hash_gets_vars == 'undefined' ? $_HASH_GET = false : $_HASH_GET = [];
		if($_HASH_GET) for(i=0;i<hash_gets_vars.length;i++){var temp_$_HASH_GET = hash_gets_vars[i].split('=');$_HASH_GET[temp_$_HASH_GET[0]] = decodeURIComponent(temp_$_HASH_GET[1])};
	}else{
		$_HASH = hash_string != '' ? hash_string : 'undefined';
	}
    }    
};
var hash = function(){
    initHash();
    return $_HASH;
};

var hashget = function(search){
    initHash();
    if(typeof search != 'undefined'){
        return $_HASH_GET[search];
    }
    return $_HASH_GET;
};


var Traductor = function()
{
   

    // Public method
    this.get = function(clave,texto)
    {
    	var traducido =  traduccionesGenerales[clave];
    	
    	if (  traducido == "" || typeof traducido == "undefined" ){
    		traducido =  traduccionesPagina[clave];
    		
    		if (  traducido == "" || typeof traducido == "undefined" ){
    			var pagina = traduccionesPagina["contentPage"];
    			
    			if ( texto != "" && typeof texto != "undefined"){
    				traducido = texto;
    			}else{
    				traducido = clave;
    			}
    			
    			$.ajax({
					type: "POST",
					url: "/common_getTraduccionJavascript.ajax",
					dataType:'json',
					data: {'claveJavascript':clave,'pagina':pagina,'texto':texto},
					success: function(datos){
						var status = datos.status.status;
						switch(status){
							case 200:
								traducido = datos.contenido;
								traduccionesPagina[clave] = traducido;
								break;
						}
						return traducido;
					}
				});
    		}
    	}
    	
    	return traducido;	
    	
    };
};
var traductor = new Traductor();





/*****************************/
/*****MAX Z-INDEX*************/
/*****************************/
$.maxZIndex = $.fn.maxZIndex = function(opt) {
    var def = { inc: 10, group: "*" };
    $.extend(def, opt);
    var zmax = 0;
    $(def.group).each(function() {
        var cur = parseInt($(this).css('z-index'));
        zmax = cur > zmax ? cur : zmax;
    });
    if (!this.jquery)
        return zmax;

    return this.each(function() {
        zmax += def.inc;
        $(this).css("z-index", zmax);
    });
}


/****************************/
/*** SCROLL TO **************/
/****************************/
$.fn.scrollTo = function(){
    $(this).on('click',function(e){
        e.preventDefault();
        $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
        }, 500);                            
    });
};

/***********BTN SWITCH************/
$(document).on('click','.switch',function(e){
	e.preventDefault();
	$(this).toggleClass('switch-on');
});

/***********SCROLL TO ELEMENT************/
// Para scrollear fácil hacia cualquier elemento
// scrollToElemnt('#IDdelElemento');
function scrollToElemnt(obj,sec){
	var it = $(obj).offset().top - 30;
    var s = sec || 300;
	$('html, body').animate({
        scrollTop: it
	}, s); 
}

/*************SEPARADOR DE MILES**************/
function miles(obj){
	function separadorMiles(val){
		var separador = ".";//ESTO TENDRIA QUE CAMBIAR SEGUN PAIS
		
	    while (/(\d+)(\d{3})/.test(val.toString())){
	      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+separador+'$2');
	    }
	    return val;
	 }

	$(obj).each(function( index ) {
		$(this).html(separadorMiles($(this).text()));
	});
	
	//miles('.precio-valor');
}	


function separadorMiles(valor){
	var separador = config.numeracion.SEPARADOR_MILES;
	
    while (/(\d+)(\d{3})/.test(valor.toString())){
      valor = valor.toString().replace(/(\d+)(\d{3})/, '$1'+separador+'$2');
    }
    return valor;
 } 

function permitirSoloEnteros(event){
	if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
            // Allow: Ctrl+A
           (event.keyCode == 65 && event.ctrlKey === true) || 
            // Allow: home, end, left, right
           (event.keyCode >= 35 && event.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
       }
       else {
           // Ensure that it is a number and stop the keypress
           if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
               event.preventDefault(); 
           }   
       }
}
/*************ResetForm**************/
function resetForm(obj){
	$(obj).find(':input').each(function() {
	    switch(this.type) {
	        case 'password':
	        case 'select-multiple':
	        case 'select-one':
	        case 'text':
	        case 'number':
	        case 'email':
	        case 'textarea':
	            $(this).val('');
	            break;
	        case 'checkbox':
	        case 'radio':
	            this.checked = false;
	    }
	});
}

/*************ResetForm**************/
function traduccion(){
	$(obj).find(':input').each(function() {
	    switch(this.type) {
	        case 'password':
	        case 'select-multiple':
	        case 'select-one':
	        case 'text':
	        case 'number':
	        case 'email':
	        case 'textarea':
	            $(this).val('');
	            break;
	        case 'checkbox':
	        case 'radio':
	            this.checked = false;
	    }
	});
}

/****************************************************/
/************* COLLAPSIBLE MENUS ********************/
/****************************************************/
$.fn.collapsible = function(){
    return $.each($(this),function(){
        $(this).find('li.padre > a, li.padre > .a-title').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            var a = $(this);
            var li = a.parent('li');
            var childs = li.find('ul:first');
            
            childs.slideToggle(200,function(){
            	if(li.hasClass('cerrado')){
            		li.addClass('abierto').removeClass('cerrado');
            		if(a.hasClass('mas-menos')){ a.addClass('oculto').next('.mas-menos').removeClass('oculto');}
            	}else{
            		li.addClass('cerrado').removeClass('abierto');
            		if(a.hasClass('mas-menos')){ a.addClass('oculto').prev('.mas-menos').removeClass('oculto');}
            	}
            });
        });
    });
};

/***************************************************/
/************ GALERIA ******************************/
/***************************************************/

$.fn.galeria = function(){
    return $.each($(this), function(){
        // Galeria de fotos
        
        var $galeria = $(this),
            $thumbnails_wrap = $galeria.find('.galeria-thumbnails-wrap'),
            $thumbnails_container = $thumbnails_wrap.find('.galeria-thumbnails'),
            $thumbnails = $thumbnails_container.find('a'),
            $foto_grande = $galeria.find('.galeria-foto-grande');
            
        var fotoActual = 0,    
            cantidadFotos = $thumbnails.length,
            precarga = $('<img />'),
            foto = $('<img />'),
            cargadas = [],
            anchoThumbs = $thumbnails.eq(0).outerWidth(true);

        $galeria.find('.galeria-foto-siguiente').click(function(e){
            e.preventDefault();
            fotoActual++;
            if(fotoActual + 1 > cantidadFotos) { fotoActual = 0; }
            CambiarFoto(fotoActual);
        });

        $galeria.find('.galeria-foto-anterior').click(function(e){
            e.preventDefault();
            fotoActual--;
            if(fotoActual < 0) { fotoActual = cantidadFotos - 1; }
            CambiarFoto(fotoActual);
        });

        $thumbnails.click(function(event){
            event.preventDefault();
            var numeroFoto = $(this).index() - 1;
            fotoActual = numeroFoto;
            CambiarFoto(numeroFoto);
        });

        $thumbnails_container.css('left','0');
        
        function posicionarIndicador(){
            //Muevo el indicador donde corresponde
            $galeria.find('.galeria-indicador').css('left',(fotoActual*anchoThumbs) +'px');
            var pasados = Math.floor($thumbnails_wrap.width()/2/anchoThumbs);

            if(($thumbnails_wrap.width() > anchoThumbs*(-fotoActual+pasados+cantidadFotos))){
                $thumbnails_container.css('left',(Number(cantidadFotos*anchoThumbs) -  Number($thumbnails_wrap.width())) * -1 +'px');
            }else if(fotoActual >= pasados){
                $thumbnails_container.css('left',anchoThumbs*(pasados-fotoActual) +'px');
            }else{
                $thumbnails_container.css('left',0);
            }
        }

        function CambiarFoto(numeroFoto){
            var thumb = $thumbnails.eq(numeroFoto);
            $foto_grande.hide();
            $_foto_grande = $foto_grande.eq(numeroFoto);
            //Si no esta cargada le pongo el thumbnail como imagen alternativa hasta que cargue la grande
            if(typeof cargadas[numeroFoto] == 'undefined'){
                $_foto_grande.css({
                    'background-image' : 'url('+thumb.find('img').attr('src')+')'
                });     
            }

            //Cambio atributos como el href, el titulo, etc. con los de la foto actual
            $_foto_grande.attr('href', thumb.attr('href')).attr('title',thumb.attr('title')).data('gallery-eq',numeroFoto).show();

            //Creo una imagen sin agregarla en el dom para poder cargar la foto grande
            foto.attr('src',thumb.attr('href'));
            foto.on('load',function(){
                //Cuando termina de cargar la agrego a la lista de cargadas y cambio el src de la foto grande
                cargadas[numeroFoto] = true;
                $_foto_grande.css({
                    'background-image' : 'url('+foto.attr('src')+')'
                });                        
            });

            posicionarIndicador();

            //Precargo la siguiente foto
            if(typeof cargadas[numeroFoto+1] == 'undefined' && numeroFoto < cantidadFotos - 1){
                precarga.attr('src',$thumbnails.eq(numeroFoto+1).attr('href'));
                precarga.on('load',function(){
                    cargadas[numeroFoto+1]=true;
                });
            }
        }

        CambiarFoto(0);        
    });
};

/**********************************************************/
/********************* OPTIONAL INPUTS ********************/
/**********************************************************/
$(function(){
	
	$('.optional-input .over').on('click',function(e){
		e.preventDefault();
		activateOptional($(this).parents('.optional-input'));
	});
		
	$('.optional-input input[type="checkbox"]').on('keydown',function(e){
		if(e.which == 32){
			e.preventDefault();
		}
	});
	
	function activateOptional($this){
		if($this.find('input[type=checkbox]').is(':checked')){
			$this.find('input[type=checkbox]').prop("checked", false);
			$this.find('input:not([type=checkbox]),select').prop("disabled", true);
			$this.removeClass('active');
		}else{
			$this.find('input[type=checkbox]').prop('checked', true);
			$this.find('input:not([type=checkbox]),select').prop("disabled", false);
            $this.find('input:not([type=checkbox]):first').focus();
			$this.addClass('active');
		}
	}
	
});



/**********************************************************/
/************************* LOGIN UTILS ********************/
/**********************************************************/

function goLogin(){
    if($('#formLoginEmergente').is(':visible')){
        $('#login').removeClass('cerrado').slideDown();
        $('#login-facebook').slideDown();
        $('#registracion').addClass('cerrado').slideUp();
        $('.switch-login').slideUp();
        $('.switch-registracion').slideDown();
    }else{
        $('#login').removeClass('cerrado').show();
        $('#login-facebook').show();
        $('#registracion').addClass('cerrado').hide();
        $('.switch-login').hide();
        $('.switch-registracion').show();
    }
    $('.error-tag').remove();
}
function goRegister(){
    if($('#formLoginEmergente').is(':visible')){
        $('#registracion').removeClass('cerrado').slideDown();
        $('#login').addClass('cerrado').slideUp();
        $('#login-facebook').slideUp();
        $('.switch-registracion').slideUp();
        $('.switch-login').slideDown();
    }else{
        $('#registracion').removeClass('cerrado').show();
        $('#login').addClass('cerrado').hide();
        $('#login-facebook').hide();
        $('.switch-registracion').hide();
        $('.switch-login').show();
    }
    $('.error-tag').remove();
}

function loginSuccess(result, form, loginForm, callback, dispatch) {
	var exito = false;
	if (typeof result != 'undefined' && typeof result.status != 'undefined') {
		if (result.status.status == 200) {
			if (result.contenido.result) {
				 exito = true;
				 var urlDestino = dispatch != null ? dispatch.data('url-destino'):null;
        		 if (typeof result.contenido.url != 'undefined'){
						window.location = result.contenido.url; 
        		 }else if ( typeof urlDestino != "undefined" &&  $.trim(urlDestino) != "" ){
        			 window.location = $.trim(urlDestino);
        		 }else{
        			 callback(); 
        		 }
					
			} else {
    			var errorObj;
				for (var name in result.contenido.validation.errores) {
					if (name == 'empresaBlocked') {
						window.location = result.contenido.validation.errores[name];
					} if (name == 'validarCaptcha') {
						showRecaptcha("recaptcha_div", "submit-captcha-login");
				    	realestate().ui.popup.element($('#id-div-captcha'));
				    	$("#id-captcha-hidden-data").data("idform", $(loginForm).attr('id'));
					} else if (name == 'invalidCaptcha') {
						Recaptcha.reload();
        				$("#id-captcha-error").removeClass('oculto');
					} else {
						errorObj = form.find('label[for="'+name+'"]');
						errorObj.find('input').addClass('hasError')
						errorObj.append('<strong class="error-tag hide"><span class="ticon ticon-warning"></span>'+
				    			'<span class="error-desc">'+result.contenido.validation.errores[name]+'</span>'+
				    			'</strong>');
					}
					
				}
				$('.error-tag').fadeIn('fast').delay(12000).fadeOut(300);
    			setTimeout(function(){
    				$('.error-tag').remove();
    				$('input.hasError').removeClass('hasError');
    			},12400);
    			$('#login').on('keypress','input.hasError',function(e){
    				$(this).parent().find('.error-tag').remove();
    				$(this).removeClass('hasError');
    			});
                $('#login').on('paste','input.hasError',function(e){
                    $(this).parent().find('.error-tag').remove();
                    $(this).removeClass('hasError');
                });
			}
		} else {	
			realestate().ui.notification.add({text:result.contenido.errorMessage, type:"error"});
		}
	} else {
		realestate().ui.notification.add({text:'Error interno', type:"error"});
	}
	form.removeClass('AjaxRunning');
	if (!exito) form.find('input[type=submit]').removeAttr('disabled');
}

function buildLoginFormSubmitEvent(loginForm,type,context,callback,dispatch) {
	loginForm.on('submit', '#'+type, function(e){
		e.preventDefault();
		var form = $(this);		
		if (!form.hasClass('AjaxRunnig')) {
			form.addClass('AjaxRunning');
			form.find('input[type=submit]').attr('disabled','disabled');
			var success = function(result){
				loginSuccess(result,form,loginForm,callback,dispatch);
			};
			var errorHandler = function(data, textStatus, jqXHR, errorCallback){
				if ('abort' != textStatus) {
					form.removeClass('AjaxRunning');
					form.find('input[type=submit]').removeAttr('disabled');
				}
				return context.error.handler(data, textStatus, jqXHR, errorCallback);
			}; 
			if (context!=null && context.getContext() != null) {
				context.ajax.send({
					url: "/"+type+"_"+type+".ajax",
					data: form.serialize()+"&urlActual="+window.location,
					success: success,
					errorhandler: errorHandler   				
				});
			} else {
				$.ajax({
					url: "/"+type+"_"+type+".ajax",
					data: form.serialize()+"&urlActual="+window.location,
					success: success,
					errorhandler: errorHandler   				
				});
			}
		} else return;
	});
}

function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;
}

function getRuntimes(){
	var runtimes = 'html5,flash,silverlight,html4';
	
	if ((/Trident\/7\./).test(navigator.userAgent)) {
		runtimes = 'flash,html5,silverlight,html4';
	}
	return runtimes;
}

!function(){
	window.liveTemplate = function(){
		var $this = this;
		this.app = {};
		
		var Observable = function(){
			return function(value, subs){
				var $obs = this;
				var action = typeof value == 'undefined' ? 'get' : 'set';
				var subscribers = [];
				var subscribe = function(subscriber){
					console.log('Me suscribo');
					subscribers.push(subscriber);
				};
				switch(action){
					case 'set':
						if(value === 'subscribe' && typeof subs != 'undefined'){
							return subscribe(subs);
						}
						this.value = value;
						break;
					case 'get':
					default:
						return this.value;
						break;
				}				
			};
		};
		var Subscriber = function(element){
			this.element = element;
		};
		this.define = function(ltobject, ltstructure){
			var structure = {};
			for(i in ltstructure){
				structure[i] = new Observable();
				structure[i](ltstructure[i]);
			}
			$this.app[ltobject] = structure;
			
			$(document).on('ready',function(){
				$.each($('[data-lt-model="'+ltobject+'"]'), function(){
					for(o in $(this).data('lt-bind')){
						//$this.app[ltobject][o]('subscribe',$(this));
					}
				});
			});
			
		};
	};
	window.lt = new liveTemplate();
}();

lt.define('usuario', {nombre:'Pepe', apellido:'Sarasa'});


!function(){
	window.RealEstate = function(){
	    var $this = this;
	    var $context = null;
	    
	    this.setContext = function(context){
	    	$context = typeof context != 'undefined' ? context : null;
	    };
	    this.getContext = function() {
	    	return $context;
	    };
	    this.error = {
	    		/**********************************************
	    		 * ERROR HANDLER
	    		 *********************************************/
	    	handler: function(data, textStatus, jqXHR, callback){
	    		if(textStatus === "timeout"){
	    			return $this.ui.notification.add({text:traductor.get('base_handler_error'), type:"error"}); 
	    		}
	    		switch(data.status.status){
	    			case $this.error.USUARIO_NO_LOGUEADO:
	    				return $this.auth.loginEmergente(function(){
	    					$this.ui.popup.close();
	    					data.reloadPage = true;
	    					callback(data, textStatus, jqXHR);
						}, undefined, data);
	    				break;
	    			case $this.error.SIN_PERIMOS:
	    				$this.ui.notification.add({text:traductor.get('base_handler_permisos'), type:"error"});
	    				break;
	    			case $this.error.ERROR_INTERNO:
	    				$this.ui.notification.add({text:data.errorMessage, type:"error"});
	    				break;
	    		}
	    	},
	    	setHandler: function(handler){
	    		$this.error.handler = handler;
	    	},
	    	ACCION_NO_ENCONTRADA: 1,
	    	PROBLEMA_GUARDAR_DATOS: 2,
	    	USUARIO_NO_LOGUEADO: 3,
	    	SIN_PERIMOS: 17,
	    	ERROR_INTERNO: 500
	    };
	    
	    this.utils = {
	        numeracion: {
	            commaSeparated: function(numero){
	            	//Remuevo las comas anteriores
	            	numero = this.removeSeparator(numero);
	                //Agrego las comas
	                numero += '';
	                var SEPARADOR_MILES = config.numeracion.SEPARADOR_MILES;
	                x = numero.split(SEPARADOR_MILES);
	                x1 = x[0];
	                x2 = x.length > 1 ? ',' + x[1] : '';
	            	
	                var rgx = /(\d+)(\d{3})/;
	                while (rgx.test(x1)) {
	                	x1 = x1.replace(rgx, '$1' + SEPARADOR_MILES + '$2');
	                };
	            	
	                return x1 + x2;                
	            },
	           removeSeparator: function(numero){
	        	   	var SEPARADOR_MILES = config.numeracion.SEPARADOR_MILES;
	            	var r = new RegExp("["+SEPARADOR_MILES+"]","g");
	            	return numero.toString().replace(r, '');
	           }
	        }
	    };
	    
	    /********************************************************
		 Ajax handler, para el manejo de todas las llamadas ajax
	    *********************************************************/    
	    var AjaxHandler = function(){
	        var defaults = {
	            type:'POST',
	            dataType:'JSON',
	            errorhandler: $this.error.handler, /*El error handler por default (Se puede sobreescribir en cada llamada ajax)*/
	            beforeSend: function(){},
	            error:function(){},
	            success: function(){},
		    complete: function(){},
	            errorCallback: function(){},
	            timeout: 30000, //OPTIMIZAR
	            abortOnRetry: false /*Seteandolo en true aborta las request ya enviadas con la misma url*/
	        };
	        
	        this.currentRequests = [];
	        
	        this.send = function(settings){
	        	var launcher = $($context.delegateTarget);
	        	var setts = jQuery.extend({}, defaults, settings);
	        	var originalSuccess = setts.success,
	        		originalBeforeSend = setts.beforeSend;
	        		originalError = setts.error;
	        	
	            if(setts.abortOnRetry && $this.ajax.currentRequests[setts.url]){
	            	$this.ajax.currentRequests[setts.url].abort();
	            }
	                
	            setts.beforeSend = function(jqXHR, settings){
	            	originalBeforeSend(jqXHR, settings);
	            };
	            setts.error = function(jqXHR, textStatus, errorThrown){
	            	setts.errorhandler(jqXHR, textStatus, errorThrown);
	            	originalError(jqXHR, textStatus, errorThrown);
	            };
	            
	            setts.success = function(data, textStatus, jqXHR){
	            	if(typeof data != 'undefined'){
	                    if(data.status.status != 200){
	                       return setts.errorhandler(data, textStatus, jqXHR, setts.errorCallback);
	                    }else{
	                       return originalSuccess(data, textStatus, jqXHR);
	                    }   
	                }               
	           };
	           
	           this.currentRequests[setts.url] = $.ajax(setts);
	           
	           return this.currentRequests[setts.url];
	        };
	    };
	    $this.ajax = new AjaxHandler();
	    
	    
	    /*******************************************
	     Funciones que involucran propiedades
	     *******************************************/
	    this.propiedades = {
	    	favoritos: {
	    		agregar: function(settings){
	    	        var defaults = {
	    	        		idAviso: null,
	    	        		email: null,
	    	        		success: function(){}
		            };
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_favorito.ajax",
	    				data: {idAviso:setts.idAviso,email:setts.email},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
                			if (typeof setts.reloadPage != 'undefined' && setts.reloadPage) {
                				setTimeout(function(){window.location.reload();},2000);
	    					}
	    				},
	    				errorCallback: function(datos){
	    					if (typeof datos.reloadPage != 'undefined' && datos.reloadPage) {
	    						setts.reloadPage = datos.reloadPage;
	    					}
	    					$this.propiedades.favoritos.agregar(setts);
	    				}
	    			});
	    		},
	    		remover: function(settings){
	    	        var defaults = {
	    	        		idAviso: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_favorito.ajax",
	    				data: {idAviso:setts.idAviso},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
	    				}
	    			});    			
	    		}    		
	    	},
	    	reporte: {
	    		reportar: function(settings){
	    	        var defaults = {
	    	        		idAviso: null,
	    	        		idTipoReporte: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_reporte.ajax",
	    				data: {idAviso:setts.idaviso,idTipoReporte:setts.idtiporeporte,email:setts.email},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
                			if (typeof setts.reloadPage != 'undefined' && setts.reloadPage) {
                				setTimeout(function(){window.location.reload();},2000);
	    					}
	    				},
	    				errorCallback: function(datos){
	    					if (typeof datos.reloadPage != 'undefined' && datos.reloadPage) {
	    						setts.reloadPage = datos.reloadPage;
	    					}
	    					$this.propiedades.reporte.reportar(setts);
	    				}
	    			});    			
	    		}
	    	},
	    	publicacion: {
	    		publicar: function(settings) {
	    			var defaults = {
	    	        		idAviso: null,
	    	        		idPlanDePublicacion: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/publicar_publicarAviso.ajax",
	    				data: {idAviso:setts.idaviso,idPlanDePublicacion:setts.idPlanDePublicacion},
	    				abortOnRetry: true,
	    				success: function(datos){
                			switch (datos.status.status) {
	    						case 200:
	    							var avisos = [];
	    							var mensajes = [];
	    							var exito = 0;
	    							var total = 0;
	    							for (var idAviso in datos.contenido) {
	    								total++;
	    								if (datos.contenido[idAviso].response.codigo == 200) {
	    									exito++;
	    								}else{
	    									avisos[datos.contenido[idAviso].response.codigo]=avisos[datos.contenido[idAviso].response.codigo]===undefined?1:avisos[datos.contenido[idAviso].response.codigo]+1;
	    									if (mensajes[datos.contenido[idAviso].response.codigo]===undefined){
	    										if(datos.contenido[idAviso].mensaje != undefined) {
	    											mensajes[datos.contenido[idAviso].response.codigo] = datos.contenido[idAviso].mensaje;
	    										} else if (datos.contenido[idAviso].response.clave != undefined) {
	    											mensajes[datos.contenido[idAviso].response.codigo] = datos.contenido[idAviso].response.clave;
	    										}
	    									}
	    								}
	    							}
	    							$('.numeroExito').text(exito);
	    							$('.numeroTotales').text(total);
	    							var htmlResumen = "";
	    							for (var codigo in avisos) {
	    								htmlResumen += "<li><b>"+avisos[codigo]+"</b> " + traductor.get('avisos_no_publicado') + " '"+mensajes[codigo]+"'";
	    							}
	    							$('.listaResultado').html(htmlResumen);
	    							 var informe = $('#informe-republicacion').removeClass('oculto');
	    							 realestate().ui.popup.element(informe);
	    							break;
	    						default:
	    							realestate().ui.notification.add({text:traductor.get('base_publicar_error'),type:"error"});
	    							break;
	            			}
	    				}
	    			});    		
	    		},
	    		suspender: function(settings) {
	    			var defaults = {
	    	        		idAviso: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_suspender.ajax",
	    				data: {idAviso:setts.idaviso},
	    				abortOnRetry: true,
	    				success: function(datos){
                			switch (datos.status.status) {
	    						case 200:
	    							var avisos = [];
	    							var mensajes = [];
	    							var exito = 0;
	    							var total = 0;
	    							for (var idAviso in datos.contenido) {
	    								total++;
	    								if (datos.contenido[idAviso].response.codigo == 200) {
	    									exito++;
	    								}else{
	    									avisos[datos.contenido[idAviso].response.codigo]=avisos[datos.contenido[idAviso].response.codigo]===undefined?1:avisos[datos.contenido[idAviso].response.codigo]+1;
	    									if (mensajes[datos.contenido[idAviso].response.codigo]===undefined){
	    										if(datos.contenido[idAviso].mensaje != undefined) {
	    											mensajes[datos.contenido[idAviso].response.codigo] = datos.contenido[idAviso].mensaje;
	    										} else if (datos.contenido[idAviso].response.clave != undefined) {
	    											mensajes[datos.contenido[idAviso].response.codigo] = datos.contenido[idAviso].response.clave;
	    										}
	    									}
	    								}
	    							}
	    							$('.numeroExitoSuspender').text(exito);
	    							$('.numeroTotalesSuspender').text(total);
	    							var htmlResumen = "";
	    							for (var codigo in avisos) {
	    								htmlResumen += "<li><b>"+avisos[codigo]+"</b> " + traductor.get('avisos_no_suspendido') + " '"+mensajes[codigo]+"'";
	    							}
	    							$('.listaResultadoSuspender').html(htmlResumen);
	    							 var informe = $('#informe-suspender').removeClass('oculto');
	    							 realestate().ui.popup.element(informe);
	    							break;
	    						default:
	    							realestate().ui.notification.add({text:traductor.get('base_suspender_error'),type:"error"});
	    							break;
	            			}
	    				}
	    			});    		
	    		},
	    		cancelar: function(settings) {
	    			var defaults = {
	    	        		idAviso: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_cancelar.ajax",
	    				data: {idAviso:setts.idaviso},
	    				abortOnRetry: true,
	    				success: function(datos){
                			switch (datos.status.status) {
	    						case 200:
	    							var avisos = [];
	    							var mensajes = [];
	    							var exito = 0;
	    							var total = 0;
	    							for (var idAviso in datos.contenido) {
	    								total++;
	    								if (datos.contenido[idAviso].response.codigo == 200) {
	    									exito++;
	    								}else{
	    									avisos[datos.contenido[idAviso].response.codigo]=avisos[datos.contenido[idAviso].response.codigo]===undefined?1:avisos[datos.contenido[idAviso].response.codigo]+1;
	    									if (mensajes[datos.contenido[idAviso].response.codigo]===undefined){
	    										if(datos.contenido[idAviso].mensaje != undefined) {
	    											mensajes[datos.contenido[idAviso].response.codigo] = datos.contenido[idAviso].mensaje;
	    										} else if (datos.contenido[idAviso].response.clave != undefined) {
	    											mensajes[datos.contenido[idAviso].response.codigo] = datos.contenido[idAviso].response.clave;
	    										}
	    									}
	    								}
	    							}
	    							$('.numeroExitoCancelar').text(exito);
	    							$('.numeroTotalesCancelar').text(total);
	    							var htmlResumen = "";
	    							for (var codigo in avisos) {
	    								htmlResumen += "<li><b>"+avisos[codigo]+"</b> " + traductor.get('avisos_no_cancelado') + " '"+mensajes[codigo]+"'";
	    							}
	    							$('.listaResultadoCancelar').html(htmlResumen);
	    							 var informe = $('#informe-cancelar').removeClass('oculto');
	    							 realestate().ui.popup.element(informe);
	    							break;
	    						default:
	    							realestate().ui.notification.add({text:traductor.get('base_suspender_error'),type:"error"});
	    							break;
	            			}
	    				}
	    			});    		
	    		},
	    		eliminar: function(settings) {
	    			var defaults = {
	    	        		idAviso: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_eliminar.ajax",
	    				data: {idAviso:setts.idaviso},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
	    				}
	    			});    		
	    		},
	    		activar: function(settings) {
	    			var defaults = {
	    	        		idAviso: null,
	    	        		success: function(){}
		            };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				url: "/aviso_activar.ajax",
	    				data: {idAviso:setts.idaviso},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
	    				}
	    			});    		
	    		}
	    	},
	    	contacto: {
	    		consultar: function (settings) {
	    			var defaults = {
	    		    		idAviso: null,
	    		    		mensaje: null,
	    		    		idContacto: null,
	    		    		email: null,
	    		    		nombre: null,
	    		    		idInmobiliaria: null,
					captchaChallenge: null,
					captchaResponse: null,
	    		    		success: function(){}
	    		    };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				type: "POST",
	    				url: "/aviso_consulta.ajax",
	    				data: { idAviso:setts.idAviso, mensaje:setts.mensaje, idContacto:setts.idContacto,
						nombre:setts.nombre, email:setts.email, telefono:setts.telefono,
						idInmobiliaria:setts.idInmobiliaria, recaptcha_challenge_field: setts.recaptcha_challenge_field,
						recaptcha_response_field: setts.recaptcha_response_field
						},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
	    				},
					complete: function(){
					    setts.complete();
					}
	    			});
	    		},
	    		verdatosanunciante:  function (settings) {
	    			var defaults = {
	    					idAviso: null,
	    					idContacto: null,
	    					email: null,
	    					idInmobiliaria:null,
	    					success: function(){}
	    			};
	    			var setts = jQuery.extend({}, defaults, settings);

	    			$this.ajax.send({
	    				type: "POST",
	    				url: "/aviso_verDatosAnunciante.ajax",
	    				data: {idAviso: setts.idAviso, idContacto: setts.idContacto, email: setts.email, idInmobiliaria: setts.idInmobiliaria, 
	    					recaptcha_challenge_field: setts.recaptcha_challenge_field, recaptcha_response_field: setts.recaptcha_response_field},
	    				async : false,
	    				abortOnRetry: true,
	    				success: function(datos) {
	    					setts.success(datos.contenido);
	    				},
	    				complete: function() {
	    					if (setts.complete && typeof setts.complete != 'undefined'){
	    						setts.complete();
	    					}
	    				}
	    			});
	    		},
	    		consultarprecio: function (settings) {
	    			
	    			var defaults = {
	    		    		idAviso: null,
	    		    		idContacto: null,
	    		    		email: null,
	    		    		idInmobiliaria:null,
	    		    		success: function(){}
	    		    };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			
	    			$this.ajax.send({
	    				type: "POST",
	    				url: "/aviso_consultarPrecio.ajax",
	    				data: {idAviso:setts.idAviso,idContacto:setts.idContacto,email:setts.email,idInmobiliaria:setts.idInmobiliaria},
	    				async : false,
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
	    				}
	    			});
	    		}
	    	},
	    	avisos: {
	    		buscar: function (settings) {
	    			var defaults = {
	    		    		query: null,
	    		    		success: function(){}
	    		    };    			
	    			var setts = jQuery.extend({}, defaults, settings);
	    			$this.ajax.send({
	    				type: "POST",
	    				url: "/listadoAvisos_busquedaLibre.ajax",
	    				data: {query:setts.query},
	    				abortOnRetry: true,
	    				success: function(datos){
	    					setts.success(datos.contenido);
	    				}
	    			});
	    		}
	    	}
	    };
	    /*******************************************
	     Funciones que involucran carga de combos 
	     *******************************************/
	    this.combos = {
	    		localidades:{
	    			buscar:function(settings){
	    				var defaults = {
		    	        		id: null,
		    	        		buscar:null,
		    	        		success: function(){}
			            }; 
	    				var setts = jQuery.extend({}, defaults, settings);
	    				$this.ajax.send({
		    				url: "/common_obtenerLocalidades.ajax",
		    				data:setts,
		    				abortOnRetry: true,
		    				success: function(datos){
		    					setts.success(datos.contenido);
		    				}
		    			});
	    				
	    			}
	    		}
	    };
	    
	    /*******************************************
	    Funciones para el login de usuarios
	    *******************************************/
	    this.auth = {
	    	loginEmergente: function(callback,dispatch, data){
	    		if(typeof data != 'undefined' && data.contenido != null && data.contenido != "") {
	    			$('#formLoginEmergente #login input[name="username"]').val(data.contenido);
	    		}
	    		var loginForm = $('#formLoginEmergente');
	    		$('#formEmailAgregarFavorito').find('[type=submit]').removeAttr('disabled');
	    		loginForm.off('submit', '#login');
	    		loginForm.off('submit', '#registracion');
	    		buildLoginFormSubmitEvent(loginForm,"login",$this,callback,dispatch);
	    		buildLoginFormSubmitEvent(loginForm,"registracion",$this,callback,dispatch);
	    		doRemarketingTag('login');
	    		$this.ui.popup.element(loginForm);
	    	},
	    	recuperarPwd: function(settings) {
	    		var defaults = {
    		    		email: null,
    		    		success: function(){}
    		    };    			
    			var setts = jQuery.extend({}, defaults, settings);
    			$this.ajax.send({
    				type: "POST",
    				url: "/login_recuperarPwd.ajax",
    				data: {email:setts.email},
    				abortOnRetry: true,
    				success: function(datos){
    					setts.success(datos.contenido);
    				}
    			});
	    	},
	    	modificarPwd: function(settings) {
	    		var defaults = {
    		    		idUsuario: null,
    		    		password: null,
    		    		success: function(){}
    		    };    			
    			var setts = jQuery.extend({}, defaults, settings);
    			$this.ajax.send({
    				type: "POST",
    				url: "/login_modificarPwd.ajax",
    				data: {idUsuario:setts.idUsuario,password:setts.password},
    				abortOnRetry: true,
    				success: function(datos){
    					setts.success(datos.contenido);
    				}
    			});
	    	},
	    	loginSolo: function() {
	    		var loginForm = $('#formLoginEmergente'); 
	     		var callback = function(){
	     			window.location.reload();
	     		};
	    		buildLoginFormSubmitEvent(loginForm,"login",$this,callback);
	    		buildLoginFormSubmitEvent(loginForm,"registracion",$this,callback);
	    	},
	    	updateEmailInputsConCookie: function() {
	    		var email = realestate().cookies.getLoggedOutUserEmail();
	    		if (email != null && typeof email != 'undefined')
	    			$('input[type=email],input[name*=mail],input[name*=username]').not('iframe').val(email);
	    	},
	    	updateNameInputsConCookie: function(jqueryWildCard) {
	    		var name = realestate().cookies.getLoggedOutUserName();
	    		if (name != null && typeof name != 'undefined')
	    			$(jqueryWildCard).not('iframe').val(name);
	    	},
	    	updatePhoneInputsConCookie: function(jqueryWildCard) {
	    		var phone = realestate().cookies.getLoggedOutUserPhone();
	    		if (phone != null && typeof phone != 'undefined')
	    			$(jqueryWildCard).not('iframe').val(phone);
	    	},
			updateCedulaInputsConCookie: function(jqueryWildCard) {
				var cedula = realestate().cookies.getLoggedOutUserCedula();
				if (cedula != null && typeof cedula != 'undefined')
	    			$(jqueryWildCard).not('iframe').val(cedula);
			}
	    };
	    
	    /*******************************************
	    Funciones que involucran cookies
	    *******************************************/
	    this.cookies = {
	    		getCookie: function(check_name) {
	    		    // first we'll split this cookie up into name/value pairs
	    		    // note: document.cookie only returns name=value, not the other components
	    		    var a_all_cookies = document.cookie.split( ';' );
	    		    var a_temp_cookie = '';
	    		    var cookie_name = '';
	    		    var cookie_value = '';
	    		    var b_cookie_found = false; // set boolean t/f default f

	    		    for (var i = 0; i < a_all_cookies.length; i++ ){
	    		        // now we'll split apart each name=value pair
	    		        a_temp_cookie = a_all_cookies[i].split( '=' );

	    		        // and trim left/right whitespace while we're at it
	    		        cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

	    		        // if the extracted name matches passed check_name
	    		        if ( cookie_name == check_name ){
	    		            b_cookie_found = true;
	    		            // we need to handle case where cookie has no value but exists (no = sign, that is):
	    		            if ( a_temp_cookie.length > 1 ){
	    		                cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
	    		            }
	    		            // note that in cases where cookie is initialized but no value, null is returned
	    		            return cookie_value;
	    		            break;
	    		        }
	    		        a_temp_cookie = null;
	    		        cookie_name = '';
	    		    }
	    		    if ( !b_cookie_found ){
	    		        return null;
	    		    }
	    		},
	    		setCookie: function(name,value,expires,path,domain,secure) {
	    		    // set time, it's in milliseconds
	    		    var today = new Date();
	    		    today.setTime( today.getTime() );
	    		    /*
	    			if the expires variable is set, make the correct
	    			expires time, the current script below will set
	    			it for x number of days, to make it for hours,
	    			delete * 24, for minutes, delete * 60 * 24
	    			*/
	    		    if ( expires ){
	    		        expires = expires * 1000 * 60 * 60 * 24;
	    		    }
	    		    var expires_date = new Date( today.getTime() + (expires) );

	    		    document.cookie = name + "=" +escape( value ) +
	    		    ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
	    		    ( ( path ) ? ";path=" + path : "" ) +
	    		    ( ( domain ) ? ";domain=" + domain : "" ) +
	    		    ( ( secure ) ? ";secure" : "" );
	    		},
	    		setLoggedOutUserEmail: function(email) {
	    			$this.cookies.setCookie('LOGGEDOUT_USEREMAIL',email,0.045,'/');
	    			$this.auth.updateEmailInputsConCookie();
	    		},
	    		getLoggedOutUserEmail: function(email) {
	    			return $this.cookies.getCookie('LOGGEDOUT_USEREMAIL');
	    		},
	    		setLoggedOutUserName: function(name) {
	    			$this.cookies.setCookie('LOGGEDOUT_USERNAME',name,0.045,'/');
//	    			$this.auth.updateEmailInputsConCookie();
	    		},
	    		getLoggedOutUserName: function() {
	    			return $this.cookies.getCookie('LOGGEDOUT_USERNAME');
	    		},
	    		setLoggedOutUserPhone: function(phone) {
	    			$this.cookies.setCookie('LOGGEDOUT_USERPHONE',phone,0.045,'/');
//	    			$this.auth.updateEmailInputsConCookie();
	    		},
	    		getLoggedOutUserPhone: function() {
	    			return $this.cookies.getCookie('LOGGEDOUT_USERPHONE');
	    		},
				setLoggedOutUserCedula: function(cedula) {
					$this.cookies.setCookie('LOGGEDOUT_USERCEDULA',cedula,0.045,'/');
				},
				getLoggedOutUserCedula: function() {
					return $this.cookies.getCookie('LOGGEDOUT_USERCEDULA');
				}
	    };
	    
	    /*******************************************
	    Funciones que involucran la ui
	    *******************************************/    
	    this.ui = {
			/* Wrapper para las notificaciones */
			notification: {
				add: function(settings){
					var defaults = {
						title:"",
						text:"",
						addclass: "stack-bar-top",
						cornerclass: "",
				        width: "90%",
				        opacity: .95,
						history: false,
						type: "info",
						icon:false,
						delay: 5000,
						animate_speed: 0,
						after_open: function(PNotify) {
					        PNotify.animo( { animation: 'shake',duration: 0.4 } );
					    }
					};
					var setts = jQuery.extend({}, defaults, settings);
					return $.pnotify(setts);
				},
				closeAll: function(){
					$.pnotify_remove_all();
				}
			},
			/* Wrapper para los popups */
			popup: {
				close: function(){
					$.magnificPopup.close();
				},
				launcher: function(settings, eq){
					var defaults = {
							midClick: true
					};
					var setts = jQuery.extend({}, defaults, settings);
	                $.magnificPopup.open(setts, eq);				
				},
				gallery: function(items,position){
	                var settings = {
	                    items: items,
	                    type: 'image',
	                    gallery: {enabled:true}
	                };
	                $this.ui.popup.launcher(settings, position);				
				},
				element: function(element){
					var settings = {
					  items: {
					    src: element,
					    type: 'inline'
					  }
					};
					$this.ui.popup.launcher(settings);				
				},
				inline: function(html){
					var settings = {
					  items: {
					    src: '<div class="popup popup-text">'+html+'</div>',
					    type: 'inline'
					  }
					};
					$this.ui.popup.launcher(settings);
				},
				iframe: function(url, width, height){
					var settings = {
					  items: {
					    src: 	'<div class="popup popup-text">\
					    			<iframe src="'+url+'" height="'+height+'" width="'+width+'" frameborder="0" scrolling="no" style="height:'+height+'px;width:'+width+'px;overflow: hidden;border: 0;"></iframe>\
					    		</div>',
					    type: 'inline'
					  }
					};
					$this.ui.popup.launcher(settings);
				}
				
			}
	    };    
	    /* Un registry, por si se quieren setear variables js dentro de este scope en el html sin que interfiera con el resto del js */
	    var _registry_ = function(){
	        var _registry = [];
	        this.get = function(key){
	            return _registry[key];
	        };
	        this.add = function(key,data){
	            _registry[key] = data;
	        };
	    };
	    this.registry = new _registry_();
	    
	    /************************************************************************************************************
	     * LA FUNCION INIT CORRE UNA VEZ QUE ESTE TODO ESTE MOTOR INICIALIZADO Y TRIGGEREA UN EVENTO RealEstate_ready
	     * Acá adentro va también el document ready con la inicialización de los plugins, etc.
	     * **********************************************************************************************************/
	    this.init = function(){
	        $(document).trigger('RealEstate_ready');
	        $(document).on('ready', function(){
	            $('.dropdown-toggle').dropdown(); 
	            //$('.slider').slider({formater: function(numero){return realestate.utils.numeracion.commaSeparated(numero);}});
	            $('[data-scrollto]').scrollTo();
//	            $('.form-contacto').sticky('.form-contacto-wrap','.footer',20,20);
	            $('[data-ui-collapsible]').collapsible();
	            $('[data-ui-galeria]').galeria();
	            
	            //realestate().ui.slider($(".noUiSlider"));
	            
	            if(typeof $.fn.placeholder != 'undefined'){
	            	$('input,textarea').placeholder();
	            }
	            
	            /* Delegación de eventos */
	            $('html').delegate('[data-action]', 'click',function(e){
	                e.preventDefault();
                    e.stopPropagation();
	                var element = $(this);
	                if (!element.hasClass('AjaxRunning')) {
		                switch($(element).data('action')){
		                    case 'gallery':
		                    	realestate(e).ui.popup.gallery(realestate().registry.get($(this).data('gallery-items')),$(this).data('gallery-eq'));
		                        break;
							case 'agregarfavorito':
		                    	var email = $('input[name=email]').val();
		                    	if (email == '') {
		                    		//NO ESTA LOGUEADO
		                    		var avisoPopup = $('div.avisoPopup');
		                    		avisoPopup.html('<input type="hidden" id="idAvisoPopup" name="idAvisoPopup" value="' + element.attr("data-aviso-id") + '">');
		                    		realestate(e).ui.popup.element($('div.form-emailAgregarFavorito'));
		                    		$('button.mfp-close').on('click',function(e) {
		                    			$(element).removeAttr('disabled');
		                    			$(this).off('click');
		                    		});
		                    	} else {
		                    		if (!element.hasClass('AjaxRunning')){
		                    			element.addClass('AjaxRunning');
		                    			realestate(e).propiedades.favoritos.agregar({
		                    				idAviso : element.data('aviso-id'),
		                    				email: $('input[name=email]').val(),
		                    				success: function(contenido){
		                    					$('[data-aviso='+element.data('aviso-id')+']').addClass('favorito');
		                    					realestate().ui.notification.add({text:traductor.get('base_agregarfavorito_guardado')});
		                    					element.removeClass('AjaxRunning');
		                    					facebookFavoritos();
		                    				}
		                    			});
		                    		}
		                    	}
		                    	break;
		                    case 'removerfavorito':
		                    	element.addClass('AjaxRunning');
		                    	realestate(e).propiedades.favoritos.remover({
		                    		idAviso : element.data('aviso-id'),
		                    		success: function(contenido){
		                    			if (typeof pageFavoritos != 'undefined' && pageFavoritos)
		                    				$('[data-aviso='+element.data('aviso-id')+']').fadeOut('slow');
		                    			else
		                    				$('[data-aviso='+element.data('aviso-id')+']').removeClass('favorito');
		                    			realestate().ui.notification.add({text:traductor.get('base_removerfavorito_removio')});
		                    			element.removeClass('AjaxRunning');

		                    		}
		        				});
		                    	break; 
		                    case 'publicaraviso':
		                    	element.addClass('AjaxRunning');
		                    	element.attr('disabled', 'disabled');
		                    	realestate(e).propiedades.publicacion.publicar({
		                    		idaviso:element.data('aviso-id'),
		                    		idPlanDePublicacion:$('#republicar select option:selected').attr('data-idplandepublicacion')
		        				});
		                    	break;
		                    case 'publicaravisomasivo':
		                    	element.addClass('AjaxRunning');
		                    	element.attr('disabled', 'disabled');
		                    	realestate(e).propiedades.publicacion.publicar({
		                    		idaviso:element.data('aviso-id'),
		                    		idPlanDePublicacion:$('#republicar-varios select option:selected').attr('data-idplandepublicacion')
		        				});
		                    	break; 
		                    case 'suspenderaviso':
		                    	element.addClass('AjaxRunning');
		                    	realestate(e).propiedades.publicacion.suspender({
		                    		idaviso:element.data('aviso-id')
		        				});
		                    	break;
		                    case 'suspenderavisomasivo':
		                    	element.addClass('AjaxRunning');
		                    	var idsAvisos="";
		                    	$('.cbx:checked').each(function(){
		                    		idsAvisos = idsAvisos+","+ $(this).data('aviso-id');
		                    	});
		                    	realestate(e).propiedades.publicacion.suspender({
		                    		idaviso:idsAvisos
		        				});
		                    	break;
		                    case 'cancelarcontrato':
		                    	element.addClass('AjaxRunning');
		                    	realestate(e).propiedades.publicacion.cancelar({
		                    		idaviso:element.data('aviso-id')
		        				});
		                    	break;
		                    case 'eliminaraviso':
		                    	if(confirm(traductor.get('avisos_confirmar_eliminar'))) {
		                    		element.addClass('AjaxRunning');
		                    		realestate(e).propiedades.publicacion.eliminar({
			                    		idaviso:element.data('aviso-id'),
			                    		success: function(contenido){
			                    			if (contenido.response.codigo == 200) {
			                    				element.parents('.aviso-panel').fadeOut('slow');
		                    					realestate().ui.notification.add({text:traductor.get('base_eliminaraviso_eliminado')});
			                    				setTimeout(function(){
			                    					   window.location.reload();
		                    						},2000);
			                    			} else
			                    				realestate().ui.notification.add({text:contenido.mensaje, type:"error"});
			                    			element.removeClass('AjaxRunning');
			                    		}
			        				});
		                    	}
		                    	break;
		                    case 'activaraviso':
	                    		element.addClass('AjaxRunning');
	                    		realestate(e).propiedades.publicacion.activar({
		                    		idaviso:element.data('aviso-id'),
		                    		success: function(contenido){
		                    			if (contenido.response.codigo == 200) {
		                    				element.parents('.aviso-panel').fadeOut('slow');
	                    					realestate().ui.notification.add({text:traductor.get('base_activaraviso_recuperado')});
		                    				setTimeout(function(){
		                    					   window.location.reload();
	                    						},2000);
		                    			} else
		                    				realestate().ui.notification.add({text:contenido.mensaje, type:"error"});
		                    			element.removeClass('AjaxRunning');
		                    		}
		        				});
		                    	break; 
		                   
		                    case 'print':
		                    	window.print();
		                    	break;
		                    case 'ficha-print':
								var propiedades = pais.isBrasil() ? '/propriedades/':'/propiedades/';
								var urlImprimir = location.href.replace(propiedades, propiedades+'imprimir/');
		                		window.open(urlImprimir,'_blank');
		                    	break;
		                    case 'reportar':
		                    	element.addClass('AjaxRunning');
		                    	var form = $('form.verDatosAnunciante');
		                    	$(element).attr('disabled','disabled');
		                    	if ($("#emailFormConsulta").val() == null || $("#emailFormConsulta").val() == '') {
		                    		$("#email-reporte").data('aviso-id',element.data('aviso-id'));
		                    		$("#email-reporte").data('reporte-tipo',element.data('reporte-tipo'));
		                    		realestate(e).ui.popup.element($('div.form-reportarAviso'));
		                    		$('button.mfp-close').on('click',function(e) {
		                    			$(element).removeAttr('disabled');
		                    			$(element).removeClass('AjaxRunning');
		                    			$(this).off('click');
		                    		});
		                    	} else {
			                    	element.addClass('AjaxRunning');
			                    	realestate(e).propiedades.reporte.reportar({
			                    		idaviso:element.data('aviso-id'),
			                    		idtiporeporte:element.data('reporte-tipo'),
			                    		email:$(form).find('input[name=email]').val(),
			                    		success: function(contenido){
			                    			if (contenido.codigo == 200) {
			                    				$('[data-aviso-id='+element.data('aviso-id')+'][data-reporte-tipo='+element.data('reporte-tipo')+']').parents("#avisoReportar").addClass('oculto');
			                    				$("#avisoReportado").removeClass("oculto");
			                    				realestate().ui.notification.add({text:traductor.get('base_reportar_correctamente')});
			                    			}else{
		                    					realestate().ui.notification.add({text:contenido.mensaje, type:"error"});
			                    			}
			                    			element.removeClass('AjaxRunning');
			                    		}
			        				});
		                    	}
		                    	break;
		                    case 'login':
                                goLogin();
		                    	realestate(e).auth.loginEmergente(function(){
		                    		window.location.reload();
		                		});
		                    	break;
                            case 'register':
                                goRegister();
                                realestate(e).auth.loginEmergente(function(){
                                    window.location.reload();
                                });
                            break;
		                    case 'chat':
		                    	if ( typeof funcionesDeIntegracion == "function") {
		                    		funcionesDeIntegracion("chat");
		                    	}
		                    	break;	
		                    case 'consultaraviso':
		                    	if (!element.hasClass('AjaxRunning')){
			                    	element.addClass('AjaxRunning');
			                    	var tipoAnunciante = $(element).data('tipo-anunciante');
			                    	
			                    	doGoogleEvent('Click_datos', 'Enviar mail', tipoAnunciante);
			                    				                    	
			                    	var form = $(element).parents('form.consultarAviso');
			                    	$(element).attr('disabled','disabled');
			                    	$('.consultarAviso-formulario').addClass('enviando');
			                    	var unmaskedTel = '';
			                    	if (config.idPais == 2) {
			                    		unmaskedTel = $(form).find('input[name=telefono]').cleanVal();
			                    	} else {
			                    		unmaskedTel = $(form).find('input[name=telefono]').val();
			                    	}
				                    var settings = {
				                    	idAviso : $('input#idAviso').val(),
				                    	email: $(form).find('input[name=email]').val(),
				                    	mensaje: $(form).find('textarea[name=mensaje]').val(),
				                    	nombre: $(form).find('input[name=nombre]').val(),
				                    	telefono: unmaskedTel,
				                    	idInmobiliaria: $(form).find('input[id=idInmobiliariaContactar]').val(),
				                    	success: function (contenido){
				                    		consultarAvisoSuccess(contenido, form, element, $this,this.idAviso);
				                    	},
				                    	complete:function(){
				                    		element.removeClass("AjaxRunning");
				                    	}
				                    };
				                    
				                    realestate(e).propiedades.contacto.consultar(settings);
		                    	}
		                    	break;
		                    case 'veranunciante':
		                    	var form = $(element).parents('form.verDatosAnunciante');
		                    	doGoogleEvent('Click_datos', 'Ver datos', $(element).data('tipo-anunciante'));
		                    	$(element).prop('disabled',true);
		                    	enterEmail = false; 
		                    	var email = $(form).find('input[name=email]');
		                    	if (bumexFeature.isFeatureHabilitadaEnPaisYEnAmbiente("CREAR_USUARIO_CONTACTO",config.idPais,config.ambiente)) {
		                    		if (email.length > 0 && (email.val() == null || email.val() == '')) {
			                    		//NO ESTA LOGUEADO
			                    		enterEmail = true;
			                    		var $form = $('div.form-emailVerDatosAnunciante');
			                    		if ($form) {
			                    			realestate(e).ui.popup.element($form);
			                    			var $close = $form.find('button.mfp-close'); 
			                    			if ($close) {
			                    				$close.on('click',function(e) {
			                    					$(element).removeAttr('disabled');
			                    					$(this).off('click');
			                    				});
			                    			}
			                    		}
			                    	}
		                    	}
		                    	if (!enterEmail) {
		                    		if (!element.hasClass('AjaxRunning')){
		                    			element.addClass('AjaxRunning');
		                    			var settings = {
		                    				idAviso : $('input#idAviso').val(),
		                    				idContacto : $(form).find('input[name=idContacto]').val(),
		                    				email : $(form).find('input[name=email]').val(),
		                    				success: function(contenido) {
		                    					verDatosAvisoSuccess(contenido, form, element, $this, this.idAviso);
		                    				},
		                    				complete: function(){
		                    					element.removeClass("AjaxRunning");
		                    				}
		                    			};
		                    			setTimeout(function(){realestate(e).propiedades.contacto.verdatosanunciante(settings);},1);
		                    		}
		                    		$(element).prop('disabled',false);
		                    	}
		                    	break;
		                    case 'recuperarpwd':
		                    	element.addClass('AjaxRunning');
		                    	var form = $(element).parents('form#recuperar');
		                    	$(element).attr('disabled','disabled');
		                    	var email = $(form).find('[id="recpwd.email"]').val();
		                    	if (email != null && email.length > 0) {
		                    		var settings = {
		                    				email : email,
			                    			success: function(contenido) {
			                    				if (contenido) {
			                    					$("#recuperar").html('<p><strong>' + traductor.get('base_recuperarpwd_enviado') + '</strong>'
			                    							+'<br>' + traductor.get('base_recuperarpwd_revisar') + '</strong></p>'
			                    							+'<label class="pull-right"><a href="#" class="volver-login">' + traductor.get('base_recuperarpwd_volver') + '</a></label>');
			                    				} else {
			                    					var errorObj = form.find('label[for="recpwd.email"]');
			            							errorObj.append('<strong class="error-tag hide"><span class="ticon ticon-warning"></span>'+
			            								'<span class="error-desc">' + traductor.get('base_recuperarpwd_error') + '</span>'+
			            							    '</strong>');
			            							$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
			            				    		setTimeout(function(){$('.error-tag').remove();},5400);
			            				    		$(element).removeClass('AjaxRunning');
			        		                    	$(element).removeAttr('disabled');
			                    				}
			                    			}
		                    		};
		                    		realestate(e).auth.recuperarPwd(settings);
		                    	} else {
		                    		$(element).removeClass('AjaxRunning');
			                    	$(element).removeAttr('disabled');
		                    		var errorObj = form.find('label[for="recpwd.email"]');
	    							errorObj.append('<strong class="error-tag hide"><span class="ticon ticon-warning"></span>'+
	    								'<span class="error-desc">' + traductor.get('base_recuperarpwd_ingresar') + '</span>'+
	    							    '</strong>');
	    							$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
	    				    		setTimeout(function(){$('.error-tag').remove();},5400);
		                    	}
		                    	break;
		                    case 'nuevopwd':
		                    	element.addClass('AjaxRunning');
		                    	var form = $(element).parents('form#nuevoPwd');
		                    	$(element).attr('disabled','disabled');
		                    	var pwd = $(form).find('[id="pwd.nuevo"]').val();
		                    	if (pwd != null && pwd.length > 0) {
		                    		var settings = {
		                    			idUsuario: $(form).find('[name="pwd.idusuario"]').val(),
		                    			password : pwd,
			                    		success: function(contenido) {
			                    			if (contenido.result) {
			                    				$("#modificarPwd #nuevoPwd").html(traductor.get('base_nuevopwd_modificada'));
			                    			} else {
			                    				var errorObj = form.find('label[for="pwd.nuevo"]');
			                    				errorObj.append('<strong class="error-tag hide">'
			                    						+ '<span class="ticon ticon-warning"></span>'
			                    						+ '<span class="error-desc">' + contenido.message + '</span>'
			                    						+ '</strong>');
			                    				$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
			                    				setTimeout(function(){$('.error-tag').remove();},5400);
			                    				$(element).removeClass('AjaxRunning');
			                    				$(element).removeAttr('disabled');
			                    			}
			                    		}
		                    		};
		                    		realestate(e).auth.modificarPwd(settings);
		                    	} else {
		                    		$(element).removeClass('AjaxRunning');
		                    		$(element).removeAttr('disabled');
		                    		var errorObj = form.find('label[for="pwd.nuevo"]');
		                    		errorObj.append('<strong class="error-tag hide">'
		                    				+ '<span class="ticon ticon-warning"></span>'
		                    				+ '<span class="error-desc">' + traductor.get('base_nuevopwd_ingresar') + '</span>'
		                    				+ '</strong>');
		                    		$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
		                    		setTimeout(function(){$('.error-tag').remove();},5400);
		                    	}
		                    	break;
		                    case 'buscaravisos':
		                    	element.addClass('AjaxRunning');
		                    	var form = $(element).parents('form');
		                    	$(element).attr('disabled','disabled');
		                    	var query = $(form).find('[type="text"],[type="search"]').val();
		                    	if (query != null && query.length > 0) {
		                    		var settings = {
		                    			query: query,
		                    			success: function(contenido) {
			                    			if (contenido) {
			                    				window.location = contenido;
			                    			}
			                    			element.removeClass('AjaxRunning');
			                    			element.removeAttr('disabled');
			                    		}
		                    		};
		                    		realestate(e).propiedades.avisos.buscar(settings);
		                    	} else {
		                    		element.removeClass('AjaxRunning');
		                    		element.removeAttr('disabled');
		                    	}
		                    	break;
	                		}
	                	}
	            });
	            
	            $('[data-action]').on('change',function(e){
	            	e.preventDefault();
	            	$('.control-group-zonas').preloader('show',{
            			text : traductor.get("cargandopuntos")
            		});
	                var element = $(this);
	                var combo = $("select[id='"+$(element).data('combo')+"']");
        			var firstOption = $(combo).find("option:first");
        			var comboZonasCercanas = $("ul[id='idsZonasCercanas']");
        			var strgListCombosReset = $(element).data('combo-reset');
        			var listCombosReset = strgListCombosReset != undefined ? strgListCombosReset.split(" ") : [];
        			var comboReset = [];
        			var comboResetFirstOption = [];
        			
        			for (var i in listCombosReset) {
        				comboReset.push($("select[id='"+ listCombosReset[i] +"']"));
        				comboResetFirstOption.push($(comboReset[i]).find("option:first"));
        			}
        			
	                switch($(element).data('action')){
	                	case 'obtenerZonasCercanas':
	                		realestate(e).combos.localidades.buscar({
	                    		id:parseInt(element.val()),
	                    		buscar:$(element).data('action'), 
	                    		success: function(data){
	                    			$('.control-group-zonas').preloader('hide');
	                    			$(comboZonasCercanas).find("li").remove();
			                		if (typeof data == "undefined" || data == '') {
			                			$(comboZonasCercanas).append('<li class="holder">'+
													'<span>'+traductor.get('publicar_noHayBarrios')+'</span>'+
											'</li>');
			                		}else{
			                			for (var i in data) {
			                				$(comboZonasCercanas).append('<li>'+
																			'<label> '+
																				'<input type="checkbox" name="idsZonasCercanas" value="'+data[i].id+'"> '+
																				'<span title="'+data[i].nombre+'">'+data[i].nombre+'</span>'+
																			'</label>'+
																		'</li>');
			                			}
			                		}
	                    		}
	                		});
	                	break;
	                	case 'obtenerCiudades':
	                	case 'obtenerZonas':
		                case 'obtenerSubZonas':
		                case 'obtenerZonasDeValor':
		                	realestate(e).combos.localidades.buscar({
	                    		id:parseInt(element.val()),
	                    		buscar:$(element).data('action'), 
	                    		success: function(data) {
	                    			$(combo).find("option").remove();
	                    			$(combo).append(firstOption);
	                    			
	                    			var countOptions = 0;
	                    			
	                    			for (var i in data) {
	                    				$(combo).append('<option value="'+data[i].id+'">'+data[i].nombre+'</option>');
	                    				countOptions++;
	                    			}
	                    			
	                    			if (element.val().trim()== "") {
	                    				//deshabilito el actual
	                    				$('.control-group-zonas').preloader('hide');
	                    				combo.next('.loading-form').hide();
	                    				//deshabilito el anterior
	                    				combo.parents('.helio, .reset').next().find('select').attr("disabled","disabled");
	                    				combo.parents('.helio, .reset').next().find(' option:selected').removeAttr('selected');
	                    				combo.parents('.helio, .reset').next().find(' option:first').attr('selected','selected');
	                    			} else {
	                    				$('.control-group-zonas').preloader('hide');
	                    			}
	                    			
	                    			if (countOptions > 0) {
	                    				$(combo).removeAttr("disabled");
                    				} else {
                    					combo.parents('.helio, .reset').find('select').attr("disabled","disabled");
                    				}
	                    			
	                    			if (typeof $(element).data('combo-reset') != "undefined") {
	                    				for (var i in comboReset) {
	                    					$(comboReset[i]).find("option").remove();
	                    					$(comboReset[i]).append(comboResetFirstOption[i]);
	                    					comboReset[i].attr("disabled","disabled");
	                    					comboReset[i].removeAttr('selected');
	                    					comboReset[i].find(' option:first').attr('selected','selected');
	                    				}
	                    			}
	                    		}
	        				});
	                    	break;
	                    	
	                }
	            });
	            
	            
	            $('body').delegate('.home-back-action','mouseover',function(){
	                $('.searchbox-home-wrap').addClass('verfoto');
	            });
	
	            $('body').delegate('.home-back-action','mouseout',function(){
	                $('.searchbox-home-wrap').removeClass('verfoto');
	            });                
	                            
	        });
	    };
	};
	var re = new RealEstate();
	window.realestate = function(context){
		re.setContext(context);
		return re;
	};
	realestate().init();
}();
var h = document.getElementById('modal-holder');
if(h){
	function showModal(title, content, action, script){
		if(title.length <= 0){
			$('#auto-modal').find('.modal-header').hide();
		}else{
			$('#auto-modal').find('.modal-header').show().find('h3').text(title);
		}
		
		$('#auto-modal').find('.modal-body').html(content);
		
		$('#auto-modal').find('.modal-footer').find('a.close-modal').addClass('oculto');
		$('#auto-modal').find('.modal-footer').find('a.btn-primary').removeClass('oculto');
		
		if(action.length <= 0){
			$('#auto-modal').find('.modal-footer').hide();
		}else if (typeof script != "undefined" && script.length >= 0){
			$('#auto-modal').find('.modal-footer').show().find('a.btn-primary').attr('onclick',script);
		}else if(action.length >= 0 && action == 'close'){
			$('#auto-modal').find('.modal-footer').show().find('a.close-modal').removeClass('oculto');
			$('#auto-modal').find('.modal-footer').find('a.btn-primary').addClass('oculto');
		}else {
			$('#auto-modal').find('.modal-footer').show().find('a.btn-primary').attr('href',action);
		}
		t= setTimeout(function(){
			realestate().ui.popup.element($('#auto-modal'));
		},50);
	}
	$(document).ready(function(){
		h.innerHTML = '<div class="modal" id="auto-modal"><div class="modal-header"><h3></h3></div><div class="modal-body"></div><div class="modal-footer"><a href="#" class="btn btn-primary">'+traductor.get("aceptar")+'</a><a href="#" class="btn close-modal oculto">'+traductor.get("cerrar")+'</a></div></div>';
	});
}
//showModal('titulo (solo texto)','contenido (html)','action (url) || close');

$(document).on('click','.close-modal',function(e){
	e.preventDefault();
	realestate().ui.popup.close();
});

$(window).load(function(){
	//la llama acá porque será necesaria en todas las páginas (maybe)
	$('.sinResponder').marcaNumerica({
        	delay: 50
	});
});

//BIG DROPDOWNS
function bigDropdown(box,boton,$this){
	var target = $this.attr('href');
	var bt = $('.btn-filtrar-activo');
	//En el "href" indicar los destinos por ID "#busqueda" y a las cajas agregarles el ID correspondiente.
	//Todas las cajas con la clase oculto
	
	if(bt.length > 0){
		if($this.hasClass(boton+'-activo')){
		
			$('.'+box).slideUp(50);
			$('.'+box+' .content').addClass('oculto');
			$('.'+boton).removeClass(boton+'-activo').removeClass('btn-inverse');
			
		}else{
			$('.'+box+' .content').addClass('oculto');
			$(target).removeClass('oculto');
			$('.'+boton).removeClass(boton+'-activo').removeClass('btn-inverse');
			$this.addClass(boton+'-activo').addClass('btn-inverse');
		}
		
	}else{
		$this.addClass(boton+'-activo').addClass('btn-inverse');
		$(target).removeClass('oculto');
		$('.'+box).slideDown(50);
	}
};



//Buttons

$(function(){
	//FIXME: Estas dos están duplicadas. no se por que las agregamos
//	var $radio = $('div[data-toggle="buttons-radio"] a.btn');
//	$radio.click(function(e){
//		e.preventDefault();
//		$radio.removeClass('active');
//		$(this).addClass('active');
//	});
	
	
//	$('div[data-toggle="buttons-checkbox"] a.btn').click(function(e){
//		e.preventDefault();
//		if($(this).hasClass('active')){
//			$(this).removeClass('active');
//		}else{
//			$(this).addClass('active');
//		}
//	});
});

$(function(){
	$('.stopPropagation').on('click', function(e){
		e.stopPropagation();
	});
});

function verDatosAvisoSuccess(contenido, form, element, $this,idAviso) {
	$(form).find('[type=submit]').removeAttr('disabled');
	if (contenido.resultadoContacto.response.codigo == 200) {
		populateVerDatosDataResponseOk(contenido, contenido, form, "Ver datos logueado");
		mostrardatos(contenido, false);
	} else if (contenido.resultadoContacto.response.codigo == 201) {
		populateVerDatosDataResponseOk(contenido, contenido, form, "Ver datos logueado");
		mostrardatos(contenido, true);
	} else if (contenido.resultadoContacto.response.codigo == 202) {
		populateVerDatosDataResponseOk(contenido, contenido, form, "Ver datos anónimo");
		mostrardatos(contenido, false);
	} else if (contenido.resultadoContacto.response.codigo == 510) {
		showRecaptcha("recaptcha_div");
		realestate().ui.popup.element($('#id-div-captcha'));
		$("#id-captcha-hidden-data").data("idform", $(form).attr('id'));
		$("#id-captcha-hidden-data").data("idAviso", $('input#idAviso').val());
		$("#id-captcha-hidden-data").data("tipoconsulta", "veranunciante");
	} else {
		$(element).removeAttr('disabled');
		realestate().ui.notification.add({text:contenido.resultadoContacto.mensaje, type:"error"});
		doGoogleEvent('Lead', 'Ver Datos', 'ERROR');
	}
	$(element).removeClass('AjaxRunning');
}

function populateVerDatosDataResponseOk(contenido, contenido, form, googleEventAction) {
	if (contenido.resultadoContacto.doRemarketingTag){
		doRemarketingTag('verdatos',idAviso);
	}
	doGoogleEvent('Lead', googleEventAction, contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	doDataLayerPushConversion('Lead', googleEventAction, 'Aviso', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);

	updateInfoVerDatos(contenido, form);
	$('#id-descipcion-aviso').html("");
	$('#id-descipcion-aviso').html(contenido.resultadoContacto.mensaje2);

	if ( typeof funcionesDeIntegracion == "function") {
		funcionesDeIntegracion("veranunciante");
	}
}

function updateInfoVerDatos(contenido, form) {
	$('#id-verdatos-aviso-1').html(contenido.resultadoContacto.mensaje);
	$('#id-verdatos-aviso-2').html(contenido.resultadoContacto.mensaje);
}

function consultarAvisoSuccess(contenido, form, element, $this,idAviso){
	var from = $(element).data('from');
	
	if (contenido.resultadoContacto.response.codigo == 200) {
	    doRemarketingTag('consulta',idAviso);
	    //SI NO ESTA Logeado
	    if (!$(form).find('input[name=email]').attr('disabled')
			    && $this.cookies.getLoggedOutUserEmail() != $(form).find('input[name=email]').val()) {
		    //NO ESTA LOGUEADO
		    $this.cookies.setLoggedOutUserEmail($(form).find('input[name=email]').val());
		    $this.cookies.setLoggedOutUserPhone($(form).find('input[name=telefono]').val());
		    $this.cookies.setLoggedOutUserName($(form).find('input[name=nombre]').val());
	    }
	    $('.consultarAviso-formulario').addClass('enviado');
	    $(element).removeAttr('disabled');
	    if ( from == 'nuevoModal') {
	    	doGoogleEvent('Lead', 'Modal Enviar mail', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	    	doDataLayerPushConversion('Lead', 'Enviar mail', 'Modal', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);
	    } else if (from == 'contactarListado') {
			doGoogleEvent('Lead', 'Enviar mail listado', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
			doDataLayerPushConversion('Lead', 'Enviar mail', 'Listado', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);
		} else {
	    	doGoogleEvent('Lead', 'Enviar mail', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	    	doDataLayerPushConversion('Lead', 'Enviar mail', 'Aviso', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);
	    }
	   
	    if ( typeof funcionesDeIntegracion == "function") {
	    	funcionesDeIntegracion("consultaraviso");
	    }
	    if($('div.mostrardatos-form').is(':visible')){
	    	setTimeout(function(){
	    		realestate().ui.popup.close();	    		
	    		multileads(contenido, false);
	    	},1000);
	    }else{
	    	multileads(contenido, false);
	    }
	    
    } else if (contenido.resultadoContacto.response.codigo == 201) {
	    doRemarketingTag('consulta',idAviso);
	    $('.consultarAviso-formulario').addClass('enviado');
	    $(element).removeAttr('disabled');
	    
	    if ( from == 'nuevoModal') {
	    	doGoogleEvent('Lead', 'Modal Enviar mail', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	    	doDataLayerPushConversion('Lead', 'Enviar mail', 'Modal', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);
	    } else if (from == 'contactarListado') {
			doGoogleEvent('Lead', 'Enviar mail listado', contenido.resultadoContacto.eventoLeadGoogleAnalytics); 
			doDataLayerPushConversion('Lead', 'Enviar mail', 'Listado', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);
		} else {
	    	doGoogleEvent('Lead', 'Enviar mail', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	    	doDataLayerPushConversion('Lead', 'Enviar mail', 'Aviso', contenido.resultadoContacto.idContacto, contenido.resultadoContacto.idUsuario);
	    }
	   
	    if ( typeof funcionesDeIntegracion == "function") {
	    	funcionesDeIntegracion("consultaraviso");
	    }
	    if($('div.mostrardatos-form').is(':visible')){
	    	setTimeout(function(){
	    		realestate().ui.popup.close();	    		
	    		multileads(contenido, true);
	    	},1000);
	    }else{
	    	multileads(contenido, true);
	    }
    } else if (contenido.resultadoContacto.response.codigo == 510){
    	showRecaptcha("recaptcha_div");
    	realestate().ui.popup.element($('#id-div-captcha'));
    	$("#id-captcha-hidden-data").data("idform", $(form).attr('id'));
    	$("#id-captcha-hidden-data").data("idAviso", $('input#idAviso').val());
    	$("#id-captcha-hidden-data").data("tipoconsulta", "consultaraviso");
	} else if (contenido.resultadoContacto.response.codigo == 512) {
    	$('.consultarAviso-formulario').addClass('enviado');
	    $(element).removeAttr('disabled');
	    if($('div.mostrardatos-form').is(':visible')){
	    	setTimeout(function(){
	    		realestate().ui.popup.close();	    		
	    		multileads(contenido, true);
	    	},1000);
	    }else{
	    	multileads(contenido, true);
	    }
    } else {
	    $(element).removeAttr('disabled');
	    $('.consultarAviso-formulario').removeClass('enviado').removeClass('enviando');
	    $('.consultarAviso .valError').text(contenido.resultadoContacto.mensaje).show();
	    element.parents('.consultarAviso').find('input[type="email"]').focus();
    }
}



function showPreFicha(aviso) {
	var preFicha = $('#pre-ficha-template');
	var template = preFicha.html();
	Mustache.parse(template);
	var rendered = Mustache.render(template, aviso);
	var preFichaContent = $('.pre-ficha-content'); 
	preFichaContent.html(rendered);
	
	realestate().ui.popup.element(preFichaContent);
	
	$('.pre-ficha-slider').royalSlider({
        fullscreen: false,
        controlNavigation: 'thumbnails',
        imageScalePadding: 0,
        loop: false,
        imageScaleMode: 'fill',
        autoScaleSlider:false,
        navigateByClick: true,
        usePreloader:true,
        numImagesToPreload:3,
        arrowsNav:false,
        keyboardNavEnabled: false,
        fadeinLoadedSlide: true,
        globalCaption: true,
        globalCaptionInside: false,
        thumbs: {
          appendSpan: true,
          firstMargin: true,
          paddingBottom: 4,
          paddingTop: 4,
          spacing:4
        }
    });
}

function consultarPrecioSuccess(contenido, idAviso, boton){
    if (contenido.resultadoContacto.response.codigo == 200) {
	    doRemarketingTag('consulta',idAviso);
	    doGoogleEvent('Lead', 'Consultar Precio', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	    //SI NO ESTA Logeado
	    if ($('input[name=usuario\\.email]').val() != "" && realestate().cookies.getLoggedOutUserEmail() != $('input[name=usuario\\.email]').val()) {
	    	//NO ESTA LOGUEADO
	    	realestate().cookies.setLoggedOutUserEmail($('input[name=usuario\\.email]').val());
	    }
	    showPreFicha(contenido.aviso);
    } else if (contenido.resultadoContacto.response.codigo == 201) {
	    doRemarketingTag('consulta',idAviso);
	    doGoogleEvent('Lead', 'Consultar Precio', contenido.resultadoContacto.eventoLeadGoogleAnalytics);
	    
	    $(".mfp-close").on('click',function(e){
			e.preventDefault();
			window.location.reload();
			//TODO: HACER QUE SOLAMENTE RECARGUE EL HEADER
		});
	    showPreFicha(contenido.aviso);
    } else if (contenido.resultadoContacto.response.codigo == 510){
		showRecaptcha("recaptcha_div");
		realestate().ui.popup.element($('#id-div-captcha'));
		$("#id-captcha-hidden-data").data("idAviso", $('input#idAviso').val());
		$("#id-captcha-hidden-data").data("tipoconsulta", "consultaraviso");
	}else {
    	if (typeof boton != "undefined") {
    		boton.removeAttr('disabled');
    	}
    	realestate().ui.notification.add({text:traductor.get("listado_consultar_precio_error","Ha ocurrido un error consultando el precio"), type:"error"});
    	doGoogleEvent('Lead', 'Consultar Precio', 'ERROR');
    }
}

function emailVacio(formEmail) {
	var errorObj = $(formEmail).find('label[for="usuario.email"]');
	errorObj.append('<strong class="error-tag hide"><span class="ticon ticon-warning"></span>'+
		'<span class="error-desc">'+traductor.get("ficha_email_ingresar","Ingrese un email")+'</span>'+
	    '</strong>');
	$('.error-tag').fadeIn('fast').delay(5000).fadeOut(300);
}

function cleanStringUrl(palabra) {
	palabra = $.trim(palabra)
              .toLowerCase()
              .replace(/-/g,' ')
              .replace(/[^a-z A-Z 0-9 \t ñ Ñ á é í ó ú Á É Í Ó Ú]/g, '')
              .replace(/ /g,'-')
              .replace(/-+/g,'-');
	return palabra;
}
function mostrardatos(contenido, hayRegistracion){
	//Por ahora no me importa si hay registración pero por alguna razón mi cerebro dice que lo voy a necesitar
	
	var mm = $('#mostrardatos .mostrardatos-data');
		mm.empty();//Limpio el contenedor de datos por si hay algo
		
	if (contenido.resultadoContacto) {		
		mm.prepend(contenido.resultadoContacto.mensaje);
		
		$.magnificPopup.open({
			items: {
				src: $('#mostrardatos').html()
			},
		    type: 'inline',
		    callbacks: {
		        close: function() {
		        	multileads(contenido, hayRegistracion);
		        },
		        open: function(){
		        	$('.js-tooltip').tooltip();
		        }
		    }
		});
		
		//if (pais.isBrasil()) {
		//	var sizePhoneMask = function(phone, e, currentField, options){
		//		return phone.length > 10 ? '(00) 00000-0000' : '(00) 0000-0000';
		//	};
		//	$('[name="telefono"]').mask(sizePhoneMask);
		//}
		
		var email = $('input[name=usuario\\.email]').val();
		if (typeof email != "undefined" && $.trim(email) != ''){
			realestate().cookies.setLoggedOutUserEmail($('input[name=usuario\\.email]').val());
		}
	} else {
		realestate().ui.notification.add({text:"Error", type:"error"});
	}
}
function multileads(contenido, hayRegistracion) {
	var hayRecomendados = false;
	var md = $('.multilead-wrap .grid-posts-multilead .grid-posts');
	md.html("");
	if (typeof contenido.desarrollos != "undefined" && contenido.desarrollos.length > 0) {
		hayRecomendados = true;
		for (var i=0; i<contenido.desarrollos.length; i++) {
			md.append(contenido.desarrollos[i].postContent);
		}
	}
	if (typeof contenido.avisos != "undefined" && contenido.avisos.length > 0) {
		hayRecomendados = true;
		for (var i=0; i<contenido.avisos.length; i++) {
			md.append(contenido.avisos[i].postContent);
		}
	}
	if (hayRecomendados) {
		setTimeout(function(){
			$('.multilead-wrap').addClass('open');
		}, 800);
		$("html, body").animate({scrollTop: 0}, 1000);
		if (hayRegistracion) {
			$('.multilead-wrap').append('<input type="hidden" id="hayRegistracion" name="hayRegistracion" value="true">');
		}
	}
}

function reloadPage(){
    setTimeout(function(){window.location.reload();},2000);
}

$(function(){
	$(document).on( "click", ".consultar-datos", function(e) {
		e.preventDefault();
		var $this = $(this);
		var parent = $this.parents('.post');
		var emailInput = $('input[name=email]').val();
		if (emailInput == '') {
			//NO ESTA LOGUEADO
			var avisoPopup = $('div.avisoPopup');
			avisoPopup.html('<input type="hidden" id="idAvisoPopup" name="idAvisoPopup" value="' + parent.find('input[name=idAviso]').val() + '">');
    		realestate(e).ui.popup.element($('div.form-email'));
    		$('button.mfp-close').on('click',function(e) {
    			$this.off('click');
    		});
		} else {
			var idAvisoConsultarPrecio = parent.find('input[name=idAviso]').val();
			var settings = {
				idAviso : idAvisoConsultarPrecio,
	            email: emailInput,
	            success: function(contenido) {
	            	consultarPrecioSuccess(contenido, idAvisoConsultarPrecio);
	            }
	        };
			realestate(e).propiedades.contacto.consultarprecio(settings);
		}
	});
	
	$('#formEmail').on('submit',function(e){
		e.preventDefault();
		var emailInput = $('input[name=usuario\\.email]').val();
		if (emailInput != null && emailInput != '') {
			var boton = $(this).find('[type=submit]');
			boton.attr('disabled','disabled');
			var idAvisoConsultarPrecio = $('input#idAvisoPopup').val();
			var settings = {
					idAviso : idAvisoConsultarPrecio,
					email: emailInput,
					success: function(contenido) {
						consultarPrecioSuccess(contenido, idAvisoConsultarPrecio, boton);
					}
			};
			realestate(e).propiedades.contacto.consultarprecio(settings);
		} else {
			emailVacio(formEmail);
		}
	});
});
$(function(){
	$('[rel=tooltip-top]').tooltip({ 
	    placement: 'top' 
	});
	$('[rel=tooltip-right]').tooltip({ 
	    placement: 'right' 
	});
	$('[rel=tooltip-left]').tooltip({ 
	    placement: 'left' 
	});
	$('[rel=tooltip-bottom]').tooltip({ 
	    placement: 'bottom' 
	});
});

$('#formEmailAgregarFavorito').on('submit',function(e){
	e.preventDefault();
	var formEmail = this;
	var emailInput = $(formEmail).find('input[name=usuario\\.email]').val();
	if (emailInput != null && emailInput != '') {
		$('#emailAgregarFavorito').find('input[name=email]').val(emailInput);
		$('#formEmailAgregarFavorito').find('[type=submit]').attr('disabled','disabled');
		var idAviso = $('input#idAvisoPopup').val();
		var settings = {
			idAviso : idAviso,
            email: emailInput,
            success: function(contenido) {
            	realestate().ui.notification.add({text:traductor.get('base_agregarfavorito_guardado')});
            	$('#formEmailAgregarFavorito').find('[type=submit]').removeAttr('disabled');
            	if (contenido.response.codigo == 201) {
            		$('[data-aviso='+idAviso+']').addClass('favorito');
					$(".mfp-close").on('click',function(e){
						e.preventDefault();
						window.location.reload();
						//TODO: HACER QUE SOLO RECARGUE EL HEADER
					});
				}
				$(".mfp-close").click();
				facebookFavoritos();
            }
        };
		realestate(e).propiedades.favoritos.agregar(settings);
	} else {
		emailVacio(formEmail);
	}
});

$(function(){
	String.prototype.filename=function(extension){
	    var s= this.replace(/\\/g, '/');
	    s= s.substring(s.lastIndexOf('/')+ 1);
	    return extension? s.replace(/[?#].+$/, ''): s.split('.')[0];
	};
});


function facebookFavoritos() {
	//facebook salvar inmueble pixel para Mexico
	if (config.idPais == 18) {
		var _fbq = window._fbq || (window._fbq = []);
		if (!_fbq.loaded) {
			var fbds = document.createElement('script');
			fbds.async = true;
			fbds.src = '//connect.facebook.net/en_US/fbds.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(fbds, s);
			_fbq.loaded = true;
		}
		window._fbq = window._fbq || [];
		window._fbq.push(['track', '6018576143265', {'value':'0.00','currency':'MXN'}]);
	}
}