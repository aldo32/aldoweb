<style>
    .modal-body p { margin: 10px; }
</style>
<div class="" style="color: #000000;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close nyroModalClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title"><?php echo $project->name ?></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <p>
                            <a href="<?php echo base_url().$project->image ?>" target="_blank">
                                <img class="proyect-image" src="<?php echo base_url().$project->image_thumb ?>" />
                            </a>
                        </p>
                        <br>
                        <p class="text-center">
                            <?php
                            if ($project->url != "") {
                                ?><a href="<?php echo $project->url ?>" target="_blank"><button type="button" class="btn btn-primary">Visitar sitio</button></a><?php
                            }
                            else {
                                ?><button type="button" class="btn btn-primary disabled">Visitar sitio</button><?php
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-md-7" style="height: 300px; overflow: auto; font-size: 14px;">
                        <?php
                        echo $project->description
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary nyroModalClose" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>