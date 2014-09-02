$(window).load(function() {     
	$("#status").fadeOut();      
	$("#preloader").delay(1000).fadeOut("slow");
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
		
});
