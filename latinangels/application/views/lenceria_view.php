<script>
    function onVrViewLoad() {
        var vrView = new VRView.Player('#wrap-video', {
            image: '//storage.googleapis.com/vrview/examples/coral.jpg',
            /*video: 'resources/images/video.mp4',*/
            is_stereo: true,
            width: "100%",
            height: "100%"
        });
    }
    $(document).ready(function() {
        onVrViewLoad();
    });
</script>
<div class="row wrap-vervideo">
    <div class="col-md-12">
        <br>
        <h2 style="font-size: 50px; letter-spacing: 1px;"><?php echo $this->lang->line('menu_lenceria') ?></h2>
    </div>
    <div class="col-md-12 menu-map">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url("/") ?>"><?php echo $this->lang->line('menu_home') ?></a> /
        <?php echo $this->lang->line('menu_lenceria') ?>
    </div>

    <div class="col-md-12" style="margin-bottom: 20px;">
        <br>
        <div class="col-md-8">
            <div class="wrap-video">
                <img src="<?php echo base_url("resources/images/bg_video_lenceria.jpg") ?>" width="100%" height="100%">
            </div>
            <br>
            <p style="font-size: 16px;"><?php echo $this->lang->line('prod_fotos_gabriela') ?></p>
            <br>
            <a href="<?php echo base_url("inicio/vervideo") ?>" target="_self">
                <div class="bg_button_play"><?php echo $this->lang->line('ver_video') ?></div>
            </a>
        </div>

        <div class="col-md-4">
            <h2 style="font-size: 40px; margin: 0px; margin-top: 10px;"><?php echo $this->lang->line('post_recientes') ?></h2>
            <div class="col-md-5 image_post">
                <br>
                <img src="<?php echo base_url("resources/images/image_post1.jpg") ?>" width="131" height="186">
            </div>
            <div class="col-md-6">
                <br>
                <p style="font-size: 10px;">29/03/2017</p>
                <p style="color: #d04d93; font-size: 16px;"><?php echo $this->lang->line('nueva_modelo') ?></p>
                <p style="font-size: 16px;"><?php echo $this->lang->line('mira_la_nueva') ?></p>
                <p>
                    <a href="<?php echo base_url("inicio/vervideo") ?>" target="_self" style="color: #666772;">
                        <div class="bg_button_ver_small"><?php echo $this->lang->line('ver_angel') ?></div>
                    </a>
                </p>
            </div>

            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">&nbsp;</div>

            <h2 style="font-size: 40px; margin: 0px; margin-top: 10px;"><?php echo $this->lang->line('post_recientes') ?></h2>
            <div class="col-md-5 image_post">
                <br>
                <img src="<?php echo base_url("resources/images/image_post2.jpg") ?>" width="131" height="186">
            </div>
            <div class="col-md-6">
                <br>
                <p style="font-size: 10px;">29/03/2017</p>
                <p style="color: #d04d93; font-size: 16px;"><?php echo $this->lang->line('nuevo_video_360') ?></p>
                <p style="font-size: 16px;"><?php echo $this->lang->line('video_360_vr') ?></p>
                <p>
                    <a href="<?php echo base_url("inicio/vervideo") ?>" target="_self" style="color: #666772;">
                        <div class="bg_button_ver_small"><?php echo $this->lang->line('ver_video') ?></div>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>