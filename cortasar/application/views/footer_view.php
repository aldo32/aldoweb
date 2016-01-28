<style>
    #modal-wraper {
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        border: 0px solid #000000;
        background: #fccf3a;
        color: #fff;
        position: relative;
        padding: 15px;
    }
    #modal-content { padding-left: 10px; padding-right: 10px; padding-bottom: 10px; text-align: justify }
</style>

<div id="modal-wraper">
    <div id="modal-content">
        <?php
        switch ($opcion) {
            case 'terminos':
                echo "<h3>".$terminos->titulo."</h3>";
                echo "<br><br>";
                echo $terminos->descripcion;
                break;

            case 'politicas':
                echo "<h3>".$politicas->titulo."</h3>";
                echo "<br><br>";
                echo $politicas->descripcion;
                break;

            case 'directorio':
                if (isset($directorio)) {
                    foreach ($directorio AS $row) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fleft" style="margin: 10px;">
                                    <?php
                                    if ($row->foto != "") {
                                        ?>
                                        <img src="<?php echo URL_CMS.$row->foto;?>" width="100" height="100">
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <img src="<?php echo URL_CMS."resources/images/user-default.jpg";?>" width="100" height="100">
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="fleft">
                                    <div><?php echo $row->nombre." ".$row->apellidos ?></div>
                                    <div><?php echo $row->puesto ?></div>
                                    <div><?php echo $row->correo ?></div>
                                    <div><?php echo $row->telefono ?></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                break;

            case 'contacto':
                echo (validation_errors() != "") ? validation_errors() : "";
                echo "<h3>Contactanos</h3>";
                echo form_open("inicio/enviarContacto", array("name"=>"formContacto", "id"=>"formContacto", "class"=>"nyroModal"))
                ?>
                <div style="width: 600px;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo form_input(array('name'=>'nombre', 'placeholder'=>'Nombre completo', 'id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre')));?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo form_input(array('name'=>'email','placeholder'=>'Email', 'id'=>'email', 'class'=>'form-control input-sm', 'value' =>set_value('correo')));?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo form_input(array('name'=>'telefono', 'placeholder'=>'Teléfono', 'id'=>'telefono', 'class'=>'form-control input-sm', 'value' =>set_value('telefono')));?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo form_input(array('name'=>'ciudad', 'placeholder'=>'Ciudad', 'id'=>'ciudad', 'class'=>'form-control input-sm', 'value' =>set_value('ciudad')));?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea name="comentarios" class="form-control" rows="4" placeholder="Comentarios, sugerencias o preguntas"><?php echo set_value('comentarios') ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button class="btn btn-default" type="submit" id="">Enviar</button>
                        </div>
                    </div>
                </div>
                <?php
                echo form_close();
                break;
        }
        ?>
    </div>
</div>