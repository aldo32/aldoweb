<div class="<?php echo MODAL_CLASS ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a onclick="$.nmTop().close(); clear();"><button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button></a>
                <h4 class="modal-title"><?php echo $user->nombre." ".$user->apellidos ?></h4>
            </div>
            <?php echo form_open("usuarios/guardarPassword", array("name"=>"formPassword", "id"=>"formPassword", "class"=>"nyroModal"), array("idUsuario"=>$user->id)) ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <?php echo form_input(array('name'=>'password', 'id'=>'password', 'type'=>'password', 'class'=>'form-control input-sm', 'required'=>'true', 'value'=>''));?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirmar password</label>
                            <?php echo form_input(array('name'=>'cpassword', 'id'=>'cpassword', 'type'=>'password', 'class'=>'form-control input-sm', 'required'=>'true', 'value'=>''));?>
                        </div>
                    </div>
                    <br>
                    <?php if (validation_errors() != "") echo validation_errors(); ?>
                    <?php if ($message != "") echo "<div style='font-size: 16px; font-weight: bold'>".$message."</div>"; ?>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-outline pull-left" type="submit">Guardar</button>

                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
