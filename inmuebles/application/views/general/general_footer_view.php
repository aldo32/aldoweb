<!--este es el footer visible-->
<div class="contenedor-footer footer-oculto">
    <div class="footer-visible">

        <button class="js-show-footer display-buttom"><i class="fa fa-chevron-down fa-2x"></i></button>


        <!--data fiscal-->

        <div class="social-icons">
            <span class="siga-nos">Síguenos</span>
            <a href="https://twitter.com/inmuebles24" rel="nofollow" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="http://instagram.com/inmuebles24" rel="nofollow" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="https://www.facebook.com/inmuebles24.com.mx" rel="nofollow" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
            <a href="https://plus.google.com/+Inmuebles24/posts" rel="nofollow" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>

            <span class="copyright-text">© Copyright 2016</span>
        </div>
    </div>

    <!--este es la parte desplegable del footer-->
    <div class="footer-desplegable" style="background: #fff;">
        <div class="footer-content clearfix">
            <div class="container">
                <div class="footer-options">
                    <ul>
                        <li>
                            <a title="Busca inmuebles en tu Android" href="https://play.google.com/store/apps/details?id=com.navent.realestate.inmuebles24&amp;referrer=utm_source%3DWebSite%26utm_medium%3DfooterText%26utm_term%3Dinstalls%26utm_content%3Dfooter%26utm_campaign%3DfooterLink">
                                Descarga la app Android
                            </a>
                        </li>
                        <li>
                            <a title="Busca inmuebles en tu iPhone" href="https://click.google-analytics.com/redirect?tid=UA-10030475-5&amp;url=https%3A%2F%2Fitunes.apple.com%2Fmx%2Fapp%2Finmuebles24%2Fid643973960&amp;aid=com.navent.realestate.inmuebles24&amp;idfa=id643973960&amp;cs=WebSite&amp;cm=footerText&amp;cn=footerLink&amp;cc=footer&amp;ck=installs">
                                Descarga la app iPhone
                            </a>
                        </li>
                        <li><a href="http://m.inmuebles24.com/" rel="alternate" class="visible-phone">Versión móvil</a> </li>

                        <li>
                            <a href="/inmuebles.html">
                                Inmuebles <span> en México</span>
                            </a>
                        </li>
                        <li>
                            <a href="/publicar.bum" rel="nofollow">Publicar tu Inmueble</a>
                        </li>
                        <li><a href="/contacto.bum" rel="nofollow">Contacto</a></li>
                        <li><a href="/panel.bum" rel="nofollow">Regístrate</a></li>
                    </ul>
                </div>

                <div class="search-options">
                    <ul>

                        <li><a href="http://www.adondevivir.com/" title="Inmuebles en Perú">Buscar inmuebles en Perú</a></li>
                        <li><a href="http://www.conlallave.com/" title="Bienes raíces en Venezuela">Buscar inmuebles en Venezuela</a></li>
                        <li><a href="http://www.plusvalia.com/" title="Inmuebles en Ecuador">Buscar inmuebles en Ecuador</a></li>
                        <li><a href="http://www.compreoalquile.com/" title="Propiedades en Panamá">Buscar inmuebles en Panamá</a></li>
                        <li><a href="http://www.zonaprop.com.ar/" title="Inmuebles en Argentina">Buscar inmuebles en Argentina</a></li>
                        <li><a href="http://www.compreoalquile.co.cr/" title="Inmuebles en Costa Rica">Buscar inmuebles en Costa Rica</a></li>
                        <li><a href="http://www.inmuebles24.co/" title="Inmuebles en Colombia">Buscar inmuebles en Colombia</a></li>
                        <li><a href="http://www.imovelweb.com/" title="Propiedades en Brasil">Buscar inmuebles en Brasil</a></li>
                        <li><a href="http://www.zonaprop.com.ar/uruguay" title="Propiedades en Uruguay">Buscar propiedades en Uruguay</a></li>
                    </ul>
                </div>

                <div class="footer-legal">
                    <ul>
                        <li><a href="/terminos.bum">Términos y condiciones</a></li>

                        <li><a href="/politicas.bum">Política de Privacidad</a></li>
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