		<aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        	<?php if ($session->rutaFoto != "") {?>
                            	<img src="<?php echo base_url()."/".$session->rutaFoto?>" class="img-circle" alt="<?php echo $session->nombre?>" />
                            <?php } else {?>
                            	<img src="<?php echo base_url();?>/resources/img/user-bg.png" class="img-circle" alt="<?php echo $session->nombre?>" />
                            <?php }?>                            
                        </div>
                        <div class="pull-left info">
                            <p>Hola  <?php echo strtok($session->nombre, ' ');?></p>                            
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo base_url("inicio")?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url("usuarios")?>">
                                <i class="fa fa-users"></i> <span>Usuarios</span>                                
                            </a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url("etapas")?>">
                                <i class="fa fa-calendar"></i> <span>Etapas</span>                                
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("grupos")?>">
                                <i class="fa fa-bars"></i> <span>grupos</span>                                
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("adminegu")?>">
                                <i class="fa fa-gears"></i> <span>Etapas, grupos y usuarios</span>                                
                            </a>
                        </li>
						<li>
                            <a href="<?php echo base_url("horarios")?>">
                                <i class="fa fa-clock-o"></i> <span>Horarios</span>                                
                            </a>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url("horariosreglas")?>">
                                <i class="fa fa-edit"></i> <span>Horarios reglas</span>                                
                            </a>
                        </li>	
                        <li>
                            <a href="<?php echo base_url("permisos")?>">
                                <i class="fa fa-tag"></i> <span>Permisos para faltas</span>                                
                            </a>
                        </li>                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>