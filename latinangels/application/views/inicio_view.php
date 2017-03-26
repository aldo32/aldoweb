<script>
    $(document).ready(function() {
        $('#quote-carousel').carousel({
            pause: true,
            interval: 4000,
        });

        $('#juega_con').delay(500).fadeIn(2000).delay(2000, function() {
            $('#juega_nombre').fadeIn(2000).delay(2000, function() {
                $('#semana_button').animate({
                    left: "0px",
                }, 2000);
                $('#video_button').animate({
                    left: "0px",
                }, 2000);
                $('#p360').fadeIn();
            });
        });

        setInterval(animeteTextHome, 10000);

        function animeteTextHome() {
            $('.title_animate').each(function(index) {
                $(this).delay(400*index).fadeOut(300).delay(300).fadeIn();
            });
        }
    });
</script>

<div class="row">
    <div class="col-md-12 home-section-1">
        <div id="wrapper-home1">
            <div class="blank"></div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="semana_button" style="left: 9999px;">
                    <a href="#" target="_blank"><img src="<?php echo base_url("resources/images/video_semana_button.jpg") ?>"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3 class="no-display" id="juega_con">Jugá con</h3>
                    <h1 class="no-display" id="juega_nombre">CAROLINA</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 no-display" id="p360">
                    <label class="font-regular">Descubri su producción 360</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="video_button" style="left: 9999px">
                    <a href="#" target="_blank"><img src="<?php echo base_url("resources/images/ver_video_button.png") ?>"></a>
                </div>
            </div>
            <div class="blank"></div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-3 col-videos-360 item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="#"><h2 class="title_animate">VIDEOS 360</h2></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-fotos-360 item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="#"><h2 class="title_animate">PRODUCCIÓN FOTOS 360</h2></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-travels item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="#"><h2 class="title_animate">TRAVELS</h2></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-lenceria item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="#"><h2 class="title_animate">LENCERÍA</h2></a>
            </div>
        </div>
    </div>
</div>


<div class='row wrap-home-carrusel'>
    <div class="col-md-12">
        <br>
        <h2 style="font-size: 50px; letter-spacing: 1px;">ÁNGELES</h2>
    </div>
    <div class='col-md-offset-2 col-md-8'>
        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
            <!-- Bottom Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#quote-carousel" data-slide-to="1"></li>
                <li data-target="#quote-carousel" data-slide-to="2"></li>
            </ol>

            <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner">

                <!-- Quote 1 -->
                <div class="item active">
                    <blockquote>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <img class="img-circle" src="<?php echo base_url("resources/images/f1.jpg") ?>" style="width: 200px; height:200px;">
                                <p class="font-bold">Zohira Teride</p>
                                <p class="font-regular">NUEVA MODELO</p>
                            </div>
                        </div>
                    </blockquote>
                </div>
                <!-- Quote 2 -->
                <div class="item">
                    <blockquote>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <img class="img-circle" src="<?php echo base_url("resources/images/f2.jpg") ?>" style="width: 200px;height:200px;">
                                <p class="font-bold">Zohira Teride</p>
                                <p class="font-regular">NUEVA MODELO</p>
                            </div>
                        </div>
                    </blockquote>
                </div>
                <!-- Quote 3 -->
                <div class="item">
                    <blockquote>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <img class="img-circle" src="<?php echo base_url("resources/images/f3.jpg") ?>" style="width: 200px;height:200px;">
                                <p class="font-bold">Zohira Teride</p>
                                <p class="font-regular">NUEVA MODELO</p>
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>

            <!-- Carousel Buttons Next/Prev -->
            <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
            <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row wrap-footer">
    <div class="col-md-12 text-center">
        <br>
        <img src="<?php echo base_url("resources/images/logo_footer.png") ?>">
    </div>
</div>