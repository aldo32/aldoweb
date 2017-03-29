<?php
$class = $this->router->fetch_class();
$method = $this->router->fetch_method();

$lang="";
if (!isset($language)) { $language = "spanish"; }
switch ($language) {
    case 'spanish': $lang = "ES"; break;
    case 'english': $lang = "EN"; break;
    case 'portugues': $lang = "PT"; break;
}

if ($menu == "inicio") { $inicioActive = "active"; } else { $inicioActive = ""; }
if ($menu == "videos360") { $videosActive = "active"; } else { $videosActive = ""; }
if ($menu == "fotos360") { $fotosActive = "active"; } else { $fotosActive = ""; }
if ($menu == "travel") { $travelActive = "active"; } else { $travelActive = ""; }
if ($menu == "lenceria") { $lenceriaActive = "active"; } else { $lenceriaActive = ""; }

?>
<div class="container" style="padding-left: 0px; padding-right: 0px;">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("/") ?>">
                    <img alt="Brand" id="main_logo" src="<?php echo base_url("resources/images/".$this->lang->line('logo')) ?>" width="143" height="65">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $inicioActive ?>"><a href="<?php echo base_url("/") ?>"><?php echo $this->lang->line('menu_home') ?></a></li>
                    <li class="<?php echo $videosActive ?>"><a href="<?php echo base_url("inicio/videos") ?>"><?php echo $this->lang->line('menu_videos360') ?></a></li>
                    <li class="<?php echo $fotosActive ?>"><a href="<?php echo base_url("inicio/fotos") ?>"><?php echo $this->lang->line('menu_fotos360') ?></a></li>
                    <li class="<?php echo $travelActive ?>"><a href="<?php echo base_url("inicio/travel") ?>"><?php echo $this->lang->line('menu_travel') ?></a></li>
                    <li class="<?php echo $lenceriaActive ?>"><a href="<?php echo base_url("inicio/lenceria") ?>"><?php echo $this->lang->line('menu_lenceria') ?></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('menu_idioma') ?> [<?php echo $lang ?>]<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url("inicio/setLanguage?language=spanish&request=".$class."/".$method) ?>">Español</a></li>
                            <li><a href="<?php echo base_url("inicio/setLanguage?language=english&request=".$class."/".$method) ?>">Inglés</a></li>
                            <li><a href="<?php echo base_url("inicio/setLanguage?language=portugues&request=".$class."/".$method) ?>">Portugués</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</div>
