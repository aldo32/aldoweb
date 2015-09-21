<?php
if ($user != "") {
    $title = "Editando usuario: <b>".$usuario->nombre."</b>";
    $type = "update";
}
else {
    $title = "Nuevo usuario";
    $type = "insert";
    $user = new user;
}

class user {
    var $idUsuario;
    var $nombre;
    var $apellidos;
    var $telefono;
    var $email;
    var $creado;
    var $idPerfil;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CortasarCMS - Usuarios</title>

		<?php echo $includes?>


        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
            <?php
            if (validation_errors() != "") {
                ?>
                $.nmManual('#test', {
    					closeOnEscape: true,
    					closeOnClick: true,
    					showCloseButton: false,
                        modal: true,
    					callbacks: {
    			            afterClose: function() {
    			            }
    			        }
    				}
    			);
                <?php
            }
            ?>
		});
		</script>

	</head>
<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<?php echo $header?>

		<?php echo $sidebar?>

		<div class="content-wrapper">
			<section class="content-header" style="margin-left: 0px;">
				<h1>Modulo de usuarios<small> <?php echo $title; ?> </small></h1>
				<ol class="breadcrumb">
            		<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="<?php echo base_url("usuarios") ?>">Administrar usuarios</li></a>
                    <li class="active"><a href="#"><?php echo $title; ?></a></li>
					<!--
            		<li><a href="#">Tables</a></li>
            		<li class="active">Data tables</li>
					-->
          		</ol>
			</section>

			<section class="content">
                <div class="box">
                    <div class="box-body">
                        <?php echo form_open("usuarios/guardar", array("name"=>"userForm", "id"=>"userForm"), array("isUsuario"=>$user->idUsuario)); ?>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nombre</label>
                                    <?php echo form_input(array('name'=>'nombre','id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre', $user->nombre)));?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Apellidos</label>
                                    <?php echo form_input(array('name'=>'apellidos','id'=>'apellidos', 'class'=>'form-control input-sm', 'value' =>set_value('apellidos', $user->apellidos)));?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Teléfono</label>
                                    <?php echo form_input(array('name'=>'telefono','id'=>'telefono', 'class'=>'form-control input-sm', 'value' =>set_value('telefono', $user->telefono)));?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Email <small>(usuario)</small></label>
                                    <?php echo form_input(array('name'=>'email','id'=>'email', 'type'=>'email', 'class'=>'form-control input-sm', 'value' =>set_value('email', $user->email)));?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Perfil</label>
                                    <?php echo form_dropdown("idPerfil", $comboPerfiles, set_value("idPerfil", $user->idPerfil), "class='form-control input-sm' id='idPerfil'");?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Password</label>
                                    <?php echo form_input(array('name'=>'password','id'=>'password', 'type'=>'password', 'class'=>'form-control input-sm', 'value' =>set_value('password')));?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Confirmar password</label>
                                    <?php echo form_input(array('name'=>'cpassword','id'=>'cpassword', 'type'=>'password', 'class'=>'form-control input-sm', 'value' =>set_value('')));?>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <br>
                        <?php echo form_close(); ?>

                        <!-- Modal window to messages -->
                        <div id="test" style="display: none;">
                            <div class="<?php echo MODAL_CLASS ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <a onclick="$.nmTop().close(); clear();"><button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button></a>
                                            <h4 class="modal-title">Campos faltantes</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo (validation_errors() != "") ? validation_errors() : ""; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a onclick="$.nmTop().close(); clear();"><button data-dismiss="modal" class="btn btn-outline pull-left" type="button">Close</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal window -->
                    </div>
                </div>
			</section>
		</div>

		<?php echo $footer;?>

		<?php echo $control_sidebar; ?>
	</div>
	<!-- ./wrapper -->


</body>
</html>
