<style>
    #logo_menu { position: absolute; left: 5px; top: -5px; }
</style>
<div class="navbar-wrapper" style="margin-top: 0px;">
    <div class="container" style="padding: 0px; width: 100%">
        <nav class="navbar navbar-inverse" style="">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div id="logo_menu"><img src="<?php echo base_url() ?>resources/images/ic_cortazar_logo.png" width="140" height="67" /></div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="margin-left: 130px;">
                        <li <?php echo ($page == "home") ? "class='active'" : "" ?>><a href="<?php echo base_url("inicio") ?>" style="padding-bottom: 29px;">Home</a></li>
                        <li <?php echo ($page == "antecedentes") ? "class='active'" : "" ?>><a href="<?php echo base_url("antecedentes") ?>" style="padding-bottom: 29px;">Antecedentes</a></li>
                        <li <?php echo ($page == "plan") ? "class='active'" : "" ?>><a href="<?php echo base_url()?>resources/plan_desarrollo.pdf" target="_blank" style="padding-bottom: 29px;">Plan municipal</a></li>
                        <li <?php echo ($page == "invertir") ? "class='active'" : "" ?>><a href="<?php echo base_url("invertir") ?>" style="padding-bottom: 29px;">Por que invertir</a></li>
                        <li <?php echo ($page == "tramites") ? "class='active'" : "" ?>><a href="<?php echo base_url("tramites") ?>" style="padding-bottom: 29px;">Tramites y servicios</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>