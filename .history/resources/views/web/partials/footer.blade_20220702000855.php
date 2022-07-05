<?php 
$footerData = DB::table('web_footer')->get();
?>
        
        <!--=== Footer Version 1 ===-->
        <div class="footer-v1">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <!-- About -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <a href="index.html"><img id="logo-footer" class="footer-logo"
                                    src="{{ URL::asset('assets/img/logo_response.png') }}" alt=""></a>
                            <address class="md-margin-bottom-40">
                                {{ $footerData[0]->descripcion }}

                                <br />
                                
                                Email: <a style="color:#f06f2e;" href="#" class="">{{ $footerData[0]->email }}</a>
                            </address>
                        </div>
                        <!--/col-md-3-->
                        <!-- End About -->

                        <!-- Latest -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <div class="posts">
                                <div class="headline">
                                    <h2 style="border-bottom: 2px solid #f06f2e;">últimas publicaciones</h2>
                                </div>
                                <ul class="list-unstyled latest-list">
                                    <li>
                                        <a href="#">Contenido increible</a>
                                        <small>May 8, <?php echo $today = date("Y");?> </small>
                                    </li>
                                    <li>
                                        <a href="#">Mejores brotes</a>
                                        <small>June 23, <?php echo $today = date("Y");?></small>
                                    </li>
                                    <li>
                                        <a href="#">Nuevos términos y condiciones</a>
                                        <small>September 15, <?php echo $today = date("Y");?></small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--/col-md-3-->
                        <!-- End Latest -->

                        <!-- Link List -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <div class="headline">
                                <h2 style="border-bottom: 2px solid #f06f2e;">Enlaces útiles</h2>
                            </div>
                            <ul class="list-unstyled link-list">
                                <li><a href="#">Home</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Productos</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Proyectos</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Show Room</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="#">Nuestro Equipo</a><i class="fa fa-angle-right"></i></li>
                            </ul>
                        </div>
                        <!--/col-md-3-->
                        <!-- End Link List -->

                        <!-- Address -->
                        <div class="col-md-3 map-img md-margin-bottom-40">
                            <div class="headline">
                                <h2 style="border-bottom: 2px solid #f06f2e;">Ubicación</h2>
                            </div>
                            <p><iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3040.3097099679785!2d-3.8311105849552374!3d40.35765657937206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd418ecdf6a48249%3A0xa3ddd5e93fa1b9e1!2sAv.+San+Mart%C3%ADn+de+Valdeiglesias%2C+2%2C+28922+Alcorc%C3%B3n%2C+Madrid%2C+Espa%C3%B1a!5e0!3m2!1ses!2spe!4v1500736305815"
                                    width="100%" height="130" frameborder="0" style="border:0"
                                    allowfullscreen=""></iframe></p>

                        </div>
                        <!--/col-md-3-->
                        <!-- End Address -->
                    </div>
                </div>
            </div>
            <!--/footer-->

            <div class="copyright" style="background: #13756f;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p style="font-size: 16px;">
                                <?php echo $today = date("Y");?> &copy; Todos los derechos reservados.
                                <a style="color:#ffffff;" href="#">Privacy Policy</a> | <a style="color:#ffffff;"
                                    href="#">Terms of Service</a>
                            </p>
                        </div>

                        <!-- Social Links -->
                        <div class="col-md-6">
                            <ul class="footer-socials list-inline">
                                <li>
                                    <a href="#" style="color: #fff;" class="tooltips" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" style="color: #fff;" class="tooltips" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Skype">
                                        <i class="fa fa-skype"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" style="color: #fff;" class="tooltips" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Google Plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" style="color: #fff;" class="tooltips" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" style="color: #fff;" class="tooltips" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social Links -->
                    </div>
                </div>
            </div>
            <!--/copyright-->
        </div>
        <!--=== End Footer Version 1 ===-->