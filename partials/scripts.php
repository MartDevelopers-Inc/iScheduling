<!-- Jquerry -->
<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script src="../public/js/bootstrap.bundle.min.js"></script>
<!-- Mentis Menu -->
<script src="../public/js/metismenu.min.js"></script>
<!-- Waves -->
<script src="../public/js/waves.js"></script>
<!-- Feather Js -->
<script src="../public/js/feather.min.js"></script>
<!-- Slim Scroll -->
<script src="../public/js/jquery.slimscroll.min.js"></script>
<!-- IziToast An Alternative For Swal -->
<script src="../public/js/iziToast.min.js"></script>
<!-- Dashboard Init Js  -->
<script src="../public/js/pages/jquery.crm_dashboard.init.js"></script>
<!-- App Js -->
<script src="../public/js/app.js"></script>
<!-- Profile Page Init Js -->
<script src="../public/js/pages/jquery.profile.init.js"></script>
<!-- Dropify -->
<script src="../public/plugins/dropify/dropify.min.js"></script>
<!-- Moment Js -->
<script src="../public/plugins/moment/moment.js"></script>
<!-- Isotope Js -->
<script src="../public/plugins/filter/isotope.pkgd.min.js"></script>
<!-- Masonry Js -->
<script src="../plugins/filter/masonry.pkgd.min.js"></script>
<!-- Magic Pop Js -->
<script src="../plugins/filter/jquery.magnific-popup.min.js"></script>
<!-- Chart Js -->
<script src="../plugins/chartjs/chart.min.js"></script>
<script src="../plugins/chartjs/roundedBar.min.js"></script>
<!-- Light Pick Js -->
<script src="../plugins/lightpick/lightpick.js"></script>
<!-- Custom Select 2 Bootsrap -->
<script src="../public/plugins/select2/select2.min.js"></script>
<script src="../public/plugins/select2/custom-select2.js"></script>
<!-- Custom File  -->
<script src="../public/js/bs-custom-file-input.min.js"></script>

<script>
    /* Init Feather Js */
    feather.replace()
    /* Init Custom Select */
    var ss = $(".basic").select2({
        tags: true,
    });
    /* Init Custom File Select */
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    /* Show Selected File Name */
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("myInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?php if (isset($success)) { ?>
    <!--This code for injecting success alert-->
    <script>
        iziToast.success({
            title: 'Success',
            position: 'topRight',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionInMobile: 'fadeInUp',
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
            timeout: 10000,
            resetOnHover: true,
            position: 'topRight',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            message: '<?php echo $err; ?>',
        });
    </script>

<?php } ?>

<?php if (isset($info)) { ?>
    <!--This code for injecting info alert-->
    <script>
        iziToast.warning({
            title: 'Warning',
            position: 'topLeft',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            transitionIn: 'fadeInUp',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            message: '<?php echo $info; ?>',
        });
    </script>

<?php }
