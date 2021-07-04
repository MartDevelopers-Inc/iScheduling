<script src="../public/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/default/internet-status.js"></script>
<script src="../public/js/waypoints.min.js"></script>
<script src="../public/js/jquery.easing.min.js"></script>
<script src="../public/js/wow.min.js"></script>
<script src="../public/js/owl.carousel.min.js"></script>
<script src="../public/js/jquery.counterup.min.js"></script>
<script src="../public/js/jquery.countdown.min.js"></script>
<script src="../public/js/imagesloaded.pkgd.min.js"></script>
<script src="../public/js/isotope.pkgd.min.js"></script>
<script src="../public/js/jquery.magnific-popup.min.js"></script>
<script src="../public/js/default/dark-mode-switch.js"></script>
<script src="../public/js/ion.rangeSlider.min.js"></script>
<script src="../public/js/jquery.dataTables.min.js"></script>
<script src="../public/js/jquery.dataTables.min.js"></script>
<script src="../public/js/default/active.js"></script>
<script src="../public/js/default/clipboard.js"></script>
<!-- PWA-->
<script src="../public/js/pwa.js"></script>
<!-- Alerts -->
<script src="../public/plugins/iziToast/iziToast.min.js"></script>
<?php if (isset($success)) { ?>
    <!--This code for injecting success alert-->
    <script>
        iziToast.success({
            title: 'Success',
            timeout: 1000,
            position: 'center',
            transitionIn: 'bounceInLeft',
            transitionOut: 'fadeOutRight',
            transitionInMobile: 'fadeInUp',
            animateInside: true,
            transitionOutMobile: 'fadeOutDown',
            message: '<?php echo $success; ?>',
        });
    </script>

<?php } ?>

<?php if (isset($err)) { ?>
    <!--This code for injecting error alert-->
    <script>
        iziToast.error({
            title: 'Error',
            timeout: 1000,
            resetOnHover: true,
            position: 'center',
            transitionIn: 'bounceInRigt',
            transitionOut: 'fadeOutLeft',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            animateInside: true,
            message: '<?php echo $err; ?>',
        });
    </script>

<?php } ?>

<?php if (isset($info)) { ?>
    <!--This code for injecting info alert-->
    <script>
        iziToast.warning({
            title: 'Warning',
            position: 'center',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionIn: 'fadeInUp',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            animateInside: true,
            message: '<?php echo $info; ?>',
        });
    </script>

<?php }
?>