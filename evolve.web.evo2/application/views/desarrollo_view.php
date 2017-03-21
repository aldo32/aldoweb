
        <!-- Begin Portfolio Item -->
        <section id="project-item" class="page-type">        	
        	<div class="container no-padding-bottom" style="height: 500px;">                

                <div id="project-inner" class="style-one">
                	<div class="row">

                    	<div class="col-md-5 col-sm-5">

                            <!-- project media -->
                            
                                <div class="owl-carousel slider">
                                    <div><img src="http://placehold.it/390x395" /></div>
                                    <div><img src="http://placehold.it/390x395" /></div>
                                    <div><img src="http://placehold.it/390x395" /></div>
                                    <div><img src="http://placehold.it/390x395" /></div>
                                </div>
                            

                        </div>
                        <div class="col-md-6 col-sm-6">

                            <!-- project content -->
                            <div class="project-content" id="test1" style="position: absolute; top: 0px; left: -9999px; height: 400px; width: 500px; overflow: auto;">

                                <h1 class="project-title">Desarrollo de software</h1>
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>                                                                                                

                            </div>

                        </div>
                    </div>
                </div>	
            </div>
        </section>
        <!-- // End Portfolio Item -->
        
        <script type="text/javascript">
			$(document).ready(function() {
				$( ".slider" ).owlCarousel({
					singleItem: true,
					navigation: true,
					navigationText: false,
					pagination: false,
					slideSpeed: 600,
				});

				$("#test1").delay(500).animate({left:"30px"}, 1500);				
			});
        </script>
  