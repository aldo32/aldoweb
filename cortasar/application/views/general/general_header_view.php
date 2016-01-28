    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="<?php echo base_url() ?>resources/images/ic_cortazar_logo.png" width="130" height="52" >
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php echo ($page == "home") ? "class='active'" : "" ?>><a href="<?php echo base_url("inicio") ?>" class="link-menu">Home</a></li>
                    <li <?php echo ($page == "antecedentes") ? "class='active'" : "" ?>><a href="<?php echo base_url("antecedentes") ?>" class="link-menu">Antecedentes</a></li>
                    <li <?php echo ($page == "plan") ? "class='active'" : "" ?>><a href="<?php echo base_url()?>resources/plan_desarrollo.pdf" target="_blank" class="link-menu">Plan municipal</a></li>
                    <li <?php echo ($page == "invertir") ? "class='active'" : "" ?>><a href="<?php echo base_url("invertir") ?>" class="link-menu">Por que invertir</a></li>
                    <li <?php echo ($page == "tramites") ? "class='active'" : "" ?>><a href="<?php echo base_url("tramites") ?>" class="link-menu">Tramites y servicios</a></li>
                </ul>
            </div>
        </div>
    </nav>
