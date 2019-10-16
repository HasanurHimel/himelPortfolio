const mix = require('laravel-mix');


mix.styles([
    'resources/css/frontend/bootstrap.min.css',
    'resources/css/frontend/jquery.animatedheadline.css',
    'resources/css/frontend/animate.css',
    'resources/css/frontend/owl.carousel.css',
    'resources/css/frontend/owl.theme.default.css',
    'resources/css/frontend/magnific-popup.css',
    'resources/css/frontend/normalize.css',
    'resources/css/frontend/style.css',
    'resources/css/frontend/application.css',
    'resources/css/frontend/responsive.css',
    'resources/css/frontend/styles.css',
    // 'resources/css/materialdesignicons.min.css'
], 'public/css/all.css')
  .scripts([
    'resources/js/frontend/jquery-3.2.1.min.js',
    'resources/js/frontend/bootstrap.min.js',
    'resources/js/frontend/jquery.magnific-popup.js',
    'resources/js/frontend/owl.carousel.js',
    'resources/js/frontend/wow.min.js',
    'resources/js/frontend/jquery.animatedheadline.js',
    'resources/js/frontend/custom.js',
    'resources/js/frontend/jquery.waypoints.js',
    'resources/js/frontend/jquery.counterup.min.js',
    'resources/js/frontend/particles.js',
    'resources/js/frontend/appp.js',
    // 'resources/js/frontend/validator.js',
    'resources/js/frontend/contact.js',
    'resources/js/frontend/main.js',
    'resources/js/frontend/index.js',
], 'public/js/all.js')
  .sass('resources/sass/frontend_app.scss', 'public/css/frontend_app.css')
  .version();


// backend

mix.styles([
    'resources/css/backend/blue.css',
    // 'resources/css/backend/bootstrap3-wysihtml5.min.css',
    'resources/css/backend/dataTables.bootstrap4.css',
    // 'resources/css/backend/datepicker3.css',
    // 'resources/css/backend/daterangepicker-bs3.css',
    // 'resources/css/backend/jquery-jvectormap-1.2.2.css',
    'resources/css/backend/morris.css',
    'resources/css/backend/adminlte.min.css',

    // 'resources/js/backend/vue-multiselect.min.css',
    // 'resources/css/backend/select2.min.css',
    // 'resources/css/backend/samples.css',
    // 'resources/css/backend/neo.css',
], 'public/css/backend_all.css')

    .scripts([
        'resources/js/backend/bootstrap.bundle.js',
        'resources/js/backend/adminlte.js',
        'resources/js/backend/vue-multiselect.min.js',
        // 'resources/js/backend/select2.full.min.js',
        // 'resources/js/backend/ckeditor.js',
        // 'resources/js/backend/sample.js',
        // 'resources/js/backend/bootstrap3-wysihtml5.all.min.js',
        // 'resources/js/backend/bootstrap-datepicker.js',
        // 'resources/js/backend/dashboard.js',
        // 'resources/js/backend/dataTables.bootstrap4.js',
        // 'resources/js/backend/daterangepicker.js',
        // 'resources/js/backend/demo.js',
        // 'resources/js/backend/fastclick.js',
        // 'resources/js/backend/jquery.dataTables.js',
        // 'resources/js/backend/jquery.knob.js',
        // 'resources/js/backend/jquery.js',
        // 'resources/js/backend/jquery.slimscroll.min.js',
        // 'resources/js/backend/jquery.sparkline.min.js',
        // 'resources/js/backend/jquery-jvectormap-1.2.2.min.js',
        // 'resources/js/backend/jquery-jvectormap-world-mill-en.js',
        // 'resources/js/backend/morris.js',

    ], 'public/js/backend_all.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .version();


   mix.js('resources/js/app.js', 'public/js/app.js').version();
   mix.js('resources/js/frontend_app.js', 'public/js/frontend_app.js').version();

           // carousel

mix.scripts([
        'resources/js/frontend/carousel_jequery.js',
        'resources/js/frontend/carousel_bootstrap.min.js',
    ], 'public/js/carousel.js').version();
            // carousel
