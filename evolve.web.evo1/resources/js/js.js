jQuery(document).ready(function ($) {	

	//functions for animate content sections    
    var logoEvolve = $('#logoEvolve');
    var inicioWrap = $('#inicio-wrap');
    var serviceItem = $('.servicio-item');
    var serviceItem2 = $('.servicio-item2');
	
    //initialise Stellar.js
    $(window).stellar();

    //Cache some variables
    var links = $('.navigation').find('li');
    slide = $('.slide');
    button = $('.button');
    mywindow = $(window);
    htmlbody = $('html,body');


    //Setup waypoints plugin
    slide.waypoint(function (event, direction) {    	        	    	
    	
        //cache the variable of the data-slide attribute associated with each slide
        dataslide = $(this).attr('data-slide');       
        
        //If the user scrolls up change the navigation link that has the same data-slide attribute as the slide to active and 
        //remove the active class from the previous navigation link 
        if (direction === 'down') {        	        	
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').prev().removeClass('active');
                                    
        }
        // else If the user scrolls down change the navigation link that has the same data-slide attribute as the slide to active and 
        //remove the active class from the next navigation link 
        else {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').next().removeClass('active');                        
        }
        
        console.log('direction: '+direction+'  dataslide: '+dataslide);
        //Effects for each section
        if (direction == "down") {
        	switch (dataslide) {
        		case '1':      
        			//hidde slide1
                	hiddeSlide1();
        		break;
        		
        		case '2':   
        			//show slide2
        			showSlide2();
        		break;
        		
        		case '3':
        			//hidde slide 2        			
                	hiddeSlide2();
                	showSlide3();
        		break;
        		
        		case '4':
        			hiddeSlide3();
        			showSlide4();
        		break;
        			
        		case '5':
        			hiddeSlide4();
        			showSlide5();
        		break;
        		
        		case '6':
        			hiddeSlide5();
        		break;
        		        		
        	}
        }
        if (direction == 'up') {
        	switch (dataslide) {        	
	    		case '2':       
	    			//Show slide 1
	            	showSlide1();
	            	
	            	//Hidde slide 2        			
                	hiddeSlide2();
	    		break;
	            	
	    		case '3':
	    			//show slide 2
    				showSlide2();
    				hiddeSlide3();
    			break;
    			
	    		case '4':
	    			showSlide3();
	    			hiddeSlide4();
	    		break;
	    		
	    		case '5':
	    			showSlide4();
	    			hiddeSlide5();
	    		break;

	    		case '6':
	    			showSlide5();
	    		break;
        	}
        }

    });

    //waypoints doesnt detect the first slide when user scrolls back up to the top so we add this little bit of code, that removes the class 
    //from navigation link slide 2 and adds it to navigation link slide 1. 
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
        	showSlide1();
        	
            $('.navigation li[data-slide="1"]').addClass('active');
            $('.navigation li[data-slide="2"]').removeClass('active');
        }
    });

    //Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
    //easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
    function goToByScroll(dataslide) {
        htmlbody.animate({
            scrollTop: $('.slide[data-slide="' + dataslide + '"]').offset().top
        }, 2000, 'easeInOutQuint');
    }



    //When the user clicks on the navigation links, get the data-slide attribute value of the link and pass that variable to the goToByScroll function
    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

    //When the user clicks on the button, get the get the data-slide attribute value of the button and pass that variable to the goToByScroll function
    button.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);

    });

    
    function showSlide1() {
    	logoEvolve.delay(1000).fadeIn(1000);      
    	inicioWrap.delay(1500).fadeIn(1000);
    }

    function hiddeSlide1() {
    	logoEvolve.fadeOut(1000);     
    	inicioWrap.fadeOut(1000);
    }
    
    function showSlide2() {  
    	var time=80;
    	serviceItem2.each(function (i) {
    		$(this).delay(time).fadeIn();
    		time=time+80;
    	});
    	serviceItem.each(function (i) {
    		$(this).delay(time).fadeIn();
    		time=time+150;
    	});
    }
    
    function hiddeSlide2 () {
    	serviceItem2.each(function (i) {
    		$(this).fadeOut();                
    	});
    	serviceItem.each(function (i) {
    		$(this).fadeOut();                		
    	});
    }
    
    function showSlide3() {
    	var timeSlide3=500;
		$($(".solutions-item").get().reverse()).each(function(i) {
			$(this).delay(500).animate({left:'0px'}, timeSlide3);
			timeSlide3=timeSlide3+500
		});
    }
    
    function hiddeSlide3() {
    	var timeSlide3H=500;
    	$($(".solutions-item").get().reverse()).each(function(i) {
			$(this).animate({left:'-9999px'}, timeSlide3H);
			timeSlide3H=timeSlide3H+500
		});
    }
    
    function showSlide4() {
    	var timeSlide4 = 250;
    	var count = $(".proyectos-item").find('img').length;    	
		$(".proyectos-item").delay(500).find('img').each(function(i) {			
			$(this).delay(timeSlide4).animate({width: "284px", height: "150px"}, 250, function() { 
				if(i == count-1) { 
					if ($(this).is(':visible')) {
					$(".proyectos-item").mouseover(function() {
						$(this).find(".proyectos-item-overlay").fadeIn(250);
					});
	
					$(".proyectos-item").mouseleave(function() {
						$(this).find(".proyectos-item-overlay").fadeOut(250);
					}); 
					}
				} 
			});
			timeSlide4 = timeSlide4 + 250			
		});  
    }
    
    function hiddeSlide4() {
    	var timeSlide4H = 100;
		$(".proyectos-item").find('img').each(function(i) {
			//alert(i);
			$(this).delay(timeSlide4H).animate({width: "0px", height: "0px"}, 100);
			timeSlide4H = timeSlide4H + 100			
		});  		
    }
    
    function showSlide5() {    	
		$('#slide5').delay(1000).fadeOut(1000, function() {
			$("#mistery_check1").delay(0).fadeIn(1000, function() { 
				$("#mistery_check2").fadeIn(1000); 
				$("#mistery_mano").animate({left: "0px"}, 1000, function() {
					$("#mistery_check1").css({background:"url('resources/images/excelente_act.png')"});				
				});
			});
		});
    }
    
    function hiddeSlide5() {
    	$("#mistery_check1").delay(0).hide(0, function() { 
			$("#mistery_check2").hide(0); 
			$("#mistery_mano").animate({left: "-9999px"}, 50, function() {
				$("#mistery_check1").css({background:"url('resources/images/excelente.png')"});
				$("#mistery_check1").hide(0);
			});
		});

		$('#slide5').show();
    }
});