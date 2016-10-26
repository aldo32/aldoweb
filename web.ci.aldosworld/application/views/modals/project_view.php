<style>
    .modal-header {
        border-bottom: 1px solid #D75F17;
    }

    .modal-footer {
        border-top: 1px solid #D75F17;
    }

    .modal-content {
        padding: 10px;;
    }

    .modal-body p { margin: 0px; }
    .proyect-image {
        border: 5px solid #D75F17;
        -webkit-box-shadow: 0px 2px 7px 2px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 2px 7px 2px rgba(0,0,0,0.75);
        box-shadow: 0px 2px 7px 2px rgba(0,0,0,0.75);
        width: 100%;
        height: auto;
    }
</style>

<div class="" style="color: #000000;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close nyroModalClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Titulo del proyecto</h3>
            </div>
            <div class="modal-body" style="margin: 0px;">
                <p class="text-center">
                    <a href="#show-image" class="nyroModal">
                        <img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" />
                    </a>
                </p>
                <br>
                <p>Texto descriptivo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary nyroModalClose" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="" id="show-image" style="color: #000000; display: none; margin: 0px; padding: 0px;">
    <div class="modal-dialog" role="document" style="margin: 0px; padding: 0px; width: 100%;">
        <div class="modal-content">
            <div class="modal-body" style="">
                <p class="text-center">
                    <a href="<?php echo base_url("inicio/showProject/1") ?>" class="nyroModal">
                        <button type="button" class="btn btn-primary">Regresar</button>
                    </a>
                </p>
                <p class="text-center"><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil.png" style="width: 400px;"/></p>
            </div>
        </div>
    </div>
</div>