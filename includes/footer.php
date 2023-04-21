
    <footer class="footer mt-5 <?= in_array($page,['login','registration']) ? " w-100 bg-dark" : "" ?>">
        <div class="container">
            <div class=" row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="<?= in_array($page,['login','registration']) ? "text-primary" : "text-dark" ?> my-4 text-sm font-weight-normal">
                            All rights reserved. Copyright ©
                            <script>
                                <?= date('Y') ?>
                            </script> <?= $_settings->info('short_name') ?> by <a href="mailto:oretnom23@gmail.com" target="_blank">oretnom23</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="<?= base_url ?>assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url ?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url ?>assets/js/plugins/perfect-scrollbar.min.js"></script>



    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="<?= base_url ?>assets/js/plugins/countup.min.js"></script>

    <script src="<?= base_url ?>assets/js/plugins/choices.min.js"></script>

    <script src="<?= base_url ?>assets/js/plugins/prism.min.js"></script>
    <script src="<?= base_url ?>assets/js/plugins/highlight.min.js"></script>

    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="<?= base_url ?>assets/js/plugins/rellax.min.js"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="<?= base_url ?>assets/js/plugins/tilt.min.js"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="<?= base_url ?>assets/js/plugins/choices.min.js"></script>


    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="<?= base_url ?>assets/js/plugins/parallax.min.js"></script>
    
    <!-- Summernote  -->
    <script src="<?= base_url ?>assets/summernote/summernote-lite.min.js" type="text/javascript"></script>


    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="<?= base_url ?>assets/js/material-kit.min.js?v=3.0.2" type="text/javascript"></script>