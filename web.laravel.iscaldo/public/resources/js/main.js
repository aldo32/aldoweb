$(window).load(function() {     
	$("#status").fadeOut();      
	$("#preloader").delay(300).fadeOut("slow");
});

$(document).ready(function() {				
	var i=1; 		
	setInterval(function() {
		if (i==1) {			  
			$('#back2').fadeOut(1000);
			$('#back1').fadeIn(1000);
		}
		else {
			$('#back2').fadeIn(1000);
			$('#back1').fadeOut(1000);   			
		}
		
		i++;

	   	if(i == 3)
	    	i = 1;
    	
    }, 60000);
			
	var time=500;
	
	/*Show section*/
	$(".menu-item").click(function() {
		var section = $(this).attr('id');		
		
		/*Add and remove class to menu active*/
		$(".menu-item").removeClass('active');
		$(this).addClass('active');
		
		showPage(section, time);
				
	});
	
	/*show page in F5*/
	var now = ""+window.location+"";
	now = "/"+now.substr(now.indexOf('#') + 1);

	showPage(now, time);
		
	
	
	/*Proyects*/
	$('.proyect-item').click(function(e) {
		e.preventDefault();
		
		id = $(this).attr('id');
		
		$.ajax({													
	        url: "/home/getProyectDescription",        
	        data: "id="+id+"&_token="+$('input[name="_token"]').val(),		             
	        dataType: "html",		                	                	      
	        success: function(datos) {  	        	
	        	$('#proyectDescription').fadeOut('fast', function() { $('#proyectDescription').html(datos).fadeIn('fast'); });	        	
	        },
	        type: "POST"
		});
	});		
	
});


/*function to show page*/
function showPage(section, time) {	
	
	$('#services-content').hide();
	$('#experience-content').hide();
	$('#proyects-content').hide();
	$('#blog-content').hide();
	
	
	switch(section) {		
		case '/servicios':										
			$('#services-content').fadeIn(time);	
		break;
		
		case '/experiencia':												
			$('#experience-content').fadeIn(time);	
		break;
		
		case '/portafolio':												
			$('#proyects-content').fadeIn(time);	
		break;		
		
		case '/blog':
			$('#blog-content').fadeIn(time);
			break;
			
		default: $('#services-content').fadeIn(time); break;
	}
}