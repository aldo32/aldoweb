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
    	
    }, 5000);
	
	var time=500;
	
	/*SECTION ABOUT*/
	$(".menu-item").click(function() {
		var section = $(this).attr('id');		
		
		/*Add and remove class to menu active*/
		$(".menu-item").removeClass('menu-item-active');
		$(this).addClass('menu-item-active');
		
		/*animations for About*/
		$('#about-content').hide();
		$('#experience-content').hide();
		$('#proyects-content').hide();
		
		switch(section) {		
			case 'aboutSection':										
				$('#about-content').fadeIn(time);	
			break;
			
			case 'experienceSection':												
				$('#experience-content').fadeIn(time);	
			break;
			
			case 'proyectsSection':												
				$('#proyects-content').fadeIn(time);	
			break;			
		}		
	});
	
	/*Show initial section*/
	$('#about-content').fadeIn(time);
});