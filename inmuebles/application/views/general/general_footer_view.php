<!--este es el footer visible-->
<div class="contenedor-footer footer-oculto">
    <div class="footer-visible">

        <button class="js-show-footer display-buttom"><i class="fa fa-chevron-down fa-2x"></i></button>


        <!--data fiscal-->

        <div class="social-icons">
            <span class="siga-nos">Síguenos</span>
            <a href="#" rel="nofollow" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
            <!-- a href="http://instagram.com/inmuebles24" rel="nofollow" target="_blank"><i class="fa fa-instagram fa-2x"></i></a> -->
            <a href="#" rel="nofollow" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
            <!-- <a href="https://plus.google.com/+Inmuebles24/posts" rel="nofollow" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a> -->

            <span class="copyright-text">Prop 2016</span>
        </div>
    </div>

    <!--este es la parte desplegable del footer-->
    <div class="footer-desplegable" style="background: #fff;">
        <div class="footer-content clearfix">
            <div class="container">
                <div class="footer-options">
                    <ul>
                        <li><a href="<?php echo base_url("inicio/contacto") ?>" class="nyroModal" rel="nofollow">Contacto</a></li>
                        <li><a href="<?php echo base_url("inicio/quienessomos") ?>" class="nyroModal" rel="nofollow">Quienes somos</a></li>
                    </ul>
                </div>

                <!--
                <div class="search-options">
                    <ul>
                        <li><a href="#" title="Inmuebles en Perú">Quienes somos</a></li>
                    </ul>
                </div>
                -->

                <div class="footer-legal">
                    <ul>
                        <li><a href="<?php echo base_url("inicio/terminos") ?>" class="nyroModal">Términos y condiciones</a></li>

                        <li><a href="<?php echo base_url("inicio/politicas") ?>" class="nyroModal">Política de Privacidad</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.contenedor-footer').addClass('footer-oculto');

        $('button.js-show-footer').on('click', function(e){
            e.preventDefault();
            $('.contenedor-footer').toggleClass('footer-oculto');
            if(!$('.contenedor-footer').hasClass('footer-oculto')){
                scrollToElemnt('.footer-options',600);
            }
        });
    });
</script>