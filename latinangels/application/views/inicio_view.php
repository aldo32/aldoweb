<script>
    $(document).ready(function() {
        $('#quote-carousel').carousel({
            pause: true,
            interval: 4000,
        });

        $('#juega_con').delay(200).fadeIn(2000).delay(1000, function() {
            $('#juega_nombre').fadeIn(2000).delay(500, function() {
                $('#semana_button').animate({
                    left: "0px",
                }, 2000);
                $('#video_button').animate({
                    left: "0px",
                }, 2000);
                $('#p360').fadeIn();
            });
        });
    });
</script>

<div class="row">
    <div class="col-md-12 home-section-1">
        <div id="wrapper-home1">
            <div class="blank"></div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="semana_button" style="left: 9999px;">
                    <a href="<?php echo base_url("inicio/vervideo") ?>" target="_self">
                        <div class="bg_button_orange"><?php echo $this->lang->line('video_semana') ?></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3 class="no-display" id="juega_con"><?php echo $this->lang->line('juega_con') ?></h3>
                    <h1 class="no-display" id="juega_nombre"><?php echo $this->lang->line('carolina') ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 no-display" id="p360">
                    <label class="font-regular"><?php echo $this->lang->line('descubrir') ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" id="video_button" style="left: 9999px">
                    <a href="<?php echo base_url("inicio/vervideo") ?>" target="_self">
                        <div class="bg_button_play"><?php echo $this->lang->line('ver_video') ?></div>
                    </a>
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
                <a href="<?php echo base_url("inicio/videos") ?>"><h2 class="title_animate"><?php echo $this->lang->line('videos_360') ?></h2></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-fotos-360 item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url("inicio/fotos") ?>"><h2 class="title_animate"><?php echo $this->lang->line('produccion_fotos_360') ?></h2></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-travels item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url("inicio/travel") ?>"><h2 class="title_animate"><?php echo $this->lang->line('travels') ?></h2></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-lenceria item_home2">
        <div class="row marginT80">
            <div class="col-md-12 text-center">
                <a href="<?php echo base_url("inicio/lenceria") ?>"><h2 class="title_animate"><?php echo $this->lang->line('lenceria') ?></h2></a>
            </div>
        </div>
    </div>
</div>


<div class='row wrap-home-carrusel'>
    <div class="col-md-12">
        <br>
        <h2 style="font-size: 50px; letter-spacing: 1px;"><?php echo $this->lang->line('angeles') ?></h2>
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
                                <p class="font-regular"><?php echo $this->lang->line('nueva_modelo') ?></p>
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
                                <p class="font-bold">Suzana Canzian</p>
                                <p class="font-regular"><?php echo $this->lang->line('nueva_modelo') ?></p>
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
                                <p class="font-bold">Nani Ochoa</p>
                                <p class="font-regular"><?php echo $this->lang->line('nueva_modelo') ?></p>
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

<div class="row wrap-hot">
    <div class="col-md-12">
        <br>
        <h2 style="font-size: 50px; letter-spacing: 1px;"><?php echo $this->lang->line('hot_news') ?></h2>
    </div>
    <div class="col-md-5" style="margin-left: 10px;">
        <img class="img_hot" src="<?php echo base_url("resources/images/image_video_360.jpg") ?>" width="343" height="200">
        <p style="font-size: 10px;">29/03/2017</p>
        <p style="color: #d04d93; font-size: 16px;"><?php echo $this->lang->line('nuevo_video_360') ?></p>
        <p style="font-size: 16px;"><?php echo $this->lang->line('video_360_vr') ?></p>
    </div>
    <div class="col-md-5" style="margin-left: 10px;">
        <img class="img_hot" src="<?php echo base_url("resources/images/image_nueva_modelo.jpg") ?>" width="343" height="200">
        <p style="font-size: 10px;">29/03/2017</p>
        <p style="color: #d04d93; font-size: 16px;"><?php echo $this->lang->line('nueva_modelo') ?></p>
        <p style="font-size: 16px;"><?php echo $this->lang->line('conoce_a_nuestra') ?></p>
    </div>
    <div class="col-md-12" style="margin-left: 10px; margin-bottom: 20px;">
        <a href="<?php echo base_url("inicio/vervideo") ?>" target="_blank">
            <div class="bg_button_ver"><?php echo $this->lang->line('button_ver_mas') ?></div>
        </a>
        <br>
    </div>
</div>