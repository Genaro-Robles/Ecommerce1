<?php
require_once("modulosphp/login2.php");
include("modulosphp/header.php");
include("conexion/conexion.php");

$sql="SELECT * FROM about";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);


?>
<div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder mb-2"><?php echo $fila['titulo1']; ?></h1>
                                <p class="lead fw-normal text-black-50 mb-4"><?php echo $fila['texto1']; ?></p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#historia">Nuesta Historia</a>
                                    <a class="btn btn-dark btn-lg px-4" href="https://goo.gl/maps/2Ex8gFezFZ64xmXk6" target="_blank">Buscanos en google Maps</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d975.2684341215565!2d-77.00232307079612!3d-12.107104588189188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7e782ee9139%3A0xb19dfcfc1834c299!2sC.%20Manuel%20Piqueras%20101%2C%20Cercado%20de%20Lima%2015036!5e0!3m2!1ses!2spe!4v1634240594104!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                    </div>
                </div>

                <!-- About section one-->
            <section class="py-5 bg-light" id="historia">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen2']); ?>" /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder"><?php echo $fila['titulo2']; ?></h2>
                            <p class="lead fw-normal text-muted mb-0"><?php echo $fila['texto2']; ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About section two-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="data:image/png;base64,<?php echo base64_encode( $fila['imagen3']); ?>" /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder"><?php echo $fila['titulo3']; ?></h2>
                            <p class="lead fw-normal text-muted mb-0"><?php echo $fila['texto3']; ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Team members section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder">Nuestro equipo</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Genaro Robles</h5>
                                <div class="fst-italic text-muted">Founder &amp; CEO</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Anonimo</h5>
                                <div class="fst-italic text-muted">CFO</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-sm-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Anonimo</h5>
                                <div class="fst-italic text-muted">Operations Manager</div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Anonimo</h5>
                                <div class="fst-italic text-muted">CTO</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

<?php
    include("modulosphp/footer.php");
?>