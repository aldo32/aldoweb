<style>
    .link-footer { color: #FFFFFF; font-weight: bold; font-size: 12px; }
    #container-footer { width: 60%; margin: 0 auto; }
    #text-footer { color: #000; font-weight: bold; }

    @media screen and (max-width: 800px) {
        .link-footer { font-size: 10px; }
        #container-footer { width: 100%; }
        #text-footer { font-size: 10px; }
    }
</style>

<script>
    $(document).ready(function() {
        $(".nyroModal").nyroModal();
    });
</script>

<div class="container-fluid">
    <div class="row" style="background: #222; padding: 15px;">
        <div class="col-md-12">
            <div style="" id="container-footer">
                <div class="fleft" style="margin-right: 15px;"><a href="#"><img src="<?php echo base_url()?>resources/images/google_ico.png" width="28" height="28" /></a></div>
                <div class="fleft" style="margin-right: 15px;"><a href="#"><img src="<?php echo base_url()?>resources/images/twitter_ico.png" width="28" height="28" /></a></div>
                <div class="fleft" style="margin-right: 55px;"><a href="#"><img src="<?php echo base_url()?>resources/images/facebook_ico.png" width="28" height="28" /></a></div>

                <div class="fleft" style="margin-right: 15px;"><a href="<?php echo base_url("inicio/terminos") ?>" class="link-footer nyroModal" >Terminos y condiciones</a></div>
                <div class="fleft" style="margin-right: 15px;"><a href="<?php echo base_url("inicio/directorio") ?>" class="link-footer nyroModal">Directorio</a></div>
                <div class="fleft" style="margin-right: 15px;"><a href="<?php echo base_url("inicio/contacto") ?>" class="link-footer nyroModal">Contactanos</a></div>
                <div class="fleft" style="margin-right: 15px;"><a href="<?php echo base_url("inicio/politicas") ?>" class="link-footer nyroModal">Políticas de privacidad</a></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <div id="text-footer">2012 Manuel Vallejo Blvd. Adolfo L. Mateos 1161 A-16, int. 804 C.P. 01490 Tel. (55)13579313 | Privacy Policy</div>
        </div>
    </div>
</div>

