<style>
    #logo_menu { position: absolute; left: 5px; top: -5px; }
</style>
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse">
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

                <div id="logo_menu"><img src="<?php echo base_url() ?>resources/images/escudo.png" width="73" height="80" /></div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="margin-left: 50px;">
                        <li <?php echo ($page == "home") ? "class='active'" : "" ?>><a href="<?php echo base_url("inicio") ?>">Home</a></li>
                        <li <?php echo ($page == "antecedentes") ? "class='active'" : "" ?>><a href="<?php echo base_url("antecedentes") ?>">Antecedentes</a></li>
                        <li <?php echo ($page == "plan") ? "class='active'" : "" ?>><a href="<?php echo base_url()?>resources/web.pdf" target="_blank">Plan municipal</a></li>
                        <li <?php echo ($page == "invertir") ? "class='active'" : "" ?>><a href="<?php echo base_url("invertir") ?>">Por que invertir</a></li>
                        <li <?php echo ($page == "tramites") ? "class='active'" : "" ?>><a href="<?php echo base_url("tramites") ?>">Tramites y servicios</a></li>
                        <li <?php echo ($page == "consulta") ? "class='active'" : "" ?>><a href="#">Consulta y recomendación</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>